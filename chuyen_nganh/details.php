<?php
$title = 'Danh sách chuyên ngành';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


if (!isset($_GET['id'])) {
	  	echo "false";
	  } else {
	  	$id = $_GET['id'];
	  	$result = $nganh->details($id);
	  	$list = $nganh->listLop($id);
	  } ?>
	
	<form>
		<h2>Thông tin Khoa</h2>
		<div class="row100">
			<div class="col">
			  	<p><b>Mã Ngành:</b> <?php echo $result['ma_nganh']; ?></p>
				<p><b>Tên Ngành:</b> <?php echo $result['ten_nganh']; ?></p>
				<p><b>Thuộc khoa:</b> <?php echo $result['ma_khoa']; ?></p>
				<!-- <p><b>Số sinh viên:</b> <?php echo $result['so_sinh_vien']; ?></p> -->
			</div>
		</div>
		<div class="row100">
			<div class="col">
			<table>
				<div>
					<a href="../lop/add_form.php" class="btn">
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
						<td>Mã lớp</td>
						<td>Tên lớp</td>
						<td>Chuyên ngành</td>
						<td>Giáo viên chủ nhiệm</td>
						<td>Số sinh viên</td>
						<td>Khóa học</td>
						<td>Action </td>
					</tr>
				</thead>
				<tbody>
					<?php while ($l = $list->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>
							<td> <?php echo $l['ma_lop']; ?> </td>
							<td> <?php echo $l['ten_lop']; ?> </td>
							<td> <?php echo $l['ten_nganh']; ?> </td>
							<td> <?php echo $l['gvcn']; ?> </td>
							<td> <?php echo $l['so_sinh_vien']; ?> </td>
							<td> Khóa <?php echo $l['khoa_hoc']; ?> </td>
							<td>
								<a class="btn_info" href="../lop/details.php?id=<?php echo $l['lop_id']; ?> ">Details</a><br>
								<a class="btn_up" href="../lop/update_form.php?id=<?php echo $l['lop_id']; ?> ">Update</a><br>
								<a class="btn_del" href="../lop/delete.php?id=<?php echo $l['lop_id']; ?> ">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
	</form>
<?php require_once '../module/footer.php';  ?>