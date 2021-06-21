<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$ma = $_POST['ma'];
	  	$name = $_POST['name'];
	  	$nganh = $_POST['nganh']; 
	  	$gvcn = $_POST['gvcn']; 
	  	$sosv = $_POST['sosv']; 
	  	$khoahoc = $_POST['khoahoc']; 

		$result = $lop->update($id, $ma, $name, $nganh, $gvcn, $sosv, $khoahoc);


		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>