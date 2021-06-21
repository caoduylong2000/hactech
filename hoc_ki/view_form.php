<?php
$title = 'Học kì';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $hocki->view(); ?>

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
				<td>Hoc kì</td>
				<td>Thời gian bắt đầu</td>
				<td>Thời gian kết thúc</td>
				<td>Thuộc khóa</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td> <?php echo $r['hoc_ki_id']; ?> </td>
					<td> <?php echo $r['ma_hoc_ki']; ?> </td>
					<td> <?php echo $r['bat_dau']; ?> </td>
					<td> <?php echo $r['ket_thuc']; ?> </td>
					<td> Khóa <?php echo $r['khoa_hoc']; ?> </td>
					<td>
						<a class="btn_info" href="detail.php?id=<?php echo $r['hoc_ki_id']; ?> ">Details</a>
						<a class="btn_up" href="update_form.php?id=<?php echo $r['hoc_ki_id']; ?> ">Update</a>
						<a class="btn_del" href="delete.php?id=<?php echo $r['hoc_ki_id']; ?> ">Delete</a>
					</td>
				</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>