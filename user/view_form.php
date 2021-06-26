<?php $page = 'view_ttsv';
$title = 'Danh sách tài khoản';
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
$record = $pdo->query("SELECT count(*) FROM tai_khoan"); 


if (!empty($where)) {
	$record = $pdo->query("SELECT count(*) FROM tai_khoan where ".$where.""); 
} else {
	$record = $pdo->query("SELECT count(*) FROM tai_khoan"); 
}

$totalRecords = $record->fetchColumn();
$totalPages = ceil($totalRecords / $data_per_page);

if (!empty($where)) {
	$result = $pdo->query("SELECT * FROM tai_khoan where ".$where." LIMIT ".$data_per_page." OFFSET ".$offset."");
} else {
	$result = $pdo->query("SELECT * FROM tai_khoan LIMIT ".$data_per_page." OFFSET ".$offset."");
} ?>
	<div class="search">
		<form action="view_form.php?action=search" method="POST">
			<fieldset>
				<legend>Tra cứu</legend>
				Tên sinh viên: <input type="text" name="ma_sinh_vien" value="<?=!empty($ma_sinh_vien)?$ma_sinh_vien:""?>">
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
		<?php include '../module/page_bar.php'; ?>
	</table>
<?php require_once '../module/footer.php';  ?>