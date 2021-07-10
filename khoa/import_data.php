<?php $title = 'Import';
require_once '../module/dautrang.php'; ?>
          <div class="panel-body">
            <div class="table-responsive">
              <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <a href="../document/template/khoa.xlsx" download="Mẫu import Danh sách khoa" class="btn btn-primary">Download Form</a>
                <table class="table">
                  <tr>
                    <td width="25%" align="right">Select Excel File</td>
                    <td width="50%"><input type="file" name="import_excel" /></td>
                    <td width="25%"><input type="submit" name="import" id="import"  value="Import" /></td>
                  </tr>
                  <tr>* Quá trình nhập liệu có thể mất vài phút, yêu cầu không rời khỏi trang cho đến khi quá trình hoàn tất </tr>
                </table>
              </form>
              <br />
            </div>
          </div>
        </div>
      </div>
<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>
<?php require_once '../module/footer.php'; ?>