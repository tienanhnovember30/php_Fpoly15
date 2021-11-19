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
</head>

<body>

<?php

session_start();
require_once 'db.php';

?>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
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
	<li class="nav-item"><a class="nav-link" href="don-hang.php"> đơn hàng</a>
	</li>
	<li class="nav-item"><a class="nav-link" href="#">Giỏ hàng</a>
	</li>
	<li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a>
	</li>
	<!-- <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li> -->
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
                    <h1>Giỏ hàng của bạn</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php">Sản phẩm<span class="lnr lnr-arrow-right"></span></a>

                        <a href="category.php">Giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">

    <?php 

     



define("APP_PATH", __DIR__);
define('BASE_URL', '/assignment_web2041/assm/atshop');

$file_full_path = APP_PATH;
$url_image = BASE_URL;
    if(empty($_SESSION['cart'])){

    echo "bạn chưa thêm sản phẩm <a href='category.php'> chọn sản phẩm </a>";// giả sử trang index.php là hiển thị danh sách sản phẩm để khách mua

    }

@$list_id = array_keys($_SESSION['cart']);

@$list_id = implode(',',$list_id); // chuyển thành chuỗi để lấy ds sp





// print_r($sql);

    
$stmt = $objConn->prepare("SELECT * FROM san_pham  WHERE ma_sp in ($list_id)");

//Thực thi câu lệnh
$stmt->execute();
//Thiết lập chế độ lấy dữ liệu
$stmt->setFetchMode(PDO::FETCH_ASSOC);

echo " <center> <table border='1' cellpadding='10'>
                        <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>ảnh</th>
                        <th>Size</th>
                        <th>Màu sắc</th>
                        
                     

                        </tr> 
";
foreach(  $stmt->fetchAll() as $row){
    $link_delete = 'xoa-sp-gh.php?id='.$row['ma_sp'];
    echo "<tr>
            <td> {$row['ten_sp']}</td>
            
            <td> {$row['gia']}</td>
            <td style='margin-top: 40px; max-width: 400px;'> <img src='$url_image{$row['anh']}' width='200' /></td>
            <td> {$row['size']}</td>
            <td> {$row['mau_sac']}</td>
            
           
        </tr>";
} 

echo '</table></center>'; 





?>


    



    
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Thông tin về chúng tôi</h6>
						<p>
							Địa chỉ: Số 1 Trịnh Văn Bô Hà Nội <br> Số điện thoại: 0123456789 <br> Email: atshopsneaker@gmail.com
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>E-Mail</h6>
						<p>Nhận thông tin về sản phẩm mới</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true"
								action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập e-mail của bạn '"
										required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
											aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
											type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="img/product/Alphaboost_Shoes_White_EG1441_01_standard.jpg" width="58px" height="58px" alt=""></li>
							<li><img src="img/product/NMD_R1_V2_Shoes_White_FY5921_01_standard.jpg" width="58px" height="58px" alt=""></li>
							<li><img src="img/product/Stan_Smith_Shoes_White_M20324_01_standard.jpg" width="58px" height="58px" alt=""></li>
							<li><img src="img/product/Ultraboost_20_Shoes_Black_FX8887_01_standard.jpg" width="58px" height="58px" alt=""></li>
							<li><img src="img/product/Ultraboost_20_Shoes_Gold_EG1343_01_standard.jpg" width="58px" height="58px" alt=""></li>
							<li><img src="img/product/Ultraboost_20_Shoes_Pink_FW8728_01_standard.jpg" width="58px" height="58px" alt=""></li>
							<li><img src="img/product/Ultraboost_DNA_x_Disney_Shoes_White_FV6049_01_standard.jpg" width="58px" height="58px" alt=""></li>
							<li><img src="img/product/air-zoom-bb-nxt-basketball-shoe-wRmJMz.jpg" width="58px" height="58px" alt=""></li>

							
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Theo dõi tôi</h6>
						<p>Mạng xã hội</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;
					<script>document.write(new Date().getFullYear());</script> All rights reserved | atshopSneaker
					 <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
						target="_blank">atshop</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
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