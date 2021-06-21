<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$ma = $_POST['makhoa'];
	  	$ten = $_POST['tenkhoa'];
	  	$gv = $_POST['gv']; 

		$result = $khoa->update($ma, $ten, $gv);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>