<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$hk = $_POST['mahocki'];
	  	$start = $_POST['batdau'];
	  	$end = $_POST['ketthuc'];
	  	$khoahoc = $_POST['khoahoc'];

		$result = $hocki->update($id, $hk, $start, $end, $khoahoc);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>