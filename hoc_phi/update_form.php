<?php $title = 'Cập nhật Học phí';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $hocphi->details($id);	

	  	$hocki = $hocphi->getHocki();
?>
	<form action="add_form.php" method="POST">
		<h2>Cập nhật dữ liệu</h2>
		<input type="hidden" name="id" value="<?php echo $result['hoc_phi_id']; ?>">
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="masv" value="<?php echo $result['ma_sinh_vien']; ?>">
					<span class="text">Mã sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="hocki">
						<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $hocki['hoc_ki'] ?> " <?php if ($hocki['hoc_ki'] == $result['hoc_ki']) echo 'selected' ?> > Khóa <?php echo $hocki['hoc_ki'] ?></option>
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
					<input type="number" name="sotien" alue="<?php echo $result['so_tien']; ?>">
					<span class="text-select">Số tiền</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="date" name="ngaydong" alue="<?php echo $result['ngay_dong']; ?>">
					<span class="text-select">Ngày đóng</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>