<?php
		$host='127.0.0.1';
		$database='hactech';
		$user='root';
		$pass='';
		$charset = 'utf8mb4';

		$conn = "mysql:host=$host;dbname=$database;charset=$charset";
		
		try {
			$pdo = new PDO($conn, $user, $pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());	
		}

		require_once '../khoa_hoc/khoa_hoc.php';
		$khoahoc = new KhoaHoc($pdo);

		require_once '../khoa/khoa.php';
		$khoa = new Khoa($pdo);

		require_once '../chuyen_nganh/nganh.php';
		$nganh = new Nganh($pdo);

		require_once '../lop/lop.php';
		$lop = new Lop($pdo);

		require_once '../phong_hoc/phong_hoc.php';
		$phonghoc = new PhongHoc($pdo);

		require_once '../hoc_ki/hoc_ki.php';
		$hocki = new HocKi($pdo);

		require_once '../mon_hoc/mon_hoc.php';
		$monhoc = new MonHoc($pdo);

		require_once '../bang_diem/bangdiem.php';
		$diem = new Diem($pdo);

		require_once '../chi_tiet_bang_diem/diemct.php';
		$diemct = new DiemCT($pdo);

		require_once '../thong_tin_sinh_vien/thongtinsv.php';
		$ttsv = new TTSV($pdo);

		require_once '../user/user.php';
		$user = new User($pdo);

		require_once '../lich_hoc/thoikhoabieu.php';
		$time = new Time($pdo);

		require_once '../hoc_phi/hoc_phi.php';
		$hocphi = new Hocphi($pdo);

	?>