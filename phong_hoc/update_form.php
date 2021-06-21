<?php $title = 'Cập nhật thông tin';

require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
  	} else {
	  	$id = $_GET['id'];
	  	$result = $phonghoc->details($id);
?>

<form method="POST" action="update_post.php">
	<h2>Cập nhật dữ liệu</h2> 
	<div class="row100">
		<div class="col">
			<div class="inputBox">
				<input type="text" name="maphong" value="<?php echo $result['ma_phong']; ?>">
				<span class="text">Mã phòng</span>
				<span class="line"></span>
			</div>
		</div>
		<div class="col">
			<div class="inputBox">
				<input type="text" name="mota" value="<?php echo $result['mo_ta']; ?>">
				<span class="text">Mô tả</span>
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