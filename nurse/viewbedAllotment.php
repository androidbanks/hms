<?php
session_start();
$con=mysql_connect('localhost','root','')or die("cannot connect to server");
mysql_select_db('cms')or die("cannot connect to database");

if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
$deleteid = @$_GET['bed_allotment_id'];

	if(isset($_GET['bed_allotment_id'])){
		$qry = "DELETE FROM bed_allotment WHERE bed_allotment_id='".$_GET['bed_allotment_id']."'";
		$del = mysql_query($qry);
		
		if($del){
		
		}
		else {
			echo "".mysql_error($con);
		}
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
                <a class="navbar-brand" href="index.html"><font color="#fff">HOSPITAL MANAGEMENT SYSTEM</font> </a>
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
<div id="header">
	<div class="alert alert-info" style="margin-top:2px; margin-bottom:2px;">
	<h3><i class="fa fa-bed fa-2x"></i>  View Bed Allotments</h3>
	</div>
<ul class="nav nav-tabs"> 
	<li><a href="viewbedAllotment.php" >View Bed Allotments</a></li> 
	<li><a href="addbedAllotment.php" >Add Bed Allotments</a></li> 
	<li><a href="bed.php" >View Bed</a></li> 
	<li><a href="addbed.php" >Add Bed</a></li> 
</ul>

		<div class="panel panel-default"> 
	<div class="panel-body" style="padding: 2px;">
	<div class="panel-body">
	<div class="row">
	<div class="col-lg-12">
	<div class="panel-body" style="padding: 2px;">
	<?php 
        include_once('connect_db.php');		
        $result = mysql_query("SELECT b.bed_number, p.firstname, p.surname, a.bed_allotment_id, a.allotment_timestamp, a.discharge_timestamp FROM bed b, patient p, bed_allotment a WHERE b.bed_id=a.bed_id AND p.patient_id=a.patient_id ORDER BY a.bed_allotment_id ASC") or die(mysql_error());
		
        echo "<table class='table table-bordered table-hover table-striped'>";
        echo "<tr> <th>Allotment Id</th><th>Bed Number</th> <th>First Name</th> <th>Surname</th> <th>Allotment Time </th><th> Discharge Time </th><th></th><th></th> </tr>";
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['bed_allotment_id'] . '</td>';
                echo '<td>' . $row['bed_number'] . '</td>';
                echo '<td>' . $row['firstname'] . '</td>';
                echo '<td>' . $row['surname'] . '</td>';
				echo '<td>' . $row['allotment_timestamp'] . '</td>';
				echo '<td>' . $row['discharge_timestamp'] . '</td>';
				 echo "<td> <a href='editbedallot.php?bed_allotment_id=".$row['bed_allotment_id']."' class'button btn-xm'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></button></a> </td>";
				echo "<td><a href='viewbedAllotment.php?bed_allotment_id=".$row['bed_allotment_id']."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></td>";
				
				
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
