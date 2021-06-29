<?php $title = 'Thêm lịch học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if(isset($_POST['ok'])) {
	  	$lop = $_POST['lop'];
	  	$mon = $_POST['mon'];
	  	$phong = $_POST['phong'];
	  	$gv = $_POST['gv'];
	  	$start = $_POST['batdau'];
	  	$end = $_POST['ketthuc']; 
	  	$ngay = $_POST['ngay']; 

	  	$isSuccess = $time->insert($lop, $mon, $gv, $phong, $start, $end, $ngay);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	  }
	  $lop1 = $time->getLop();
	  $mon1 = $time->getMon();
	  $phong1 = $time->getPhong();

	 
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="malop">
						<?php while ($l = $lop1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $l['ma_lop'] ?> "><?php echo $l['ten_lop']; ?></option>
						<?php } ?>		
					</select>
					<span class="text-select">Tên lớp</span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="mamon">
						<?php while ($m = $mon1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $m['ma_mon'] ?> "><?php echo $m['ten_mon']; ?> - <?php echo $m['ma_mon'] ?></option>
						<?php } ?>				
					</select>
					<span class="text-select">Tên môn</span>
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
					<select name="maphong" id="">
						<?php while ($p = $phong1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $p['ma_phong'] ?> "><?php echo $p['ma_phong']; ?></option>
						<?php } ?>			
					</select>
					<span class="text-select">Phòng học</span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="date" name="ngay" required="required">
					<span class="text-select">Ngày học</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="time" name="batdau" required="required">
					<span class="text-select">Giờ bắt đầu</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="time" name="ketthuc" required="required">
					<span class="text-select">Giờ kết thúc</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>