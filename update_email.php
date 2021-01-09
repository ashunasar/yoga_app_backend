<?php 
include 'db.php';

function createJsonMsg($msg){
     echo '{"data": [';
        $response = array(); 
        $response['message'] = $msg;
        echo json_encode($response);
        echo ']}';
}

if(isset($_GET['pass']) && isset($_GET['usermail']) && isset($_GET['newmail'])){
    
    $pass = $_GET['pass'];
    $usermail = $_GET['usermail'];
    $newmail = $_GET['newmail'];
    
    $check_user = "select * from user where usermail=:usermail and userpass=:pass";
    $result_check = $con->prepare($check_user);
    $result_check->execute(['usermail'=>$usermail,'pass'=>$pass]);
    
    if($result_check->rowCount() > 0){
            
    if($usermail != $newmail){
            $query = "update user set usermail=:newmail where usermail=:usermail and userpass=:pass";
    $result = $con->prepare($query);
    $result->execute(['newmail'=> $newmail,'usermail'=>$usermail,'pass'=>$pass]);
    if($result->rowCount() > 0){
createJsonMsg('Email Updated!');
    
    }
        else{createJsonMsg('Something went wrong!');}
    }
        else{createJsonMsg('New email can\'t be old email');}
    }
    else{createJsonMsg('Wrong Password!');}

}else{
    createJsonMsg('Something went wrong!111');
}

?>