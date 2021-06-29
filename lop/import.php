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

		$data = $spreadsheet->getActiveSheet()->toArray();

		foreach($data as $row)
		{
			$query = 
			"INSERT INTO lop  VALUES (:ma_lop, :ten_lop, :ma_nganh, :gvcn, :khoa_hoc)";
			$statement = $pdo->prepare($query);
			$insert_data = array(
				':ma_lop'		    =>	$row[0],
				':ten_lop'			=>	$row[1],
				':ma_nganh'			=>	$row[2],
				':gvcn'				=>	$row[3],
				':khoa_hoc'			=>	$row[4]

			);

			$statement->execute($insert_data);
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