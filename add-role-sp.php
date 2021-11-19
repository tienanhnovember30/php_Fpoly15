

<?php include'header-admin.php'?>
   
     

     
        <?php  echo "<div class='box-form'>";?>
        
<?php
define("APP_PATH", __DIR__);
define('BASE_URL', '/assignment_web2041/assm/atshop');

$stmt= $objConn->prepare("SELECT * FROM loai_sp");

$stmt->execute();
$arrt = $stmt->fetchAll();



// http://localhost:8074        /SU2020/PT15315-WEB/demo-upload           /demo.php
//print_r ($_FILES);

// xử lý upload file
if(isset ($_FILES['anh'])  ){
    $anh = $_FILES['anh'];
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
    $ten_sp = $_POST['ten_sp'];
    $so_luong = $_POST['so_luong'];
    $gia = $_POST['gia'];
    $size = $_POST['size'];
    $mau_sac = $_POST['mau_sac'];
    $trang_thai = $_POST['trang_thai'];
    $iddanhmuc = $_POST['iddanhmuc'];
    $noi_dung = $_POST['noi_dung'];

    // kiểm tra
    if(strlen($ten_sp)>30){
        $err[] = "Bạn cần nhập Name dưới 30 ký tự";
    }
    if(empty($ten_sp)){
        $err[] = "Bạn chưa nhập họ tên";
    }


    if(empty($err)){
        // không có lỗi nhập sai dữ liệu
        // ghi vào csdl
       
        try{
            $stmt = $objConn->prepare("INSERT INTO san_pham(ten_sp,so_luong,gia,anh,size,mau_sac,noi_dung,iddanhmuc,trang_thai) 
            VALUES(:ten_sp,:so_luong,:gia,:anh,:size,:mau_sac ,:noi_dung,:iddanhmuc,:trang_thai)");
            // gắn dữ liệu vào tham số
           
            $stmt->bindParam(":ten_sp",$ten_sp);
            $stmt->bindParam(":so_luong",$so_luong);
            $stmt->bindParam(":gia",$gia);
            $stmt->bindParam(":anh",$file_save);
            $stmt->bindParam(":size",$size);
            $stmt->bindParam(":mau_sac",$mau_sac);
            $stmt->bindParam(":noi_dung",$noi_dung);
            $stmt->bindParam(":trang_thai",$trang_thai);
            $stmt->bindParam(":iddanhmuc",$iddanhmuc);
        
     

            // thực thi câu lệnh
             $stmt->execute();
           

           // @header("location:list-user-sp.php");
           
           header("Location:list-user-sp.php");

        }catch(PDOException $e){
            $err[] = "Loi truy van CSDL : ". $e->getMessage();
        }
 
    } 
} 


?>




<h1>Thêm Sản phẩm</h1>

<p style='color:red'> <?php echo implode('<br>',$err ); ?> </p>


<form action="" method="post" enctype="multipart/form-data">
   
<h6 class="p-form-admin"> Tên sản phẩm </h6>  <input class="input-admin"   type="text" name="ten_sp" placeholder="tên sản phẩm" > 
 <h6 class="p-form-admin"> Số lượng </h6>  <input class="input-admin"  type="text" name="so_luong"  placeholder="số lương sản phẩm"> 
 <h6 class="p-form-admin"> Giá    </h6>   <input class="input-admin"  type="text" name="gia"  placeholder="giá sản phẩm"> 
 <h6 class="p-form-admin"> ảnh    </h6>   <input class="input-admin"  type="file" name="anh" placeholder="thêm ảnh"> 
 <h6 class="p-form-admin">kích cỡ   </h6>    <input class="input-admin"  type="text" name="size" placeholder="size sản phẩm"  >
 <h6  class="p-form-admin"> màu sắc   </h6>   <input class="input-admin"     type="text" name="mau_sac" placeholder="màu sắc sản phẩm" > 
 <h6 class="p-form-admin"> Nội dung sản phẩm    </h6>  <textarea  cols="40" rows="6" class="input-admin" required name="noi_dung"  > 

</textarea> 
 <h6 class="p-form-admin"> Loại sản phẩm  </h6> <select name="iddanhmuc" class="input-admin"  id=""> 

    <?php 
    foreach($arrt as $row){
        echo "<option  value='{$row['iddanhmuc']}'>{$row['ten_loai']} </option>";
    }  ?>
    
</select> 


  
    
    <h6 class="p-form-admin">Tình trạng </h6> 
    <select name="trang_thai" id="">


    <option value="còn hàng">còn hàng</option>
    <option value="hết hàng">hết hàng</option>
    </select>
    
    
    <br>
    <button class="aa" name="btnSave"  style="margin-top: 30px;" >Lưu Sản phẩm mới</button>  <span><a href="list-user-sp.php">Back</a></span>
</form>
  
    


        <?php  echo "</div>";?>
        


        
    </div><!-- /#right-panel -->
    
    <!-- Right Panel -->

    <?php include'footer-admin.php'?>