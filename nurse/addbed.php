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
	<h3><i class="fa fa-bed fa-2x"></i>Add Bed Allotments</h3>
	</div>
<ul class="nav nav-tabs"> 
	<li><a href="viewbedAllotment.php" >View Bed Allotments</a></li> 
	<li><a href="addbedAllotment.php" >Add Bed Allotments</a></li> 
	<li><a href="bed.php" >View Bed</a></li> 
	<li><a href="addbed.php" >Add Bed</a></li> 
</ul>
	<div class="panel panel-default"> <div class="panel-body">
<?php 
	if(isset($_POST['register'])) {
		$dbhost = 'localhost'; 
		$dbuser = 'root'; 
		$dbpass = ''; 
		$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
		if(! $conn ) { die('Could not connect: ' . mysql_error()); 
		} else{
			$ward_Id = $_POST['ward_Id']; 
			$bed_number = $_POST['bed_number'];
			$description = $_POST['description'];
			
			if( !$ward_Id){
				echo "<div class='alert alert-info' style='margin-top:2px; margin-bottom:2px;'><h3>Entered all fields </h3></div>";
				exit();
			}if(!$bed_number){
				echo "<div class='alert alert-info' style='margin-top:2px; margin-bottom:2px;'><h3>Entered all fields </h3></div>";
				exit();
			}if(!$description){
				echo "<div class='alert alert-info' style='margin-top:2px; margin-bottom:2px;'><h3>Entered all fields </h3></div>";
				exit();
			}
			
			
			$sql = "INSERT INTO `cms`.`bed` (`bed_id`, `ward_Id`, `bed_number`, `description`) VALUES (NULL, '$ward_Id', '$bed_number', '$description');";
			mysql_select_db('cms'); 
			$retval = mysql_query( $sql, $conn );
			 if($retval){
				echo "<div class='alert alert-info' style='margin-top:2px; margin-bottom:2px;'><h3> Data Entered Successfully </h3></div>";
			 }
	mysql_close($conn); 
		}
	}	
?>
	<form method="post" class="form-horizontal" action="<?php $_PHP_SELF ?>"> 
		
 <br/>
<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Ward Name</label> 
			<div class="col-sm-6"> 
				<select class="form-control" name="ward_Id" type="text" >
				<option>Select Ward Name</option>
			<?php
			$sqlbed='SELECT * FROM ward';
			$bednumber=mysql_query($sqlbed);
			while ($row5= mysql_fetch_array($bednumber)){
				
				 echo"<option value='".$row5['Ward_Name']."'> ".$row5['Ward_Name']."</option>";
			}
			
			?>				
				</select><br/> 
			</div> 
		</div>				
		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Bed Number</label> 
			<div class="col-sm-6"> 
				<input class="form-control" name="bed_number" type="text" ><br/> 
			</div> 
		</div>		
		
		<div class="form-group"> 
			<label for="firstname" class="col-sm-3 control-label">Description</label> 
			<div class="col-sm-6"> 
                <textarea class="form-control"  name="description" type="text" ></textarea><br/> 
			</div> 
		</div>		
		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10"> 
				<button name="register" class="btn btn-primary" type="submit" id="add" value="">Add Bed</button>
			</div> 
		</div> 
	</form> 
	 </div></div>
	 	

	</div>
	
<div id="footer" align="Center">MUNI UNIVERSITY HEALTH SERVICE MANAGEMENT SYSTEM 2016/2017. Copyright All Rights Reserved</div>
		 
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

</html>