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
<title><?php echo $username;?>: HMS</title>
    <link href="newweb/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="newweb/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="newweb/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link rel="index/shortcut icon" href="../admin/images/1.png">
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
	<h3><i class="fa fa-user-md fa-2x"></i>		Add Patients Appointments</h3>
	</div>
<ul class="nav nav-tabs"> 
	<li><a href="docappointment.php" >view Patients Appointments</a></li> 
	<li><a href="docappointmentadd.php" >Add patients Appointments</a></li> 
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
		
		 
		$doctor_id = $_POST['doctor_id']; 
		$patient_id = $_POST['patient_id'];
	
	
	$sql = "INSERT INTO cms.appointment (`appointment_id`, `appointment_timestamp`, `doctor_id`, `patient_id`)
		VALUES (NULL, CURRENT_TIMESTAMP, '$doctor_id', '$patient_id');";
		
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
			<label for="firstname" class="col-sm-2 control-label">doctor Firstname</label> 
			<div class="col-sm-10"> 
				<select class="form-control" name="doctor_id" type="text" >
					<option>Select Doctors name</option>
					<?php
						$doctor='SELECT * FROM doctor';
						$docname=mysql_query($doctor);
						while($name=mysql_fetch_array($docname)){
							 echo"<option value='".$name['docfirstname']."'>".$name['docfirstname']."</option>";
							
						}
					?>
				</select><br/> 
			</div> 
		</div>


		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">patient firstname</label> 
			<div class="col-sm-10"> 
				<select class="form-control" name="patient_id" type="text" >
				<option>Select Patients firstname</option>
					<?php
						$patient='SELECT * FROM patient';
						$pat=mysql_query($patient);
						while($name2=mysql_fetch_array($pat)){
							 echo"<option value='".$name2['surname']."'>".$name2['surname']."</option>";
							
						}
					?>
				</select><br/> 
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