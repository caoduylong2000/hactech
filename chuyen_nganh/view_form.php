<?php
$title = 'Chuyên ngành';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $nganh->view(); ?>

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
				<td>Mã ngành</td>
				<td>Tên Ngành</td>
				<td>Tên Khoa</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td> <?php echo $r['ma_nganh']; ?> </td>
					<td> <?php echo $r['ten_nganh']; ?> </td>
					<td> <?php echo $r['ten_khoa']; ?> </td>
					<td>
						<a class="btn_info" href="detail.php?id=<?php echo $r['ma_nganh']; ?> ">Details</a>
						<a class="btn_up" href="update_form.php?id=<?php echo $r['ma_nganh']; ?> ">Update</a>
						<a class="btn_del" href="delete.php?id=<?php echo $r['ma_nganh']; ?> ">Delete</a>
					</td>
				</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>