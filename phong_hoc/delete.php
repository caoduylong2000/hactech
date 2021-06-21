<?php 
	require_once '../module/connect.php';

	if(!isset($_GET['id'])) {
		echo "error";
	} else {
		$maphong = $_GET['id'];
		$result = $phonghoc->delete($maphong);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	}
 ?>