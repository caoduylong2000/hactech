<?php
$title = 'Khoa';
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
				case 'ten_khoa':
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
$record = $pdo->query("SELECT count(*) FROM khoa"); 


if (!empty($where)) {
	$record = $pdo->query("SELECT count(*) FROM khoa where ".$where.""); 
} else {
	$record = $pdo->query("SELECT count(*) FROM khoa"); 
}

$totalRecords = $record->fetchColumn();
$totalPages = ceil($totalRecords / $data_per_page);

if (!empty($where)) {
	$result = $pdo->query("SELECT * FROM khoa where ".$where." LIMIT ".$data_per_page." OFFSET ".$offset."");
} else {
	$result = $pdo->query("SELECT * FROM khoa LIMIT ".$data_per_page." OFFSET ".$offset."");
}
?>

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
	<form action="view_form.php?action=search" method="POST">
		<fieldset>
			<legend>Tra cứu</legend>
			Tên khoa: <input type="text" name="ten_khoa" value="<?=!empty($ten_khoa)?$ten_khoa:""?>">
			<input type="submit" class="btn_search" value="Tìm">
		</fieldset>			
	</form>
	<div class="total-record">
		<span>Có tất cả <strong><?=$totalRecords?></strong> bản ghi dữ liệu trên <strong><?=$totalPages?></strong> trang</span>
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
		<?php include '../module/page_bar.php'; ?>
	</table>
<?php require_once '../module/footer.php';  ?>