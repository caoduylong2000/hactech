<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$khoa = $_POST['khoa'];
	  	$start = $_POST['batdau'];
	  	$end = $_POST['ketthuc']; 

		$result = $khoahoc->update($id, $khoa, $start, $end);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>