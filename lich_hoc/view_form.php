<?php
$title = 'Lịch học';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 

if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
	$_SESSION['filter'] = $_POST;
	header("Location: view_form.php");exit;
}
if (!empty($_SESSION['filter'])) {
	$where = "";
	foreach ($_SESSION['filter'] as $field => $value) {
		if (!empty($value)) {
			switch ($field) {
				case 'ma_lop':
					$where .= (!empty($where))? " AND "."".$field." LIKE '%".$value."%'" : "".$field." LIKE '%".$value."%'";
					break;
				case 'ngay':
					$where .= (!empty($where))? " AND "."".$field." LIKE '%".$value."%'" : "".$field." LIKE '%".$value."%'";
					break;
				case 'phong_hoc':
					$where .= (!empty($where))? " AND "."".$field." LIKE '%".$value."%'" : "".$field." LIKE '%".$value."%'";
					break;
				default:
					$where .= (!empty($where))? " AND "."".$field." =".$value."" : "".$field." =".$value."";
					break;
			}
		}
	}
	extract($_SESSION['filter']);
}


$data_per_page = 20;
$current_page = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($current_page - 1) * $data_per_page;
$record = $pdo->query("SELECT count(*) FROM lich_hoc"); 


if (!empty($where)) {
	$record = $pdo->query("SELECT count(*) FROM lich_hoc where ".$where.""); 
} else {
	$record = $pdo->query("SELECT count(*) FROM lich_hoc"); 
}

$totalRecords = $record->fetchColumn();
$totalPages = ceil($totalRecords / $data_per_page);

if (!empty($where)) {
	$result = $pdo->query("SELECT * FROM lich_hoc where ".$where." LIMIT ".$data_per_page." OFFSET ".$offset."");
} else {
	$result = $pdo->query("SELECT * FROM lich_hoc LIMIT ".$data_per_page." OFFSET ".$offset."");
} ?>

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
	</div>
	<div class="search">
		<form action="view_form.php?action=search" method="POST">
			<fieldset>
				<legend>Tra cứu</legend>
				Mã Lớp: <input type="text" name="ma_lop" value="<?=!empty($ma_lop)?$ma_lop:""?>">
				Ngày hoc: <input type="text" name="ngay" value="<?=!empty($ngay)?$ngay:""?>">
				Phòng học: <input type="text" name="phong_hoc" value="<?=!empty($phong_hoc)?$phong_hoc:""?>">
				<input type="submit" class="btn_search" value="Tìm">
			</fieldset>			
		</form>
	</div>	
	<div class="total-record">
		<span>Có tất cả <strong><?=$totalRecords?></strong> bản ghi dữ liệu trên <strong><?=$totalPages?></strong> trang</span>
	</div>
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Lớp</td>
				<td>Môn</td>
				<td>Phòng học</td>
				<td>Giáo viên</td>
				<td>Giờ bắt đầu</td>
				<td>Giờ gian kết thúc</td>
				<td>Ngày</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['lich_hoc_id']; ?> </td>
				<td> <?php echo $r['ten_lop']; ?> - <?php echo $r['ma_lop']; ?></td>
				<td> <?php echo $r['ten_mon']; ?> </td>
				<td> <?php echo $r['ma_phong']; ?> </td>
				<td> <?php echo $r['gvpt']; ?> </td>
				<td> <?php echo $r['bat_dau']; ?> </td>
				<td> <?php echo $r['ket_thuc']; ?> </td>
				<td> <?php echo $r['thoi_gian']; ?> </td>
				<td>
					<a class="btn_up" href="update_form.php?id=<?php echo $r['lich_hoc_id']; ?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['lich_hoc_id']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		<?php include '../module/page_bar.php'; ?>
	</table>
<?php require_once '../module/footer.php';  ?>