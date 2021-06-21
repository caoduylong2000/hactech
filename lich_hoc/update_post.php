<?php 
	require_once '../module/connect.php';

	if(isset($_POST['update'])) {
	  	$id = $_POST['id'];
	  	$lop = $_POST['lop'];
	  	$mon = $_POST['mon'];
	  	$phong = $_POST['phong'];
	  	$gv = $_POST['gv'];
	  	$start = $_POST['batdau'];
	  	$end = $_POST['ketthuc']; 
	  	$ngay = $_POST['ngay']; 

		$result = $time->update($id, $lop, $mon, $gv, $phong, $start, $end, $ngay);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	} else 	echo "error";
 ?>