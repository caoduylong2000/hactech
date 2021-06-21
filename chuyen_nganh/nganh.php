<?php 
	/**
	 * BẢNG NGÀNH
	 */
	class Nganh
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($ma, $name, $khoa) {
			try {
				$sql = "INSERT INTO chuyen_nganh VALUES (:ma, :name, :khoa)";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':name', $name);
				$stmt->bindparam(':khoa', $khoa);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM chuyen_nganh c INNER JOIN khoa k on c.ma_khoa = k.ma_khoa";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}

		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM chuyen_nganh c INNER JOIN khoa k on c.ma_khoa = k.ma_khoa WHERE c.ma_nganh = :ma";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':ma', $id);
				$stmt->execute();
				$result = $stmt->fetch();
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
			
		}

		public function getKhoa() {
			$sql = "SELECT * FROM khoa";
			$result = $this->db->query($sql);
			return $result;
		}

		public function listLop($id){
			try {
				$sql = "SELECT * FROM lop l LEFT JOIN chuyen_nganh cn ON l.ma_nganh = cn.ma_nganh
				WHERE cn.ma_nganh = :id" ;
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":id", $id);
				$stmt->execute();
				return $stmt;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function update($ma, $name, $khoa) {
			try {
				$sql = "UPDATE chuyen_nganh SET ten_nganh = :name, ma_khoa = :khoa WHERE ma_nganh = :ma";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':name', $name);
				$stmt->bindparam(':khoa', $khoa);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($ma) {
			try {
				$sql = "DELETE FROM chuyen_nganh WHERE ma_nganh = :ma";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':ma', $ma);
				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}


	}
 ?>
