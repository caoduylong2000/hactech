
<?php require_once '../module/dautrang.php'; ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
               <div class="row100">
                <div class="col">Chọn địng dạng file</div>
                <div class="col">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">Xlsx</option>
                    <option value="Xls">Xls</option>
                    <option value="Csv">Csv</option>
                  </select>
                </div>
                <div class="col">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Export" />
                </div>
              </div>
            </form>
          </div>
        </div>
    	</div>
<?php require_once '../module/footer.php'; ?>
<?php
$title = 'Export';

//php_spreadsheet_export.php

include '../module/vendor/autoload.php';
include '../module/connect.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (isset($_GET['id'])) {
    $id = $_GET['id'];  
}

$query = "SELECT * FROM chi_tiet_bang_diem WHERE ct_diem_id = :id";

$statement = $pdo->prepare($query);
$statement->bindparam(":id", $id);
$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'id');
  $active_sheet->setCellValue('B1', 'Mã sinh viên');
  $active_sheet->setCellValue('C1', 'Tên sinh viên');
  $active_sheet->setCellValue('D1', 'Điểm');


  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["id"]);
    $active_sheet->setCellValue('B' . $count, $row["ma_sinh_vien"]);
    $active_sheet->setCellValue('C' . $count, $row["ten_sinh_vien"]);
    $active_sheet->setCellValue('D' . $count, $row["diem"]);


    $count++;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

}

?>