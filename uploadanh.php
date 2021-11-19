




<!doctype html>

<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
    <link rel="stylesheet" href="vendors1/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors1/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors1/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors1/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors1/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors1/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets1/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
<?php 
session_start();

require_once 'db.php';
?>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">ATSHOP Admin</a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Quay lại SHOP </a>
                    </li>
                    <h3 class="menu-title">Danh Mục</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="admin.php" class="dropdown-toggle"> <i class="menu-icon fa fa-id-badge"></i>Danh Sách User</a>
                       
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Sản phẩm</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="">Xem sản phẩm</a></li>
                            <li><i class="fa fa-table"></i><a href="list-user-sp.php">quản lý sản phẩm</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-luggage-cart"></i>Giỏ hàng</a>
                       
                    </li>

                   

                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="">Vector Maps</a></li>
                        </ul>
                    </li>
                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button tton class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification" >
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                  
                    </div>
                </div>

               
            </div>

        </header><!-- /header -->
        <!-- Header-->

     
        <?php  echo "<div style='margin-left: 50px;'>";?>
        <pre>
<?php

define("APP_PATH", __DIR__);
define('BASE_URL', '/assignment_web2041/assm/atshop');
// http://localhost:8074        /SU2020/PT15315-WEB/demo-upload           /demo.php
print_r ($_FILES);
// xử lý upload file
if(isset ($_FILES['f_anh'])  ){
    $anh = $_FILES['f_anh'];
    // kiểm tra định dạng file ảnh:
    $arr_allow_type =['image/png','image/jpeg','image/gif','image/bmp'];

    if(in_array(  $anh['type'],$arr_allow_type    )){
        // file hợp lệ
        $file_save = '/anh/' .$anh['name'];

        $file_full_path = APP_PATH. $file_save;
        $url_image = BASE_URL.$file_save;

        echo "<br>file_full_path:   $file_full_path   <br>url_image:   $url_image <br>";
        if(move_uploaded_file(  $anh['tmp_name'], $file_full_path   )){
            // upload thành công
            echo "<br>Upload thành công! <br>";
            echo "<img src='$url_image' width='200' />";        

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
<form action="" method="post" enctype="multipart/form-data">
    Ảnh: <input type="file" name="f_anh" /> <br>
    <button >Upload</button>


</form>

  


        <?php  echo "</div>";?>
        


        
    </div><!-- /#right-panel -->
    
    <!-- Right Panel -->

  
    <script src="vendors1/jquery/dist/jquery.min.js"></script>
    <script src="vendors1/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors1/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets1/js/main.js"></script>


    <script src="vendors1/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets1/js/dashboard.js"></script>
    <script src="assets1/js/widgets.js"></script>
    <script src="vendors1/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors1/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors1/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  
</body>

</html>
