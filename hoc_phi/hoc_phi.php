<?php 
	/**
	 * BẢNG HỌC PHÍ
	 */
	class Hocphi
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($ma, $hocki, $sotien, $ngaydong) {
			try {
				$sql = "INSERT INTO hoc_phi VALUES (:masv, :hocki, :sotien, :ngaydong)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':masv', $masv);
				$stmt->bindparam(':hocki', $hocki);
				$stmt->bindparam(':sotien', $sotien);
				$stmt->bindparam(':ngaydong', $ngaydong);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM hoc_phi";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM hoc_phi WHERE hoc_phi_id = :id";
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

		public function update($ma, $hocki, $sotien, $ngaydong, $id) {
			try {
				$sql = "UPDATE hoc_phi SET ma_sinh_vien = :ma, hoc_ki = :hocki, so_tien = :sotien, ngay_dong = :ngaydong WHERE hoc_phi_id = :id";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':hocki', $hocki);
				$stmt->bindparam(':sotien', $sotien);
				$stmt->bindparam(':ngaydong', $ngaydong);
				$stmt->bindparam(':id', $id);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($ma) {
			try {
				$sql = "DELETE FROM hoc_phi WHERE hoc_phi_id = :id";
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
