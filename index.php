<?php include_once 'session.php'; ?>
<?php if (!isset($_SESSION['log_id'])) {
	header("Location: module/login.php");
} else {?>
	<span>Hello <?php echo $_SESSION['user']; ?></span>
	<a href="module/logout.php">Login</a>
<?php } ?>
