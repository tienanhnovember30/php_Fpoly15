



<html lang="en">
<head>
    <meta charset="UTF-8">
    
  
    <title>Sign Up ATShop</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
//1. hiển thị form để người dùng nhập dữ liệu
//2. Nhận dữ liệu từ form gửi lên khi người dùng bấm nút
//3. Kiểm tra hợp lệ dữ liệu người dùng nhập
//4. Nếu dữ liệu là hợp lệ thì lưu vào CSDL
require_once 'db.php';
$err =[];

if(isset($_POST['btnSave'])){
    
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass_word = $_POST['pass_word'];
   
    $sdt = $_POST['sdt'];
  

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
        try{
            $stmt = $objConn->prepare("INSERT INTO user(ho_ten,email,username,pass_word,sdt) VALUES(:ho_ten,:email,:username,:pass_word,:sdt)");
            // gắn dữ liệu vào tham số
           
            $stmt->bindParam(":ho_ten", $ho_ten);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pass_word", $pass_word);
            
            $stmt->bindParam(":sdt", $sdt);
     

            // thực thi câu lệnh
            $stmt->execute();
            
            header("Location:login.php");

        }catch(PDOException $e){
            $err[] = "Loi truy van CSDL: ". $e->getMessage();
        }
 
    } 
} 

?>

    <div class="main">

        <section class="signup">
           
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Đăng ký</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="ho_ten" placeholder="Họ và tên"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Tài khoản"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="sdt" id="name" placeholder="Số điện thoại"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="email của bạn"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="pass_word" id="password" placeholder="Mật khẩu"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                       
                    
                        <div class="form-group">
                            <input type="submit" name="btnSave" id="submit" class="form-submit" value="Đăng ký"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        bạn đã có tài khoản ? <a href="login.php" class="loginhere-link">Đăng nhập</a> <div style="text-align: center; margin-top: 40px;">
                            <a href="index.php" >Trở lại</a>
                        </div>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>