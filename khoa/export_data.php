<?php
$title = 'Export';

//php_spreadsheet_export.php

include '../module/vendor/autoload.php';
include '../module/connect.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$query = "SELECT * FROM khoa ORDER BY ma_khoa DESC";

$statement = $pdo->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'Mã khoa');
  $active_sheet->setCellValue('B1', 'Tên khoa');
  $active_sheet->setCellValue('C1', 'Chủ nhiệm khoa');

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["ma_khoa"]);
    $active_sheet->setCellValue('B' . $count, $row["ten_khoa"]);
    $active_sheet->setCellValue('C' . $count, $row["chu_nhiem_khoa"]);

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
<?php require_once '../module/dautrang.php'; ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
                <div class="col-md-6">User Data</div>
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">Xlsx</option>
                    <option value="Xls">Xls</option>
                    <option value="Csv">Csv</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Export" />
                </div>
              </div>
            </form>
          </div>
        </div>
    	</div>
<?php require_once '../module/footer.php'; ?>