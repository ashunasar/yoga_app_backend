<?php 
include 'db.php';

function createJsonMsg($msg){
     echo '{"data": [';
        $response = array(); 
        $response['message'] = $msg;
        echo json_encode($response);
        echo ']}';
}

if(isset($_GET['pass']) && isset($_GET['newpass']) && isset($_GET['conpass']) && isset($_GET['usermail'])){
    
    $pass = $_GET['pass'];
    $newpass = $_GET['newpass'];
    $conpass = $_GET['conpass'];
    $usermail = $_GET['usermail'];
    
    $check_user = "select * from user where usermail=:usermail and userpass=:pass";
    $result_check = $con->prepare($check_user);
    $result_check->execute(['usermail'=>$usermail,'pass'=>$pass]);
    
    if($result_check->rowCount() > 0){
            
    if($newpass == $conpass){
            $query = "update user set userpass=:newpass where usermail=:usermail and userpass=:pass";
    $result = $con->prepare($query);
    $result->execute(['newpass'=> $newpass,'usermail'=>$usermail,'pass'=>$pass]);
    if($result->rowCount() > 0){
createJsonMsg('Password Changed!');
    
    }
        else{createJsonMsg('New password can\'t be old password');}
    }
        else{createJsonMsg('Password didn\'t matched! 111');}
    }
    else{createJsonMsg('Incorect old Password!');}

}else{
    createJsonMsg('Something went wrong!');
}

?>