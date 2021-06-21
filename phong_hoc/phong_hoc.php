<?php 
	/**
	 * BẢNG PHÒNG HỌC
	 */
	class PhongHoc
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($ma, $mota) {
			try {
				$sql = "INSERT INTO phong_hoc VALUES (:ma, :mota)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':mota', $mota);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM phong_hoc";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM phong_hoc WHERE ma_phong = :id" ;
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

		public function update($ma, $mota) {
			try {
				$sql = "UPDATE phong_hoc SET mo_ta = :mota WHERE ma_phong = :ma";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':mota', $mota);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($id) {
			try {
				$sql = "DELETE FROM phong_hoc WHERE ma_phong = :id";
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
