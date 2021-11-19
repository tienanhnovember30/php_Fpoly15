<?php
ob_start();
session_start();

require_once 'db.php';

?><!DOCTYPE html>
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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu"style="background-color:#84f4f4;">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo2.png" alt="" style="width:50%"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
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

							$tam="";
							if(isset($_SESSION['data'])){
							$data = $_SESSION['data'];
										
						if($data['quyen_qtri']==1){
							$dem = '
							<li class="nav-item"><a class="nav-link" href="admin.php">admin</a></li>';

						}else{
							$dem = "";
						}

					echo $tam = '	<li class="nav-item submenu dropdown">
					<a href="#" class="nav-link dropdown-toggle"><i class="fas fa-user-shield"></i></a>

					<ul class="dropdown-menu">
						<li class="nav-item"><a class="nav-link" href="#">Trang Cá nhân</a></li>


						'.$dem.'
						<li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a>
						</li>
				
					</ul>


				</li>';
				}else{
				echo	$tam ='<li class="nav-item submenu dropdown">
					<a href="login.php" class="nav-link dropdown-toggle">Đăng nhập</a>

				</li>';
				}



							?>


<!--nếu đăng nhập thành công thì hiện đoạn này-->


						
					
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
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Nhập tìm kiếm ...">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
	<!-- End Header Area -->
<?php
	$view = 1;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$stmt = $objConn->prepare("SELECT * FROM san_pham  where ma_sp=$id  ");


		$stmt->execute();

	foreach($stmt->fetchAll() as $rowview){
		$view += $rowview['viewer'];
		$stmt = $objConn->prepare("UPDATE san_pham SET viewer ='$view' WHERE ma_sp = $id");
		$stmt->execute();
	}
		


	}


?>




	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Trang thông tin sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Cửa hàng<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">Thông tin sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<?php
	$id = intval($_GET['id']);


	define("APP_PATH", __DIR__);
	define('BASE_URL', '/assignment_web2041/assm/atshop');

	$file_full_path = APP_PATH;
	$url_image = BASE_URL;


	$stmt = $objConn->prepare("SELECT * FROM san_pham INNER  JOIN loai_sp on loai_sp.iddanhmuc=san_pham.iddanhmuc where ma_sp=$id  ");
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$row= $stmt->fetch();
	$gia= number_format($row['gia']);



?>

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="
							<?php echo  "$url_image{$row['anh']}" ?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?= $row['anh']?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?= $row['anh']?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">




						<h3><?= $row['ten_sp'] ?></h3>
						<h2><?= $gia ?> <span  > đ </span></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Loại</span> : <?= $row['ten_loai'] ?></a></li>
							<li><a href="#"><span>Trạng thái</span> :  <?= $row['trang_thai'] ?></a></li>
						</ul>
						<p><?= $row['noi_dung'] ?></p>
						<div class="product_count">
							<label for="qty">Số lượng:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
								class="input-text qty">
							<button
								onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
								class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button
								onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
								class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="#"style="background-color:#84f4f4;color:black;">Thêm vào giỏ</a>
							<a class="primary-btn" href="#"style="background-color:#84f4f4;color:black;">Mua ngay</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
<hr>
<hr>
	<footer>
        <div class="container-fluid padding"style="background-color:#84f4f4;color:black;">
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="image/logo.png">
                    <hr class="light">
                    <p>0987233574</p>
                    <p>anhltph11790@fpt.edu.vn</p>
                    <p>Cầu Diễn, Q.Nam Từ Liêm, Hà Nội</p>
                </div>
            </div>
    </footer>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
		integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>