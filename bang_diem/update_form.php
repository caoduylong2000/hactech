<?php $title = 'Cập nhật bảng điểm';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $diem->details($id);	

	  	$hocki1 = $diem->getHocki();
	  	$mon1 = $diem->getMonhoc();
	  	$lop1 = $diem->getLop();
?>
	<form action="add_form.php" method="POST">
		<h2>Cập nhật dữ liệu</h2>
		<input type="hidden" name="id" value="<?php echo $result['bang_diem_id']; ?>">
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="tenmon">
						<?php while ($m = $mon1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $m['ma_mon'] ?> " <?php if($m['ma_mon'] == $result['ma_mon'] ) echo 'selected' ?>><?php echo $m['ten_mon']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Tên môn</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="tenlop">
						<?php while ($l = $lop1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $l['ma_lop'] ?> " <?php if($l['ma_lop'] == $result['ma_lop'] ) echo 'selected' ?>><?php echo $l['ten_lop']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Tên lớp</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="hocki">
						<?php while ($hk = $hocki1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $hk['hoc_ki_id']; ?>" <?php if ($hk['hoc_ki_id'] == $result['hoc_ki_id']) echo 'selected' ?> ><?php echo $hk['hoc_ki_id']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Học kì</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="gvpt" value="<?php echo $result['gvpt']; ?>">
					<span class="text">Giáo viên phụ trách</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>