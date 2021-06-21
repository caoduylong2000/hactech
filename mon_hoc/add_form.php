<?php $title = 'Thêm môn học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	 if(isset($_POST['add'])) {
	  	$ma = $_POST['mamon'];
	  	$ten = $_POST['tenmon'];
	  	$nganh = $_POST['nganh']; 
	  	$hocki = $_POST['hocki']; 

	  	$isSuccess = $monhoc->insert($ma, $ten, $nganh, $hocki);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	  }

	  $nganh = $monhoc->getNganh();
	  $hocki = $monhoc->getHocki();

	 
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="mamon" required="required">
					<span class="text">Mã Môn</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="tenmon" required="required">
					<span class="text">Tên môn</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="nganh">
						<?php while ($cn = $nganh->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $cn['ma_nganh'] ?> "><?php echo $cn['ten_nganh']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Chuyên ngành</span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="hocki">
						<?php while ($hk = $hocki->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $hk['hoc_ki'] ?> "><?php echo $hk['hoc_ki']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Học kì</span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>