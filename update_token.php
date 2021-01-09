<?php 
include 'db.php';
if(isset($_GET['usermail']) && isset($_GET['token'])){
    $query = "update user set token=? where usermail=?";
    $result = $con->prepare($query);
    $result->execute([$_GET['token'],$_GET['usermail']]);
}
?>