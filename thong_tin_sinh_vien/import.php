<?php

//import.php
require_once '../module/connect.php';
include '../module/vendor/autoload.php';

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
	        $ten = $worksheet->getCellByColumnAndRow(2, $row)->getValue(); 
	        $lop = $worksheet->getCellByColumnAndRow(3, $row)->getValue(); 
	        $diachi = $worksheet->getCellByColumnAndRow(4, $row)->getValue(); 
	        $sdt = $worksheet->getCellByColumnAndRow(5, $row)->getValue(); 
	        $email = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
		 
		    $sql = $ttsv->insert($masv, $ten, $lop, $diachi, $sdt, $email);
		}
		$message = '<script>alert("Data Imported Successfully")</script>';
	}
	else
	{
		$message = '<script>alert("Only .xls .csv or .xlsx file allowed")</script>';
	}
}
else
{
	$message = '<script>alert("Please Select File")</script>';
}

echo $message;
?>