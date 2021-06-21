<?php
$title = 'Danh sách Lớp';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $lop->view(); ?>

	<div>
		<a href="add_form.php" class="btn">
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
	<table>
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
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['ma_lop']; ?> </td>
				<td> <?php echo $r['ten_lop']; ?> </td>
				<td> <?php echo $r['ten_nganh']; ?> </td>
				<td> <?php echo $r['gvcn']; ?> </td>
				<td> <?php echo $r['so_sinh_vien']; ?> </td>
				<td> Khóa <?php echo $r['khoa_hoc']; ?> </td>
				<td>
					<a class="btn_info" href="details.php?id=<?php echo $r['lop_id']; ?> ">Details</a>	
					<!-- design trang detail -->
					<a class="btn_up" href="update_form.php?id=<?php echo $r['lop_id']; ?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['lop_id']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>