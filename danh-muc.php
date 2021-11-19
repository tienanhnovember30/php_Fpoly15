<?php 
ob_start();
include'header-admin.php' ?>





<?php  echo "<div class='div-admin-danhmuc' >";?>

<div style="margin: 14px 0px 30px 0px;position: relative;" >
<span class="til-admin" >Danh   sách Danh Mục</span>



</div>



<?php
    if (!isset($_GET['product'])) {
        $product = 1;
    } else {
        $product = $_GET['product'];
    }
    $data = 6;
     $sql = "SELECT * FROM `loai_sp`";
   
    $result = $objConn->prepare($sql);
    $result->execute();
    $number = $result->rowCount();
    
    $page = ceil($number / $data);
    $tin = ($product - 1) * $data;



//  thực thi câu lệnh xóa dữ liệu
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $objConn->prepare("DELETE FROM loai_sp WHERE iddanhmuc = $id ");
    $stmt->execute();
}

try{

// SELECT * FROM tb_role
$stmt = $objConn->prepare("SELECT * FROM loai_sp ORDER BY iddanhmuc asc LIMIT $tin,$data ");

//Thực thi câu lệnh
$stmt->execute();
//Thiết lập chế độ lấy dữ liệu
$stmt->setFetchMode(PDO::FETCH_ASSOC);



echo "<table class='table-admin' border='0' cellpadding='10'>
    <tr><th>STT</th>
    <th>Tên Danh Mục</th>
    <th>Ghi chú</th>
   
    
    
   
     <th>Action</th>
    </tr> 
    ";
    $stt=0;
foreach(   $stmt->fetchAll() as $row ){
   // $link_delete = 'delete-role.php?id='.$row['ma_user'];
    $link_edit = 'edit-danh-muc.php?id='.$row['iddanhmuc'];

    $link_delete = 'danh-muc.php?id='.$row['iddanhmuc'];
    $ten =$row['ten_loai'];

?>
    <tr><td><?=  $stt += 1 ?> </td>



 <?php      echo "         <td> {$row['ten_loai']}</td>
                            <td> {$row['ghi_chu']}</td>
                
            
                <td> 
                
                <a class='td-edit-admin' data-toggle='tooltip' data-placement='top' title='Edit' href='$link_edit'><i class='fa fa-pencil-square-o' aria-hidden='true' style='color:green; font-size: 20px;' ></i></a> 

                     <a href='$link_delete' data-toggle='tooltip' data-placement='top' title='Delete'

                     "; ?> 
                      onclick="return confirm('Bạn chắc chắn muốn XÓA tài khoản  | <?=$ten?> | ?')"
                      
                      <?php echo "<i class='fa fa-trash-o' style='color:red; font-size: 20px;' ></i></a>

                     
                      
                    
                      
                      </td>
          </tr>";
} 

echo '</table>'; 

}catch(PDOException $e){
echo "<br>Loi truy van CSDL: ".$e->getMessage();
}




?> 
<div class=""> 
    <?php
for ($t = 1; $t <= $page; $t++) { ?>
<a name="" id="" class="btn btn-primary pt-user" href="?product=<?= $t ?>" role="button" style=" margin-top: 20px; border-radius: 5px;"

><?= $t ?></a>

<?php

}
?>
    </div>

<?php  echo "</div>";?>
<div class="danhmuc_right">
    <?php
    $err=[];
    if(isset($_POST['danhmuc_btn'])){

        $danhmucmoi = $_POST['danhmucmoi'];
        $ghichu = $_POST['ghi_chu'];
        $check = "SELECT * FROM loai_sp WHERE ten_loai='$danhmucmoi'";
        $cout = $objConn->prepare($check);
        $cout->execute();
        if ($cout->rowCount() > 0) {
            $error = "Danh mục đã tồn tại !";
        } else {

            $stmt= $objConn->prepare("INSERT INTO loai_sp(ten_loai,ghi_chu) VALUES(:ten_loai,:ghi_chu)");
            $stmt->bindParam(":ten_loai", $danhmucmoi);
            $stmt->bindParam(":ghi_chu", $ghichu);
             $stmt->execute();

            header("Location:danh-muc.php");
          
        }



        

    }
?>
    
    
    
    <h4>Thêm Danh Mục mới</h4>
    <form action="danh-muc.php?product=1"  method="POST"  >
    
         
         <?php if (isset($error)) { ?>
            <p class="alert alert-danger" style="margin-top: 30px;"><?= $error ?></p>
        <?php

        } ?>
    <input name="danhmucmoi" style="border-radius: 5px;margin-bottom: 40px;margin-top: 40px;" type="text" placeholder="Danh Mục" required>
    <input type="text" style="border-radius: 5px;margin-bottom: 40px;" name="ghi_chu"  placeholder="Ghi chú" required>
<br >



<button type="submit" name="danhmuc_btn" class="aa" >Thêm Mới</button>
    </form>
</div>



</div><!-- /#right-panel -->













<?php include'footer-admin.php' ?>