<?php
$title = 'Danh sách chuyên ngành';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


if (!isset($_GET['id'])) {
	  	echo "false";
	  } else {
	  	$stt=1;
	  	$id = $_GET['id'];
	  	$result = $khoa->details($id);
	  	$list = $khoa->listNganh($id);
	  } ?>
	
	<form>
		<h2>Thông tin Khoa</h2>
		<div class="row100">
			<div class="col">
			  	<p><b>Mã Khoa:</b> <?php echo $result['ma_khoa']; ?></p>
				<p><b>Tên Khoa:</b> <?php echo $result['ten_khoa']; ?></p>
				<p><b>Giáo viên chủ nhiệm:</b> <?php echo $result['chu_nhiem_khoa']; ?></p>
				<!-- <p><b>Số sinh viên:</b> <?php echo $result['so_sinh_vien']; ?></p> -->
			</div>
		</div>
		<div class="row100">
			<div class="col">
			<table>
				<div>
					<a href="../chuyen_nganh/add_form.php" class="btn">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						ADD
					</a>
					<a href="" class="btn">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						IMPORT
					</a>
					<a href="" class="btn">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						EXPORT
					</a>
				</div>
				<thead>
					<tr>
						<td>STT</td>
						<td>Mã Ngành</td>
						<td>Tên Ngành</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php while ($l = $list->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $l['ma_nganh']; ?></td>
							<td><?php echo $l['ten_nganh']; ?></td>
							<td>
								<a class="btn_info" href="../chuyen_nganh/details.php?id=<?php echo $l['ma_nganh']; ?> ">Details</a>
								<a class="btn_up" href="../chuyen_nganh/update_form.php?id=<?php echo $l['ma_nganh']; ?> ">Update</a>
								<a class="btn_del" href="../chuyen_nganh/delete.php?id=<?php echo $l['ma_nganh']; ?> ">Delete</a>
							</td>
						</tr>
					<?php $stt++;} ?>
				</tbody>
			</table>
		</div>
		</div>
	</form>
<?php require_once '../module/footer.php';  ?>