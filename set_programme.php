<?php 
include 'db.php';
if(isset($_GET['usermail']) && isset($_GET['programme_name'])){
    $usermail = $_GET['usermail']; 
    $programme_name = $_GET['programme_name']; 
    $query = "UPDATE user SET user_membership = concat(user_membership , ?,',') WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$programme_name,$usermail]);
    
    if($programme_name !="Daily Yoga Programme"){
        $query = "INSERT INTO `programms` (`programme_id`, `usermail`, `programme_name`, `watching`) VALUES (NULL, ?, ?, ?)";
        $result=$con->prepare($query);
        $result->execute([$usermail,$programme_name,1]);
    }
    
    echo "[";
    $reponse = array(); 
    $reponse['message'] ="programme Added!" ;
    echo json_encode($reponse);
    echo "]";
}


?>