<?php 
	/**
	 * BẢNG KHÓA HỌC
	 */
	class KhoaHoc
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($khoa, $bat_dau, $ket_thuc) {
			try {
				$sql = "INSERT INTO khoa_hoc(ma_khoa_hoc, bat_dau, ket_thuc) VALUES (:khoa, :bat_dau, :ket_thuc)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':khoa', $khoa);
				$stmt->bindparam(':bat_dau', $bat_dau);
				$stmt->bindparam(':ket_thuc', $ket_thuc);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM khoa_hoc";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM khoa_hoc WHERE khoa_hoc_id = :id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":id", $id);
				$stmt->execute();
				$result = $stmt->fetch();
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function update($id, $khoa, $bat_dau, $ket_thuc) {
			try {
				$sql = "UPDATE khoa_hoc SET ma_khoa_hoc = :khoa, bat_dau = :bat_dau, ket_thuc = :ket_thuc WHERE khoa_hoc_id = :id";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':id', $id);
				$stmt->bindparam(':khoa', $khoa);
				$stmt->bindparam(':bat_dau', $bat_dau);
				$stmt->bindparam(':ket_thuc', $ket_thuc);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($id) {
			try {
				$sql = "DELETE FROM khoa_hoc WHERE khoa_hoc_id = :id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":id", $id);
				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}
 ?>
