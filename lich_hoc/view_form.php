<?php
$title = 'Lịch học';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $time->view(); ?>

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
				<td>Lớp</td>
				<td>Môn</td>
				<td>Phòng học</td>
				<td>Giáo viên</td>
				<td>Giờ bắt đầu</td>
				<td>Giờ gian kết thúc</td>
				<td>Ngày</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['lich_hoc_id']; ?> </td>
				<td> <?php echo $r['ten_lop']; ?> - <?php echo $r['ma_lop']; ?></td>
				<td> <?php echo $r['ten_mon']; ?> </td>
				<td> <?php echo $r['ma_phong']; ?> </td>
				<td> <?php echo $r['gvpt']; ?> </td>
				<td> <?php echo $r['bat_dau']; ?> </td>
				<td> <?php echo $r['ket_thuc']; ?> </td>
				<td> <?php echo $r['thoi_gian']; ?> </td>
				<td>
					<a class="btn_up" href="update_form.php?id=<?php echo $r['lich_hoc_id']; ?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['lich_hoc_id']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>