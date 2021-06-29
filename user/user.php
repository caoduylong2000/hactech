<?php 
	/**
	 * BẢNG TÀI KHOẢN USER
	 */
	class User
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($user, $pass, $masv) {
			try {
				$result = $this->getUserbyUsername($user);
				if ($result['num'] > 0) {
					return false;
				} else {
					$new_pass = md5($pass);
					$sql = "INSERT INTO tai_khoan VALUES (:user, :pass, :masv)";

					$stmt = $this->db->prepare($sql);

					$stmt->bindparam(':user', $user);
					$stmt->bindparam(':pass', $new_pass);
					$stmt->bindparam(':masv', $masv);

					$stmt->execute();
					return true;
				}
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function getUser($user, $pass) {
			try {
				$sql = "SELECT * FROM tai_khoan WHERE username = :username AND password = :password";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(':username', $user);
				$stmt->bindParam(':password', $pass);
				$stmt->execute();
				$result = $stmt->fetch();
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function getUserbyUsername($user) {
			try {
				$sql = "SELECT count(*) as num FROM tai_khoan WHERE username = :user";
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
				$sql = "SELECT * FROM tai_khoan u 
				INNER JOIN thong_tin_sinh_vien tt ON u.ma_sinh_vien = tt.ma_sinh_vien";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($masv) {
			try {
				$sql = "SELECT * FROM tai_khoan WHERE ma_sinh_vien = :masv";

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

		public function getTT() {
			$sql = "SELECT ma_sinh_vien FROM thong_tin_sinh_vien";
			$stmt = $this->db->query($sql);
			return $stmt;
		}

		public function update($pass, $masv) {
			try {
				$sql = "UPDATE tai_khoan SET password = :pass WHERE ma_sinh_vien = :masv";

				$stmt = $this->db->prepare($sql);
				$new_pass = md5($pass);
				$stmt->bindparam(':pass', $new_pass);
				$stmt->bindparam(':masv', $masv);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}
 ?>
