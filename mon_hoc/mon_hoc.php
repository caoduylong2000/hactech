<?php 
	/**
	 * BẢNG MÔN HOC
	 */
	class MonHoc
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($ma, $name, $nganh, $hocki) {
			try {
				$sql = "INSERT INTO mon_hoc VALUES (:ma, :name, :nganh, :hocki)";
				
				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':name', $name);
				$stmt->bindparam(':nganh', $nganh);
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
				$sql = "SELECT * FROM mon_hoc m INNER JOIN chuyen_nganh c ON m.ma_nganh = c.ma_nganh";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM mon_hoc m INNER JOIN chuyen_nganh c ON m.ma_nganh = c.ma_nganh WHERE m.mon_hoc_id = :id";
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

		public function getNganh() {
			$sql = "SELECT * FROM chuyen_nganh";
			$result = $this->db->query($sql);
			return $result;
		}

		public function getHocki() {
			$sql = "SELECT * FROM hoc_ki";
			$result = $this->db->query($sql);
			return $result;
		}

		public function update($id, $ma, $name, $nganh, $hocki) {
			try {
				$sql = "UPDATE mon_hoc SET ma_mon = :ma, ten_mon = :name, ma_nganh = :nganh, hoc_ki = :hocki WHERE mon_hoc_id = :id";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':id', $id);
				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':name', $name);
				$stmt->bindparam(':nganh', $nganh);
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
				$sql = "DELETE FROM mon_hoc WHERE mon_hoc_id = :id";
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

