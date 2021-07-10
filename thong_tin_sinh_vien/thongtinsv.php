<?php 
	/**
	 * BẢNG THÔNG TIN SINH VIÊN
	 */
	class TTSV
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($masv, $ten, $lop, $diachi, $sdt, $email) {
			try {
					$sql = "INSERT INTO thong_tin_sinh_vien VALUES (:masv, :ten, :lop, :diachi, :sdt, :email)";
					$sql2 = "INSERT INTO tai_khoan VALUES (:user, :pass, :masv)";

					$stmt = $this->db->prepare($sql);
					$stmt2 = $this->db->prepare($sql2);

					$stmt->bindparam(':masv', $masv);
					$stmt->bindparam(':ten', $ten);
					$stmt->bindparam(':lop', $lop);
					$stmt->bindparam(':diachi', $diachi);
					$stmt->bindparam(':sdt', $sdt);
					$stmt->bindparam(':email', $email);
					$stmt->execute();

					$pass = md5($masv);
					$stmt2->bindparam(':user', $masv);
					$stmt2->bindparam(':pass', $pass);
					$stmt2->bindparam(':masv', $masv);
					$stmt2->execute();
					return true;
				
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function getUserbyUsername($user) {
			try {
				$sql = "SELECT count(*) as num FROM thong_tin_sinh_vien WHERE ma_sinh_vien = :user";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(':user', $user);
				$stmt->execute();
				$result = $stmt->fetch();
				return $return;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM thong_tin_sinh_vien tt INNER JOIN lop  l ON tt.ma_lop = l.ma_lop";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($masv) {
			try {
				$sql = "SELECT * FROM thong_tin_sinh_vien WHERE ma_sinh_vien = :masv";

				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":masv", $masv);
				$stmt->execute();
				$result = $stmt->fetch();
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function getLop() {
			$sql = "SELECT * FROM lop";
			$result = $this->db->query($sql);
			return $result;
		}

		public function update($masv, $ten, $lop, $diachi, $sdt, $email) {
			try {
				$sql = "UPDATE thong_tin_sinh_vien SET ten_sinh_vien = :ten, ma_lop = :lop, dia_chi = :diachi, so_dien_thoai = :sdt, email = :email WHERE ma_sinh_vien = :masv";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':masv', $masv);
				$stmt->bindparam(':ten', $ten);
				$stmt->bindparam(':lop', $lop);
				$stmt->bindparam(':diachi', $diachi);
				$stmt->bindparam(':sdt', $sdt);
				$stmt->bindparam(':email', $email);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($masv) {
			try {
				$sql = "DELETE FROM tai_khoan WHERE ma_sinh_vien = :masv";
				$sql2 = "DELETE FROM thong_tin_sinh_vien WHERE ma_sinh_vien = :masv";
				$stmt = $this->db->prepare($sql);
				$stmt2 = $this->db->prepare($sql2);
				$stmt->bindparam(":masv", $masv);
				$stmt2->bindparam(":masv", $masv);
				$stmt->execute();
				$stmt2->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete_all() {
			try {
				$sql = "DELETE FROM tai_khoan";
				$sql2 = "DELETE FROM thong_tin_sinh_vien";
				$stmt = $this->db->prepare($sql);
				$stmt2 = $this->db->prepare($sql2);
				$stmt->execute();
				$stmt2->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
		
	}
 ?>
