<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Send Notification</h4>
                  
                </div>
                <div class="card-body">
                  <form action="#" method="post" enctype="multipart/form-data">

                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control" required>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Message</label>
                          <input type="text" name="msg" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
             <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Send Notification By Programme</h4>
                  
                </div>
                <div class="card-body">
                  <form action="#" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          
                       <select name="programme_name" id="" style="all: revert;height: 40px;width: 200px;padding-left: 10px;border: solid #9831b0 2px;border-radius: 7px;color: #9229ac;">
                           <option value="Daily Yoga Programme">Daily Yoga Programme</option>
                           <option value="new_programme">new_programme</option>
                       </select>
                        </div>
                      </div>
                    </div>
                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control" required>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Message</label>
                          <input type="text" name="msg" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <button name="submit_pr" type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

<?php 
    
    function notify($title,$body,$token){
    $url = "https://fcm.googleapis.com/fcm/send";
//$token = "";
$serverKey='AAAAfeGAtDc:APA91bGBT64ZUKlkDcj66gaJqa09mg2QvmMgpTgOfjWD2EhMqoXKUWjGwBhJTIxc0raDzQTQrcVTmvs4l4dIlOrQx01mlUaR4x64zqTgCaamqJ1YuLSY0cpYbDDKn6hihU8f5U9mYT_A';
//$title = "Title";
//$body = "Body of the message";
$notification = array('title' =>$title , 'text' => $body, 'sound' => 'default', 'badge' => '1');
$arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
$json = json_encode($arrayToSend);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key='. $serverKey;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST,

"POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
//Send the request
$response = curl_exec($ch);
//Close request
if ($response === FALSE) {
die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);
}
    
    
    
if(isset($_POST['submit'])){
    
    $title = $_POST['title'];
    $msg   = $_POST['msg'];

    $query  = "SELECT token FROM `user`";
    $result = $con->prepare($query);
    $result->execute();
    
   while($user = $result->fetch()){
  $token = $user->token;
       notify($title,$msg,$token);
   } 
    
}

if(isset($_POST['submit_pr'])){
    
    $programme_name = $_POST['programme_name'];
    $title          = $_POST['title'];
    $msg            = $_POST['msg'];

    $query  = "SELECT * FROM `programms` WHERE programme_name=? ";
    $result = $con->prepare($query);
    $result->execute([$programme_name]);
    
   while($user = $result->fetch()){
 $token = $user->token;
       notify($title,$msg,$token);
   } 
    
}


?>

  <?php include "includes/footer.php"?>