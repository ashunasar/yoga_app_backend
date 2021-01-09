<?php
include 'db.php';
if(isset($_GET['user_mail'])){
    $usermail = $_GET['user_mail'];
    $query = "SELECT * FROM `user` WHERE usermail= :usermail";
    $result = $con->prepare($query);
    $result->execute(['usermail'=>$usermail]);
    while($user = $result->fetch()){
       $username     = $user->username;
       $user_mobile  = $user->user_mobile;
       $user_age     = $user->user_age;
       $user_height  = $user->user_height;
       $height_type  = $user->height_type;
       $height_inch  = $user->height_inch;
       $user_weight  = $user->user_weight;
       $weight_type  = $user->weight_type;
       $user_gender  = $user->user_gender;
       $bmi_result   = $user->bmi_result;
        
        echo '{"data": [';
        $response = array(); 
        $response['username']    = $username;
        $response['user_mobile'] = $user_mobile;
        $response['user_age']    = $user_age;
        $response['user_height'] = $user_height;
        $response['height_type'] = $height_type;
        $response['height_inch'] = $height_inch;
        $response['user_weight'] = $user_weight;
        $response['weight_type'] = $weight_type;
        $response['user_gender'] = $user_gender;
        $response['bmi_result']  = $bmi_result;
        echo json_encode($response);
        echo ']}';
   
    }
}

?>