<?php 
 include 'db.php';

if(isset($_GET['usermail']) && isset($_GET['method'])){
    $usermail = $_GET['usermail'];
    $query = "SELECT max_streak FROM `user` WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$usermail]);
    
    if($result->rowCount() == 1){
            echo '{"data": [';
    while($streak  = $result->fetch()){

    $response = array(); 
    $response['max_streak'] = $streak->max_streak;
    

    }
    echo json_encode($response);
    echo ']}';
    }else{
            echo '{"data": [';
    $response = array(); 
    $response['error'] = "something went wrong!";
    echo json_encode($response);
    echo ']}';
    }

}

if(isset($_GET['usermail']) && isset($_GET['value'])){
    $usermail = $_GET['usermail'];
    $value    = $_GET['value'];
    $query = "UPDATE `user` SET `max_streak`=? WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$value,$usermail]);
    
    echo '{"data": [';
    $response = array(); 
    $response['streak'] = "max streak updated!";
    echo json_encode($response);
    echo ']}';
}


?>