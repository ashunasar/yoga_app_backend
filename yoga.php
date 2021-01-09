<?php 
include 'db.php';
if(isset($_GET['yoga'])){
    echo '[';
 $query = "SELECT * FROM `plans` WHERE plan_name=?";
            $result = $con->prepare($query);
            $result->execute(["Daily Yoga Programme"]);
            
            while($plan = $result->fetch()){
            $reponse = array();
            $reponse['plan_name'] = $plan->plan_name;
            $reponse['plan_discp'] = $plan->plan_discp;
            $reponse['plan_price'] = $plan->plan_price;
            $reponse['plan_image'] = $plan->plan_image;
            $reponse['plan_benifits'] = $plan->plan_benifits;
            $reponse['plan_time'] = $plan->plan_time;
            $reponse['plan_calories'] = $plan->plan_calories;
            $reponse['plan_number_of_poses'] = $plan->plan_number_of_poses;
            $reponse['plan_objectives'] = $plan->plan_objectives;
                
                
            echo json_encode($reponse);

            }
    echo "]";
    
}

?>