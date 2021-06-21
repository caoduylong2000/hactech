<?php $page = 'view_ttsv';
$title = 'Danh sách tài khoản';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


$result = $user->view(); ?>

	<div>
		<a href="add_form.php" class="btn">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			ADD
		</a>
	</div>
	<table>
		<thead>
			<tr>
				<td>Tài khoản</td>
				<td>Mật khẩu</td>
				<td>Mã sinh viên</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['username']; ?> </td>
				<td> <?php echo $r['password']; ?> </td>
				<td> <?php echo $r['ma_sinh_vien']; ?> </td>
				<td>
					<a class="btn_up" href="update_form.php?id=<?php echo $r['ma_sinh_vien'];?> ">Đổi mật khẩu</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php require_once '../module/footer.php';  ?>