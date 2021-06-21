<?php
$title = 'Danh sách Môn học';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $monhoc->view(); ?>

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
				<td>Mã môn</td>
				<td>Tên môn</td>
				<td>Chuyên ngành</td>
				<td>Thuộc học kì</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['ma_mon']; ?> </td>
				<td> <?php echo $r['ten_mon']; ?> </td>
				<td> <?php echo $r['ten_nganh']; ?> </td>
				<td> <?php echo $r['hoc_ki']; ?> </td>
				<td>
					<a class="btn_info"href="detail.php?id=<?php echo $r['mon_id']; ?> ">Details</a>
					<a class="btn_up"href="update_form.php?id=<?php echo $r['mon_id']; ?> ">Update</a>
					<a class="btn_del"href="delete.php?id=<?php echo $r['mon_id']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>