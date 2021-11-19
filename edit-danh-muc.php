<?php include'header-admin.php' ?>



<div class='div-admin-danhmuc' >

<?PHP
        $id = intval($_GET['id']);

   


        try {
            $stmt = $objConn->prepare("SELECT * FROM Loai_sp  WHERE iddanhmuc = $id ");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $row = $stmt->fetch();

            
        } catch (PDOException $e) {
            echo "<br>Loi truy van22222 CSDL: " . $e->getMessage();
        }
        
$err =[];
if(isset($_POST['btn'])){
    $tenloai = $_POST['ten_loai'];
    $ghichu = $_POST['ghi_chu'];
   
  

    // kiểm tra
 


    if(empty($err)){
        // không có lỗi nhập sai dữ liệu
        // ghi vào csdl: UPDATE tb_role SET name=:post_name WHERE id=:get_id
        try{
            $stmt = $objConn->prepare("UPDATE loai_sp SET ten_loai=:post_ten_loai,ghi_chu=:post_ghi_chu  WHERE iddanhmuc=:get_id");
            // gắn dữ liệu vào tham số
            $stmt->bindParam(":post_ten_loai",$tenloai); 
            $stmt->bindParam(":get_id",$id);
            $stmt->bindParam(":post_ghi_chu",$ghichu);
       
            // thực thi câu lệnh
            $stmt->execute();

            header("Location:danh-muc.php");
        }catch(PDOException $e){
            $err[] = "Loi truy van CSDL: ". $e->getMessage();
        }
    }  
} 
?>


<div style="margin: 14px 0px 30px 0px;position: relative;" >
<span class="til-admin" >Sửa Danh Mục</span>



</div>

<form action="" method="post">
<p>Tên Danh Mục</p>
<input type="text" name="ten_loai" value="<?php echo   $row['ten_loai']?>"><br>
<p style="margin-top: 20px;">Ghi Chú</p>

<input type="text" name="ghi_chu" value="<?php echo   $row['ghi_chu']?>"><br>

<button  class="aa" name="btn" style="margin-top: 20px;">Cập nhật </button>  <a href="http:danh-muc.php">QUAY LẠI</a>


</form>


</DIV>


<?php include'footer-admin.php' ?>