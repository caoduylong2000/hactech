<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$stt = $_POST['stt'];
	  	$stt = $_POST['masv'];
	  	$tensv = $_POST['tensv']; 
	  	$diem = $_POST['diem']; 

		$result = $diemct->update($stt, $masv, $tensv, $diem);

		if ($result) {
			header("Location: ../bang_diem/view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>