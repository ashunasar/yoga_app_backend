<?php
include 'db.php';
if(isset($_GET['usermail'])){
    $usermail = $_GET['usermail'];
    $query = "SELECT * FROM `history` WHERE usermail=:usermail ORDER BY history_id ASC";

    $result = $con->prepare($query);
    $result->execute(['usermail'=>$usermail]);
            echo '{"data": [';
    $response = array(); 
    $i=1;
    while($date = $result->fetch()){
        $date = $date->date;
        $response["date$i"] = $date;
        $i++;
    }
    echo json_encode($response);
    echo ']}';

}

?>