<?php $title = 'Thêm điểm';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	 if (!isset($_GET['stt'])) {
	  	echo "error";
	  } else {
	  	$stt = $_GET['stt'];
	  	$result = $diemct->details($stt);
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<input type="hidden" name="stt" value="<?php echo $result['stt']; ?>">
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="masv" value="<?php echo $result['ma_sinh_vien'] ?>">
					<span class="text">Mã sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="tensv" value="<?php echo $result['ten_sinh_vien'] ?>">
					<span class="text">Tên sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="number" name="diem" value="<?php echo $result['diem'] ?>">
					<span class="text-select">Điểm</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>