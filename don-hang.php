



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
    $dia_chi = $_POST['dia_chi'];
    
   
   
  

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
            $stmt = $objConn->prepare("INSERT INTO khach_hang(ho_ten,email,dia_chi) VALUES(:ho_ten,:email,:dia_chi)");
            // gắn dữ liệu vào tham số
           
            $stmt->bindParam(":ho_ten", $ho_ten);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":dia_chi", $dia_chi);
           
            
          

            // thực thi câu lệnh
            $stmt->execute();
            
            echo "đăng ký đơn thành công ! <a href='index.php'> Quay lại Trang chủ </a>";
            exit;

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
                        <h2 class="form-title">Đăng ký đơn hàng</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="ho_ten" placeholder="Họ và tên"/>
                        </div>
                       
                  
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="email của bạn"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="dia_chi" id="password" placeholder="Địa chỉ"/>
                            
                        </div>
                       
                    
                        <div class="form-group">
                            <input type="submit" name="btnSave" id="submit" class="form-submit" value="Đăng ký"/>
                            <a href="index.php"> BACK</a>
                        </div>
                    </form>
                  
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>