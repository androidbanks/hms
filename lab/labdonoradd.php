<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $username;?> :HMS</title>
    <link href="../style1/newweb/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style1/newweb/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../style1/newweb/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="../style1/index/shortcut icon" href="../admin/images/1.png">
</head>

<body style="background:#f0f0f0;">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background:#1995dc;">
            <div class="navbar-header" style="background:#100bdc;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="doc.php"><font color="#fff">HOSPITAL MANAGEMENT SYSTEM </font> </a>
            </div>
			<Button class="dropdown pull-right btn btn-info"style="list-style:none; margin:5px;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                          Welcome: <?php echo $username;?>  <i class="fa fa-user fa-fw" ></i> <i class="fa fa-caret-down "> </i>
                    </a>
                    <ul class=" nav active dropdown-menu dropdown-user pull-right">
                      <li> <a href="#" type="submit" ><i class="fa fa-user fa-fw"  ></i><?php echo $username;?></a>
						 </li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw" ></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
            </Button>

             <div class="navbar-default sidebar" role="navigation" style="background:#19e5dc;">
                <div class="sidebar-nav navbar-collapse" >
                    <ul class="nav" id="side-menu" style="background:#19e5dc;">
                       
                        <li>
                            <a href="lab.php"><i class="fa fa-th-large fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="labdiagnosis.php"><i class="fa fa-edit"></i>Add Diagnosis Report<span class="fa users"></span></a>
                        </li>
						<li>
                            <a href="labbloodbank.php"><i class="fa fa-medkit fa-fw"></i>Manage Blood Bank</a>                                        
                        </li>
						<li>
                            <a href="labdonor.php"><i class="fa fa-stethoscope fa-fw"></i> Manage Blood Donor</a>                          
                        </li>
						<li>
                            <a href="report.php"><i class="fa fa-file-pdf-o fa-fw"></i> Report</a>                          
                        </li>
						<li>
                            <a href="logout.php"><i class="fa fa-power-off"></i>  Log out</a>                          
                        </li>
					</ul>                      						
                </div>
            </div>
        </nav>
    <div id="wrapper">
<div class="box col-md-10" style="margin:0 0 0 247px; width:83.7%;">
<div class="alert alert-info" style="margin-top:2px; margin-bottom:2px;">
	<h3><i class="fa fa-bed fa-2x"></i>Add Bed Allotments</h3>
	</div>
<ul class="nav nav-tabs"> 
	<li><a href="labdonor.php" >View Donation</a></li> 
	<li><a href="labdonoradd.php" >Add Donation</a></li> 
	
</ul>
	<div class="panel panel-default"> <div class="panel-body">
<?php 
	if(isset($_POST['add'])) {
		$dbhost = 'localhost'; 
		$dbuser = 'root'; 
		$dbpass = ''; 
		$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
		if(! $conn ) { die('Could not connect: ' . mysql_error()); 
		} 
		$firstname = $_POST['firstname']; 
		$surname = $_POST['surname']; 
		$blood_group = $_POST['blood_group']; 
		$sex = $_POST['sex']; 
		$age = $_POST['age']; 
		$phone = $_POST['phone']; 
		$email = $_POST['email']; 
		$address = $_POST['address']; 
		$last_donation_timestamp = $_POST['last_donation_timestamp']; 
		
	
		
		$sql = "INSERT INTO `cms`.`blood_donor` (`blood_donor_id`, `firstname`, `blood_group`, `sex`, `age`, `phone`, `email`, `address`, `last_donation_timestamp`, `surname`) 
		VALUES (NULL, '$firstname', '$blood_group', '$sex', '$age', '$phone ', '$email', '$address', '$last_donation_timestamp', '$surname');";
		

		

		mysql_select_db('cms'); 
		$retval = mysql_query( $sql, $conn ); 
		if(! $retval ) {
			die('Could not enter data: ' . mysql_error()); 
		} echo "<div class='alert alert-info' style='margin-top:2px; margin-bottom:2px;'><h3>Entered data successfully</h3></div>";
		mysql_close($conn); 
		} else { 
?> 
	<form method="post" action="<?php $_PHP_SELF ?>"> 
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">firstname</label> 
			<div class="col-sm-10"> 
				<input class="form-control" name="firstname" type="text" ><br/> 
			</div> 
		</div> <br/>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">surname</label> 
			<div class="col-sm-10"> 
				<input class="form-control" name="surname" type="text" ><br/> 
			</div> 
		</div> <br/>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">blood_group</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="blood_group" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">Gender</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="sex" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">Age</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="age" type="text" ><br/> 
			</div> 
		</div>		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">phone</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="phone" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">address</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="address" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">last_donation_timestamp</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="last_donation_timestamp" type="time" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">Email</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="email" type="email" ><br/> 
			</div> 
		</div>		
		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10"> 
				<button name="add" class="btn btn-primary" type="submit" id="add" value="">Register</button>
			</div> 
		</div> 
	</form> 
	<?php } ?> </div></div>
	
	
<div id="footer" align="Center">HOSPITAL MANAGEMENT SYSTEM &copy All Rights Reserved</div>
</div>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="newweb/vendor/jquery/jquery.min.js"></script>
    <script src="newweb/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>