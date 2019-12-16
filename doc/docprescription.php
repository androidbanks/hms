<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}

?>
<!DOCTYPE html>
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
			 <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
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
            </Button></a>

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
                            <a href="report.php"><i class="fa fa-file-pdf-o fa-fw"></i>Reports</a>                          
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
<div id="header">
<div class="alert alert-info" style="margin-top:2px; margin-bottom:2px;">
	<h3><i class="fa fa-user-md fa-2x"></i>		Add Patients Prescription</h3>
	</div>
<ul class="nav nav-tabs"> 
	<li><a href="docprescription.php" >view Patients Prescription</a></li> 
	<li><a href="docprescriptionadd.php" >Add patients Prescription</a></li> 
</ul>
		<div class="panel panel-default"> 
	<div class="panel-body" style="padding: 2px;">
	<div class="panel-body">
	<div class="row">
	<div class="col-lg-12">
	<div class="panel-body" style="padding: 2px;">
	<?php 
        include_once('connect_db.php');		
        $result = mysql_query("SELECT * FROM prescription,patient,doctor") or die(mysql_error());
        echo "<table class='table table-bordered table-hover table-striped'>";
        echo "<tr> <th>ID</th>  <th>patient First name</th><th>Doctor First name</th><th>Case History</th> <th>medication given to patient</th> 
		<th>Medication From Pharmacist</th><th>Description </th> <th>Current Prescription time</th><th></th><th></th> </tr>";
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['prescription_id'] . '</td>';
				echo '<td>' . $row['firstname'] . '</td>';
				echo '<td>' . $row['docfirstname'] . '</td>';
				echo '<td>' . $row['case_history'] . '</td>';
				echo '<td>' . $row['medication'] . '</td>';
				echo '<td>' . $row['medication_from_pharmacist'] . '</td>';
				echo '<td>' . $row['description'] . '</td>';
				echo '<td>' . $row['creation_timestamp'] . '</td>';
				?>
				<td><a href="update_cashier.php?username=<?php echo $row['username']?>"><button class='btn btn-primary'><span class='glyphicon glyphicon-edit 5x'></span></button></a></td>
				<td><a href="delete_cashier.php?cashier_id=<?php echo $row['cashier_id']?>"><button class='btn btn-danger'><span class='glyphicon glyphicon-trash 5x'></span></button></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        
        
        
      
    </div>  
									
								
</div>
                        
</div>
 
</div>
                      
</div>
		
	</div>
	
</div>

<div id="footer" align="Center">HOSPITAL MANAGEMENT SYSTEM &copy All Rights Reserved</div>
</div>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="newweb/vendor/jquery/jquery.min.js"></script>
    <script src="newweb/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
