<?php 
include 'db.php';
if(isset($_GET['usermail'])){
    $usermail = $_GET['usermail']; 
    $query = "SELECT user_membership FROM `user` WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$usermail]);
    
    
    echo "[";
    while($membership = $result->fetch()){
        $user_membership = $membership->user_membership;
        $exp = explode(',',$user_membership);

        for($i=0;$i<sizeof($exp) - 1;$i++){
            
            $query = "SELECT * FROM `plans` WHERE plan_name=?";
            $result = $con->prepare($query);
            $result->execute([$exp[$i]]);
            
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

            echo ($i == count($exp) - 2) ? '' :',';
        }
    }
    echo "]";
}

if(isset($_GET['usermail1']) && isset($_GET['type'])){
    $usermail = $_GET['usermail1']; 
    $query = "SELECT user_membership FROM `user` WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$usermail]);
    $exp = explode(",",$result->fetch()->user_membership);
//    print_r($exp);
    
    $all_plan = array();
    $query1 = "SELECT plan_name FROM `plans`";
    $result1 = $con->prepare($query1);
    $result1->execute();
    while($plan = $result1->fetch()){
      array_push($all_plan,$plan->plan_name);
    }
 
//    print_r($all_plan);echo "<br>";
//    echo count($all_plan);echo "<br>";
//    print_r($exp);echo "<br>";
//        echo count($exp);echo "<br>";
//    echo "<br>";
//       $result2=array_diff($exp,$all_plan);
//       $result2=array_merge(array_diff($exp,$all_plan),array_diff($exp,$all_plan));
//    echo count($all_plan);
//    echo "<br>";
//    echo count($exp);
    $result2 = count($all_plan) - count($exp) + 1 ;
//    print_r($result2);
//    echo "<br>";
     echo "[";
    $a=0;
    foreach($all_plan as $plan_name){
        if(!in_array($plan_name,$exp)){
            $a++;
//            echo $plan_name;
             $query = "SELECT * FROM `plans` WHERE plan_name=?";
            $result = $con->prepare($query);
            $result->execute([$plan_name]);
            
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
//            echo "<br>";
//            echo  "a = ".$a;
//            echo "<br>";
//            echo "b = " . $result2;
//            echo "<br>";
            echo ($a == $result2)  ? '' :',';
//           echo "<br>";
            
        }


    }
    
           echo "]";

}




if(isset($_GET['usermail1']) && isset($_GET['check'])){
    $usermail = $_GET['usermail1']; 
    $query = "SELECT user_membership FROM `user` WHERE usermail=?";
    $result = $con->prepare($query);
    $result->execute([$usermail]);
    $exp = explode(",",$result->fetch()->user_membership);

         echo "[";
    foreach($exp as $plan_name){
        if($plan_name == "Daily Yoga Programme"){
        echo "true";
        }
    }
    
           echo "]";

}












?>