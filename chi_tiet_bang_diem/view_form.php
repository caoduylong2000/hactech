<?php
$title = 'Bảng điểm chi tiết';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


  if (!isset($_GET['id'])) {
	  	echo "false";
	  } else {
	  	$id = $_GET['id'];	
	  	$view = $diemct->view($id);
	  } ?>

	<div>
		<a href="add_form.php?id=<?php echo $id ?>" class="btn">
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
			<tr>ID :<?php echo $id ?></tr>
			<tr>
				<td>STT</td>
				<td>Tên sinh viên </td>
				<td>Điểm </td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td> <?php echo $v['stt'] ?> </td>
					<td> <?php echo $v['ten_sinh_vien'] ?> </td>
					<td> <?php echo $v['diem'] ?> </td>
					<td>
						<a class="btn_up" href="update_form.php?stt=<?php echo $v['stt']; ?>">Update</a>
						<a class="btn_del" href="delete.php?stt=<?php echo $v['stt']; ?>">Delete</a>
					</td>
				</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>