

<?php include'header-admin.php'?>
   
     

     
   <?php  echo "<div class='box-form'>";?>
   
<?php
define("APP_PATH", __DIR__);
define('BASE_URL', '/assignment_web2041/assm/atshop');





// http://localhost:8074        /SU2020/PT15315-WEB/demo-upload           /demo.php

//print_r ($_FILES);

// xử lý upload file
if(isset ($_FILES['anh_slide'])  ){
$anh = $_FILES['anh_slide'];
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
$name_slide = $_POST['name_slide'];
$link_slide = $_POST['link_slide'];

// kiểm tra



if(empty($err)){
   // không có lỗi nhập sai dữ liệu
   // ghi vào csdl
  
   try{
       $stmt = $objConn->prepare("INSERT INTO slide(name_slide,anh_slide,link_slide) 
       VALUES(:name_slide,:anh_slide,:link_slide)");
       // gắn dữ liệu vào tham số
      
       $stmt->bindParam(":name_slide",$name_slide);
       
      
       $stmt->bindParam(":anh_slide",$file_save);
       
    $stmt->bindParam(":link_slide",$link_slide);


       // thực thi câu lệnh
        $stmt->execute();
      

      // @header("location:list-user-sp.php");
      

      header("Location:slider.php");

   }catch(PDOException $e){
       $err[] = "Loi truy van CSDL : ". $e->getMessage();
   }

} 
} 


?>




<h1>Thêm Slider Show</h1>

<p style='color:red'> <?php echo implode('<br>',$err ); ?> </p>


<form action="" method="post" enctype="multipart/form-data">

<h6 class="p-form-admin"> Kí Hiệu Slide Show </h6>  <input placeholder="tên slide" class="input-admin"  type="text" name="name_slide" required >

<h6 class="p-form-admin"> Ảnh </h6>  <input class="input-admin"  type="file" name="anh_slide" required>  


<h6 class="p-form-admin"> Ghi chú   </h6>  <input class="input-admin" placeholder="đường dẫn"  type="text" name="link_slide" required > 


<button name="btnSave" class="aa" style="margin-top: 20px;" >Lưu Slider mới</button>  <span><a href="slider.php">Back</a></span>
</form>




   <?php  echo "</div>";?>
   


   
</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include'footer-admin.php'?>