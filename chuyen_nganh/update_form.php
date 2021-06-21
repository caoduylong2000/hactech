<?php $title = 'Thêm Học kì';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if (!isset($_GET['id'])) {
	  	echo "error";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $nganh->details($id);
	  	$khoa = $nganh->getKhoa();
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="manganh" value="<?php echo $result['ma_nganh']; ?>">
					<span class="text">Mã ngành</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="date" name="tennganh" value="<?php echo $result['ten_nganh']; ?>">
					<span class="text">Tên ngành</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="khoa">
						<?php while ($k = $khoa->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $k['ma_khoa']; ?>" <?php if ($k['ma_khoa'] == $result['ma_khoa']) echo 'selected' ?> ><?php echo $k['ten_khoa']; ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Mã khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="update" value="UPDATE">
	</form>
<?php } ?>
<?php require_once '../module/footer.php'; ?>