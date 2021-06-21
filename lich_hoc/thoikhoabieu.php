<?php 
	/**
	 * BẢNG LỊCH HỌC
	 */
	class Time
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($lop, $mon, $gv, $phong, $batdau, $ketthuc, $ngay) {
			try {
				$sql = "INSERT INTO lich_hoc VALUES (:lop, :mon, :gv, :phong, :batdau, :ketthuc, :ngay)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':id', $id);
				$stmt->bindparam(':lop', $lop);
				$stmt->bindparam(':mon', $mon);
				$stmt->bindparam(':gv', $gv);
				$stmt->bindparam(':phong', $phong);
				$stmt->bindparam(':batdau', $batdau);
				$stmt->bindparam(':ketthuc', $ketthuc);
				$stmt->bindparam(':ngay', $ngay);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
					$sql = "SELECT * FROM lich_hoc lh 
				INNER JOIN phong_hoc ph ON lh.phong_hoc = ph.ma_phong
				INNER JOIN mon_hoc mh ON lh.ma_mon = mh.ma_mon 
				INNER JOIN lop l ON lh.ma_lop = l.ma_lop";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}		

		public function details($id) {
			try {
				$sql = "SELECT * FROM lich_hoc WHERE lich_hoc_id = :id";
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
		
		public function getLop() {
			try {
				$sql = "SELECT * FROM lop";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function getMon() {
			try {
				$sql = "SELECT * FROM mon_hoc";
				$result = $this->db->query($sql);
				return $result;		
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function getPhong() {
			try {
				$sql = "SELECT * FROM phong_hoc";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function update($id, $lop, $mon, $gv, $phong, $batdau, $ketthuc, $ngay) {
			try {
				$sql = "UPDATE lich_hoc SET ma_lop = :lop, ma_mon = :mon, gvpt =  :gv, phong_hoc = :phong, bat_dau = :batdau, ket_thuc = :ketthuc, thoi_gian = :ngay WHERE lich_hoc_id = :id";
				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':id', $id);
				$stmt->bindparam(':lop', $lop);
				$stmt->bindparam(':mon', $mon);
				$stmt->bindparam(':gv', $gv);
				$stmt->bindparam(':phong', $phong);
				$stmt->bindparam(':batdau', $batdau);
				$stmt->bindparam(':ketthuc', $ketthuc);
				$stmt->bindparam(':ngay', $ngay);

				$stmt->execute();
				return true;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($id) {
			try {
				$sql = "DELETE FROM lich_hoc WHERE lich_hoc_id = :id";
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
