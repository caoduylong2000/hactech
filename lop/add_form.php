<?php $title = 'Thêm môn học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if(isset($_POST['add'])) {
	  	$ma = $_POST['malop'];
	  	$ten = $_POST['tenlop'];
	  	$nganh = $_POST['nganh']; 
	  	$gvcn = $_POST['gvcn']; 
	  	$sosv = $_POST['sosv']; 
	  	$khoahoc = $_POST['khoahoc']; 

	  	$isSuccess = $lop->insert($ma, $ten, $nganh, $gvcn, $sosv, $khoahoc);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	  }

	  $result = $lop->getNganh();
	  $result1 = $lop->getKhoahoc();

	 
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="malop" required="required">
					<span class="text">Mã Lớp</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="tenlop" required="required">
					<span class="text">Tên Lớp</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="gvcn" required="required">
					<span class="text">Giáo viên chủ nhiệm</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="number" name="sosv" required="required">
					<span class="text">Số sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="nganh">
						<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $r['ma_nganh'] ?> "><?php echo $r['ten_nganh']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Chuyên ngành</span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="khoahoc">
						<?php while ($r1 = $result1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $r1['ma_khoa_hoc'] ?> "> Khóa <?php echo $r1['ma_khoa_hoc'] ?> (<?php echo $r1['bat_dau']; ?> - <?php echo $r1['ket_thuc']; ?>)</option>
						<?php } ?>
					</select>
					<span class="text-select">Khóa học</span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>