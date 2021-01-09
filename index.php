<?php 
include 'db.php';

if(isset($_GET['username']) && isset($_GET['usermail']) && isset($_GET['userpass'])){

    $username = $_GET['username'];
    $usermail = $_GET['usermail'];
    $userpass = $_GET['userpass'];
    
    $query = "SELECT * FROM `user` WHERE usermail= :usermail";
    $result = $con->prepare($query);
    $result->execute(['usermail'=>$usermail]);
    
    $count = $result->rowCount();
    
    if($count > 0){
        echo '{"data": [';
    $response = array(); 
    $response['message'] = 'Email Already Registered';
    echo json_encode($response);
        echo ']}';
    }else{
    $query1 = "INSERT INTO `user` (`user_id`, `username`, `usermail`, `userpass`) VALUES (NULL, :username, :usermail, :userpass)";
    $result1 = $con->prepare($query1);
    $result1->execute(['username'=>$username,'usermail'=>$usermail,'userpass'=>$userpass]);
             echo '{"data": [';
    $response1 = array(); 
    $response1['message'] = 'success';
    echo json_encode($response1);
         echo ']}';
    }
    
}


?>