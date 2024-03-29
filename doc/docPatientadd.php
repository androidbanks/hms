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
                <a class="navbar-brand" href="doc.php"><font color="#fff">HOSPITAL MANAGEMENT SYSTEM</font> </a>
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
                            <a href="doc.php"><i class="fa fa-th-large fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="docPatient.php"><i class="fa fa-medkit"></i>  Patients <span class="fa users"></span></a>
                        </li>
						<li>
                            <a href="docappointment.php"><i class="fa fa-user-md fa-fw"></i>Appointment</a>                                        
                        </li>
						<li>
                            <a href="docprescription.php"><i class="fa fa-stethoscope fa-fw"></i> Prescription</a>                          
                        </li>
						<li>
                            <a href="docbed.php"><i class="fa fa-bed fa-fw"></i> Bed Allotment</a>                          
                        </li>
						<li>
                            <a href="docblood.php"><i class="fa fa-tint fa-fw"></i> Blood Bank</a>                          
                        </li>
						<li>
                            <a href="docreport.php"><i class="fa fa-file-pdf-o fa-fw"></i>Reports</a>                          
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
                            <h3>Register Patient </h3>          
						</div>
	<ul class="nav nav-tabs"> 
	<li><a href="docPatient.php" >View Patients</a></li> 
	<li><a href="docPatientadd.php" >Add Patients</a></li> 
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
		$OPDNumber = $_POST['OPDNumber']; 
		$firstname = $_POST['firstname']; 
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		$category = $_POST['category'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$sql = "INSERT INTO cms.patient(`patient_id`, `OPDNumber`, `firstname`, `surname`, `email`, `category`, `address`, `phone`, `sex`, `age`)
		VALUES (NULL, '$OPDNumber', '$firstname', '$surname', '$email', '$category', '$address', '$phone', '$sex', '$age');";
		mysql_select_db('cms'); 
		$retval = mysql_query( $sql, $conn ); 
		if(! $retval ) {
			die('Could not enter data: ' . mysql_error()); 
		} echo "<div class='alert alert-info' style='margin-top:2px; margin-bottom:2px;'><h3>Entered data successfully</h3></div>";
		mysql_close($conn); 
		} else { 
?> 
	<form method="post" class="form-horizontal" action="<?php $_PHP_SELF ?>"> 

		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">OPDNumber</label> 
			<div class="col-sm-6"> 
				<input class="form-control"  name="OPDNumber" type="text" ><br/> 
			</div> 
		</div>
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">First Name</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="firstname" type="text" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Surname</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="surname" type="text" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Email</label> 
			<div class="col-sm-6"> 
				<input class="form-control"  name="email" type="text" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Category </label> 
			<div class="col-sm-6"> 
				<input class="form-control"  name="category" type="text" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Physical Address</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="address" type="text" ><br/> 
			</div> 
		</div>
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Phone Contact </label> 
			<div class="col-sm-6"> 
				 <input class="form-control" name="phone" type="text" ><br/> 
			</div> 
		</div>
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Gender</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="sex" type="text" > <br/> 
			</div> 
		</div>
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Age</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="age" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10"> 
				<button name="add" class="btn btn-primary" type="submit" id="add" value="">Register</button>
			</div> 
		</div> 
	</form> 
	<?php } ?> </div></div>
	</div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="newweb/vendor/jquery/jquery.min.js"></script>
    <script src="newweb/vendor/bootstrap/js/bootstrap.min.js"></script>

	
</body> 
</html>