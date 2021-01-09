<?php
include 'db.php';

if(isset($_GET['get_plans'])){
    $query = "SELECT * FROM `plans`";
    $result = $con->prepare($query);
    $result->execute();
    $count = $result->rowCount();
    echo '[';
    $i = 0;
    while($plan = $result->fetch()){
        $plan_name = $plan->plan_name;
        $plan_discp = $plan->plan_discp;
        $plan_price = $plan->plan_price;
        $plan_image = $plan->plan_image;
        
        $response = array();
        $response['plan_name'] = $plan_name;
        $response['plan_discp'] = $plan_discp;
        $response['plan_price'] = $plan_price;
        $response['plan_image'] = "http://phpstack-250897-1281769.cloudwaysapps.com/signup/panel/" . $plan_image;
        
        echo json_encode($response);
        echo ($i == $count - 1) ? '' :',';
        $i++;
    }
    
    echo ']';
    
}

?>