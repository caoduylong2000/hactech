<?php $title = 'Thêm Khóa học';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
	} else {
	  	$id = $_GET['id'];
	  	$kh = $khoahoc->details($id);	
	 
?>
	<form method="POST" action="update_post.php"> 
		<h2>Cập nhật dữ liệu</h2>
		<input type="hidden" value="<?php echo $kh['khoa_hoc_id']; ?>" name="id">
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="khoa" value="<?php echo $kh['ma_khoa_hoc']; ?>">
					<span class="text">Mã khóa học</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					 <input type="date" name="batdau" value="<?php echo $kh['bat_dau']; ?>">
					<span class="text-select">Bắt đầu</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="date" name="ketthuc" value="<?php echo $kh['ket_thuc']; ?>">
					<span class="text-select">Kết thúc</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>