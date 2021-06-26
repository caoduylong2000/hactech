<?php
$title = 'Học kì';
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
				case 'khoa_hoc':
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
$record = $pdo->query("SELECT count(*) FROM hoc_ki"); 


if (!empty($where)) {
	$record = $pdo->query("SELECT count(*) FROM hoc_ki where ".$where.""); 
} else {
	$record = $pdo->query("SELECT count(*) FROM hoc_ki"); 
}

$totalRecords = $record->fetchColumn();
$totalPages = ceil($totalRecords / $data_per_page);

if (!empty($where)) {
	$result = $pdo->query("SELECT * FROM hoc_ki where ".$where." LIMIT ".$data_per_page." OFFSET ".$offset."");
} else {
	$result = $pdo->query("SELECT * FROM hoc_ki LIMIT ".$data_per_page." OFFSET ".$offset."");
} ?>

	<div>
		<a href="add_form.php" class="btn">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			ADD
		</a>
	</div>
	<div class="search">
		<form action="view_form.php?action=search" method="POST">
			<fieldset>
				<legend>Tra cứu</legend>
				Khóa học: <input type="text" name="khoa_hoc" value="<?=!empty($khoa_hoc)?$khoa_hoc:""?>">
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
				<td>Hoc kì</td>
				<td>Thời gian bắt đầu</td>
				<td>Thời gian kết thúc</td>
				<td>Thuộc khóa</td>
				<td>Action </td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td> <?php echo $r['hoc_ki_id']; ?> </td>
					<td> <?php echo $r['ma_hoc_ki']; ?> </td>
					<td> <?php echo $r['bat_dau']; ?> </td>
					<td> <?php echo $r['ket_thuc']; ?> </td>
					<td> Khóa <?php echo $r['khoa_hoc']; ?> </td>
					<td>
						<a class="btn_info" href="detail.php?id=<?php echo $r['hoc_ki_id']; ?> ">Details</a>
						<a class="btn_up" href="update_form.php?id=<?php echo $r['hoc_ki_id']; ?> ">Update</a>
						<a class="btn_del" href="delete.php?id=<?php echo $r['hoc_ki_id']; ?> ">Delete</a>
					</td>
				</tr>
		<?php } ?>
		</tbody>
		<?php include '../module/page_bar.php'; ?>
	</table>
<?php require_once '../module/footer.php';  ?>