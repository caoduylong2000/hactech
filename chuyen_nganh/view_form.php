<?php
$title = 'Chuyên ngành';
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
				case 'ten_nganh':
					$where .= (!empty($where))? " AND "."".$field." LIKE '%".$value."%'" : "".$field." LIKE '%".$value."%'";
					break;
				default:
					$where .= (!empty($where))? " AND "."".$field." =".$value."" : "".$field." =".$value."";
					break;
			}
		}
	}
	unset($_SESSION['filter']);
}

$data_per_page = 20;
$current_page = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($current_page - 1) * $data_per_page;
$record = $pdo->query("SELECT count(*) FROM chuyen_nganh"); 


if (!empty($where)) {
	$record = $pdo->query("SELECT count(*) FROM chuyen_nganh where ".$where.""); 
} else {
	$record = $pdo->query("SELECT count(*) FROM chuyen_nganh"); 
}

$totalRecords = $record->fetchColumn();
$totalPages = ceil($totalRecords / $data_per_page);

if (!empty($where)) {
	$result = $pdo->query("SELECT * FROM chuyen_nganh cn INNER JOIN khoa k ON cn.ma_khoa = k.ma_khoa where ".$where." LIMIT ".$data_per_page." OFFSET ".$offset."");
} else {
	$result = $pdo->query("SELECT * FROM chuyen_nganh cn INNER JOIN khoa k ON cn.ma_khoa = k.ma_khoa LIMIT ".$data_per_page." OFFSET ".$offset."");
}?>

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
				Mã phòng: <input type="text" name="ten_nganh" value="<?=!empty($ten_nganh)?$ten_nganh:""?>">
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
		<?php include '../module/page_bar.php'; ?>
	</table>
<?php require_once '../module/footer.php';  ?>