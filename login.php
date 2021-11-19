<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up ATShop</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 

session_start();

require_once 'db.php';


$err = [];


if(isset($_POST['btnLogin'])){
    $username = $_POST['txtusername'];
    $pass_word = $_POST['txtpass_word'];
    
    // kiểm tra hợp lệ dữ liệu.
    if(empty($username)){
        $err[] ="<br>Bạn cần nhập username";
    }
    if(empty($pass_word)){
        $err[] = "<br>Bạn cần nhập passwd";
    }

    // nếu không có lỗi thì mới truy vấn CSDL để lấy dữ liệu
    if(empty($err)){
        // truy vấn CSDL vì không có lỗi
        // SELECT * FROM tb_user WHERE username=xxxxxxxxxx

        $stmt = $objConn->prepare("SELECT * FROM user WHERE username =:post_username");

        $stmt->bindParam(":post_username",$username );

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $row = $stmt->fetch();

        if(empty($row)){
            echo "<h3 style='text-align:center;'>Không tồn tại user!</h3>";
        }else
        {
        //    print_r($row);
            if ($pass_word != $row['pass_word']) 
                {
                   
                        echo "<h3 style='text-align:center;'> Mật khẩu không đúng!<a href='login.php'>Trở lại</a> </h3>";
                        exit;
                } 
              
                 $_SESSION['data'] = $row;  
                header("Location:index.php");
        } 
    }else{
        ///có lỗi:
       echo "<h3 style='text-align:center;'> Hãy nhập tài khoản mật khẩu! </h3>";
    }
} 
?>
    <div class="main">

        <section class="signup">
           
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Đăng nhập</h2>
                       
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtusername" id="name" placeholder="Tài khoản"/>
                        </div>
                       
                        <div class="form-group">
                            <input type="password" class="form-input" name="txtpass_word" id="password" placeholder="Mật khẩu"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                     
                        
                        <div class="form-group">
                         
                            <button name="btnLogin" class="form-submit" >Đăng nhập</button>
                        </div>
                    </form>
                    <p class="loginhere">tạo tài khoản mới ? <a href="dangky.php" class="loginhere-link">đăng ký</a>  <div style="text-align: center; margin-top: 40px;">
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