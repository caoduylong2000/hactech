<?php $page = 'view_ttsv';
$title = 'Danh sách Phòng học';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 



$result = $phonghoc->view(); ?>

	<div>
		<a href="add_form.php" class="btn">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			ADD
		</a>
		<a href="import_data.php" class="btn">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			IMPORT
		</a>
		<a href="export_data.php" class="btn">
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
				<td>Mã phòng</td>
				<td>Mô tả</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['ma_phong']; ?> </td>
				<td> <?php echo $r['mo_ta']; ?> </td>
				<td>
					<a class="btn_up"  href="update_form.php?id=<?php echo $r['ma_phong'];?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['ma_phong']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>