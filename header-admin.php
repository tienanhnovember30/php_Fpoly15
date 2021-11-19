<?php 
ob_start();
session_start();

require_once 'db.php';

?>

<!doctype html>

<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin shop</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
    <link rel="stylesheet" href="vendors1/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors1/font-awesome/css/font-awesome.min.css">
  

    
    <link rel="stylesheet" href="assets1/css/style.css">
    <link rel="stylesheet" href="css/mycss.css">
    <link rel="stylesheet" href="css/admincss.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  

    
</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default light">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="admin.php">Admin</a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fas fa-home"></i>Quay lại cửa hàng </a>
                    </li>
                    <h3 class="menu-title">Quản Trị</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="admin.php" class="dropdown-toggle"> <i class="menu-icon fa fa-id-badge"></i>Danh Sách User</a>
                       
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="list-user-sp.php" class="dropdown-toggle" > <i class="menu-icon fas fa-align-left"></i>Quản lí sản phẩm</a>
                    <li class="menu-item-has-children dropdown">
                        <a href="danh-muc.php" class="dropdown-toggle" > <i class="menu-icon fas fa-align-left"></i>Quản lí danh mục</a>
                     
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="slider.php" class="dropdown-toggle" > <i class="menu-icon fas fa-images"></i>Slider Show</a>
                     
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
                   
                </div>

               
            </div>

        </header><!-- /header -->
        <!-- Header-->