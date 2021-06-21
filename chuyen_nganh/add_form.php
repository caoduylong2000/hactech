<?php $title = 'Thêm Học kì';
require_once '../module/dautrang.php'; 
require_once '../module/connect.php'; 

	if(isset($_POST['ok'])) {
	  	$ma = $_POST['manganh'];
	  	$name = $_POST['tennganh'];
	  	$khoa = $_POST['khoa']; 

	  	$isSuccess = $nganh->insert($ma, $name, $khoa);

	  	if ($isSuccess) {
	  		header("Location: view_nganh.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	}

	  $result = $nganh->getKhoa();
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="manganh" required="required">
					<span class="text">Mã ngành</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="tennganh" required="required">
					<span class="text">Tên ngành</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="khoa">
						<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $r['ma_khoa'] ?> "><?php echo $r['ten_khoa']; ?> - <?php echo $r['ma_khoa'] ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Mã khoa</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	<input type="submit" name="add" value="ADD">
	</form>

<?php require_once '../module/footer.php'; ?>