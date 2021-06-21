<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$masv = $_POST['masv'];
	  	$hocki = $_POST['hocki'];
	  	$tien = $_POST['sotien'];
	  	$ngay = $_POST['ngaydong'];

		$result = $hocki->update($id, $masv, $hocki, $tien, $ngay);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>