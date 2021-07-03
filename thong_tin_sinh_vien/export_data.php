<?php $title = 'Export'; ?>
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

//php_spreadsheet_export.php

include '../module/vendor/autoload.php';
include '../module/connect.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$query = "SELECT * FROM thong_tin_sinh_vien ";

$statement = $pdo->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'Mã sinh viên');
  $active_sheet->setCellValue('B1', 'Tên sinh viên');
  $active_sheet->setCellValue('C1', 'Lớp');
  $active_sheet->setCellValue('D1', 'Địa chỉ');
  $active_sheet->setCellValue('E1', 'Số điện thoại');
  $active_sheet->setCellValue('F1', 'email');

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["ma_sinh_vien"]);
    $active_sheet->setCellValue('B' . $count, $row["ten_sinh_vien"]);
    $active_sheet->setCellValue('C' . $count, $row["ma_lop"]);
    $active_sheet->setCellValue('D' . $count, $row["dia_chi"]);
    $active_sheet->setCellValue('E' . $count, $row["so_dien_thoai"]);
    $active_sheet->setCellValue('F' . $count, $row["email"]);

    $count = $count + 1;
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