<?php
include 'db.php';
if(isset($_GET['usermail']) && isset($_GET['date'])){
 
    $usermail   = $_GET['usermail'];  
    $date       = $_GET['date'];  
    $attendance = 'present';  
    $query = "INSERT INTO `history` (`history_id`, `usermail`, `date`, `attendance`) VALUES (NULL, :usermail,:date ,:attendance)";
    $result = $con->prepare($query);
    $result->execute(['usermail'=>$usermail,'date'=>$date,'attendance'=>$attendance]);
}

?>