<?php 
include 'db.php';

if(isset($_GET['usermail'])){
    $usermail = $_GET['usermail'];
    $query  = "SELECT watching FROM `programms` WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$usermail]);
    $num = $result->fetch()->watching;
    
    



    $day = "day$num";
    $query = 'SELECT * FROM `new_programme` WHERE day=:day';
    $result = $con->prepare($query);
    $result->execute(['day'=>$day]);

    
    echo '[';
        $response = array(); 
        while($yoga = $result->fetch()){
        $yoga_name = $yoga->yoga_name;
        $instructions = $yoga->instructions;
        $objective = $yoga->objective;
        $video_path = $yoga->video_path;
        $thumbnail_path = $yoga->thumbnail_path;

        $exp_name = explode('*',$yoga_name);
        $exp_instructions = explode('*',$instructions);
        $exp_objective = explode('*',$objective);
        $exp_vid = explode('*',$video_path);
        $exp_thumbnail_path = explode('*',$thumbnail_path);
    
            
        for($i = 0;$i<count($exp_name);$i++){
            $response = array();
            $response["yoga_name"] = $exp_name[$i];
            $response["instructions"] = $exp_instructions[$i];
            $response["objective"] = $exp_objective[$i];
            $response["video_path"] = $exp_vid[$i];
            $response["thumbnail_path"] = $exp_thumbnail_path[$i];
            echo json_encode($response);
            echo ($i == count($exp_name) - 1) ? '' :',';
          
        }
        
        
        
    }
    echo ']';
    
}

?>