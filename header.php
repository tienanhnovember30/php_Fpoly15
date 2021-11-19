<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/logo2.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>ATShop</title>

	<!--
            CSS
			============================================= -->
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/mycss.css">
</head>

<body id="category">


	<?php

	session_start();
	require_once 'db.php';
	


	?>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu"style="background-color:#84f4f4;">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo2.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item "><a class="nav-link" href="index.php">Trang chủ</a></li>
							<li class="nav-item submenu dropdown">
								<a href="category.php" class="nav-link dropdown-toggle">Sản phẩm</a>

							</li>


							<?php
					$tam = "";
					if (isset($_SESSION['data'])) {
						$data = $_SESSION['data'];
						if ($data['quyen_qtri'] == 1) {
						$dem = '
						<li class="nav-item"><a class="nav-link" href="admin.php">admin</a></li>';
						} else {
							$dem = "";
						}

					echo $tam = '<li class="nav-item submenu dropdown">
						<a href="#" class="nav-link dropdown-toggle"><i class="fas fa-user-shield"></i></a>

						<ul class="dropdown-menu">
						<li class="nav-item"><a class="nav-link" href="#">Trang Cá nhân</a></li>


								' . $dem . '
						<li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a>
						</li>
					
						</ul>


							</li>';
							} else {
							echo $tam = '<li class="nav-item submenu dropdown">
								<a href="login.php" class="nav-link dropdown-toggle">Đăng nhập</a>

								</li>';
					}



							?>



							




						</ul>
						<ul class="nav navbar-nav navbar-right">

							<li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form action="search.php"  class="d-flex justify-content-between" method="POST">
					<input type="text" name="name" class="form-control" id="search_input" placeholder="Nhập tìm kiếm ...">
					<button type="submit" name="btn-search" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Search sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Cửa hàng<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>