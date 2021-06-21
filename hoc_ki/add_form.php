<?php $title = 'Thêm Học kì';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if(isset($_POST['add'])) {

	  	$hk = $_POST['mahocki'];
	  	$start = $_POST['batdau'];
	  	$end = $_POST['ketthuc']; 
	  	$khoahoc = $_POST['khoahoc']; 

	  	$isSuccess = $hocki->insert($hk, $start, $end, $khoahoc);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	}

	  $result = $hocki->getKhoahoc();
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="mahocki" required="required">
					<span class="text">Mã Học kì</span>
					<span class="line"></span>
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
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="khoahoc">
						<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $r['ma_khoa_hoc'] ?> "> Khóa <?php echo $r['ma_khoa_hoc'] ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Khóa học</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>