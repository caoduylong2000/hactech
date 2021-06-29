<?php 
	/**
	 * BẢNG LỚP
	 */
	class Lop
	{
		private $db;
		function __construct($conn)
		{
			$this->db = $conn;
		}

		public function insert($ma, $ten, $nganh, $gv, $khoahoc) {
			try {
				$sql = "INSERT INTO lop (ma_lop, ten_lop, ma_nganh, gvcn, khoa_hoc) VALUES (:ma, :ten, :nganh, :gv, :khoahoc)";

				$stmt = $this->db->prepare($sql);
				
				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':ten', $ten);
				$stmt->bindparam(':nganh', $nganh);
				$stmt->bindparam(':gv', $gv);
				$stmt->bindparam(':khoahoc', $khoahoc);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function view() {
			try {
				$sql = "SELECT * FROM lop l INNER JOIN chuyen_nganh c on l.ma_nganh = c.ma_nganh";
				$result = $this->db->query($sql);
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function details($id) {
			try {
				$sql = "SELECT * FROM lop l INNER JOIN chuyen_nganh c ON l.ma_nganh = c.ma_nganh WHERE l.lop_id = :id" ;
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

		public function getSoSV($lop){
			try {
				$sql = "SELECT COUNT(ma_sinh_vien) FROM thong_tin_sinh_vien tt INNER JOIN lop l ON tt.ma_lop = l.ma_lop WHERE l.ma_lop = :ma_lop " ;
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":ma_lop", $lop);
				$stmt->execute();
				$result = $stmt->fetch();
				return $result;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function listSV($id){
			try {
				$sql = "SELECT * FROM thong_tin_sinh_vien tt LEFT JOIN lop l ON tt.ma_lop = l.ma_lop
				WHERE lop_id = :id" ;
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(":id", $id);
				$stmt->execute();
				return $stmt;
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

		public function getKhoahoc() {
			$sql = "SELECT * FROM khoa_hoc";
			$result = $this->db->query($sql);
			return $result;
		}

		public function update($id, $ma, $ten, $nganh, $gv, $khoahoc) {
			try {
				$sql = "UPDATE lop SET ma_lop = :ma, ten_lop = :ten, ma_nganh = :nganh, gvcn = :gv,  khoa_hoc = :khoahoc WHERE lop_id = :id";

				$stmt = $this->db->prepare($sql);

				$stmt->bindparam(':id', $id);
				$stmt->bindparam(':ma', $ma);
				$stmt->bindparam(':ten', $ten);
				$stmt->bindparam(':nganh', $nganh);
				$stmt->bindparam(':gv', $gv);
				
				$stmt->bindparam(':khoahoc', $khoahoc);

				$stmt->execute();
				return true;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($id) {
			try {
				$sql = "DELETE FROM lop WHERE lop_id = :id";
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
