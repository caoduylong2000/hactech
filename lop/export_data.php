<?php

//php_spreadsheet_export.php

include '../module/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=hactech", "root", "");


if (isset($_GET['id'])) {

  $query = "SELECT * FROM thong_tin_sinh_vien WHERE ma_lop = '".$_GET['id']."'"; 


  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  if(isset($_POST["export"]))
  {
    $file = new Spreadsheet();

    $active_sheet = $file->getActiveSheet();

    $active_sheet->setCellValue('A1', 'Mã Sinh viên');
    $active_sheet->setCellValue('B1', 'Tên Sinh Viên');
    $active_sheet->setCellValue('C1', 'Mã lớp');
    $active_sheet->setCellValue('D1', 'Địa chỉ');
    $active_sheet->setCellValue('E1', 'Số điện thoại');
    $active_sheet->setCellValue('F1', 'E-mail');

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
} else {
  $query = "SELECT * FROM lop"; 

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  if(isset($_POST["export"]))
  {
    $file = new Spreadsheet();

    $active_sheet = $file->getActiveSheet();

    $active_sheet->setCellValue('A1', 'Mã lớp');
    $active_sheet->setCellValue('B1', 'Tên lớp');
    $active_sheet->setCellValue('C1', 'Mã ngành');
    $active_sheet->setCellValue('D1', 'Giáo viên chủ nhiệm');
    $active_sheet->setCellValue('E1', 'Khóa học');

    $count = 2;

    foreach($result as $row) {
      $active_sheet->setCellValue('A' . $count, $row["ma_lop"]);
      $active_sheet->setCellValue('B' . $count, $row["ten_lop"]);
      $active_sheet->setCellValue('C' . $count, $row["ma_nganh"]);
      $active_sheet->setCellValue('D' . $count, $row["gvcn"]);
      $active_sheet->setCellValue('E' . $count, $row["khoa_hoc"]);

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