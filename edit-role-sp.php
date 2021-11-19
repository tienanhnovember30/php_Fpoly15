<?php include'header-admin.php'?>


        <?php echo "<div class='box-form'>"; ?>

        <?php

        //1. lấy dữ liệu đưa lên form cho người dùng sửa
        //2. lấy dữ liệu người dùng post từ form và kiểm tra hợp lệ
        //3. lưu vào CSDL
               
        define("APP_PATH", __DIR__);
        define('BASE_URL', '/assignment_web2041/assm/atshop');
        

        @$url_image = BASE_URL.$file_save;
      
       

        $id = intval($_GET['id']);
        $stmt = $objConn->prepare("SELECT * FROM loai_sp");

        $stmt->execute();
        $arrt = $stmt->fetchAll();
        $arrtt = $stmt->fetch();



        try {
            $stmt = $objConn->prepare("SELECT * FROM san_pham  WHERE ma_sp = $id ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $row = $stmt->fetch();

            
        } catch (PDOException $e) {
            echo "<br>Loi truy van22222 CSDL: " . $e->getMessage();
        }
        
        //=== làm chứ năng sửa

       
     
            if(isset ($_FILES['anh'])){
                $anh = $_FILES['anh'];
               
                $arr_allow_type =['image/png','image/jpeg','image/gif','image/bmp'];
            
                if(in_array(  $anh['type'],$arr_allow_type)){
                    // file hợp lệ
                    $file_save = '/anh/' .$anh['name'];
            
                    $file_full_path = APP_PATH. $file_save;
                    $url_image = BASE_URL.$file_save;
                    if(move_uploaded_file(  $anh['tmp_name'], $file_full_path   )){
                    }else{
                        echo '<br>lỗi lưu file vào thư mục upload.';
                    }
                    }else{
                    echo "<b>File upload phải là file ảnh dạng: png, jpg, gif, bmp </b>";
                     }
            }

               
            
      
    
        $err = [];
        if (isset($_POST['btnSave'])) {
            
            $ten_sp = $_POST['ten_sp'];
            $so_luong = $_POST['so_luong'];
            $gia = $_POST['gia'];
            $iddanhmuc = $_POST['iddanhmuc'];
            $size = $_POST['size'];
            $mau_sac = $_POST['mau_sac'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];

if(isset($file_save)){
    
}else{
    $file_save = $row['anh'];
}

            // kiểm tra
            if (empty($ten_sp)) {
                $err[] = "Bạn chưa nhập tên sản phẩm!";
            } else
            if (empty($so_luong)) {
                $err[] = "Bạn chưa nhập Số lượng sản phẩm!";
            } else
            if (empty($gia)) {
                $err[] = "Bạn chưa nhập giá!";
            } else
            if (empty($size)) {
                $err[] = "Bạn chưa nhập Kích cỡ!";
            } else
            if (empty($mau_sac)) {
                $err[] = "Bạn chưa nhập màu sắc sản phẩm!";
            } else
            if (empty($trang_thai)) {
                $err[] = "Bạn chưa nhập trạng thái!";
            };

            if (empty($err)) {

             
         
                // không có lỗi nhập sai dữ liệu
                // ghi vào csdl: UPDATE tb_role SET name=:post_name WHERE id=:get_id
                try {
                    $stmt = $objConn->prepare("UPDATE  san_pham SET ten_sp=:post_ten_sp ,anh=:post_anh, so_luong=:post_so_luong , gia=:post_gia,size=:post_size, mau_sac=:post_mau_sac,noi_dung=:post_noi_dung, iddanhmuc=:post_iddanhmuc, trang_thai=:post_trang_thai   WHERE ma_sp=:get_id");
                    // gắn dữ liệu vào tham số
                    $stmt->bindParam(":post_ten_sp", $ten_sp);
                    $stmt->bindParam(":post_so_luong", $so_luong);
                    $stmt->bindParam(":post_gia", $gia);

                    $stmt->bindParam(":post_anh", $file_save);

                    $stmt->bindParam(":post_size", $size);
                    $stmt->bindParam(":post_mau_sac", $mau_sac);
                   
                    $stmt->bindParam(":post_noi_dung", $noi_dung);

                    $stmt->bindParam(":post_iddanhmuc", $iddanhmuc);
                    $stmt->bindParam(":post_trang_thai", $trang_thai);


                    $stmt->bindParam(":get_id", $id);



                    // thực thi câu lệnh
                    $stmt->execute();

                   header("Location:list-user-sp.php");
                } catch (PDOException $e) {
                    $err[] = "Loi truy van CSDL4444: " . $e->getMessage();
                }
            }
        }

        ?>

        <h1>Cập Nhật Sản Phẩm</h1>

        <p style='color:red'> <?php echo implode('<br>', $err); ?> </p>

        <form action="" method="post" enctype="multipart/form-data">

            <h6 class="p-form-admin"> Tên sản phẩm </h6> <input   class=" input-admin" type="text" name="ten_sp" value="<?php echo $row['ten_sp']; ?>"> 
            <h6 class="p-form-admin"> Số lượng </h6> <input  class=" input-admin" type="text" name="so_luong" value="<?php echo $row['so_luong']; ?>"> 
            <h6 class="p-form-admin"> Giá </h6> <input  class=" input-admin" type="text" name="gia" value="<?php echo $row['gia']; ?>"> 
            <h6 class="p-form-admin"> ảnh </h6> 

          
            
            
            <input  type="file"  name="anh"  class="form-control hidden"  > 

            <img class="img-change" width="300px" height="200px" src="<?php echo "$url_image{$row['anh']}" ?>" alt="">
            <h6 class="p-form-admin">kích cỡ </h6> <input  class=" input-admin" type="text" name="size" value="<?php echo $row['size']; ?>">
            <h6 class="p-form-admin"> màu sắc</h6> <input  class=" input-admin" type="text" name="mau_sac" value="<?php echo $row['mau_sac']; ?>"> 
            <h6 class="p-form-admin"> Nội dung sản phẩm </h6> <textarea  cols="40" rows="6" name="noi_dung">
 <?php echo $row['noi_dung'];  ?>
</textarea>
            <h6 class="p-form-admin"> Trạng thái </h6> 
             <select name="trang_thai" id="">

                <option value="còn hàng"
                <?php
                if($row['trang_thai'] == "còn hàng"){
                    echo "selected";
                }
                
                ?>
                
                >Còn hàng</option>
                <option value="hết hàng"   <?php
                if($row['trang_thai'] == "hết hàng"){
                    echo "selected";
                }
                
                ?>>hết hàng</option>
            </select>


            <h6 class="p-form-admin"> Danh Mục sản phẩm </h6> <select name="iddanhmuc"  id="">





                    <?php
foreach ($arrt as $roww) {
if($roww['iddanhmuc']==$row['iddanhmuc']){
    echo "<optgroup label='Danh mục hiện tại'> <option  value='{$roww['iddanhmuc']}'>{$roww['ten_loai']} </option></optgroup>";
}


}

?>
<optgroup label="Thay đổi">
<?php
foreach ($arrt as $row) {
echo " <option  value='{$row['iddanhmuc']}'>{$row['ten_loai']} </option>";
}

?>
</optgroup>
                </select><br>
            
            <button name="btnSave" class="aa" style="margin-top: 30px;">Cập nhật sản phẩm mới</button> <a href="list-user-sp.php">Quay lại danh sách</a>
        </form>



        <?php echo "</div>"; ?>




    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php include'footer-admin.php'?>