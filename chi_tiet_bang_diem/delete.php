<?php 
	require_once '../module/connect.php';

	if(!isset($_GET['stt'])) {
		echo "error";
	} else {
		$stt = $_GET['stt'];
		$result = $diemct->delete($stt);

		if ($result) {
			header("Location: ../bang_diem/view_form.php");
		} else echo "error";
	}
 ?>