<?php
include 'db.php';
if(isset($_GET['user_mail']) && isset($_GET['question1']) && isset($_GET['question2']) && isset($_GET['question3']) && isset($_GET['question4'])){
    $user_mail = $_GET['user_mail'];
    $question1 = $_GET['question1'];
    $question2 = $_GET['question2'];
    $question3 = $_GET['question3'];
    $question4 = $_GET['question4'];
    $query = "INSERT INTO `quesans` (`ques_id`, `user_email`, `question1`, `question2`, `question3`, `question4`) VALUES (NULL, ?,?,?,?,?)";
    $result = $con->prepare($query);
    $result->execute([$user_mail,$question1,$question2,$question3,$question4]);
        echo '{"data": [';
        $response = array(); 
        $response['message'] = 'Answer updated!';
        echo json_encode($response);
        echo ']}';
}
?>