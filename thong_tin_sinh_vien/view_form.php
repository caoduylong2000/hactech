<?php $page = 'view_ttsv';
$title = 'Danh sách sinh viên';
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
				case 'ma_sinh_vien':
					$where .= (!empty($where))? " AND "."".$field." LIKE '%".$value."%'" : "".$field." LIKE '%".$value."%'";
					break;
				case 'ten_sinh_vien':
					$where .= (!empty($where))? " AND "."".$field." LIKE '%".$value."%'" : "".$field." LIKE '%".$value."%'";
					break;
				case 'ma_lop':
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
$record = $pdo->query("SELECT count(*) FROM thong_tin_sinh_vien"); 


if (!empty($where)) {
	$record = $pdo->query("SELECT count(*) FROM thong_tin_sinh_vien where ".$where.""); 
} else {
	$record = $pdo->query("SELECT count(*) FROM thong_tin_sinh_vien"); 
}

$totalRecords = $record->fetchColumn();
$totalPages = ceil($totalRecords / $data_per_page);

if (!empty($where)) {
	$result = $pdo->query("SELECT * FROM thong_tin_sinh_vien where ".$where." LIMIT ".$data_per_page." OFFSET ".$offset."");
} else {
	$result = $pdo->query("SELECT * FROM thong_tin_sinh_vien LIMIT ".$data_per_page." OFFSET ".$offset."");
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
		<a href="delete_all.php" class="btn">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			DELETE ALL
		</a>
	</div>
	<div class="search">
		<form action="view_form.php?action=search" method="POST">
			<fieldset>
				<legend>Tra cứu</legend>
				Mã sinh viên: <input type="text" name="ma_sinh_vien" value="<?=!empty($ma_sinh_vien)?$ma_sinh_vien:""?>">
				Tên sinh viên: <input type="text" name="ten_sinh_vien" value="<?=!empty($ten_sinh_vien)?$ten_sinh_vien:""?>">
				Mã Lớp: <input type="text" name="ma_lop" value="<?=!empty($ma_lop)?$ma_lop:""?>">
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
				<td>Mã sinh viên</td>
				<td>Tên sinh viên</td>
				<td>Tên lớp</td>
				<td>Địa chỉ</td>
				<td>Số điện thoại</td>
				<td>Email</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td> <?php echo $r['ma_sinh_vien']; ?> </td>
				<td> <?php echo $r['ten_sinh_vien']; ?> </td>
				<td> <!-- <?php echo $r['ten_lop']; ?> -  --><?php echo $r['ma_lop']; ?></td>
				<td> <?php echo $r['dia_chi']; ?> </td>
				<td> <?php echo $r['so_dien_thoai']; ?> </td>
				<td> <?php echo $r['email']; ?> </td>
				<td>
					<a class="btn_up"  href="update_form.php?id=<?php echo $r['ma_sinh_vien'];?> ">Update</a>
					<a class="btn_del" href="delete.php?id=<?php echo $r['ma_sinh_vien']; ?> ">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	<?php include '../module/page_bar.php'; ?>
	</table>
<?php require_once '../module/footer.php';  ?>