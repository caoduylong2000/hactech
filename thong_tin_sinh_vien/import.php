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
				':ma_sinh_vien'		    =>	$row[0],
				':ten_sinh_vien'		=>	$row[1],
				':ma_lop'				=>	$row[2],
				':dia_chi'				=>	$row[3],
				':so_dien_thoai'		=>	$row[4],
				':email'				=>	$row[5]
			);

			$query = 
			"INSERT INTO thong_tin_sinh_vien VALUES (:ma_sinh_vien, :ten_sinh_vien, :ma_lop, :dia_chi, :so_dien_thoai, :email)"
			;
			$ma_sinh_vien = $username = $password;
			$password = md5($ma_sinh_vien);
			$query2 = 
			"INSERT INTO tai_khoan VALUES (:username, :password, :ma_sinh_vien)"
			;

			$statement = $pdo->prepare($query);
			$statement2 = $pdo->prepare($query2);
			$statement->execute($insert_data);
			$statement2=execute($query2);
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