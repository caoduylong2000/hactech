<?php 
	$title = 'Login';
	require_once 'connect.php'; 
	include_once 'session.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$md5 = md5($_POST['password']);
		if ($user == '' && $pass == '') {
			echo "<script>alert('Yêu cầu nhập thông tin đăng nhập.')</script>";
		}
		if ($user == 'admin' && $pass == 'password') {
			$_SESSION['admin'] = $user;
			header("location: ../module/admin.php");
		} else {
			$log = $user->getUser($username, $md5);
			
			if ($log) {
				$_SESSION['user'] = $user;
				$_SESSION['log_id'] = $log;
				header("location: ../index.php");
			} else {
				echo "<script>alert('Sai thông tin đăng nhập.')</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet/less" type="text/css" href="../assets/less/dashboard.less">
	<link rel="stylesheet/less" type="text/css" href="../assets/less/login.less">
	<script src="../assets/js/less.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/62ee657f1a.js" crossorigin="anonymous"></script>
	<title><?php echo $title ?></title>
</head>
<body>
	<section>
		<div class="imgBx">
			<img src="../assets/images/login-bg.jpg">
		</div>
		<div class="contentBx">
			<div class="formBx">
				<h2>Đăng nhập</h2>
				<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
					<div class="inputBx">
						<label for="user">Tên đăng nhập</label>
						<input type="text" name="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']?>">
					</div>
					<div class="inputBx">
						<label for="pass">Mật khẩu</label>
						<input type="password" name="password">
					</div>
					<div class="remember">
						<label><input type="checkbox" name="remember"> Remember me</label>
					</div>
					<div class="inputBx">
						<input type="submit" value="Đăng nhập" name="login">
					</div>
					<p>Nếu sai tài khoản hoặc mật khẩu, vui lòng báo cáo với giáo viên chủ nhiệm hoặc văn phòng khoa để được giải quyết!</p>
				</form>
			</div>
		</div>
	</section>
<?php require_once 'footer.php'; ?>