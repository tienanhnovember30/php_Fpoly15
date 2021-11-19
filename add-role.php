<?php include'header-admin.php'?>

        <!-- Header-->
        <?php  echo "<div class='box-form'> ";?>
        <?php
//1. hiển thị form để người dùng nhập dữ liệu
//2. Nhận dữ liệu từ form gửi lên khi người dùng bấm nút
//3. Kiểm tra hợp lệ dữ liệu người dùng nhập
//4. Nếu dữ liệu là hợp lệ thì lưu vào CSDL

$err =[];

if(isset($_POST['btnSave'])){
    
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass_word = $_POST['pass_word'];
   
    $sdt = $_POST['sdt'];
    $quyen_qtri = $_POST['quyen_qtri'];
  

    // kiểm tra
    if(strlen($ho_ten)>30){
        $err[] = "Bạn cần nhập Name dưới 30 ký tự";
    }
    if(empty($ho_ten)){
        $err[] = "Bạn chưa nhập họ tên";
    }
  

    if(empty($err)){
        // không có lỗi nhập sai dữ liệu
        // ghi vào csdl
        $pass_word = password_hash($pass_word, PASSWORD_DEFAULT );
        try{
            $stmt = $objConn->prepare("INSERT INTO user(ho_ten,email,username,pass_word,sdt,quyen_qtri) VALUES(:ho_ten,:email,:username,:pass_word,:sdt,:quyen_qtri)");
            // gắn dữ liệu vào tham số
           
            $stmt->bindParam(":ho_ten", $ho_ten);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pass_word", $pass_word);

            
            $stmt->bindParam(":sdt", $sdt);
            $stmt->bindParam(":quyen_qtri", $quyen_qtri);
     

            // thực thi câu lệnh
            $stmt->execute();
            
            header("Location:admin.php");

        }catch(PDOException $e){
            $err[] = "Loi truy van CSDL: ". $e->getMessage();
        }
 
    } 
} 


?>



<h2>Thêm mới</h2>

<p style='color:red'> <?php echo implode('<br>',$err ); ?> </p>


<form action="" method="post">
   
   <h6 class="p-form-admin">Họ tên </h6> <input class="input-admin" placeholder="Nhập họ tên "  type="text" name="ho_ten" required>
   <h6 class="p-form-admin">  Email  </h6><input class="input-admin"  placeholder="Nhập email " type="email" name="email" required> 
   <h6 class="p-form-admin"> Tài khoản </h6> <input class="input-admin"  placeholder="Nhập tên tài khoản "  type="text" name="username" required> 
   <h6 class="p-form-admin"> Mật khẩu </h6><input class="input-admin"  placeholder="Nhập Mật khẩu "  type="text" name="pass_word" required>  
 
   <h6 class="p-form-admin">Số điện thoại </h6> <input class="input-admin"  placeholder="Nhập SĐT " type="number" name="sdt" required>  
   <h6 class="p-form-admin"> Quyền quản trị </h6> <select class="input-admin"  name="quyen_qtri" id="">
  
   <option value="1">Admin</option>
  
   <option value="0">User</option>
  
   </select> <br>
    
    <button class="aa" name="btnSave" style="margin-top: 30px;" >Save New</button> <a href="admin.php">Quay lại Danh sách</a>
</form>


        <?php echo "</div>"; ?>


        
    </div><!-- /#right-panel -->
    
    <!-- Right Panel -->

  <?php include'footer-admin.php'?>