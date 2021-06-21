<?php 
	require_once '../module/connect.php';

	if(!isset($_GET['id'])) {
		echo "error";
	} else {
		$masv = $_GET['id'];
		$result = $ttsv->delete($masv);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	}
 ?>