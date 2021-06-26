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
				':stt'	    		=>	$row[0],
				':ma_sinh_vien'		=>	$row[1],
				':ten_sinh_vien'	=>	$row[2],
				':diem'				=>	$row[3]

			);

			$query = 
			"INSERT INTO chi_tiet_bang_diem VALUES (:stt, :ma_sinh_vien, :ten_sinh_vien, :diem)";

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