<?php

//import.php

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
			$insert_data = array(
				':ma_mon'		    =>	$row[0],
				':ma_lop'			=>	$row[1],
				':phong_hoc'		=>	$row[2],
				':gvpt'				=>	$row[3],
				':bat_dau'			=>	$row[4],
				':ket_thuc'			=>	$row[5],
				':ngay'				=>	$row[6]

			);

			$query = 
			"INSERT INTO lich_hoc VALUES (:ma_mon, :ma_lop, :phong_hoc, :gvpt, :bat_dau, :ket_thuc, :ngay)";

			$statement = $pdo->prepare($query);
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