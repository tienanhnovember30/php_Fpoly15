<?php
ob_start(); include'header-admin.php' ?>








        <!-- Header-->
        <?php  echo "<div class='box-form'>";?>
        <?php

//1. lấy dữ liệu đưa lên form cho người dùng sửa
//2. lấy dữ liệu người dùng post từ form và kiểm tra hợp lệ
//3. lưu vào CSDL

$id =intval($_GET['id']);

try{
    $stmt = $objConn->prepare("SELECT * FROM user WHERE ma_user = $id ");
    $stmt->execute();
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $row = $stmt->fetch();
    
    if(empty($row)){
        $_SESSION['err'] = 'Không tồn tại Role cần xóa. Bạn vừa yêu cầu xóa Role '. $id;
       
    }  
    
}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}
//=== làm chứ năng sửa







$err =[];
$quyent=$row['quyen_qtri'];
if(isset($_POST['btnSave'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $pass_word = $_POST['mk'];
    $sdt = $_POST['sdt'];
    $quyen_qtri = $_POST['quyen_qtri'];
  
    
    // kiểm tra
    if(empty($hoten)){
        $err[] = "Bạn chưa nhập họ tên";
    }


    if(empty($err)){
        // không có lỗi nhập sai dữ liệu
        // ghi vào csdl: UPDATE tb_role SET name=:post_name WHERE id=:get_id
        try{
            $stmt = $objConn->prepare("UPDATE user SET ho_ten=:post_ho_ten,email=:post_email,pass_word=:post_pass_word,sdt=:post_sdt,quyen_qtri=:post_quyen_qtri   WHERE ma_user=:get_id");
            // gắn dữ liệu vào tham số
            $stmt->bindParam(":post_ho_ten",$hoten); $stmt->bindParam(":get_id",$id);
            $stmt->bindParam(":post_email",$email);
            $stmt->bindParam(":post_pass_word",$pass_word);
            $stmt->bindParam(":post_sdt",$sdt);
            $stmt->bindParam(":post_quyen_qtri",$quyen_qtri);


           



            // thực thi câu lệnh
            $stmt->execute();
           header("Location:admin.php");
        }catch(PDOException $e){
            $err[] = "Loi truy van CSDL: ". $e->getMessage();
        }
    }  
} 
?>

<h1>Sửa User</h1>

<p style='color:red'> <?php echo implode('<br>',$err ); ?> </p>


<form action="" method="post">

 <h6 class="p-form-admin"> họ tên </h6> <input class="input-admin" type="text" name="hoten" value="<?php echo $row['ho_ten']; ?>"> 
 <h6 class="p-form-admin"> Email </h6> <input class="input-admin"  type="text" name="email" value="<?php echo $row['email']; ?>"> 
 <h6 class="p-form-admin"> Mật khẩu </h6> <input class="input-admin"  type="text" name="mk" value="<?php echo $row['pass_word']; ?>">
 <h6 class="p-form-admin">Số điện thoại </h6> <input class="input-admin"  type="text" name="sdt" value="<?php echo $row['sdt']; ?>">
 <h6 class="p-form-admin"> Quyền  </h6> <select type="text" name="quyen_qtri" >

 <optgroup label="Quyền hiện tại">


 class="input-admin"

 <option value="<?php if($row['quyen_qtri']==1){
     echo '1';
 }else{
    echo '0';
 }
 ?>">  <?php 
  if($quyent == 1){
     echo "Admin";

 }else{
    echo "User";
 }; 
 
?></option> 
</optgroup>




<optgroup label="Thay đổi mới">
    <option value="1" >Admin</option>
    <option value="0">User</option>

</optgroup>





</select>
<br>


  
  
    <button name="btnSave" class="aa" style="margin-top: 30px;">Cập nhật mới User</button>  <a href="admin.php"> danh sách</a>
</form>


        <?php echo "</div>"; ?>


        
    </div><!-- /#right-panel -->
    
    <!-- Right Panel -->

  
    <script src="vendors1/jquery/dist/jquery.min.js"></script>
    <script src="vendors1/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors1/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets1/js/main.js"></script>


    <script src="vendors1/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets1/js/dashboard.js"></script>
    <script src="assets1/js/widgets.js"></script>
    <script src="vendors1/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors1/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors1/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  
</body>

</html>
