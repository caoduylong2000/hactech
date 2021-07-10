<?php $title = 'Thay đổi thông tin';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	  if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $monhoc->details($id);
	  	$nganh = $monhoc->getNganh();	
	  	$hocki = $monhoc->getHocki();
?>
<form method="POST" action="update_post.php"> 
	<h2>Cập nhật dữ liệu</h2> 
	<input type="hidden" value="<?php echo $result['mon_hoc_id']; ?>" name="id" >
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $result['ma_mon']; ?>" name="ma">
					<span class="text">Mã môn</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" value="<?php echo $result['ten_mon']; ?>" name="name">
					<span class="text">Tên môn</span>
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
					<select name="hocki">
						<?php while ($hk = $hocki->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $hk['hoc_ki']; ?>" <?php if ($hk['hoc_ki'] == $result['hoc_ki']) echo 'selected' ?> > Khóa <?php echo $hk['hoc_ki']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Học kì</span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
</form>
<?php } ?>

<?php  require_once '../module/footer.php'; ?>