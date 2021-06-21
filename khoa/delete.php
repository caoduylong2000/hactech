<?php 
	require_once '../module/connect.php';

	if(!isset($_GET['id'])) {
		echo "error";
	} else {
		$id = $_GET['id'];
		$result = $khoa->delete($id);

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	}
 ?>