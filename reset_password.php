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
            <label for="uname"><b>New Password:</b></label>
            <input type="password" id="remail" placeholder="Enter new password" name="pass" required> 
            <label for="uname"><b>Confirm Password:</b></label>
            <input type="password" id="remail" placeholder="Enter new password" name="cpass" required> 
            <button type="submit" name="reset" id="reset">Update Password</button>
        </div>    
      </div>
      <div class="col-lg-3"></div>
  </div>  
</form>
</body>
</html>

<?php
include 'connection.php';

  //echo $token=basename($_SERVER['REQUEST_URI']);
	 $token=$_GET["token"];
if(isset($_POST["reset"])){
      $pwd=$_POST["pass"];
      $cpass=$_POST["cpass"];
        if ($pwd==$cpass) { 
           // $pwd=$_POST["pass"];
            $options = [
            'cost' => 12,
                ];
             $pass=password_hash( $pwd, PASSWORD_BCRYPT, $options);       
            $sql= mysqli_query($conn, "UPDATE user set password='" . $pass . "' WHERE forgot_password_token='" . $token . "'");
            if($sql){
		 		echo "<script>
				alert('Password Updated Successfully...');
				window.location.href='index.php';
				</script>";
			}
			else
				echo "Password mismatch";
            
    }
    else
				echo "<script>
				alert('Password mismatch,Please try again...');
				</script>";
   }
?>
