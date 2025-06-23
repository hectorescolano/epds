<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require "pds_data.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Style;




$directory_src = 'frameworks/';
$inputFileName = $directory_src . 'pds_form.xlsx';
if (!file_exists($inputFileName)) {
    die("File not found.");
}

$spreadsheet = IOFactory::load($inputFileName);

// Apply font style to the entire sheet
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial Narrow')->setSize(10)->setBold(true);

// C1  - SHEET
if ($sheet = $spreadsheet->getSheetByName('C1')) {

    // Personal
    $sheet->getStyle('D22:D34')->getFont()->setBold(true);
    $sheet->setCellValue('D10', $last_name);
    $sheet->setCellValue('D11', $first_name);
    $sheet->setCellValue('D12', $middle_name);
    $sheet->getStyle('D13:D15')->getFont()->setBold(true);
    $sheet->setCellValueExplicit('D13', $dob, DataType::TYPE_STRING);
    $sheet->setCellValue('D15', $pob);
    $sheet->getStyle('D22')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D24')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue('D22', $height);
    $sheet->setCellValue('D24', $weight);
    $sheet->setCellValue('D25', $blood);

    // Govt. ID

    $sheet->getStyle('D27')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    $sheet->getStyle('D29')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    $sheet->getStyle('D31')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    $sheet->getStyle('D32')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    $sheet->getStyle('D33')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    $sheet->getStyle('D34')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

    $sheet->getStyle('D27')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D29')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D31')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D32')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D33')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('D34')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $sheet->setCellValueExplicit('D27', $gsis, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('D29', $pagibig, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('D31', $philhealth, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('D32', $sss, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('D33', $tin, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('D34', $empid, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    // Address 1
    $sheet->getStyle('I17:L17')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->getStyle('I19:L19')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->getStyle('I22:L22')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->getStyle('I24')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->setCellValue('I17', $res_lot);
    $sheet->setCellValue('L17', $res_street);
    $sheet->setCellValue('I19', $res_village);
    $sheet->setCellValue('L19', $res_barangay);
    $sheet->setCellValue('I22', $res_city);
    $sheet->setCellValue('L22', $res_province);
    $sheet->setCellValue('I24', $res_zipcode);
     // Address 2
    $sheet->getStyle('I25:L25')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->getStyle('I27:L27')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->getStyle('J29:M29')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->getStyle('I31')->getFont()->setName('Arial Narrow')->setBold(true);
    $sheet->setCellValue('I25', $per_lot);
    $sheet->setCellValue('L25', $per_street);
    $sheet->setCellValue('I27', $per_village);
    $sheet->setCellValue('L27', $per_barangay);
    $sheet->setCellValue('J29', $per_city);
    $sheet->setCellValue('M29', $per_province);
    $sheet->setCellValue('I31', $per_zipcode);
    // Contact
    $sheet->getStyle('I32:I34')->getFont()->setBold(true);
    $sheet->setCellValue('I32', $tel);
    $sheet->setCellValue('I33', $mobile);
    $sheet->setCellValue('I34', strtolower($emailadd));
    // Spouse
    $sheet->getStyle('D36:D49')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->getStyle('D36:D49')->getFont()->setBold(true);
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
    $sheet->getStyle('D54:N58')->getFont()->setSize(8);
    $sheet->getStyle('D54:N58')->getFont()->setBold(true);
    $sheet->getStyle('D54:N58')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue('D54', $elem_school_name);
    $sheet->setCellValue('G54', $elem_educ_name);
    $sheet->getStyle('J54')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('K54')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('M54')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValueExplicit('J54', $elem_schoolyear_start, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('K54', $elem_schoolyear_end, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('M54', $elem_year_grad, DataType::TYPE_STRING);
    $sheet->setCellValue('L54', $elem_earn);
    $sheet->setCellValue('N54', $elem_scholar);
    // Secondary
    $sheet->getStyle('G55')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue('D55', $second_school_name);
    $sheet->setCellValue('G55', $second_educ_name);
    $sheet->getStyle('J55')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('K55')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('M55')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValueExplicit('J55', $second_schoolyear_start, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('K55', $second_schoolyear_end, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('M55', $second_year_grad, DataType::TYPE_STRING);
    $sheet->setCellValue('L55', $second_earn);
    $sheet->setCellValue('N55', $second_scholar);
    // Vocational
    $sheet->getStyle('G56')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue('D56', $vocation_school_name);
    $sheet->setCellValue('G56', $vocation_educ_name);
    $sheet->getStyle('J56')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('K56')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('M56')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValueExplicit('J56', $vocation_schoolyear_start, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('K56', $vocation_schoolyear_end, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('M56', $vocation_year_grad, DataType::TYPE_STRING);
    $sheet->setCellValue('L56', $vocation_earn);
    $sheet->setCellValue('N56', $vocation_scholar);
    // College
    $sheet->getStyle('G57')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue('D57', $college_school_name);
    $sheet->setCellValue('G57', $college_educ_name);
    $sheet->getStyle('J57')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('K57')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('M57')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValueExplicit('J57', $college_schoolyear_start, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('K57', $college_schoolyear_end, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('M57', $college_year_grad, DataType::TYPE_STRING);
    $sheet->setCellValue('L57', $college_earn);
    $sheet->setCellValue('N57', $college_scholar);
    // Post-Graduate
    $sheet->getStyle('G58')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue('D58', $gradstudy_school_name);
    $sheet->setCellValue('G58', $gradstudy_educ_name);
    $sheet->getStyle('J58')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('K58')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('M58')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValueExplicit('J58', $gradstudy_schoolyear_start, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('K58', $gradstudy_schoolyear_end, DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('M58', $gradstudy_year_grad, DataType::TYPE_STRING);
    $sheet->setCellValue('L58', $gradstudy_earn);
    $sheet->setCellValue('N58', $gradstudy_scholar);

    /* Children */
    $startRow = 36; 
    $nameCol = 'I'; 
    $bdayCol = 'M';

    $sheet->getStyle('I36:I48')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->getStyle('I36:M48')->getFont()->setSize(10);
    $sheet->getStyle('I36:M48')->getFont()->setBold(true);
    foreach ($children as $index => $child) {
        $row = $startRow + $index;
        $child_name = strtoupper($child['name']) ?? '';
        $child_bday = $child['bday'] ?? '';

        $sheet->setCellValue("{$nameCol}{$row}", $child_name);
        $sheet->setCellValue("{$bdayCol}{$row}", $child_bday);
        $sheet->getStyle("{$bdayCol}{$row}")
              ->getNumberFormat()
              ->setFormatCode('mm/dd/yyyy');
    }



}

// C2 - SHEET
if ($sheet = $spreadsheet->getSheetByName('C2')) {
    /* Eligibility */
    $sheet->getStyle('A5:M11')->getFont()->setSize(8);
    $startRowEligibility = 5;
    $nameEligibility = 'A';
    $ratingEligibility = 'F';
    $doeEligibility = 'G';
    $poeEligibility = 'I';
    $licenseNoEligibility = 'L';
    $dovEligibility = 'M';
    foreach ($cse_list as $index => $eligibility) {
            $row = $startRowEligibility + $index;
            $eligibility_name = strtoupper($eligibility['name']) ?? '';
            $eligibility_rating = $eligibility['rating'] ?? '';
            $eligibility_doe = $eligibility['doe'] ?? '';
            $eligibility_loc = strtoupper($eligibility['loc']) ?? '';
            $eligibility_license = $eligibility['license'] ?? '';
            $eligibility_validity = $eligibility['validity'] ?? '';
            $sheet->setCellValue("{$nameEligibility}{$row}", $eligibility_name);
            $sheet->setCellValue("{$ratingEligibility}{$row}", $eligibility_rating);
            $sheet->setCellValue("{$doeEligibility}{$row}", $eligibility_doe);
            $sheet->setCellValue("{$poeEligibility}{$row}", $eligibility_loc);
            $sheet->setCellValue("{$licenseNoEligibility}{$row}", $eligibility_license);
            $sheet->setCellValue("{$dovEligibility}{$row}",$eligibility_validity);
    }

    /* Work Experience */
    $sheet->getStyle('A18:M45')->getFont()->setSize(8);
    $startRowWorkExp = 18;
    $fromWorkExpDate = 'A';
    $toWorkExpDate = 'C';
    $positionTitleWorkExp = 'D';
    $depWorkExp = 'G';
    $salaryWorkExp = 'J';
    $sgWorkExp = 'K';
    $statusWorkExp = 'L';
    $govWorkExp = 'M';
    foreach ($workexp_list as $index => $workexp) {
       $row = $startRowWorkExp + $index;
       $workexp_from = $workexp['work_from'] ?? '';
       $workexp_to = $workexp['work_to'] ?? '';
       $workexp_pos = $workexp['work_position'] ?? '';
       $workexp_dept = $workexp['work_dept'] ?? '';
       $workexp_salary = $workexp['work_salary'] ?? '';
       $workexp_sg = $workexp['work_sg'] ?? '';
       $workexp_status = $workexp['work_status'] ?? '';
       $workexp_gs = $workexp['work_gs'] ?? '';

       $sheet->setCellValue("{$fromWorkExpDate}{$row}",$workexp_from);
       $sheet->setCellValue("{$toWorkExpDate}{$row}",$workexp_to);
       $sheet->setCellValue("{$positionTitleWorkExp}{$row}",$workexp_pos);
       $sheet->setCellValue("{$depWorkExp}{$row}",$workexp_dept);
       $sheet->setCellValue("{$salaryWorkExp}{$row}",$workexp_salary);
       $sheet->setCellValue("{$sgWorkExp}{$row}",$workexp_sg);
       $sheet->setCellValue("{$statusWorkExp}{$row}",$workexp_status);
       $sheet->setCellValue("{$govWorkExp}{$row}",$workexp_gs);
 }

}
// die();
// C3
if ($sheet = $spreadsheet->getSheetByName('C3')) {
    /* Voluntary Works */
    $sheet->getStyle('E6:H12')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $startRowVolWorks = 6;
    $nameVolWorks = 'A';
    $fromVolWorks = 'E';
    $toVolWorks = 'F';
    $hoursVolWorks = 'G';
    $positionVolWorks = 'H';
    foreach ($vol_works as $index => $volwork) {
        $row = $startRowVolWorks + $index;
        $volwork_name = $volwork['name'] ?? '';
        $volwork_start = $volwork['start'] ?? '';
        $volwork_end = $volwork['end'] ?? '';
        $volwork_hours = $volwork['hours'] ?? '';
        $volwork_position = $volwork['position'] ?? '';

        $sheet->setCellValue("{$nameVolWorks}{$row}",$volwork_name);
        $sheet->setCellValue("{$fromVolWorks}{$row}",$volwork_start);
        $sheet->setCellValue("{$toVolWorks}{$row}",$volwork_end);
        $sheet->setCellValue("{$hoursVolWorks}{$row}",$volwork_hours);
        $sheet->setCellValue("{$positionVolWorks}{$row}",$volwork_position);
    }
    /* Trainings and Learning Development */
    $sheet->getStyle('E18:I38')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A18:I38')->getFont()->setSize(8);
    $startRowTraining = 18;
    $nameTraining = 'A';
    $fromTraining = 'E';
    $toTraining = 'F';
    $hoursTraining = 'G';
    $typeTraining = 'H';
    $conducatedTraining = 'I';
    foreach ($training_list as $index => $training) {
        $row = $startRowTraining + $index;
        $training_name = $training['name'] ?? '';
        $training_start = $training['start'] ?? '';
        $training_end = $training['end'] ?? '';
        $training_hours = $training['hours'] ?? '';
        $training_type = $training['type'] ?? '';
        $training_conduct = $training['conduct'] ?? '';

        $sheet->setCellValue("{$nameTraining}{$row}",$training_name);
        $sheet->setCellValue("{$fromTraining}{$row}",$training_start);
        $sheet->setCellValue("{$toTraining}{$row}",$training_end);
        $sheet->setCellValue("{$hoursTraining}{$row}",$training_hours);
        $sheet->setCellValue("{$typeTraining}{$row}",$training_type);
        $sheet->setCellValue("{$conducatedTraining}{$row}",$training_conduct);
    }

    /* Other Infos */
    $sheet->getStyle('A42:I48')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $startRowOtherInfo = 42;
    $special_skill = 'A';
    $non_academic = 'C';
    $membership = 'I';

    foreach ($otherinfo_list as $index => $otherinfo) {
        $row = $startRowOtherInfo + $index;
        $ssh_name = $otherinfo['ssh_name'] ?? '';
        $nadr_name = $otherinfo['nadr_name'] ?? '';
        $miao_name = $otherinfo['miao_name'] ?? '';

        $sheet->setCellValue("{$special_skill}{$row}",$ssh_name);
        $sheet->setCellValue("{$non_academic}{$row}",$nadr_name);
        $sheet->setCellValue("{$membership}{$row}",$miao_name);
    }
}

// C4
if ($sheet = $spreadsheet->getSheetByName('C4')) {
    /* References */
    $sheet->getStyle('A52:G54')->getFont()->setName('Arial Narrow')->setSize(8);
    $startRowReference = 52;
    $referenceNameCol = 'A';
    $referenceAddCol = 'F';
    $referenceTelCol = 'G';

    foreach ($reference_list as $index => $reference) {
        $row = $startRowReference + $index;
        $reference_name = $reference['name'] ?? '';
        $reference_add = $reference['address'] ?? '';
        $reference_tel = $reference['contact'] ?? '';

        $sheet->setCellValue("{$referenceNameCol}{$row}",$reference_name);
        $sheet->setCellValue("{$referenceAddCol}{$row}",$reference_add);
        $sheet->setCellValue("{$referenceTelCol}{$row}",$reference_tel);
    }


    /* Government Issued ID */
    $sheet->getStyle('F64')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->getStyle('F64')->getFont()->setSize(8)->setBold(true);
    $sheet->setCellValue("D61",$empid);
    $sheet->setCellValue("D62", $govid_2);
    $sheet->setCellValue("D64", $govid_3);
    $sheet->setCellValue("F64", date('m/d/Y'));
}







// Ensure the directory exists
$directory = 'forms/';
if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}

// File path
$filename = $directory . $empid . '_ePDS.xlsx';

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
unlink($filename);

exit;
?>