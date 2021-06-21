<?php $title = 'Thêm điểm';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	 if (isset($_GET['id'])) {
	 	$id = $_GET['id'];
	 	if(isset($_POST['add'])) {
	  	$stt = $_POST['stt'];
	  	$name = $_POST['masv'];
	  	$name = $_POST['tensv'];
	  	$diem = $_POST['diem']; 

	  	$isSuccess = $diemct->insert($stt, $masv, $name, $diem);

	  	if ($isSuccess) {
	  		header("Location: view_form.php?id=$id");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	}
}
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="masv" required="required">
					<span class="text">Mã sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="tensv" required="required">
					<span class="text">Tên sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="number" name="diem" required="required">
					<span class="text-select">Điểm</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>