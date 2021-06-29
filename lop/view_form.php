<?php
$title = 'Danh sách Lớp';
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
				case 'ten_lop':
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
$record = $pdo->query("SELECT count(*) FROM lop"); 


if (!empty($where)) {
	$record = $pdo->query("SELECT count(*) FROM lop where ".$where.""); 
} else {
	$record = $pdo->query("SELECT count(*) FROM lop"); 
}

$totalRecords = $record->fetchColumn();
$totalPages = ceil($totalRecords / $data_per_page);

if (!empty($where)) {
	$result = $pdo->query("SELECT * FROM lop where ".$where." LIMIT ".$data_per_page." OFFSET ".$offset."");
} else {
	$result = $pdo->query("SELECT * FROM lop LIMIT ".$data_per_page." OFFSET ".$offset."");
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
	<div class="search">
		<form action="view_form.php?action=search" method="POST">
			<fieldset>
				<legend>Tra cứu</legend>
				Tên lớp: <input type="text" name="ten_lop" value="<?=!empty($ten_lop)?$ten_lop:""?>">
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
				<td>Mã lớp</td>
				<td>Tên lớp</td>
				<td>Chuyên ngành</td>
				<td>Giáo viên chủ nhiệm</td>
				<td>Số sinh viên</td>
				<td>Khóa học</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<?php $sosv = $lop->getSoSV($r['ma_lop']); ?>
				<td> <?php echo $r['ma_lop']; ?> </td>
				<td> <?php echo $r['ten_lop']; ?> </td>
				<td> <?php echo $r['ma_nganh']; ?> </td>
				<td> <?php echo $r['gvcn']; ?> </td>
				<td> <?php echo $sosv[0];?></td>
				<td> Khóa <?php echo $r['khoa_hoc']; ?> </td>
				<td>
					<a class="btn_info" href="details.php?id=<?php echo $r['lop_id']; ?> ">Details</a>	
					<!-- design trang detail -->
					<a class="btn_up" href="update_form.php?id=<?php echo $r['lop_id']; ?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['lop_id']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		<?php include '../module/page_bar.php'; ?>
	</table>
<?php require_once '../module/footer.php';  ?>