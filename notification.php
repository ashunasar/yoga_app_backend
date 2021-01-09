<?php
$url = "https://fcm.googleapis.com/fcm/send";
$token = "fgChMtXMRWy3X60Cp5DbO8:APA91bHMmbpbJj_EhrMRwoSWIGoHqKgGSQmBqZ3vSNLdWU7kHXv3nksIGwzYcYrXOFj1K4IzWgbAepnbuUKEajl93wTnxTSMolQryZSiY3CupfdZiotZPOD5j5KqZm-CGCj5LBXqDDjD";
$serverKey='AAAAfeGAtDc:APA91bGBT64ZUKlkDcj66gaJqa09mg2QvmMgpTgOfjWD2EhMqoXKUWjGwBhJTIxc0raDzQTQrcVTmvs4l4dIlOrQx01mlUaR4x64zqTgCaamqJ1YuLSY0cpYbDDKn6hihU8f5U9mYT_A';
$title = "Title";
$body = "Body of the message";
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

?>
