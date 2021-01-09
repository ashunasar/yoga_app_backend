<?php 
include 'db.php';


$query ='SELECT * FROM `quesans` WHERE user_email=:email';
$result = $con->prepare($query);
$result->execute(['email'=>'default@email.com']);

while($ques = $result->fetch()){
    $question1Ans = $ques->qusetion1;
    $question2Ans = $ques->qusetion2;
    $question3Ans = $ques->qusetion3;
    $question4Ans = $ques->qusetion4;
    
    $ques1 = explode(',',$question1Ans);
    $ques2 = explode(',',$question2Ans);
    $ques3 = explode(',',$question3Ans);
    $ques4 = explode(',',$question4Ans);
    
        $response = array(); 
        echo '{"data": [';
        $response["question1"] = $ques1[0];
        for($i=1;$i<5;$i++){
        $response["question1Ans$i"] = $ques1[$i];
        }

        $response["question2"] = $ques2[0];
        for($i=1;$i<5;$i++){
        $response["question2Ans$i"] = $ques2[$i];
        }
    
       $response["question3"] = $ques3[0];
        for($i=1;$i<5;$i++){
        $response["question3Ans$i"] = $ques3[$i];
        }
        $response["question4"] = $ques4[0];
        for($i=1;$i<5;$i++){
        $response["question4Ans$i"] = $ques4[$i];
        }
        echo json_encode($response);
        echo ']}';
}

?>