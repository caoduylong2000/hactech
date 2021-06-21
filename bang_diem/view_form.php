<?php
$title = 'Tra cứu bảng điểm';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $diem->view(); ?>

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
				<td>ID</td>
				<td>Tên Lớp</td>
				<td>Tên Môn</td>
				<td>Giáo viên</td>
				<td>Học kì</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td> <?php echo $r['bang_diem_id']; ?> </td>
					<td> <?php echo $r['ten_lop']; ?> (<?php echo $r['ma_lop']; ?>)</td>
					<td> <?php echo $r['ten_mon']; ?> </td>
					<td> <?php echo $r['gvpt']; ?> </td>
					<td> <?php echo $r['hoc_ki']; ?> </td>
					<td>
						<a class="btn_info" href="../chi_tiet_bang_diem/view_form.php?id=<?php echo $r['bang_diem_id']; ?> ">Details</a>
						<a class="btn_up" href="update_form.php?id=<?php echo $r['bang_diem_id']; ?> ">Update</a>
						<a class="btn_del" href="delete.php?id=<?php echo $r['bang_diem_id']; ?> ">Delete</a>
					</td>
				</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>