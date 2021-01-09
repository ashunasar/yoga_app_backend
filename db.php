<?php 
//$host = "mysql:host=localhost; dbname=ymccehbxvz";
//$user = "ymccehbxvz";
//$pass = "6H5DmJXk9D";

$host = "mysql:host=localhost; dbname=yogaapp";
$user = "root";
$pass = "";


try{
    $con = new PDO($host,$user,$pass);
    $con-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}catch(PDOException $e){
print($e->getMessage());    
}

?>