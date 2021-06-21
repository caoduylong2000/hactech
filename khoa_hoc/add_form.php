<?php $title = 'Thêm Khóa học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if(isset($_POST['ok'])) {
	  	$khoa = $_POST['khoa'];
	  	$start = $_POST['batdau'];
	  	$end = $_POST['ketthuc']; 

	  	$isSuccess = $khoahoc->insert($khoa, $start, $end);

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
					<select name="malop">
						<input type="text" name="khoa" required="required">
						<span class="text">Khóa học</span>
						<span class="line"></span>
					</select>

				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="date" name="batdau" required="required">
					<span class="text-select">Bắt đầu</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="date" name="ketthuc" required="required">
					<span class="text-select">Kết thúc</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>