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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/mycss.css">
	<link rel="stylesheet" href="css/admincss.css">
</head>

<body>


<?php

session_start();

require_once 'db.php';

?>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu" style="background-color:#84f4f4;">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
<?php     ?>


					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo2.png
					" alt="" style="width:50%"></a>
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

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div style=" margin-top: 60px;" >

				
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">

				<?php
				define("APP_PATH", __DIR__);
				define('BASE_URL', '/assignment_web2041/assm/atshop');
				
				$file_full_path = APP_PATH;
				$url_image = BASE_URL;
				try{	
				$stmt=$objConn->prepare("SELECT * FROM slide LIMIT 2");
				$stmt->execute();
				
					}catch(PDOException $e){
						ECHO "LỖI " . $e->getMessage();
					}
				?>
					<div class="carousel-item active">
					<img  style=" margin-left: 300px;"  width="500px" height="300px" src="img/banner/banner-img.png" alt="First slide">
					</div>
					<?php
					foreach($stmt->fetchAll()as $rowsp){
					?>

					<div class="carousel-item">
					<img  style=" margin-left: 300px;"  width="500px" height="300px"  src="<?php echo "$url_image{$rowsp['anh_slide']}"?>" alt="Second slide">
					</div>

					<?php
					}
					?>
				
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Lùi</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Tiến</span>
				</a>
</div>

			</div>			
				</div>
			</div>
		</div>
	</section>

	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm mới</h1>
						
						</div>
					</div>
				</div>
				<div class="row">
<?php 

try{
	$stmt=$objConn->prepare("SELECT * FROM san_pham  ORDER BY ma_sp DESC LIMIT 8 ");
	$stmt->execute();
			


}catch(PDOException $e){
	echo "lỗi " . $e->getMessage();
}
				

				foreach($stmt->fetchAll() AS $row_sp ){

					$gia = number_format($row_sp['gia']);


				
?>

					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
						<a href="<?php echo "single-product.php?id={$row_sp['ma_sp']}" ?>">
							<img class="img-fluid" width="255px" style="height: 271px;" src="<?php echo "$url_image{$row_sp['anh']}"?>" alt="">
							<div class="product-details">
								<h6 class="ten-sp"><?php echo $row_sp['ten_sp'] ?></h6>
								<div class="price">
									<h6><?=$gia ?></h6>
									<h6 class="l-through">2000000vnđ</h6>
								</div>
							
							</div>
						</a>
						</div>
					</div>

					<?php		
				}
				
				?>

				
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm yêu thích</h1>
						</div>
					</div>
				</div>

				<div class="row">
				<?php 

try{
	$stmt=$objConn->prepare("SELECT * FROM san_pham  ORDER BY viewer DESC LIMIT 8 ");
	$stmt->execute();
			


}catch(PDOException $e){
	echo "lỗi " . $e->getMessage();
}
				

				foreach($stmt->fetchAll() AS $row_sp ){

					$gia = number_format($row_sp['gia']);


				
?>

		
					<div class="col-lg-3 col-md-6">
						<div class="single-product" >
						<a href="<?php echo "single-product.php?id={$row_sp['ma_sp']}" ?>">
							<img class="img-fluid" width="255px" style="height: 271px;" src="<?php echo "$url_image{$row_sp['anh']}"?>" alt="">
							<div class="product-details" >
								<div >
								<h6 class="ten-sp"><?php echo $row_sp['ten_sp']  ?>
							
							</h6> <span style="float: right; font-size: 11px; color: gray;">

								<i class='fas fa-eye'></i> <?=$row_sp['viewer']?>
								</span></div>
								
								<div class="price">
									<h6><?=$gia ?></h6>
									<h6 class="l-through">2000000vnđ</h6>
								</div>
							
							</div>
						</a>
						</div>
					</div>

					<?php		
				}
				
				?>
		
				</div>
			</div>
		</div>
	</section>
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
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>