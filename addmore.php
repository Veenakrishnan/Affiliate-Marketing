<?php

include 'connection.php';
	//define (DB_USER, "root");
	//define (DB_PASSWORD, "root");
	//define (DB_DATABASE, "affiliated_management");
	//define (DB_HOST, "localhost");
	//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


	//if(!empty($_POST["name"])){
        

		//foreach ($_POST["name"] as $key => $value) {
        $number=count($_POST["name"]);
        if($number >= 1)
        {
	       for($i=1;$i<=$number;$i++)
	       {
		      if(trim(($_POST["name"][$i]))!= '')
		          {
                  if(isset($_POST["status"][$i]))
                    $status[$i]=1;
                  else
                    $status[$i]=0;
                    $options = [
                    'cost' => 12,
                    ];
                  $pwd[$i]=$_POST["pwd"][$i];
                  echo  $pass[$i]=password_hash( $pwd, PASSWORD_BCRYPT, $options); 
    
                  $token[$i]=md5(uniqid($name, true));
    
                  $date[$i]=date("M,d,Y h:i:s A"); 
		        
                  echo	$sql = "insert into user(username,email,mobile,password,active_status,forgot_password_token,created_on) VALUES ('".$_POST["name"][$i]."','".$_POST["email"][$i]."','".$_POST["mobile"][$i]."','".$pass[$i]."','".$status[$i]."','".454."','".122."')";
			      $mysqli->query($sql);
                 // $result=mysqli_query($conn,$sql);
                  if($sql)
	                   {
		                  echo "success";
	                   } else {
    	                   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	                   }
            
            //if($sql)
               // echo json_encode(['success'=>'Names Inserted successfully.']);
		          }
           }
		
	}

?>