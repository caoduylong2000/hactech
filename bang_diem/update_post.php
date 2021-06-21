<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$mon = $_POST['tenmon'];
	  	$lop = $_POST['tenlop']; 
	  	$gv = $_POST['gvpt']; 
	  	$hocki = $_POST['hocki']; 

		$result = $diem->update($id, $mon, $lop, $gv, $hocki);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>