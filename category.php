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
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo2.png" alt="" style="width:50%"></a>
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
								echo	$tam = '<li class="nav-item submenu dropdown">
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
					<h1>Danh mục sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Cửa hàng<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head" style="background-color:#84f4f4;color:black;">Duyệt danh mục</div>
					<ul class="main-categories">
					<li class="main-nav-list"><a  href="category.php?product=1" >TẤT CẢ CÁC SẢN PHẨM<span class="number"></span></a>
						
						</li>
						<?php
												
						if (!isset($_GET['product'])) {
							$product = 1;
						} else {
							$product = $_GET['product'];
						}
						$data = 9;
						$sql = "SELECT * FROM san_pham";
						$result = $objConn->prepare($sql);
						$result->execute();
						$number = $result->rowCount();


						$page = ceil($number / $data);
						$tin = ($product - 1) * $data;





						
						$t=0;
						 $stmt=$objConn->prepare("SELECT * FROM loai_sp");
						 $stmt->execute();
					
						if($t<=$page){
									$t++;
							}
							
						 foreach( $stmt->fetchAll() as $danhmuc){
						
						

						
						 ?>

						<li class="main-nav-list"><a  href="<?php echo "?product=".$t ."&iddanhmuc=".$danhmuc['iddanhmuc'] ?>" ><?=$danhmuc['ten_loai']?><span class="number"></span></a>
						
						</li>

						<?php
							 }
						?>
						
						</li>
						
						
				
					</ul>
				</div>
			
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center"  style="background-color:#84f4f4;color:black;">
					<div class="sorting">
						
					</div>
					<div class="sorting mr-auto">
						
					</div>
					 

				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					
					<div class="row" style="margin-bottom: 40px;">
				
						<!-- single product -->

					

						<?php
						define("APP_PATH", __DIR__);
						define('BASE_URL', '/assignment_web2041/assm/atshop');

						$file_full_path = APP_PATH;
						$url_image = BASE_URL;

						
						
						

						if(isset($_GET['iddanhmuc'])&&($_GET['iddanhmuc']>0)){
							$iddanhmuc = $_GET['iddanhmuc'];
							try {

								$stmt = $objConn->prepare("SELECT * FROM san_pham where iddanhmuc = $iddanhmuc LIMIT $tin,$data");
							
								//Thực thi câu lệnh
								$stmt->execute();
								//Thiết lập chế độ lấy dữ liệu
								$stmt->setFetchMode(PDO::FETCH_ASSOC);
	
				
					foreach ($stmt->fetchAll() as $row) 
						{
							$gia = number_format($row['gia']);



							echo $tm = "
							<div class='col-lg-4 col-md-6' style=' overflow: hidden;  ' >
											
												
							<div style='margin-top: 40px; max-width: 400px;'>
							<center>
						<a href='single-product.php?id={$row['ma_sp']}'> <img src='$url_image{$row['anh']}' width='255' height='272'  /></a>	
							
							</center>
							</div>
						
							<h6  class='product-details ten-sp' >  <a style='color:black;' href='single-product.php?id={$row['ma_sp']}' > {$row['ten_sp']} </a> </h6>
							<h6 class='gia-sp'> <a style='color:black;' href='single-product.php?id={$row['ma_sp']}' > {$gia} <span  style='  text-decoration: underline;'> đ </span> </a> </h6>

							<a class='mua'  href='single-product.php?id={$row['ma_sp']}'>Mua</a>

							<a class='mua2'     href='add-cart.php?id={$row['ma_sp']}'  >Thêm vào giỏ</a>
							
						
						
							
											
						</div>
									";
						}
								
		} catch (PDOException $e) {echo "<br>Loi truy van CSDL: " . $e->getMessage();}

						}else{

							$stmt = $objConn->prepare("SELECT * FROM san_pham LIMIT $tin,$data");
						
							//Thực thi câu lệnh
							$stmt->execute();
							//Thiết lập chế độ lấy dữ liệu
							$stmt->setFetchMode(PDO::FETCH_ASSOC);
							foreach ($stmt->fetchAll() as $row) 
							{
								$gia = number_format($row['gia']);
								echo $tm = "
								
							<div class='col-lg-4 col-md-6' style=' overflow: hidden;  ' >
											
												
							<div style='margin-top: 40px; max-width: 400px;'>
							<center>
						<a href='single-product.php?id={$row['ma_sp']}'> <img src='$url_image{$row['anh']}' width='255' height='272'  /></a>	
							
							</center>
							</div>
						
							<h6  class='product-details ten-sp' >  <a style='color:black;' href='single-product.php?id={$row['ma_sp']}' > {$row['ten_sp']} </a> </h6>
							<h6 class='gia-sp'> <a style='color:black;' href='single-product.php?id={$row['ma_sp']}' > {$gia} <span  style='  text-decoration: underline;'> đ </span> </a> </h6>

							<a class='mua'  href='single-product.php?id={$row['ma_sp']}'>Mua</a>

							<a class='mua2'     href='add-cart.php?id={$row['ma_sp']}'  >Thêm vào giỏ</a>
							
						
						
							
											
						</div>
										";
							}
	
						}


						
						
?>


<!-- <div style='height:34px;  overflow: hidden; margin-bottom: 10px; display: block; '> -->



					</div>
				</section >
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center" style="background-color:#84f4f4;color:black;">
					<div class="sorting mr-auto" >
						
					</div>
					<div class="pagination"><a href="?product=1" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
				<?php	for ($t = 1; $t <= $page; $t++) { ?>
						
						
						<!-- <a href="#" class="active">1</a> -->
						<a href="?product=<?= $t ?>"><?= $t ?></a>
						<?php

	}
	?>
						<!-- <a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a> -->
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

<hr>
<hr>
	<footer>
        <div class="container-fluid padding">
            <div class="row text-center" style="background-color:#84f4f4;color:black;">
                <div class="col-md-4">
                    <img src="image/logo.png">
                    <hr class="light">
                    <p>0987233574</p>
                    <p>anhltph11790@fpt.edu.vn</p>
                    <p>Cầu Diễn, Q.Nam Từ Liêm, Hà Nội</p>
                </div>

                        <hr class="light-100">
                        
                    </div>
                </div>
            </div>
    </footer>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
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