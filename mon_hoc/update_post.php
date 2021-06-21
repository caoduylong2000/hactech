<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {

	  	$id = $_POST['id'];
	  	$ma = $_POST['ma'];
	  	$name = $_POST['name'];
	  	$nganh = $_POST['nganh']; 
	  	$hocki = $_POST['hocki']; 

		$result = $monhoc->update($id, $ma, $name, $nganh, $hocki);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>