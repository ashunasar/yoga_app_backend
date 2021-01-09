<?php 
include "db.php";


if(sizeOf($_GET) == 10){
    $count_query = 10;
   foreach($_GET as $key => $value){
       
       if($value == ''){
               echo '{"data": [';
        $response = array(); 
        $response['message'] = 'Feild Should not be empty!';
        echo json_encode($response);
        echo ']}';
       }else{
           $query = "UPDATE `user` SET $key =:value WHERE usermail =:usermail";
       $result = $con->prepare($query);
       $result->execute(['value'=>$value,'usermail'=>$_GET['usermail']]);
       $count = $result->rowCount();
       if($count == 1){$count_query++;}
       }
       

   }
    echo '{"data": [';
        $response = array(); 
        $response['message'] = 'Profile updated';
        echo json_encode($response);
        echo ']}';
}else{
    echo '{"data": [';
        $response = array(); 
        $response['message'] = 'Something went wrong!';
        echo json_encode($response);
        echo ']}';
}

?>