<?php $title = 'Thêm Học phí';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if(isset($_POST['add'])) {

	  	$masv = $_POST['masv'];
	  	$hocki = $_POST['hocki'];
	  	$tien = $_POST['sotien']; 
	  	$ngay = $_POST['ngaydong']; 

	  	$isSuccess = $hocki->insert($masv, $hocki, $tien, $ngay);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	}

	  $hocki = $diem->getHocki();
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
			<div class="col">
				<div class="inputBox">
					<select name="hocki">
						<?php while ($hk = $hocki->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $hk['hoc_ki_id'] ?> "><?php echo $hk['hoc_ki_id']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Học kì</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="number" name="sotien" required="required">
					<span class="text-select">Số tiền</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="date" name="ngaydong" required="required">
					<span class="text-select">Ngày đóng</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>