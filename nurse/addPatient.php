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
                <a class="navbar-brand" href="index.html"><font color="#fff">MUNI UNIVERSITY HEALTH SERVICE MANAGEMENT SYSTEM</font> </a>
            </div>
			<li class="dropdown pull-right" style="list-style:none; margin:15px;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" ></i> <i class="fa fa-caret-down ">  </i><?php echo $username;?>
                    </a>
                    <ul class="dropdown-menu dropdown-user pull-right">
                        <li><a href="#"><i class="fa fa-user fa-fw"  ></i> Welcome <?php echo $username;?></a>
                        </li>
						
                      
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw" ></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
            </li>

             <div class="navbar-default sidebar" role="navigation" style="background:#19e5dc;">
                <div class="sidebar-nav navbar-collapse" >
                    <ul class="nav" id="side-menu" style="background:#19e5dc;">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-th-large fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="viewPatient.php"><i class="fa fa-medkit"></i>  Patients <span class="fa users"></span></a>
                        </li>
						<li>
                            <a href="viewbedAllotment.php"><i class="fa fa-bed fa-fw"></i>Bed Allotment</a>                                        
                        </li>
						<li>
                            <a href="viewBloodBank.php"><i class="fa fa-tint fa-fw"></i> Blood Bank</a>                          
                        </li>
						<li>
                            <a href="pdfreport.php"><i class="fa fa-file-pdf-o fa-fw"></i> Reports</a>                          
                        </li><li>
                            <a href="logout.php"><i class="fa fa-power-off"></i>  Log out</a>                          
                        </li>
					</ul>                            						
                </div>
            </div>
        </nav>
    <div id="wrapper">
<div class="box col-md-10" style="margin:0 0 0 247px; width:83.7%;">
	<div class="alert alert-info" style="margin-top:2px; margin-bottom:2px;">
                            <h3> <i class="fa fa-medkit fa-2x"></i>  Register Patient </h3>          
						</div>
						<ul class="nav nav-tabs"> 
	<li><a href="viewPatient.php" >View Patients</a></li> 
	<li><a href="addPatient.php" >Add Patients</a></li> 
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
			<label for="firstname" class="col-sm-3 control-label">OPD Number</label> 
			<div class="col-sm-6"> 
				<input class="form-control"  name="OPDNumber" type="text" ><br/> 
			</div> 
		</div>
		
		<div class="form-group "> 
			<label for="firstname" class="col-sm-3 control-label">First Name</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="firstname" type="text" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Last Name</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="surname" type="text" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Email</label> 
			<div class="col-sm-6"> 
				<input class="form-control"  name="email" type="email" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Category </label> 
			<div class="col-sm-6"> 
				<select class="form-control"  name="category" type="text" >
					<option> Student</option>
					<option> Staff</option>
					<option> Support staff</option>
					<option> Private patient</option>
				</select><br/> 
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
				<select class="form-control" name="sex" type="text" >
					<option>Scroll to veiw the Gender</option>
					<option>Male</option>
					<option>Female</option>
				</select> <br/> 
			</div> 
		</div>
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Age</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="age" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Blood Group</label> 
			<div class="col-sm-6"> 
				<select class="form-control" name="age" type="text" >
					<option>Scroll to add Blood Group </option>
					<option>A+</option>
					<option>A-</option>
					<option>B+</option>
					<option>B+</option>
					<option>O+</option>
					<option>O-</option>
					<option>AB</option>
					
				</select><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10"> 
				<button name="add" class="btn btn-primary" type="submit" id="add" value="">Register Patient</button>
			</div> 
		</div> 
	</form> 
	<?php } ?> </div></div>
	
<div id="footer" align="Center">MUNI UNIVERSITY HEALTH SERVICE MANAGEMENT SYSTEM 2016/2017. Copyright All Rights Reserved</div>


	</div>
	
	
			 
	<!-- #pix_diapo -->   

    <!-- jQuery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="newweb/vendor/jquery/jquery.min.js"></script>
	<script src="newweb/dist/css/fullcalendar.min.js"></script>  
   <script src="newweb/dist/css/calendarInit.js"></script>
   <script src="newweb/dist/css/jquery.dataTables.js"></script>
    <script src="newweb/dist/css/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
        <script>
            $(function () { CalendarInit(); });
        </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="newweb/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="newweb/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="newweb/vendor/raphael/raphael.min.js"></script>
    <script src="newweb/vendor/morrisjs/morris.min.js"></script>
    <script src="newweb/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="newweb/dist/js/sb-admin-2.js"></script>
	
	
</body> 
</html>