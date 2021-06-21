<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$ma = $_POST['manganh'];
	  	$ten = $_POST['tennganh'];
	  	$khoa = $_POST['khoa']; 

		$result = $nganh->update($ma, $ten, $khoa);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>