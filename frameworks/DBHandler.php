<?php
class DBHandler {
    private $conn;

    public function __construct($server, $database, $user, $password) {
        $options = [
            "Database" => $database,
            "Uid" => $user,
            "PWD" => $password,
            "CharacterSet" => "UTF-8"
        ];

        $this->conn = sqlsrv_connect($server, $options);
        if ($this->conn === false) {
            die("Connection failed: " . print_r(sqlsrv_errors(), true));
        }
    }

    /** 
     * $db = new DBHandler($server, $database, $user, $password);
        // Call the procedure with one parameter
        $users = $db->callProcedure('GetUsersByRole', ['admin']);
     * 
     * **/
    public function callProcedure($procedureName, $params = []) {
        // Build parameter placeholders
        $placeholders = implode(', ', array_fill(0, count($params), '?'));

        // Build the SQL to call the stored procedure
        $sql = "EXEC {$procedureName} {$placeholders}";

        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die("Stored procedure call failed: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch results
        $results = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $results[] = $row;
        }

        return $results;
    }

    /*** Fetch USAGE  ***

        // Basic fetch
        $data = $db->fetchAll("employees");

        // With exact match conditions
        $data = $db->fetchAll("employees", ["department" => "HR"]);

        // With LIKE condition (search for name containing 'john')
        $data = $db->fetchAll("employees", [], ["name" => "john"]);

        // With sorting and limit
        $data = $db->fetchAll("employees", [], [], "hire_date DESC", 10);

    ***/
    // Fetch all data with/without conditions
    public function fetchAll($table, $conditions = []) {
        $where = '';
        $params = [];

        if (!empty($conditions)) {
            $clauses = [];
            foreach ($conditions as $column => $value) {
                $clauses[] = "$column = ?";
                $params[] = $value;
            }
            $where = " WHERE " . implode(" AND ", $clauses);
        }

        $sql = "SELECT * FROM {$table}" . $where;
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die("Fetch failed: " . print_r(sqlsrv_errors(), true));
        }

        $results = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $results[] = $row;
        }

        return $results;
    }

     // Fetch all data with/without conditions limit
    public function fetchAllWithLimit($table, $conditions = [], $likeConditions = [], $orderBy = '', $limit = null) {
        $whereClauses = [];
        $params = [];

        // Add standard conditions
        foreach ($conditions as $column => $value) {
            $whereClauses[] = "$column = ?";
            $params[] = $value;
        }

        // Add LIKE conditions
        foreach ($likeConditions as $column => $value) {
            $whereClauses[] = "$column LIKE ?";
            $params[] = '%' . $value . '%';
        }

        $where = '';
        if (!empty($whereClauses)) {
            $where = ' WHERE ' . implode(' AND ', $whereClauses);
        }

        // Add ORDER BY
        $orderClause = '';
        if (!empty($orderBy)) {
            $orderClause = " ORDER BY $orderBy";
        }

        // Add LIMIT (for SQL Server use TOP)
        $limitClause = '';
        if (is_int($limit) && $limit > 0) {
            $limitClause = "TOP $limit ";
        }

        $sql = "SELECT {$limitClause}* FROM {$table}{$where}{$orderClause}";
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die("Fetch failed: " . print_r(sqlsrv_errors(), true));
        }

        $results = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $results[] = $row;
        }

        return $results;
    }


    // Check if record exists based on condition
    public function exists($table, $conditions) {
        $where = [];
        $params = [];

        foreach ($conditions as $column => $value) {
            $where[] = "$column = ?";
            $params[] = $value;
        }

        $sql = "SELECT COUNT(*) as count FROM $table WHERE " . implode(" AND ", $where);
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die("Exist check failed: " . print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['count'] > 0;
    }

    public function update($table, $data, $conditions) {
        $set = [];
        $where = [];
        $params = [];

        foreach ($data as $key => $value) {
            $set[] = "$key = ?";
            $params[] = $value;
        }

        foreach ($conditions as $key => $value) {
            $where[] = "$key = ?";
            $params[] = $value;
        }

        $sql = "UPDATE $table SET " . implode(', ', $set) . " WHERE " . implode(' AND ', $where);
        $stmt = sqlsrv_prepare($this->conn, $sql, $params);

        if ($stmt === false) {
            die("Update failed: " . print_r(sqlsrv_errors(), true));
        }

        return sqlsrv_execute($stmt);
    }


    /*
    public function safeInsert($table, $data, $uniqueFields) {
        $filteredData = [];
        $skippedFields = [];
        // Filter out empty or whitespace-only fields (but allow 0 or "0")
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $value = trim($value); // trim whitespace
            }
            if ($value === "" || $value === null) {
                $skippedFields[] = $key;
            } else {
                $filteredData[$key] = $value;
            }
        }
        // Ensure required unique fields are still present
        foreach ($uniqueFields as $field) {
            if (!isset($filteredData[$field])) {
                return [
                    "status" => "error",
                    "message" => "Missing required unique field: $field",
                    "skipped_fields" => $skippedFields
                ];
            }
        }
        // Check for duplicate
        $checkFields = array_intersect_key($filteredData, array_flip($uniqueFields));
        if ($this->exists($table, $checkFields)) {
            return [
                "status" => "duplicate",
                "skipped_fields" => $skippedFields
            ];
        }

        // Proceed with insert
        $result = $this->insert($table, $filteredData);
        return [
            "status" => $result ? "inserted" : "failed",
            "skipped_fields" => $skippedFields
        ];
    }*/


    public function safeInsert($table, $data, $uniqueFields) {
        $filteredData = [];
        $skippedFields = [];

        // Trim and clean data
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $value = trim($value);
            }
            if ($value === "" || $value === null) {
                $skippedFields[] = $key;
            } else {
                $filteredData[$key] = $value;
            }
        }

        // Check required unique fields
        foreach ($uniqueFields as $field) {
            if (!isset($filteredData[$field])) {
                return [
                    "status" => "error",
                    "message" => "Missing required unique field: $field",
                    "skipped_fields" => $skippedFields
                ];
            }
        }

        $checkFields = array_intersect_key($filteredData, array_flip($uniqueFields));

        if ($this->exists($table, $checkFields)) {
            // Don't update unique fields
            $updateData = array_diff_key($filteredData, array_flip($uniqueFields));

            if (empty($updateData)) {
                return [
                    "status" => "unchanged",
                    "message" => "No fields to update.",
                    "skipped_fields" => $skippedFields
                ];
            }

            $updated = $this->update($table, $updateData, $checkFields);
            return [
                "status" => $updated ? "updated" : "failed",
                "skipped_fields" => $skippedFields
            ];
        }

        // Insert if not exists
        $inserted = $this->insert($table, $filteredData);
        return [
            "status" => $inserted ? "inserted" : "failed",
            "skipped_fields" => $skippedFields
        ];
    }





    // Normal insert method
    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = rtrim(str_repeat("?, ", count($data)), ", ");
        $values = array_values($data);

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $stmt = sqlsrv_query($this->conn, $sql, $values);

        if ($stmt === false) {
            die("Insert error: " . print_r(sqlsrv_errors(), true));
        }

        return true;
    }

    public function close() {
        sqlsrv_close($this->conn);
    }
}
?>
