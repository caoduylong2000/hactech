<?php $title = 'Thêm Phòng học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	 if(isset($_POST['add'])) {

	  	$ma = $_POST['maphong'];
	  	$mota = $_POST['mota'];

	  	$isSuccess = $phonghoc->insert($ma, $mota);

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
					<input type="text" name="maphong" required="required">
					<span class="text">Mã phòng</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="mota" required="required">
					<span class="text">Mô tả</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>