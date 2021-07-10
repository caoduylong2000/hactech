<?php 
	require_once '../module/connect.php';

		$result = $ttsv->delete_all();

		if ($result) {
			header("Location: view_form.php");
		} else echo "error";
	
 ?>