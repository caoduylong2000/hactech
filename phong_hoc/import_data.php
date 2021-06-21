<?php
$title = 'Import Data';
require_once '../module/connect.php'; 
require_once '../module/dautrang.php'; 
require_once '../Classes/PHPExcel.php'; 
?>
	<a href="../document/template/phonghoc.xlsx" class="btn">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		Tải mẫu Excel
	</a>
	<hr>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
			$fileName = $_FILES['import_file']['name'];

			$upload = move_uploaded_file($_FILES['import_file']['tmp_name'], '../document/import/'.$fileName);
			if (!empty($upload)) {
				$file = '../document/import/'.$fileName;

				$objFile = PHPExcel_IOFactory::identify($file);
				$objData = PHPExcel_IOFactory::createReader($objFile);

				$objData->setReadDataOnly(true);

				$sheet = $objPHPExcel->setActiveSheetIndex();

				$totalRow = $sheet->getHighestRow();
				$lastColumn = $sheet->getHighestColumn();
				$totalCol = PHPExcel_Cell::columnIndexFromString($lastColumn);

				$data = [];

				for ($i=2; $i < $totalRow; $i++) { 
					for ($j=0; $j < $totalCol; $j++) { 
						$data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
					}
				}
				unlink($file);
			}
		}
	?>
	<form method="POST" enctype="multipart/form-data">
		<div>
			<label for="">Chọn file import</label><br>
			<input type="file" name="import_file" required>
		</div>
		<button type="submit" class="btn">Import</button>
	</form>
<?php require_once '../module/footer.php';  ?>