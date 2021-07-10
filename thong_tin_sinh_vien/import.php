<?php

//import.php

include '../module/vendor/autoload.php';
include '../module/connect.php';

$connect = new PDO("mysql:host=localhost;dbname=hactech", "root", "");

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

		

		$data = $spreadsheet->getActiveSheet();
		$highestRow = $data->getHighestRow(); // total number of rows
		$highestColumn = $data->getHighestColumn(); // total number of columns
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
		 
		$lines = $highestRow - 1; 
		if ($lines <= 0) {
		         Exit ('There is no data in the Excel table');
		}

		for ($row = 2; $row <= $highestRow; ++$row) {
         $ma_sinh_vien 		= $data->getCellByColumnAndRow(1, $row)->getValue(); 
         $ten_sinh_vien 	= $data->getCellByColumnAndRow(2, $row)->getValue(); 
         $ma_lop 			= $data->getCellByColumnAndRow(3, $row)->getValue(); 
         $dia_chi 			= $data->getCellByColumnAndRow(4, $row)->getValue(); 
         $so_dien_thoai 	= $data->getCellByColumnAndRow(5, $row)->getValue(); 
         $email 			= $data->getCellByColumnAndRow(6, $row)->getValue(); 

        $statement = $ttsv->insert($ma_sinh_vien, $ten_sinh_vien, $ma_lop, $dia_chi, $so_dien_thoai, $email);

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