<?php 
include 'db.php';
if(isset($_GET['usermail']) && isset($_GET['programme_name'])){
    $usermail = $_GET['usermail']; 
    $programme_name = $_GET['programme_name']; 
    
    if($programme_name !="Daily Yoga Programme"){
        $query = "UPDATE programms set watching = watching + 1 WHERE usermail=? and programme_name=?";
        $result=$con->prepare($query);
        $result->execute([$usermail,$programme_name]);
        
        echo "[";
        $reponse = array(); 
        $reponse['message'] ="Watching updated!" ;
        echo json_encode($reponse);
        echo "]";
    }
    

}


?>


