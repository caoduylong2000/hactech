<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {

	  	$ma = $_POST['maphong'];
	  	$mota = $_POST['mota'];
	  	

		$result = $phonghoc->update($ma, $mota);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>