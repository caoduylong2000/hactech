<?php $title = 'Cập nhật thông tin';

require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 

	  if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$masv = $_GET['id'];
	  	$result = $ttsv->details($masv);	
	  	$lop1 = $ttsv->getLop();
?>

<form method="POST" action="update_post.php">
	<h2>Cập nhật dữ liệu</h2> 
	<div class="row100">
		<div class="col">
			<div class="inputBox">
				<input type="text" name="masv" pattern="CD[0-9]{6}" value="<?php echo $result['ma_sinh_vien']; ?>">
				<span class="text">Mã sinh viên</span>
				<span class="line"></span>
			</div>
		</div>
		<div class="col">
			<div class="inputBox">
				<input type="text" name="ten" value="<?php echo $result['ten_sinh_vien']; ?>">
				<span class="text">Tên sinh viên</span>
				<span class="line"></span>
			</div>
		</div>
	</div>
	<div class="row100">
		<div class="col">
			<div class="inputBox">
				<span>Tên lớp</span>
				<select name="lop">
					<?php while ($l = $lop1->fetch(PDO::FETCH_ASSOC)) { ?>
						<option value="<?php echo $l['ma_lop'] ?> " <?php if($l['ma_lop'] == $result['ma_lop'] ) echo 'selected' ?>> <?php echo $l['ten_lop']; ?></option>
					<?php } ?>
				</select>
				<span class="text-select">Tên lớp</span>
			</div>
		</div>
		<div class="col">
			<div class="inputBox">
				<input type="text" name="sdt" pattern="[0-9]{11}" value="<?php echo $result['so_dien_thoai']; ?>">
				<span class="text">Số điện thoại</span>
				<span class="line"></span>
			</div>
		</div>
	</div>
	<div class="row100">
		<div class="col">
			<div class="inputBox">
				<input type="text" name="email" value="<?php echo $result['email']; ?>">
				<span class="text">Email</span>
				<span class="line"></span>
			</div>
		</div>
	</div>
	<div class="row100">	
		<div class="col">
			<div class="inputBox">
				<input type="text" name="diachi" value="<?php echo $result['dia_chi']; ?>">
				<span class="text">Địa chỉ</span>
				<span class="line"></span>
			</div>
		</div>
	</div>
	<div>
		<input type="submit" name="update" value="UPDATE">
	</div>
</form>

<?php } ?>

<?php  require_once '../module/footer.php'; ?>