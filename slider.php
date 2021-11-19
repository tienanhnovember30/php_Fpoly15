<?php include'header-admin.php' ?>

<?php  echo "<div class='div-admin' >";?>

<div style="margin: 14px 0px 30px 0px;position: relative;" >
<span class="til-admin" >Danh   sách Slider Show</span>
<div style="position: absolute;right: 14px;
top: 18px; ">
<a class="aa" href="add-slide.php"  >Thêm Slider mới</a>
</div>


</div>




        <?php
               
define("APP_PATH", __DIR__);
define('BASE_URL', '/assignment_web2041/assm/atshop');

$file_full_path = APP_PATH;
$url_image = BASE_URL;
        if (!isset($_GET['product'])) {
            $product = 1;
        } else {
            $product = $_GET['product'];
        }
        $data = 10;
        $sql = "SELECT * FROM `slide`";
        $result = $objConn->prepare($sql);
        $result->execute();
        $number = $result->rowCount();
        $page = ceil($number / $data);
        $tin = ($product - 1) * $data;



    //  thực thi câu lệnh xóa dữ liệu
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $objConn->prepare("DELETE FROM slide WHERE ma_slide = $id ");
        $stmt->execute();
    }

try{
    // SELECT * FROM tb_role
    $stmt = $objConn->prepare("SELECT * FROM slide 
     ORDER BY ma_slide DESC LIMIT $tin,$data");
    //Thực thi câu lệnh
    $stmt->execute();
    //Thiết lập chế độ lấy dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

   

    echo "<table class='table-admin' border='0' cellpadding='10'>
            <tr><th>STT</th>
            <th>Tên Slider</th>
            <th>ảnh</th>
            <th>Ngày đăng</th>
            <th>Ghi Chú</th>

           
            
           
             <th>Action</th>
            </tr> 
            ";
    $stt=0;
        foreach(   $stmt->fetchAll() as $row ){
          
            $link_edit = 'edit-slide.php?id='.$row['ma_slide'];

            $link_delete = '?id='.$row['ma_slide'];
            $ten =$row['name_slide'];
            
       


?>

<tr><td><?=  $stt += 1 ?> </td>
<?php
            echo "
                        <td> {$row['name_slide']}</td> 
                        <td style='margin-top: 40px; max-width: 55px;'> <img src='$url_image{$row['anh_slide']}' width='200' /></td>
                        <td> {$row['ngay_dang_slide']}</td>
                        <td> {$row['link_slide']}</td>
                       
                        
                     
                      



                        <td>

                        <a class='td-edit-admin' data-toggle='tooltip' data-placement='top' title='Edit' href='$link_edit'><i class='fa fa-pencil-square-o' aria-hidden='true' style='color:green; font-size: 20px;' ></i></a> 

                             <a href='$link_delete' data-toggle='tooltip' data-placement='top' title='Delete'

                             "; ?> 
                              onclick="return confirm('Bạn chắc chắn muốn XÓA SLIDER  | <?=$ten?> | ?')"
                              
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




    </div>
        


        
    </div><!-- /#right-panel -->
    
















<?php include'footer-admin.php' ?>