<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "mdq";

try{
    $conex = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

echo $e->getMessage();

}
     
?>