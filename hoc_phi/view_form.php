<?php
$title = 'Học Phí';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $hocphi->view(); ?>

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
				<td>Mã sinh viên</td>
				<td>Hoc kì</td>
				<td>Số tiền</td>
				<td>Ngày đóng</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td> <?php echo $r['hoc_phi_id']; ?> </td>
					<td> <?php echo $r['ma_sinh_vien']; ?> </td>
					<td> <?php echo $r['hoc_ki']; ?> </td>
					<td> <?php echo $r['so_tien']; ?> </td>
					<td> <?php echo $r['ngay_dong']; ?> </td>
					<td>
						<a class="btn_info" href="detail.php?id=<?php echo $r['hoc_phi_id']; ?> ">Details</a>
						<a class="btn_up" href="update_form.php?id=<?php echo $r['hoc_phi_id']; ?> ">Update</a>
						<a class="btn_del" href="delete.php?id=<?php echo $r['hoc_phi_id']; ?> ">Delete</a>
					</td>
				</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>