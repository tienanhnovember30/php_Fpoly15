<?php include'header-admin.php'?>


        <?php echo "<div class='box-form'>"; ?>

<?php
define("APP_PATH", __DIR__);
define('BASE_URL', '/assignment_web2041/assm/atshop');





// http://localhost:8074        /SU2020/PT15315-WEB/demo-upload           /demo.php
if(isset ($_FILES['anh_tt'])  ){
    $anh = $_FILES['anh_tt'];
    // kiểm tra định dạng file ảnh:
    $arr_allow_type =['image/png','image/jpeg','image/gif','image/bmp'];
    
    if(in_array(  $anh['type'],$arr_allow_type)){
       // file hợp lệ
       $file_save = '/anh/' .$anh['name'];
    
       $file_full_path = APP_PATH. $file_save;
       $url_image = BASE_URL.$file_save;
    
    //   echo "<br>file_full_path:   $file_full_path   <br>url_image:   $url_image <br>";
    
       if(move_uploaded_file(  $anh['tmp_name'], $file_full_path   )){
           // upload thành công
     //      echo "<br>Upload thành công! <br>";
          // echo "<img src='$url_image' width='200' />"; 
    
           // lưu chuỗi trong biến $file_save vào bảng csdl. Sau này khi hiển thị lên cần nối chuỗi
           // với BASE_URL để tạo thành link cho ảnh.
           // $url_image = BASE_URL.$file_save;
    
       }else{
           echo '<br>lỗi lưu file vào thư mục upload.';
       }
    }else{
       echo "<b>File upload phải là file ảnh dạng: png, jpg, gif, bmp </b>";
    }
    }
?>
   
<?php

$err =[];

if(isset($_POST['btnSave'])){
    
$dia_chi = $_POST['dia_chi'];
$email_tt = $_POST['email_tt'];
$phone = $_POST['phone'];
$giay_phep = $_POST['giay_phep'];

// kiểm tra



if(empty($err)){
   // không có lỗi nhập sai dữ liệu
   // ghi vào csdl
  
   try{
       $stmt = $objConn->prepare("INSERT INTO thong_tin(anh_tt,dia_chi,email_tt,phone,giay_phep)VALUES(:anh_tt,:dia_chi,:email_tt,:phone,:giay_phep)");
       // gắn dữ liệu vào tham số
       
       $stmt->bindParam(':anh_tt',$file_save);
       $stmt->bindParam(":dia_chi",$dia_chi);
       
     
       
        $stmt->bindParam(":email_tt",$email_tt);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":giay_phep",$giay_phep);



       // thực thi câu lệnh
        $stmt->execute();
      

      // @header("location:list-user-sp.php");
      

      header("Location:setting.php");

   }catch(PDOException $e){
       $err[] = "Loi truy van CSDL : ". $e->getMessage();
   }

} 
} 


?>

        <h1>Cập Nhật Thông tin website</h1>

        <p style='color:red'> <?php echo implode('<br>', $err); ?> </p>

        <form action="" method="post" enctype="multipart/form-data">

            <h6 class="p-form-admin">Logo  </h6> <input type="file" name="anh_tt" id="" required>  
            <h6 class="p-form-admin"> Địa chỉ  </h6> <input class="input-admin" type="text" name="dia_chi" required> 
            <h6 class="p-form-admin"> email  </h6> <input class="input-admin" type="text" name="email_tt"  required> 
            <h6 class="p-form-admin"> Số điện thoại  </h6> <input class="input-admin" type="number" name="phone" required> 
            <h6 class="p-form-admin"> Giấy phép  </h6> <input class="input-admin"type="text" name="giay_phep" required > 
          
     
           
            <button name="btnSave" class="aa" style="margin-top: 20px;">Cập nhật mới</button> <a href="setting.php"> danh sách</a>
        </form>
        <?php echo "</div>"; ?>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php include'footer-admin.php'?>