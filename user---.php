
<?php
session_start();
include 'connection.php';
$name=$_SESSION["name"];
$temp=$_SESSION["email"];
error_reporting(0);

if(isset($_POST["submit"])){
     $username=trim($_POST["name"]);
     $email=$_POST["email"];
     $mobile=$_POST["mobile"];
     $pwd=$_POST["pwd"];
if(isset($_POST["status"]))
    $status=1;
else
    $status=0;
    $options = [
    'cost' => 12,
];
     $pass=password_hash( $pwd, PASSWORD_BCRYPT, $options); 
    
    $token=md5(uniqid($name, true));
    
    $date=date("M,d,Y h:i:s A");
   // $date=now();
    
    $sql="insert into user(username,email,mobile,password,active_status,forgot_password_token,created_on) values('".$username."','".$email."','".$mobile."','".$pass."','".$status."','".$token."','".$date."')";
	 mysqli_query( $conn,$sql);
	 
	if($sql){
		 		echo "<script>
				alert('User added successfully...');
				window.location.href='user.php';
				</script>";
			}
			else
				echo "Failed";
     
    
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Affiliated Marketing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    
    <script>
  	function validateForm()
	{
		var x=document.forms["form1"]["name"].value;
		
		if(x=="" )
		{alert("Name must be filled out");
		return false;
		}
	   /* if((x.value.length<3) && (x.value.length>40))
		{
			alert("make sure the input is between 3-40 characters long");
			return false;
	    }*/
		if(!isNaN(x))
		{
			alert("Enter only characters");
			document.form1.name.select();
			return false;
		}
		var special=/^[A-Za-z\s]+$/;
		if(!special.test(x)){
			alert("Entert only characters");
			document.form1.name.select();
			return false;
		}
		
		
		//Mobile No
		var mob=document.forms["form1"]["mobile"].value;
		if(mob=="")
		{alert ("Mobile no must be filledout");
		return false;
		}
		if(mob.length!=10)
		{
			alert("Mobile no must be 10 digits");
			return false;
		}
		if(isNaN(mob)){
			alert("Enter only numbers");
			return false;
		}
		if((mob.charAt(0)!=6) && (mob.charAt(0)!=7) && (mob.charAt(0)!=8) && (mob.charAt(0)!=9))
		 {
			 alert("mobil no must start with 6,7,8 or 9");
			 return false;
		 }
		
		var email=document.forms["form1"]["email"].value;
		if(email=="")
		{
			alert("Email id must be filledout");
			return false;
		}
		var val=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(!val.test(email))
		{
			alert("Email must be valid");
			return false;
		}
		
		var pass=document.forms["form1"]["pwd"].value;
		if(pass=="")
		{
			alert("Enter Password");
			return false;
		}
		
		
	}
		</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Affiliated </b>Marketing</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

   <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/img_avatar2.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/img_avatar2.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $name; ?>
                  <small><?php echo $temp; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="change_password.php" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/img_avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="category.php"><i class="fa fa-circle-o"></i> Add Category</a></li>
              <li><a href="active_category.php"><i class="fa fa-circle-o"></i> Active Category</a></li>
            <li><a href="view_category.php"><i class="fa fa-circle-o"></i>View All Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Sub Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_subcategory.php"><i class="fa fa-circle-o"></i> Add Sub Category</a></li>
              <li><a href="active_subcategory.php"><i class="fa fa-circle-o"></i> Active Sub Category</a></li>
            <li><a href="view_subcategory.php"><i class="fa fa-circle-o"></i> View Sub Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="user.php"><i class="fa fa-circle-o"></i> Add User</a></li>
               <li><a href="active_users.php"><i class="fa fa-circle-o"></i> Active Users</a></li>
            <li><a href="view_users.php"><i class="fa fa-circle-o"></i> All Users</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADD USER  
      </h1> 
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">        
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="name"> NAME:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email"> EMAIL:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="mobile"> MOBILE:</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                </div>
                
                <div class="form-group">
                    <label for="pwd"> PASSWORD:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" required>
                </div>
                
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" checked="checked" name="status"> ACTIVE STATUS
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy;  <a href="https://adminlte.io">Affiliated Marketing</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
