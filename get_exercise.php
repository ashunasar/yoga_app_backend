<?php 
if(isset($_GET['programme_name']) && isset($_GET['usermail'])){
    
    
    $programme_name = $_GET['programme_name'];
    $usermail = $_GET['usermail'];
    
    if($programme_name == "Daily Yoga Programme"){
    
        echo file_get_contents("http://phpstack-250897-1281769.cloudwaysapps.com/signup/yoga_details.php?yoga=hello");  
    }
    
    if($programme_name == "new_programme"){

        echo file_get_contents("http://phpstack-250897-1281769.cloudwaysapps.com/signup/new_programme.php?usermail=$usermail");  
    }
    
    
}

?>