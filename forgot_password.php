<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reset Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

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
.container {
  padding: 36px;
}
span.psw{
  float: right;
  padding-top: 16px;
}

</style>
</head>
<body>


<form action="" id="forgot-pass-frm" method="post" enctype="multipart/form-data">
  <div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <label for="uname"><b>Email Id:</b></label>
            <input type="text" id="remail" placeholder="Enter email" name="email" required> 
            <button type="submit" name="reset" id="reset">Generate New Password</button>
        </div>    
      </div>
      <div class="col-lg-3"></div>
  </div>  
</form>
</body>
</html>

<?php
include 'connection.php';
session_start();
require 'PHPMailerAutoload.php';	 
if(isset($_POST["reset"])){
    $email=trim($_POST["email"]); 
    $sql=mysqli_query($conn,"select * from user where email='$email'");
	$result=mysqli_fetch_array($sql);
    $name=trim($result["username"]);
    $token=md5(uniqid($name, true));
    $sql= mysqli_query($conn, "UPDATE user set 	forgot_password_token='" . $token . "' WHERE email='" . $email . "'");
    // $token=$result['forgot_password_token'];
    // $e=md5($emailid);
    // $p=$result['password'];

   if ($sql) {    
    //$link="<a href='www.domain.com/reset_password.php?token=".$token."'>Click To Reset password</a>";
       $link="<a href='http://localhost/AdminLTE-2.4.5/reset_password.php?token=".$token."'>Click To Reset password</a>";
   // require_once('PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "veena.amodha@gmail.com";
    // GMAIL password
    $mail->Password = "veenakrishnan";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='veena.amodha@gmail.com';
    $mail->FromName='your_name';
    $mail->AddAddress('veena.amodha@gmail.com', 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
        
   }
}
?>