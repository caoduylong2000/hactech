<?php $page = 'view_ttsv';
$title = 'Danh sách sinh viên';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $ttsv->view(); ?>

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
				<td>Mã sinh viên</td>
				<td>Tên sinh viên</td>
				<td>Tên lớp</td>
				<td>Địa chỉ</td>
				<td>Số điện thoại</td>
				<td>Email</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['ma_sinh_vien']; ?> </td>
				<td> <?php echo $r['ten_sinh_vien']; ?> </td>
				<td> <?php echo $r['ten_lop']; ?> - <?php echo $r['ma_lop']; ?></td>
				<td> <?php echo $r['dia_chi']; ?> </td>
				<td> <?php echo $r['so_dien_thoai']; ?> </td>
				<td> <?php echo $r['email']; ?> </td>
				<td>
					<a class="btn_up"  href="update_form.php?id=<?php echo $r['ma_sinh_vien'];?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['ma_sinh_vien']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>