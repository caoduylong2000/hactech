<?php
$title = 'Thêm mới tài khoản';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


if(isset($_POST['ok'])) {
  	$masv = $_POST['masv'];
  	$username = $_POST['username']; 
  	$password = $_POST['password']; 

  	$isSuccess = $user->insert($username, $password, $masv);

  	if ($isSuccess) {
  		header("Location: view_form.php");
  	} else {
  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
  	}
  }

  $thongtin = $user->getTT();
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm mới dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="username" required="required">
					<span class="text">Tài khoản</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="password" required="required">
					<span class="text">Mật khẩu</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="masv">
						<?php while ($tt = $thongtin->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $tt['ma_sinh_vien'] ?>">
								<?php echo $tt['ma_sinh_vien'] ?>
							</option>
						<?php } ?>
					</select>
					<span class="text-select">Mã sinh viên</span>
				</div>
			</div>
		</div>
		<div>
			<input type="submit" name="add" value="ADD">
		</div>
	</form>
	
	
<?php require_once '../module/footer.php';  ?>