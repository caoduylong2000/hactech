<?php 
	/**
	 * BẢNG ĐIỂM
	 */
	class Diem
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($mon, $lop, $gv, $hocki) {
			try {
				$sql = "INSERT INTO bang_diem VALUES (:mon, :lop, :gv, :hocki)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':mon', $mon);
				$stmt->bindparam(':lop', $lop);
				$stmt->bindparam(':gv', $gv);
				$stmt->bindparam(':hocki', $hocki);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM bang_diem d 
				INNER JOIN mon_hoc m ON d.ma_mon = m.ma_mon 
				INNER JOIN lop l ON d.ma_lop = l.ma_lop
				INNER JOIN hoc_ki h ON d.hoc_ki_id = h.hoc_ki_id";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM bang_diem d 
				INNER JOIN mon_hoc m ON d.ma_mon = m.ma_mon 
				INNER JOIN lop l ON d.ma_lop = l.ma_lop
				INNER JOIN hoc_ki h ON d.hoc_ki = h.hoc_ki_id WHERE bang_diem_id = :id";

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

		public function getHocki() {
			$sql = "SELECT * FROM hoc_ki";
			$result = $this->db->query($sql);
			return $result;
		}

		public function getMonhoc() {
			$sql = "SELECT * FROM mon_hoc";
			$result = $this->db->query($sql);
			return $result;
		}

		public function getLop() {
			$sql = "SELECT * FROM lop";
			$result = $this->db->query($sql);
			return $result;
		}

		public function update($id, $mon, $lop, $gv, $hocki) {
			try {
				$sql = "UPDATE bang_diem SET ma_mon = :mon, ma_lop = :lop, gvpt = :gv, hoc_ki_id = :hocki WHERE bang_diem_id = :id";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':id', $id);
				$stmt->bindparam(':mon', $mon);
				$stmt->bindparam(':lop', $lop);
				$stmt->bindparam(':gv', $gv);
				$stmt->bindparam(':hocki', $hocki);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($id) {
			try {
				$sql = "DELETE FROM bang_diem WHERE bang_diem_id = :id";
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
