<?php 
  $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          $fname = $filesop[0];
          $lname = $filesop[1];
          $sql = "insert into thong_tin_sinh_vien(các trường) values ('$biến')";
          $stmt = mysqli_prepare($conn,$sql);
          mysqli_stmt_execute($stmt);

         $c = $c + 1;
           }

            if($sql){
               echo "sucess";
             } 
     else
     {
            echo "Sorry! Unable to impo.";
          }

} ?>