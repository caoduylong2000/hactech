<?php $title = 'Thay đổi thông tin';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $lop->details($id);
	  	$nganh = $lop->getNganh();	
	  	$khoahoc = $lop->getKhoahoc();
?>
<form method="POST" action="update_post.php"> 
	<h2>Cập nhật dữ liệu</h2> 
		<input type="hidden" name="id" value="<?php echo $result['lop_id']; ?>">
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $result['ma_lop']; ?>" name="malop">
					<span class="text">Mã lớp</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $result['gvcn']; ?>" name="gvcn">
					<span class="text">Giáo viên chủ nhiệm</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $result['so_sinh_vien']; ?>" name="sosv">
					<span class="text">Số sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $result['ten_lop']; ?>" name="tenlop">
					<span class="text">Tên lớp</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="nganh">
						<?php while ($cn = $nganh->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $cn['ma_nganh']; ?>" <?php if ($cn['ma_nganh'] == $result['ma_nganh']) echo 'selected' ?> ><?php echo $cn['ten_nganh']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Chuyên ngành</span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<select name="khoahoc">
						<?php while ($kh = $khoahoc->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $kh['ma_khoa_hoc']; ?>" <?php if ($kh['ma_khoa_hoc'] == $result['khoa_hoc']) echo 'selected' ?> > Khóa <?php echo $kh['ma_khoa_hoc']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Khóa học</span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
</form>
<?php } ?>

<?php  require_once '../module/footer.php'; ?>