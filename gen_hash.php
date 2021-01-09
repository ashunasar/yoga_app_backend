<?php
include 'db.php';


$email = $_GET['email'];

$hash = md5(str_shuffle($email));

$query = "UPDATE `user` SET `hash`=:hash WHERE usermail=:email";
$result = $con->prepare($query);
$result->execute(['email'=>$email,'hash'=>$hash]);

//
//echo $hash;
//echo "<a href='forget_pass.php?hash={$hash}'>click here</a>";


//$to = "somebody@example.com, somebodyelse@example.com";
$subject = "Forgot Password!";

$message = "
<html>
<head>
<title>Forgot Password!</title>
</head>
<body>
<p>Click the button below to reset your password</p>
<a href='http://phpstack-250897-1281769.cloudwaysapps.com/signup/reset_pass.php?hash=$hash'><button style='width: 250px;height: 50px;font-size: 25px;letter-spacing: 4px;font-family: serif;background: #673AB7;border: none;border-radius: 7px;color: white;'>Reset Password</button></a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: <asimsiddiqui20172017@gmail.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($email,$subject,$message,$headers);


echo '{"data": [';
$response = array(); 
$response['message'] = 'Check your email to reset password';
echo json_encode($response);
echo ']}';



?>


