<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
/*form {border: 3px solid #f1f1f1;}*/

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 36px;
}

span.psw{
  float: right;
  padding-top: 16px;
}
span.psw1 {
  float: right;
  padding-top: 16px;
}
    .msg{
        margin-top: -30%;
        margin-left: 45%;  
        font-weight: bold;
        color: red;
    }  
    
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>


<form action="" method="post" enctype="multipart/form-data">
  <div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" style="width:10%;height:10%" class="avatar">
  </div>

  <div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <label for="uname"><b>Mobile No/Email Id:</b></label>
            <input type="text" placeholder="Enter mobile no/email" name="name" required>

            <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" required>
        
                <button type="submit" name="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
         <!--   <div><span class="psw">Reset <a href="reset_password.php">password?</a></span></div>-->
            <div><span class="psw1">Forgot <a href="forgot_password.php">password?</a></span> </div> 
        </div>
      </div>
      <div class="col-lg-3"></div>
<?php
include 'connection.php';
session_start();
error_reporting(0);
if(isset($_POST["submit"])){
    $name=trim($_POST["name"]);
    $psd=trim($_POST["pwd"]);
   
    $sql=mysqli_query($conn,"select * from user where mobile='$name' or email='$name'");
	$result=mysqli_fetch_array($sql);
    $pwd=trim($result['password']);
    if (password_verify($psd, $pwd)) {
        $_SESSION["name"]=trim($result['username']);
        $_SESSION["email"]=$name;
        header("location: dashboard.php");
    }
    else {
        $error='Invalid password.';
        echo "<div class=\"msg\">".$error."</div>";
    }    
}
?>
      </div>
    </form>
</body>
</html>