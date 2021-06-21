<?php $title = 'Thêm Phòng học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	 if(isset($_POST['add'])) {
	  	$ma = $_POST['makhoa'];
	  	$ten = $_POST['tenkhoa'];
	  	$gv = $_POST['gv']; 

	  	$isSuccess = $khoa->insert($ma, $ten, $gv);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	  }
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="makhoa" required="required">
					<span class="text">Mã Khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="tenkhoa" required="required">
					<span class="text">Tên khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="gv" required="required">
					<span class="text">Chủ nhiệm khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>