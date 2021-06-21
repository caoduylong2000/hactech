<?php $title = 'Thêm bảng điểm';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if(isset($_POST['ok'])) {
	  	$id = $_POST['id'];
	  	$mon = $_POST['tenmon'];
	  	$lop = $_POST['tenlop']; 
	  	$gv = $_POST['gvpt']; 
	  	$hocki = $_POST['hocki'];

	  	$isSuccess = $diem->insert($id, $mon, $lop, $gv, $hocki);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	  }

	  $hocki1 = $diem->getHocki();
	  $mon1 = $diem->getMonhoc();
	  $lop1 = $diem->getLop();
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="tenmon">
						<?php while ($m = $mon1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $m['ma_mon'] ?> "><?php echo $m['ten_mon']; ?></option>
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
							<option value="<?php echo $l['ma_lop'] ?> "><?php echo $l['ten_lop']; ?></option>
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
							<option value="<?php echo $hk['hoc_ki_id'] ?> "><?php echo $hk['hoc_ki_id']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Học kì</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="gvpt" required="required">
					<span class="text">Giáo viên phụ trách</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>