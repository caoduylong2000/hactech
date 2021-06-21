<?php 
	/**
	 * BẢNG KHOA
	 */
	class Khoa
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($ma, $ten, $gv) {
			try {
				$sql = "INSERT INTO khoa VALUES (:ma, :ten, :gv)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':ten', $ten);
				$stmt->bindparam(':gv', $gv);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM khoa";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM khoa WHERE ma_khoa = :ma";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":ma", $id);
				$stmt->execute();
				$result = $stmt->fetch();
				return $result;	
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function listNganh($id){
			try {
				$sql = "SELECT * FROM chuyen_nganh n LEFT JOIN khoa k ON n.ma_khoa = k.ma_khoa
				WHERE k.ma_khoa = :id" ;
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":id", $id);
				$stmt->execute();
				return $stmt;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function update($ma, $ten, $gv) {
			try {
				$sql = "UPDATE khoa SET ten_khoa = :ten, chu_nhiem_khoa = :gv WHERE ma_khoa = :ma";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':ten', $ten);
				$stmt->bindparam(':gv', $gv);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($ma) {
			try {
				$sql = "DELETE FROM khoa WHERE ma_khoa = :ma";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":ma", $ma);
				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}
 ?>
