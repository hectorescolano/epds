

<?php 

	// phpinfo();
	require_once 'vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1', 'Hello manually installed Spreadsheet!');

	$writer = new Xlsx($spreadsheet);
	$writer->save('test.xlsx');

?>
