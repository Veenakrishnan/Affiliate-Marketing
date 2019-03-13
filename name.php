<?php

//$connect=mysqli_connect("localhost","root","","register");
include 'connection.php';

 $number=count($_POST["name"]);
for($i=0;$i<$number;$i++)
	{
    if((($_POST["name"][$i])&&($_POST["email"][$i])&&($_POST["mobile"][$i])&($_POST["pwd"][$i]))!=null){
    if(isset($_POST["status"][$i]))
      $status=1;
    else
      $status=0;
    
    $options = [
    'cost' => 12,
];
    $pwd=$_POST["pwd"][$i];
    $pass=password_hash( $pwd, PASSWORD_BCRYPT, $options); 
    
    $name=$_POST["name"][$i];
    $date=date("M,d,Y h:i:s A");
    $token=md5(uniqid($name, true));
echo $sql="insert into user(username,email,mobile,password,active_status,forgot_password_token,created_on) values('".$name."','".$_POST["email"][$i]."','".$_POST["mobile"][$i]."','".$pass."','".$status."','".$token."','".$date."')";
		
	$result=mysqli_query($conn,$sql);
        if($result)
	{echo "New record created successfully";
		echo "success";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
    
else{
    echo "Insertion Failed, All fields are mandatory...";
   
}
	
	
}	
mysqli_close($conn);

?>