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

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
		<div class="main_menu"style="background-color:#84f4f4;">
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
							<li class="nav-item active"><a class="nav-link" href="index.php">Trang ch???</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="false">C???a h??ng</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">S???n ph???m</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Th??ng tin s???n
											ph???m</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Thanh to??n</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Gi??? h??ng</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Th??ng tin x??c
											nh???n</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Chi ti???t</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="false">Th??ng tin trang</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.html">????ng nh???p</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Theo d??i ????n h??ng</a>
									</li>
									<!-- <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li> -->
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Li??n h???</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
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
					<input type="text" class="form-control" id="search_input" placeholder="Nh???p t??m ki???m ...">
					<button type="submit" class="btn"></button>
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
                    <h1>Theo d??i ????n h??ng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang ch???<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Chuy??n m???c th???i trang</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Tracking Box Area =================-->
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <p>????? theo d??i ????n h??ng c???a b???n, vui l??ng nh???p ID ????n h??ng c???a b???n v??o ?? b??n d?????i v?? nh???n n??t "Theo d??i". ??i???u n??y ???? ???????c trao cho b???n tr??n bi??n lai c???a b???n v?? trong email x??c nh???n b???n n??n nh???n ???????c.</p>
                <form class="row tracking_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="order" name="order" placeholder="ID ????n h??ng" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Order ID'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="?????a ch??? email thanh to??n" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Billing Email Address'">
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">Theo d??i ????n h??ng</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Th??ng tin v??? ch??ng t??i</h6>
						<p>
							?????a ch???: S??? 1 Tr???nh V??n B?? H?? N???i <br> S??? ??i???n tho???i: 0123456789 <br> Email: karmasneaker@gmail.com
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>E-Mail</h6>
						<p>Nh???n th??ng tin v??? s???n ph???m m???i</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true"
								action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nh???p e-mail c???a b???n '"
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
						<h6>Theo d??i t??i</h6>
						<p>M???ng x?? h???i</p>
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
					<script>document.write(new Date().getFullYear());</script> All rights reserved | KarmaSneaker
					 <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
						target="_blank">Karma</a>
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