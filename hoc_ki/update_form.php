<?php $title = 'Cập nhật Học kì';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $hocki->details($id);	
	  	$khoahoc = $hocki->getKhoahoc();
?>
	<form action="add_form.php" method="POST">
		<h2>Cập nhật dữ liệu</h2>
		<input type="hidden" name="id" value="<?php echo $result['hoc_ki_id']; ?>">
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="mahocki" value="<?php echo $result['ma_hoc_ki']; ?>">
					<span class="text">Mã Học kì</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="date" name="batdau" value="<?php echo $result['bat_dau']; ?>">
					<span class="text-select">Bắt đầu</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="date" name="ketthuc" value="<?php echo $result['ket_thuc']; ?>">
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
							<option value="<?php echo $kh['ma_khoa_hoc'] ?> " <?php if ($kh['ma_khoa_hoc'] == $result['khoa_hoc']) echo 'selected' ?> > Khóa <?php echo $kh['ma_khoa_hoc'] ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Khóa học</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>