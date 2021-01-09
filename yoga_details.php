<?php 
include 'db.php';




if(isset($_GET['yoga'])){
    
    
    $get_date = 'select watching from programms where usermail=?';
    $get_result = $con->prepare($get_date);
    $get_result->execute(['default@mail.com']);
    $num = $get_result->fetch()->watching;
    $day = "day$num";
    
    $query = 'SELECT * FROM `yoga_details` where day=? ORDER BY yoga_details_id DESC LIMIT 1';
    $result = $con->prepare($query);
    $result->execute([$day]);

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