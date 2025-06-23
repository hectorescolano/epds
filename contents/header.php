<?php
    require_once "frameworks/DBHandler.php";

    session_start();
    if (empty($_SESSION['csrf_token'])) {
      $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    /* GET EMPLOYEE ID FROM WORDRESS COOKIES */
    function array_key_exists_wildcard ( $array, $search, $return = 'key-value' ) {
        $search = str_replace( '\*', '.*?', preg_quote( $search, '/' ) );
        $result = preg_grep( '/^' . $search . '$/i', array_keys( $array ) );
        if ( $return == 'key-value' )
            return array_intersect_key( $array, array_flip( $result ) );
        return $result;
    }

    $value = array_key_exists_wildcard($_COOKIE,"wordpress_logged_in_*");
    $temp = explode("|",end($value));

    $employeeId = "";
    $employee_hris_data = array();

    if(isset($temp))
    {

        $employeeId = $temp[0];
        $db = new DBHandler("clusthris\clusthris", "hris_test", "sa", "MICS*write");

        // Call the procedure with one parameter
        $personal_data = $db->callProcedure('spRetrieveHRISEmployee', [$employeeId]);
        $family_data = $db->callProcedure('HRIS_SP_GetEmployeeFamily', [$employeeId]);
        $education_data = $db->callProcedure('HRIS_SP_GetEmployeeEducation', [$employeeId]);

        $employee_hris_data['personal'] = $personal_data;
        $employee_hris_data['family'] = $family_data;
        $employee_hris_data['education'] = $education_data;
    }

    // print_r($employee_hris_data['personal'][0]);

    // Personal Data
    $fullname = $employee_hris_data['personal'][0]['fullname'] ?? '';
    $lastname = $employee_hris_data['personal'][0]['lastname'] ?? '';
    $firstname = $employee_hris_data['personal'][0]['firstname'] ?? '';
    $middlename = $employee_hris_data['personal'][0]['middlename'] ?? '';
    $xname = $employee_hris_data['personal'][0]['XNAME'] ?? '';

    $height = $employee_hris_data['personal'][0]['Height'] ?? '';
    $weight = $employee_hris_data['personal'][0]['Weight'] ?? '';
    $blood = $employee_hris_data['personal'][0]['BloodType'] ?? '';

    $address = $employee_hris_data['personal'][0]['address'] ?? '';
    $brgy = $employee_hris_data['personal'][0]['barangay'] ?? '';
    $cstatus = $employee_hris_data['personal'][0]['cstatus'] ?? '';
    $gender = $employee_hris_data['personal'][0]['gender'] ?? '';
    $citizenship = $employee_hris_data['personal'][0]['Citizenship'] ?? '';

    $dob_raw = $employee_hris_data['personal'][0]['dob'] ?? '';
    $dob_formatted = '';
    if (!empty($dob_raw)) {
        $dob = date_create($dob_raw);
        if ($dob) {
            $dob_formatted = date_format($dob, 'm/d/Y');
        }
    }
    $dob = $dob_formatted;

    $pob = $employee_hris_data['personal'][0]['pob'] ?? '';
    $mobile = $employee_hris_data['personal'][0]['mobileno'] ?? '';
    $contact = $employee_hris_data['personal'][0]['ContactNo'] ?? '';
    $email = $employee_hris_data['personal'][0]['email_address'] ?? '';

    $tin = $employee_hris_data['personal'][0]['tin'] ?? '';
    $gsis = $employee_hris_data['personal'][0]['gsis'] ?? '';
    $pagibig = $employee_hris_data['personal'][0]['pagibig'] ?? '';
    $philhealth = $employee_hris_data['personal'][0]['philhealth'] ?? '';

    // Family Data
    // Initialize categorized arrays
    $father  = [];
    $mother  = [];
    $sons    = [];
    $daughters = [];
    $sisters = [];
    $brothers = [];
    $aunties = [];
    $uncles  = [];

    if (!empty($employee_hris_data['family']) && is_array($employee_hris_data['family'])) {
        foreach ($employee_hris_data['family'] as $row) {
            $relation = strtolower(trim($row['RelationName'] ?? ''));
            $entry = [
                'fname' => $row['FName'] ?? '',
                'mname' => $row['MName'] ?? '',
                'lname' => $row['LName'] ?? '',
                'xname' => $row['XName'] ?? ''
            ];

            switch ($relation) {
                case 'father':
                    $father[] = $entry;
                    break;
                case 'mother':
                    $mother[] = $entry;
                    break;
                case 'son':
                    $sons[] = $entry;
                    break;
                case 'daughter':
                    $daughters[] = $entry;
                    break;
                case 'sister':
                    $sisters[] = $entry;
                    break;
                case 'brother':
                    $brothers[] = $entry;
                    break;
                case 'auntie':
                case 'aunt':
                    $aunties[] = $entry;
                    break;
                case 'uncle':
                    $uncles[] = $entry;
                    break;
            }
        }
    } else {
        // echo "No family data available.";
    }

    
    $father_fname = $father[0]['fname'] ?? '';
    $father_mname = $father[0]['mname'] ?? '';
    $father_lname = $father[0]['lname'] ?? '';
    $father_xname = $father[0]['xname'] ?? '';

    $mother_fname = $mother[0]['fname'] ?? '';
    $mother_mname = $mother[0]['mname'] ?? '';
    $mother_lname = $mother[0]['lname'] ?? '';
    $mother_xname = $mother[0]['xname'] ?? '';

    // Education Data
    // var_dump($employee_hris_data['education']);

    // Initialize categorized arrays
    $elementary     = [];
    $secondary      = [];
    $college        = [];
    $vocational     = [];
    $post_graduate  = [];

    if (!empty($employee_hris_data['education']) && is_array($employee_hris_data['education'])) {
        foreach ($employee_hris_data['education'] as $row) {
            $level = strtoupper(trim($row['LevelName'] ?? ''));

            $entry = [
                'schoolname'     => $row['SchoolName'] ?? '',
                'coursename'     => $row['CourseName'] ?? '',
                'yearstarted'    => $row['YearStarted'] ?? '',
                'yearended'      => $row['YearEnded'] ?? '',
                'yeargraduated'  => $row['YearGraduated'] ?? '',
                'gradelevel'     => $row['GradeLevel'] ?? '',
            ];

            switch ($level) {
                case 'ELEMENTARY':
                    $elementary[] = $entry;
                    break;
                case 'SECONDARY':
                    $secondary[] = $entry;
                    break;
                case 'COLLEGE':
                    $college[] = $entry;
                    break;
                case 'VOCATION':
                case 'VOCATIONAL':
                    $vocational[] = $entry;
                    break;
                case 'POST-GRADUATE':
                case 'POSTGRADUATE':
                    $post_graduate[] = $entry;
                    break;
            }
        }
    } else {
        // echo "No education data available.";
    }

    // var_dump($elementary);
    $elem_schoolname = $elementary[0]['schoolname'] ?? '';
    //$elem_coursename = $elementary[0]['coursename'] ?? '';
    $elem_coursename = 'PRIMARY EDUCATION';
    $elem_yearstarted = $elementary[0]['yearstarted'] ?? '';
    $elem_yearended = $elementary[0]['yearended'] ?? '';
    $elem_yeargraduated = $elementary[0]['yeargraduated'] ?? '';
    $elem_gradelevel = $elementary[0]['gradelevel'] ?? '';

    $second_schoolname = $secondary[0]['schoolname'] ?? '';
    // $second_coursename = $secondary[0]['coursename'] ?? '';
    $second_coursename = 'HIGHSCHOOL';

    $second_yearstarted = $secondary[0]['yearstarted'] ?? '';
    $second_yearended = $secondary[0]['yearended'] ?? '';
    $second_yeargraduated = $secondary[0]['yeargraduated'] ?? '';
    $second_gradelevel = $secondary[0]['gradelevel'] ?? '';

    $college_schoolname = $college[0]['schoolname'] ?? '';
    $college_coursename = $college[0]['coursename'] ?? '';
    $college_yearstarted = $college[0]['yearstarted'] ?? '';
    $college_yearended = $college[0]['yearended'] ?? '';
    $college_yeargraduated = $college[0]['yeargraduated'] ?? '';
    $college_gradelevel = $college[0]['gradelevel'] ?? '';

    $vocational_schoolname = $vocational[0]['schoolname'] ?? '';
    $vocational_coursename = $vocational[0]['coursename'] ?? '';
    $vocational_yearstarted = $vocational[0]['yearstarted'] ?? '';
    $vocational_yearended = $vocational[0]['yearended'] ?? '';
    $vocational_yeargraduated = $vocational[0]['yeargraduated'] ?? '';
    $vocational_gradelevel = $vocational[0]['gradelevel'] ?? '';

    $post_graduate_schoolname = $post_graduate[0]['schoolname'] ?? '';
    $post_graduate_coursename = $post_graduate[0]['coursename'] ?? '';
    $post_graduate_yearstarted = $post_graduate[0]['yearstarted'] ?? '';
    $post_graduate_yearended = $post_graduate[0]['yearended'] ?? '';
    $post_graduate_yeargraduated = $post_graduate[0]['yeargraduated'] ?? '';
    $post_graduate_gradelevel = $post_graduate[0]['gradelevel'] ?? '';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ePDS | Cebu City Government</title>

  <!-- jQuery & jQuery UI -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Custom Script -->
  <script src="frameworks/script.js?v=<?= time(); ?>"></script>

  <!-- Theme Colors -->
  <style>
    :root {
      --blue: #1e3a8a;
      --yellow: #facc15;
    }
    html {
      scroll-behavior: smooth;
    }
    #preloader {
        transition: opacity 0.5s ease, visibility 0.5s ease;
      }
  </style>
</head>
<body class="bg-gray-100 font-sans">
<?php require 'contents/preloader.php';?>