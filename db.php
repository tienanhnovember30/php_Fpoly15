<?php
$host = 'localhost';
$db_user = 'root';
$db_passwd = '';
$db_name = 'database_web_bangiay';

try{

    $objConn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_passwd);

    $objConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //echo "Ket noi CSDL thanh cong!"; 

}catch(Exception $ex) {
    die("Loi ket noi CSDL: " .$ex->getMessage() );
}