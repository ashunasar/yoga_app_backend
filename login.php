<?php 
include 'db.php';

if(isset($_GET['usermail']) && isset($_GET['userpass'])){

    $usermail = $_GET['usermail'];
    $userpass = $_GET['userpass'];
    
    $query = "SELECT * FROM `user` WHERE usermail= :usermail";
    $result = $con->prepare($query);
    $result->execute(['usermail'=>$usermail]);
    
    $count = $result->rowCount();
    
    if($count < 1){
        echo '{"data": [';
    $response = array(); 
    $response['message'] = 'Email Not Registered';
    echo json_encode($response);
        echo ']}';
    }
    
    else{
    $query1 = "SELECT * FROM `user` WHERE usermail= :usermail and userpass=:userpass";
    $result1 = $con->prepare($query1);
    $result1->execute(['usermail'=>$usermail,'userpass'=>$userpass]);
    $count_num = $result1->rowCount();
    if($count_num > 0){
    echo '{"data": [';
    $response1 = array(); 
    $response1['message'] = 'success';
    echo json_encode($response1);
    echo ']}';
    }else{
    echo '{"data": [';
    $response1 = array(); 
    $response1['message'] = 'Invalid Email or Password!';
    echo json_encode($response1);
    echo ']}';
    }


    }
    
}


?>