<?php include'header-admin.php'?>


        <?php echo "<div class='box-form'>"; ?>

        <?php

        //1. lấy dữ liệu đưa lên form cho người dùng sửa
        //2. lấy dữ liệu người dùng post từ form và kiểm tra hợp lệ
        //3. lưu vào CSDL


        $id = intval($_GET['id']);
     



        try {
            $stmt = $objConn->prepare("SELECT * FROM slide  WHERE ma_slide = $id ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $row = $stmt->fetch();

            
        } catch (PDOException $e) {
            echo "<br>Loi truy van22222 CSDL: " . $e->getMessage();
        }
        //=== làm chứ năng sửa



        $err = [];
        if (isset($_POST['btnSave'])) {
            $name_slide = $_POST['name_slide'];
            $link_slide = $_POST['link_slide'];
           





            if (empty($err)) {
                // không có lỗi nhập sai dữ liệu
                // ghi vào csdl: UPDATE tb_role SET name=:post_name WHERE id=:get_id
                try {
                    $stmt = $objConn->prepare("UPDATE  slide SET name_slide=:post_name_slide , link_slide=:post_link_slide  WHERE ma_slide=:get_id");
                    // gắn dữ liệu vào tham số
                    $stmt->bindParam(":post_name_slide", $name_slide);
                    $stmt->bindParam(":post_link_slide", $link_slide);
              



                    $stmt->bindParam(":get_id", $id);



                    // thực thi câu lệnh
                    $stmt->execute();

                    header("Location:slider.php");
                } catch (PDOException $e) {
                    $err[] = "Loi truy van CSDL4444: " . $e->getMessage();
                }
            }
        }
        ?>

        <h1>Cập Nhật Sản Phẩm</h1>

        <p style='color:red'> <?php echo implode('<br>', $err); ?> </p>

        <form action="" method="post">

            <h6 class="p-form-admin"> Tên Slider </h6> <input  class="input-admin" type="text" name="name_slide" value="<?php echo $row['name_slide']; ?>"> </p>  
            <h6 class="p-form-admin"> ảnh Slider </h6> <input  class="input-admin" type="text" name="anh_slide" value="<?php echo $row['anh_slide']; ?>"  disabled> 
            <h6 class="p-form-admin"> Đường dẫn </h6>
          <input class="input-admin" type="text" name="link_slide" value="<?php echo $row['link_slide']; ?>"> 
          <br>
           
            <button name="btnSave" class="aa" style="margin-top: 20px;">Cập nhật mới</button> <a href="slider.php"> danh sách</a>
        </form>
        <?php echo "</div>"; ?>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php include'footer-admin.php'?>