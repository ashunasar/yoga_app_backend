<?php
include 'db.php';
if(isset($_GET['usermail']) && isset($_GET['height']) && isset($_GET['weight']) && isset($_GET['age']) && isset($_GET['bmi']) && isset($_GET['gender']) && isset($_GET['height_type']) && isset($_GET['height_inch']) && isset($_GET['weight_type'])){
 
        $usermail           = $_GET['usermail']; 
        $height             = $_GET['height'];
        $height_type        = $_GET['height_type'];
        $height_inch        = $_GET['height_inch'];
        $weight             = $_GET['weight']; 
        $weight_type        = $_GET['weight_type']; 
        $age                = $_GET['age']; 
        $bmi                = $_GET['bmi']; 
        $gender             = $_GET['gender']; 
    
$query = "UPDATE `user` SET `user_age`=:age, `user_height`=:height,`height_type`=:height_type,`height_inch`=:height_inch,`user_weight`=:weight,`weight_type`=:weight_type,`user_gender`=:gender,`bmi_result`=:bmi WHERE usermail=:usermail";
    $result = $con->prepare($query);
    $result->execute(['usermail'=>$usermail,
                      'height'=>$height,
                      'height_type'=>$height_type,
                      'height_inch'=>$height_inch,
                      'weight'=>$weight,
                      'weight_type'=>$weight_type,
                      'age'=>$age,
                      'bmi'=>$bmi,
                      'gender'=>$gender,
                     ]);
    
         echo '{"data": [';
        $response = array(); 
        $response['message'] = "BMI Stored in database";
        echo json_encode($response);
        echo ']}';
}else{
             echo '{"data": [';
        $response = array(); 
        $response['message'] = "Something went wrong!";
        echo json_encode($response);
        echo ']}';
}

?>