<?php
$title = 'Danh sách Lớp';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 


if (!isset($_GET['id'])) {
	  	echo "false";
	  } else {
	  	$stt=1;
	  	$id = $_GET['id'];
	  	$result = $lop->details($id);
	  	$list = $lop->listSV($id);
	  	
	  } ?>
	
	<form>
		<h2>Thông tin lớp học</h2>
		<div class="row100">
			<div class="col">
				<?php $sosv = $lop->getSoSV($result['ma_lop']); ?>
			  	<p><b>Mã lớp:</b> <?php echo $result['ma_lop']; ?></p>
				<p><b>Tên Lớp:</b> <?php echo $result['ten_lop']; ?></p>
				<p><b>Chuyên ngành:</b> <?php echo $result['ten_nganh']; ?></p>
				<p><b>Giáo viên chủ nhiệm:</b> <?php echo $result['gvcn']; ?></p>
				<p><b>Số sinh viên:</b> <?php echo $sosv[0]; ?></p>
				<p><b>Khóa học:</b> K<?php echo $result['khoa_hoc']; ?></p>
			</div>
		</div>
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
		<div class="row100">
			<div class="col">
			<table>
				<thead>
					<tr><td>STT</td>
						<td>Mã sinh viên</td>
						<td>Tên sinh viên</td>
					</tr>
				</thead>
				<tbody>
					<?php while ($l = $list->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $l['ma_sinh_vien']; ?></td>
							<td><?php echo $l['ten_sinh_vien']; ?></td>
						</tr>
					<?php $stt++;} ?>
				</tbody>
			</table>
		</div>
		</div>

	</form>
<?php require_once '../module/footer.php';  ?>