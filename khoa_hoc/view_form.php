<?php
$title = 'Khóa học';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $khoahoc->view(); ?>

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
				<td>Mã Khóa Học</td>
				<td>Thời gian bắt đầu</td>
				<td>Thời gian kết thúc</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['khoa_hoc_id']; ?> </td>
				<td> <?php echo $r['ma_khoa_hoc']; ?> </td>
				<td> <?php echo $r['bat_dau']; ?> </td>
				<td> <?php echo $r['ket_thuc']; ?> </td>
				<td>
					<a class="btn_up" href="update_form.php?id=<?php echo $r['khoa_hoc_id']; ?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['khoa_hoc_id']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>