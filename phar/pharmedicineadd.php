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
                            <a href="phar.php"><i class="fa fa-th-large fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="pharcategory.php"><i class="fa fa-edit"></i>Medicine Category<span class="fa users"></span></a>
                        </li>
						<li>
                            <a href="pharmedicine.php"><i class="fa fa-medkit fa-fw"></i>Manage Medicine</a>                                        
                        </li>
						<li>
                            <a href="pharprovide.php"><i class="fa fa-stethoscope fa-fw"></i> Provide Medicination</a>                          
                        </li>

						<li>
                            <a href="report.php"><i class="fa fa-file-pdf-o fa-fw"></i> Reports</a>                          
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
	<li><a href="pharmedicine.php" >View Medicine </a></li> 
	<li><a href="pharmedicineadd.php" >Add Medicine </a></li> 
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
		$med_name = $_POST['med_name']; 
		$medicine_category_id = $_POST['medicine_category_id']; 
		$description = $_POST['description']; 
		$manufacturing_company = $_POST['manufacturing_company']; 
		$status = $_POST['status']; 
		$patient_id = $_POST['patient_id']; 
			
		$sql = "INSERT INTO cms.medicine (`medicine_id`, `med_name`, `medicine_category_id`, `description`, `manufacturing_company`, `status`, `patient_id`) 
		VALUES (NULL, '$med_name', '$medicine_category_id', '$description', '$manufacturing_company', '$status', '$patient_id');";
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
			<label for="firstname" class="col-sm-2 control-label">med_name</label> 
			<div class="col-sm-10"> 
				<input class="form-control" name="med_name" type="text" ><br/> 
			</div> 
		</div> <br/>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">medicine_category_id</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="medicine_category_id" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">manufacturing_company</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="manufacturing_company" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">description</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="description" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">status</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="status" type="text" ><br/> 
			</div> 
		</div>
		<div class="form-group"> 
			<label for="firstname" class="col-sm-2 control-label">patient_id</label> 
			<div class="col-sm-10"> 
				<input class="form-control"  name="patient_id" type="text" ><br/> 
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
	
	
<div id="footer" align="Center">HOSPITAL MANAGEMENT SYSTEM &copy All Rights Reserved</div>
</div>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="newweb/vendor/jquery/jquery.min.js"></script>
    <script src="newweb/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</body>
</body>
</body>
</html>