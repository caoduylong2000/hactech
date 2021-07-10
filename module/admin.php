<?php $title = 'Admin Page';
require_once 'dautrang.php';
require_once 'connect.php';?>
<?php if (!isset($_SESSION['admin'])) {
	header("Location: login.php");
} ?>

	
<?php require_once 'footer.php'; ?>