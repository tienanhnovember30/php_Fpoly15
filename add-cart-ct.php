<?php session_start();
$_SESSION['cart'];
if(empty($_GET['id'])){
	// không có id sản phẩm thì chuyển thẳng về trang danh sách.
	header('Location:index.php');
}

$idsp = intval($_GET['id']); // lấy số nguyên thì biến idsp luôn là số, không sợ lỗi.
 

if($idsp <=0){
	// đầu vào không phải là số hoặc số âm thì không chấp nhận.
	header('Location:index.php');
}

//====== kiểm tra giỏ hàng: Giỏ hàng chưa hoạt động thì khai báo sẵn mảng
if(!isset($_SESSION['cart']))
	$_SESSION['cart'] = [];



if(!isset($_SESSION['cart'][$idsp]))
{ // chưa có sản phẩm trong giỏ hàng
	$_SESSION['cart'][$idsp] = 1;
}else // sản phẩm này đã có rồi, cần tăng số lượng
	$_SESSION['cart'][$idsp] ++;

// xong việc cho vào giỏ hàng ==> chuyển trang.
header('Location:single-product.php');
?>