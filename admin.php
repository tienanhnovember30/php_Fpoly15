<?php include'header-admin.php';?>



        <?php  echo "<div class='div-admin' >";?>

        <div style="margin: 14px 0px 30px 0px;position: relative;" >
    <span class="til-admin" >Danh   sách User</span>
      <div style="position: absolute;right: 14px;
    top: 18px; ">
        <a class="aa" href="add-role.php"  >add User</a>
        </div>


        </div>

  

        <?php
        if(isset($_SESSION['err'])){
            echo "<p style='color:red'>".$_SESSION['err']."</p>";
            unset($_SESSION['err']);
        }
            if (!isset($_GET['product'])) {
                $product = 1;
            } else {
                $product = $_GET['product'];
            }
            $data = 10;
            $sql = "SELECT count(*) FROM `san_pham`";
            $result = $objConn->prepare($sql);
            $result->execute();
            $number = $result->fetchColumn();
            $page = ceil($number / $data);
            $tin = ($product - 1) * $data;



        //  thực thi câu lệnh xóa dữ liệu
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $stmt = $objConn->prepare("DELETE FROM user WHERE ma_user = $id ");
            $stmt->execute();
        }

try{

    // SELECT * FROM tb_role
    $stmt = $objConn->prepare("SELECT * FROM user ORDER BY ma_user DESC LIMIT $tin,$data ");

    //Thực thi câu lệnh
    $stmt->execute();
    //Thiết lập chế độ lấy dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

   

    echo "<table class='table-admin' border='0' cellpadding='10'>
            <tr><th>STT</th>
            <th>họ và tên</th>
            <th>email</th>
            <th>tài khoản</th>
            <th>Mật khẩu</th>

            <th>Số điện thoại</th>
            <th>Quyền quản trị</th>
         
            
           
             <th>Action</th>
            </tr> 
            ";
            $stt=0;
        foreach(   $stmt->fetchAll() as $row ){
           // $link_delete = 'delete-role.php?id='.$row['ma_user'];
            $link_edit = 'edit-role.php?id='.$row['ma_user'];

            $link_delete = 'admin.php?id='.$row['ma_user'];
            $ten =$row['ho_ten'];
       
?>
            <tr><td><?=  $stt += 1 ?> </td>



         <?php      echo "         <td> {$row['ho_ten']}</td>
                        <td> {$row['email']}</td>
                        <td> {$row['username']}</td>
                        <td> {$row['pass_word']}</td>
                    
                        <td> {$row['sdt']}</td>
                        <td> {$row['quyen_qtri']}</td>
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
<div class="    "> 
            <?php
        for ($t = 1; $t <= $page; $t++) { ?>
		<a name="" id="" class="btn btn-primary pt-user" href="?product=<?= $t ?>" role="button" style=" margin-top: 20px; border-radius: 5px;"
   
><?= $t ?></a>
	<?php

	}
	?>
            </div>
        <?php  echo "</div>";?>
       
        
       




        
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
 
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();    
    });
    </script>
  
</body>

</html>
