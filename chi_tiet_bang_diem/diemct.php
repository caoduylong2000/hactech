<?php 
	/**
	 * BẢNG ĐIỂM
	 */
	class DiemCT
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($stt, $masv, $tensv, $diem) {
			try {
				$sql = "INSERT INTO chi_tiet_bang_diem (stt, ma_sinh_vien, ten_sinh_vien, diem) VALUES (:stt, :masv, :tensv, :diem)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':stt', $stt);
				$stmt->bindparam(':masv', $masv);
				$stmt->bindparam(':tensv', $tensv);
				$stmt->bindparam(':diem', $diem);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
		
		public function getMasv() {
			$sql = "SELECT * FROM thong_tin_sinh_vien";
			$result = $this->db->query($sql);
			return $result;
		}

		public function view($id) {
			try {
				$sql = "SELECT * FROM chi_tiet_bang_diem WHERE ct_diem_id = :id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam('id', $id);
				$stmt->execute();
				return $stmt;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($stt) {
			try {
				$sql = "SELECT * FROM chi_tiet_bang_diem WHERE stt = :stt";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam('stt', $stt);
				$stmt->execute();

				return $stmt = $stmt->fetch();
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function update($stt, $masv, $tensv, $diem) {
			try {
				$sql = "UPDATE chi_tiet_bang_diem SET ma_sinh_vien = :masv, ten_sinh_vien = :tensv, diem = :diem WHERE stt = :stt";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam('stt', $stt);
				$stmt->bindparam('masv', $masv);
				$stmt->bindparam('tensv', $tensv);
				$stmt->bindparam('diem', $diem);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($stt) {
			try {
				$sql = "DELETE FROM chi_tiet_bang_diem WHERE stt = :stt";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam('stt', $stt);
				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}
 ?>
