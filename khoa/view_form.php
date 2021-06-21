<?php
$title = 'Khóa học';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $khoa->view(); ?>

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
				<td>Mã Khoa</td>
				<td>Tên Khoa</td>
				<td>Chủ nhiệm Khoa</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td> <?php echo $r['ma_khoa']; ?> </td>
					<td> <?php echo $r['ten_khoa']; ?> </td>
					<td> <?php echo $r['chu_nhiem_khoa']; ?> </td>
					<td>
						<a class="btn_info" href="details.php?id=<?php echo $r['ma_khoa']; ?> ">Detail</a>
						<a class="btn_up" href="update_form.php?id=<?php echo $r['ma_khoa']; ?> ">Update</a>
						<a class="btn_del" href="delete.php?id=<?php echo $r['ma_khoa']; ?> ">Delete</a>
					</td>
				</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>