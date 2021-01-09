<?php 
 include 'db.php';

if(isset($_GET['usermail']) && isset($_GET['method'])){
    $usermail = $_GET['usermail'];
    $query = "SELECT streak FROM `history` WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$usermail]);
    
    echo '{"data": [';
    while($streak  = $result->fetch()){

    $response = array(); 
    $response['streak'] = $streak->streak;
    

    }
    echo json_encode($response);
    echo ']}';
}

if(isset($_GET['usermail']) && isset($_GET['value'])){
    $usermail = $_GET['usermail'];
    $value    = $_GET['value'];
    $query = "UPDATE `history` SET `streak`=? WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$value,$usermail]);
    
    echo '{"data": [';
    $response = array(); 
    $response['streak'] = "streak updated!";
    echo json_encode($response);
    echo ']}';
}


?>