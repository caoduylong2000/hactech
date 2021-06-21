<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$pass = $_POST['pass'];
	  	$masv = $_POST['masv'];

	  	$isSuccess = $user->update($pass, $masv);

		if ($isSuccess) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>