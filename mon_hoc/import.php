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
        $mamon = $worksheet->getCellByColumnAndRow(1, $row)->getValue(); //Name
        $tenmon = $worksheet->getCellByColumnAndRow(2, $row)->getValue(); //Language
        $nganh = $worksheet->getCellByColumnAndRow(3, $row)->getValue(); //Mathematics
        $hocki = $worksheet->getCellByColumnAndRow(4, $row)->getValue(); //Foreign Language
		 
		$sql = $monhoc->insert($mamon, $tenmon, $nganh, $hocki);
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
?>