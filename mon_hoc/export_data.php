<?php

//php_spreadsheet_export.php

include '../module/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=hactech", "root", "");


$query = "SELECT * FROM mon_hoc";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'Mã môn');
  $active_sheet->setCellValue('B1', 'Tên môn');
  $active_sheet->setCellValue('C1', 'Chuyên ngành');
  $active_sheet->setCellValue('D1', 'Học kì');

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["ma_mon"]);
    $active_sheet->setCellValue('B' . $count, $row["ten_mon"]);
    $active_sheet->setCellValue('C' . $count, $row["ma_nganh"]);
    $active_sheet->setCellValue('D' . $count, $row["hoc_ki"]);

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
<?php require_once '../module/dautrang.php'; ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row100">
                <div class="col">Chọn định dạng file</div>
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
          <div class="panel-body">
          <div class="table-responsive">
          </div>
          </div>
        </div>
    <?php require_once '../module/footer.php'; ?>