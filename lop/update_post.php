<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$ma = $_POST['malop'];
	  	$name = $_POST['tenlop'];
	  	$nganh = $_POST['nganh']; 
	  	$gvcn = $_POST['gvcn']; 
	  	$khoahoc = $_POST['khoahoc']; 

		$result = $lop->update($id, $ma, $name, $nganh, $gvcn, $khoahoc);


		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>