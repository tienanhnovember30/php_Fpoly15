<?php include'header-admin.php'?>


        <?php echo "<div class='box-form'>"; ?>

        <?php

        //1. lấy dữ liệu đưa lên form cho người dùng sửa
        //2. lấy dữ liệu người dùng post từ form và kiểm tra hợp lệ
        //3. lưu vào CSDL


        $id = intval($_GET['id']);
     



        try {
            $stmt = $objConn->prepare("SELECT * FROM thong_tin  WHERE id_tt = $id ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $row = $stmt->fetch();

            
        } catch (PDOException $e) {
            echo "<br>Loi truy van22222 CSDL: " . $e->getMessage();
        }
        //=== làm chứ năng sửa



        $err = [];
        if (isset($_POST['btnSave'])) {
            $anh_tt = $_POST['anh_tt'];
            $dia_chi = $_POST['dia_chi'];
            $email_tt = $_POST['email_tt'];
           
            $phone = $_POST['phone'];
            $giay_phep = $_POST['giay_phep'];





            if (empty($err)) {
                // không có lỗi nhập sai dữ liệu
                // ghi vào csdl: UPDATE tb_role SET name=:post_name WHERE id=:get_id
                try {
                    $stmt = $objConn->prepare("UPDATE  thong_tin SET anh_tt=:post_anh_tt,dia_chi=:post_dia_chi , email_tt=:post_email_tt,phone=:post_phone,giay_phep=:post_giay_phep  WHERE id_tt=:get_id");
                    // gắn dữ liệu vào tham số
                    $stmt->bindParam(":post_anh_tt", $anh_tt);
                    $stmt->bindParam(":post_dia_chi", $dia_chi);
                    $stmt->bindParam(":post_email_tt", $email_tt);
                    $stmt->bindParam(":post_phone", $phone);
                    $stmt->bindParam(":post_giay_phep", $giay_phep);
              



                    $stmt->bindParam(":get_id", $id);



                    // thực thi câu lệnh
                    $stmt->execute();
                    header("Location:setting.php");
                } catch (PDOException $e) {
                    $err[] = "Loi truy van CSDL4444: " . $e->getMessage();
                }
            }
        }
        ?>

        <h1>Cập Nhật Sản Phẩm</h1>

        <p style='color:red'> <?php echo implode('<br>', $err); ?> </p>

        <form action="" method="post">

            <h6 class="p-form-admin"> Logo  </h6> <input class="input-admin"  type="text" name="anh_tt" value="<?php echo $row['anh_tt']; ?>" disabled >
            <h6 class="p-form-admin"> Địa chỉ:</h6>  <input class="input-admin"  type="text" name="dia_chi" value="<?php echo $row['dia_chi']; ?>"> 
            <h6 class="p-form-admin"> email: </h6>  <input class="input-admin"  type="text" name="email_tt" value="<?php echo $row['email_tt']; ?>"> 
            <h6 class="p-form-admin"> Số điện thoại: </h6>  <input class="input-admin"  type="number" name="phone" value="<?php echo $row['phone']; ?>"> 
            <h6 class="p-form-admin"> Giấy phép: </h6>  <input class="input-admin"  type="text" name="giay_phep" value="<?php echo $row['giay_phep']; ?>"> 
          
          
           
            <button name="btnSave" class="aa" style="margin-top: 20px;">Cập nhật mới</button> <a href="setting.php"> danh sách</a>
        </form>
        <?php echo "</div>"; ?>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php include'footer-admin.php'?>