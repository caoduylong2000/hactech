<?php

//import.php
require_once '../module/connect.php';
include '../module/vendor/autoload.php';
if (isset($_GET['id'])) {
  	$id = $_GET['id'];	
} 
if($_FILES["import_excel"]["name"] != '')
{
	$allowed_extension = array('xls', 'csv', 'xlsx');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name = time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$worksheet = $spreadsheet->getActiveSheet();
		$highestRow = $worksheet->getHighestRow(); // total number of rows
		$highestColumn = $worksheet->getHighestColumn(); // total number of columns
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); 
		
		$lines = $highestRow - 1; 
		if ($lines <= 0) {
		         Exit ('There is no data in the Excel table');
		}

		for ($row = 2; $row <= $highestRow; ++$row) {
        $masv = $worksheet->getCellByColumnAndRow(1, $row)->getValue(); 
        $tensv = $worksheet->getCellByColumnAndRow(2, $row)->getValue(); 
        $diem = $worksheet->getCellByColumnAndRow(3, $row)->getValue(); 
		 
		$sql = $diemct->insert($id, $masv, $tensv, $diem);
		}
		$message = '<div class="alert alert-success">Data Imported Successfully</div>';

	}
	else
	{
		$message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
	}
}
else
{
	$message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
header("Location: view_form.php");
?>