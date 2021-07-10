<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$masv = $_POST['masv'];
	  	$ten = $_POST['tensv'];
	  	$lop = $_POST['malop']; 
	  	$diachi = $_POST['diachi']; 
	  	$sdt = $_POST['sdt'];
	  	$email = $_POST['email'];

	  	$isSuccess = $ttsv->update($masv, $ten, $lop, $diachi, $sdt, $email);

		if ($isSuccess) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>