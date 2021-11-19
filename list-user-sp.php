<?php include'header-admin.php';?>
     
        
        <?php  echo "<div class='div-admin' >";?>

<div style="margin: 14px 0px 30px 0px;position: relative;" >
<span class="til-admin" >Danh   sách Sản Phẩm</span>
<div style="position: absolute;right: 14px;
top: 18px; ">
<a class="aa" href="add-role-sp.php"  >Thêm sản phẩm</a>
</div>


</div>




        <?php
               
define("APP_PATH", __DIR__);
define('BASE_URL', '/assignment_web2041/assm/atshop');

$file_full_path = APP_PATH;
$url_image = BASE_URL;

// đoạn phân trang;
        if (!isset($_GET['product'])) {
            $product = 1;
        } else {
            $product = $_GET['product'];
        }
        $data = 10;
        $sql = "SELECT * FROM `san_pham`";
        $result = $objConn->prepare($sql);
        $result->execute();
        $number = $result->rowCount();
        $page = ceil($number / $data);
        $tin = ($product - 1) * $data;
// đoạn phân trang;


    //  thực thi câu lệnh xóa dữ liệu
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $objConn->prepare("DELETE FROM san_pham WHERE ma_sp = $id ");
        $stmt->execute();
    }

try{
    // SELECT * FROM tb_role
    $stmt = $objConn->prepare("SELECT * FROM san_pham  INNER  JOIN loai_sp on loai_sp.iddanhmuc=san_pham.iddanhmuc
     ORDER BY ma_sp DESC LIMIT $tin,$data");

    //Thực thi câu lệnh
    $stmt->execute();
    //Thiết lập chế độ lấy dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

   

    echo "<table class='table-admin' border='0' cellpadding='10'>
            <tr><th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>ảnh</th>

            <th>Size</th>
            <th>Màu sắc</th>
           

            <th>nội dung</th>
          
            <th>Tên Loại</th>
            <th>Trạng thái</th>
            
           
             <th>Action</th>
            </tr> 
            ";
    $stt=0;
        foreach(   $stmt->fetchAll() as $row ){
          
            $link_edit = 'edit-role-sp.php?id='.$row['ma_sp'];

            $link_delete = '?id='.$row['ma_sp'];
            $ten =$row['ten_sp'];
            $gia= number_format($row['gia']);
       


?>

<tr><td><?=  $stt += 1 ?> </td>
<?php
            echo "
                        <td> {$row['ten_sp']}</td>
                        <td> {$row['so_luong']}</td>
                        <td> {$gia}VNĐ</td>
                        <td style='margin-top: 40px; max-width: 55px;'> <img src='$url_image{$row['anh']}' width='200' /></td>
                        
                        <td> {$row['size']}</td>
                        <td> {$row['mau_sac']}</td>
                       
                        <td> {$row['noi_dung']}</td>
                     
                        <td> {$row['ten_loai']}</td>
                      <td> {$row['trang_thai']}</td>




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
   
>
<?= $t ?>
</a>

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
    <script src="vendors1/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors1/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  
</body>

</html>
