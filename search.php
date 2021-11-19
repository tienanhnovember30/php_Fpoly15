<?php 





include('header.php')?>



<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Duyệt danh mục</div>
					<ul class="main-categories">
					<li class="main-nav-list"><a  href="#" >TẤT CẢ CÁC SẢN PHẨM<span class="number"></span></a>
						
						</li>
<?php
$name = null;				
if (isset($_POST['btn-search']) && !isset($_GET['product'])) {
$name = $_POST['name'];
$product = 1;
// echo $name;
} elseif (isset($_GET['product']) && isset($_POST['btn-search'])) {
$name = $_POST['name'];
$product = $_GET['product'];
} else {
header("Location:index.php");
}



$data = 9;
$sql = "SELECT * FROM san_pham WHERE ten_sp LIKE  '%$name%'";
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

        <li class="main-nav-list"><a  href="#" ><?=$danhmuc['ten_loai']?><span class="number"></span></a>
        
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
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							
							<option value="1">Mẫu mới</option>
							<option value="1">Mẫu cũ</option>
						</select>
					</div>
					<div class="sorting mr-auto">
						<select>
							<option value="1">12 cột</option>
							<option value="1">8 cột</option>
							<option value="1">4 cột</option>
						</select>
					</div>
					 

				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
                <p style="margin: 10px 0px -10px 0px;">Tìm thấy (<?=$number?>) kết quả chứa Từ khóa '<span style=" font-size: 20px;">
                    <?=$name?>
                </span>'.</p>
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
    $sql = "SELECT * FROM san_pham where ten_sp LIKE "."'%$name%'"."  ORDER BY ma_sp DESC LIMIT $tin,$data";
$stmt = $objConn->prepare($sql);
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
$sql = "SELECT * FROM san_pham where ten_sp LIKE "."'%$name%'"."  ORDER BY ma_sp DESC LIMIT $tin,$data";
$stmt = $objConn->prepare($sql);

//Thực thi câu lệnh
$stmt->execute();

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
				<div class="filter-bar d-flex flex-wrap align-items-center" style="font-size: 12px;">
					<div class="sorting mr-auto" >
						<select>
							<option value="1">12 cột</option>
							<option value="1">8 cột</option>
							<option value="1">4 cột</option>
						</select>
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






<?php include'footer.php'?>