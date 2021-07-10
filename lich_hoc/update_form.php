<?php $title = 'Thêm lịch học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	 if (!isset($_GET['id'])) {
	  
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $time->details($id);
	  	$lop1 = $time->getLop();
	  	$mon1 = $time->getMon();
	  	$phong1 = $time->getPhong();
	 
?>
	<form action="add_form.php" method="POST">
		<h2>Cập nhật dữ liệu</h2>
		<input type="hidden" name="id" value="<?php echo $result['lich_id']; ?>">
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="malop">
						<?php while($l = $lop1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $l['ma_lop']; ?>" <?php if ($l['ma_lop'] == $result['ma_lop']) echo 'selected' ?>><?php echo $l['ten_lop']; ?> - <?php echo $l['ma_lop']; ?></option>
						<?php } ?>		
					</select>
					<span class="text-select">Tên lớp</span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="mamon">
						<?php while($m = $mon1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $m['ma_mon']; ?>" <?php if ($m['ma_mon'] == $result['ma_mon']) echo 'selected' ?>><?php echo $m['ma_mon']; ?></option>
						<?php } ?>				
					</select>
					<span class="text-select">Tên môn</span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="gvcn" value="<?php echo $result['gvpt']; ?>">
					<span class="text">Giáo viên chủ nhiệm</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="maphong" id="">
						<?php while($p = $phong1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $p['ma_phong']; ?>" <?php if ($p['ma_phong'] == $result['phong_hoc']) echo 'selected' ?>><?php echo $p['ma_phong']; ?></option>
						<?php } ?>			
					</select>
					<span class="text-select">Phòng học</span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="date" name="ngay" value="<?php echo $result['ngay']; ?>">
					<span class="text-select">Ngày học</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					 <input type="time" min="06:00" max="18:00" name="batdau" value="<?php echo $result['bat_dau']; ?>">
					<span class="text-select">Giờ bắt đầu</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="time" min="06:00" max="18:00" name="ketthuc" value="<?php echo $result['ket_thuc']; ?>">
					<span class="text-select">Giờ kết thúc</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>