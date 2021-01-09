<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reset Password</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  border-radius: 7px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #3f51b5;
    color: white;
    border-radius: 7px;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;

}

.container {
  padding: 16px;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #3f51b5;
  border-radius: 7px;
  width: 80%; /* Could be more or less, depen ding on screen size */
}

</style>
</head>
<body>
<form class="modal-content animate" action="#" method="post" style="width: 300px;" enctype="multipart/form-data">
    <div class="imgcontainer">
      <img src="avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
       <?php 
include 'db.php';

if(isset($_POST['submit'])){
    
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if($pass1 == $pass2){

    if(isset($_GET['hash'])){

    $hash = $_GET['hash'];

    $query = "UPDATE `user` SET `userpass`=:pass,`hash`='' WHERE hash=:hash";
    $result = $con->prepare($query);
    $result->execute(['pass'=>$pass1,'hash'=>$hash]);
    $row = $result->rowCount();     
    if(!$row){
        echo '<p style="color:red;text-align:center">Something Went Wrong</p>';
    }else{
        ?>
        <script>window.location='thanks.php'</script>
        <?php
    }
    }
    }else{
        echo '<p style="color:red;text-align:center">Password did\'nt match</p>';
    }
}
?>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass1" required>
       
      <label for="psw"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password" name="pass2" required>
        
      <button type="submit" name="submit">Reset Password</button>
    </div>
  </form>

</body>
</html>

