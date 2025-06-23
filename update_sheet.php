<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require "pds_data.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$directory_src = 'frameworks/';
$inputFileName = $directory_src . 'pds_form.xlsx';
if (!file_exists($inputFileName)) {
    die("File not found.");
}

$spreadsheet = IOFactory::load($inputFileName);

// Safely update C1
if ($sheet = $spreadsheet->getSheetByName('C1')) {

    // Personal
    $sheet->setCellValue('D10', $last_name);
    $sheet->setCellValue('D11', $first_name);
    $sheet->setCellValue('D12', $middle_name);
    $sheet->setCellValue('D13', $dob);
    $sheet->setCellValue('D15', $pob);
    $sheet->setCellValue('D22', $height);
    $sheet->setCellValue('D24', $weight);
    $sheet->setCellValue('D25', $blood);
    // Govt. ID
    $sheet->setCellValue('D27', $gsis);
    $sheet->setCellValue('D29', $pagibig);
    $sheet->setCellValue('D31', $philhealth);
    $sheet->setCellValue('D32', $sss);
    $sheet->setCellValue('D33', $tin);
    $sheet->setCellValue('D34', $empid);
    // Address 1
    $sheet->setCellValue('I17', $res_lot);
    $sheet->setCellValue('L17', $res_street);
    $sheet->setCellValue('I19', $res_village);
    $sheet->setCellValue('L19', $res_barangay);
    $sheet->setCellValue('I22', $res_city);
    $sheet->setCellValue('L22', $res_province);
    $sheet->setCellValue('I24', $res_zipcode);
     // Address 2
    $sheet->setCellValue('I25', $per_lot);
    $sheet->setCellValue('L25', $per_street);
    $sheet->setCellValue('I27', $per_village);
    $sheet->setCellValue('L27', $per_barangay);
    $sheet->setCellValue('I29', $per_city);
    $sheet->setCellValue('L29', $per_province);
    $sheet->setCellValue('I31', $per_zipcode);
    // Contact
    $sheet->setCellValue('I32', $tel);
    $sheet->setCellValue('I33', $mobile);
    $sheet->setCellValue('I34', $emailadd);
    // Spouse
    $sheet->setCellValue('D36', $spouse_last_name);
    $sheet->setCellValue('D37', $spouse_first_name);
    $sheet->setCellValue('D38', $spouse_middle_name);
    $sheet->setCellValue('D39', $spouse_work);
    $sheet->setCellValue('D40', $spouse_employer);
    $sheet->setCellValue('D41', $spouse_address);
    $sheet->setCellValue('D42', $spouse_telephone);
    // Parents
    $sheet->setCellValue('D43', $father_last_name);
    $sheet->setCellValue('D44', $father_first_name);
    $sheet->setCellValue('D45', $father_middle_name);
    $sheet->setCellValue('D47', $mother_last_name);
    $sheet->setCellValue('D48', $mother_first_name);
    $sheet->setCellValue('D49', $mother_middle_name);
    // Education
    // Elementary
    $sheet->setCellValue('D54', $elem_school_name);
    $sheet->setCellValue('G54', $elem_educ_name);
    $sheet->setCellValue('J54', $elem_schoolyear_start);
    $sheet->setCellValue('K54', $elem_schoolyear_end);
    $sheet->setCellValue('L54', $elem_earn);
    $sheet->setCellValue('M54', $elem_year_grad);
    $sheet->setCellValue('N54', $elem_scholar);
    // Secondary
    $sheet->setCellValue('D55', $second_school_name);
    $sheet->setCellValue('G55', $second_educ_name);
    $sheet->setCellValue('J55', $second_schoolyear_start);
    $sheet->setCellValue('K55', $second_schoolyear_end);
    $sheet->setCellValue('L55', $second_earn);
    $sheet->setCellValue('M55', $second_year_grad);
    $sheet->setCellValue('N55', $second_scholar);
    // Vocational
    $sheet->setCellValue('D56', $vocation_school_name);
    $sheet->setCellValue('G56', $vocation_educ_name);
    $sheet->setCellValue('J56', $vocation_schoolyear_start);
    $sheet->setCellValue('K56', $vocation_schoolyear_end);
    $sheet->setCellValue('L56', $vocation_earn);
    $sheet->setCellValue('M56', $vocation_year_grad);
    $sheet->setCellValue('N56', $vocation_scholar);
    // College
    $sheet->setCellValue('D57', $college_school_name);
    $sheet->setCellValue('G57', $college_educ_name);
    $sheet->setCellValue('J57', $college_schoolyear_start);
    $sheet->setCellValue('K57', $college_schoolyear_end);
    $sheet->setCellValue('L57', $college_earn);
    $sheet->setCellValue('M57', $college_year_grad);
    $sheet->setCellValue('N57', $college_scholar);
    // Post-Graduate
    $sheet->setCellValue('D58', $gradstudy_school_name);
    $sheet->setCellValue('G58', $gradstudy_educ_name);
    $sheet->setCellValue('J58', $gradstudy_schoolyear_start);
    $sheet->setCellValue('K58', $gradstudy_schoolyear_end);
    $sheet->setCellValue('L58', $gradstudy_earn);
    $sheet->setCellValue('M58', $gradstudy_year_grad);
    $sheet->setCellValue('N58', $gradstudy_scholar);

}

// C2
if ($sheet = $spreadsheet->getSheetByName('C2')) {
    // $sheet->setCellValue('A5', 'Updated Value');
    // $sheet->setCellValue('F5', 12345);
    // $sheet->setCellValue('G5', date('Y-m-d'));
}

// C3
if ($sheet = $spreadsheet->getSheetByName('C3')) {
    // $sheet->setCellValue('A6', 'Updated Value');
    // $sheet->setCellValue('E6', 12345);
    // $sheet->setCellValue('F6', date('Y-m-d'));
}

// C4
if ($sheet = $spreadsheet->getSheetByName('C4')) {
    // $sheet->setCellValue('A52', 'Updated Value');
    // $sheet->setCellValue('F52', 12345);
    // $sheet->setCellValue('G52', date('Y-m-d'));
}

// Ensure the directory exists
$directory = 'forms/';
if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}

// File path
$filename = $directory . $empid . '_pds_form_new.xlsx';

// Delete the file if it already exists
if (file_exists($filename)) {
    unlink($filename);
}

// Save the updated Excel file
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

echo "Excel updated successfully.";

// Force download the file
header('Content-Description: File Transfer');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));

// Clear output buffer before sending file
ob_clean();
flush();
readfile($filename);

// Optional: delete file after download
// unlink($filename);

exit;

?>