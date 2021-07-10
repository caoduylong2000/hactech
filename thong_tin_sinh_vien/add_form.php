<?php $page = 'view_ttsv';
$title = 'Thêm sinh viên mới';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


	if(isset($_POST['add'])) {
	  	$masv = $_POST['masv'];
	  	$ten = $_POST['ten'];
	  	$lop = $_POST['lop']; 
	  	$diachi = $_POST['diachi']; 
	  	$sdt = $_POST['sdt'];
	  	$email = $_POST['email'];

	  	$isSuccess = $ttsv->insert($masv, $ten, $lop, $diachi, $sdt, $email);

	  	if ($isSuccess) {
	  		header("Location: view_form.php");
	  	} else {
	  		echo "Chưa thể thêm giữ liệu. Kiểm tra lại";
	  	}
	  }

	$lop1 = $diem->getLop();
?>
	<form action="add_form.php" method="POST">
		<h2>Thêm mới dữ liệu</h2>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="masv" required="required">
					<span class="text">Mã sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="ten" required="required">
					<span class="text">Tên sinh viên</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<select name="lop">
						<?php while ($l = $lop1->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $l['ma_lop'] ?> "><?php echo $l['ten_lop']; ?> - <?php echo $l['ma_lop'] ?></option>
						<?php } ?>
					</select>
					<span class="text-select">Tên lớp</span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="email" name="email" required="required">
						<span class="text">Email</span>
						<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="sdt" required="required">
					<span class="text">Số điện thoại</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row100">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="diachi" required="required">
						<span class="text">Địa chỉ</span>
						<span class="line"></span>
				</div>
			</div>
		</div>
		<div>
			<input type="submit" name="add" value="ADD">
		</div>
	</form>
	
	
<?php require_once '../module/footer.php';  ?>