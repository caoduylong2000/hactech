<?php $title = 'Cập nhật Khoa';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$kh = $khoa->details($id);	
?>
	<form method="POST" action="update_post.php"> 
		<h2>Cập nhật dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text">
					<input type="text" value="<?php echo $kh['ma_khoa']; ?>" name="makhoa">
					<span class="text">Mã khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $kh['ten_khoa']; ?>" name="tenkhoa">
					<span class="text">Tên khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $kh['chu_nhiem_khoa']; ?>" name="gv">
					<span class="text">Chủ nhiệm khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>