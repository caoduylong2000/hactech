<?php $title = 'Cập nhật thông tin';

require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 

	   if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$masv = $_GET['id'];
	  	$result = $user->details($masv);
?>

<form method="POST" action="update_post.php">
	<h2>Đổi mật khẩu</h2> 
	<div class="row100">
		<div class="col">
			<div class="inputBox">
				<input type="text" name="masv" value="<?php echo $result['ma_sinh_vien']; ?>">
				<span class="text">Mã sinh viên</span>
				<span class="line"></span>
			</div>
		</div>
		<div class="col">
			<div class="inputBox">
				<input type="text" name="pass" value="<?php echo $result['password']; ?>">
				<span class="text">Mật khẩu</span>
				<span class="line"></span>
			</div>
		</div>
	</div>
	<div>
		<input type="submit" name="update" value="UPDATE">
	</div>
</form>

<?php } ?>

<?php  require_once '../module/footer.php'; ?>