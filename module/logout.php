<?php include_once 'session.php';?>
<?php 

	session_destroy();
	header("location: login.php");
	
?>