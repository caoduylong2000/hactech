<?php 
	/**
	 * BẢNG HỌC KÌ
	 */
	class HocKi
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($hk, $khoa_hoc, $date_start, $date_end) {
			try {
				$sql = "INSERT INTO hoc_ki VALUES (:hk, :khoa_hoc, :date_start, :date_end )";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':hk', $hk);
				$stmt->bindparam(':khoa_hoc', $khoa_hoc);
				$stmt->bindparam(':date_start', $date_start);
				$stmt->bindparam(':date_end', $date_end);
				
				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM hoc_ki";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM hoc_ki WHERE hoc_ki_id = :id";
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
		public function getKhoahoc() {
			$sql = "SELECT * FROM khoa_hoc";
			$result = $this->db->query($sql);
			return $result;
		}


		public function update($id, $hk, $dt_start, $dt_end, $khoahoc) {
			try {
				$sql = "UPDATE hoc_ki SET ma_hoc_ki = :hk, bat_dau = :dt_start, ket_thuc = :dt_end, khoa_hoc = :khoahoc WHERE hoc_ki_id = :id";
				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':id', $id);
				$stmt->bindparam(':hk', $hk);
				$stmt->bindparam(':dt_start', $dt_start);
				$stmt->bindparam(':dt_end', $dt_end);
				$stmt->bindparam(':khoahoc', $khoahoc);

				$stmt->execute();
				return true;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($id) {
			try {
				$sql = "DELETE FROM hoc_ki WHERE hoc_ki_id = :id";
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
