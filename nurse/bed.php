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
        $result = mysql_query("SELECT bed.bed_id, ward.Ward_Name,bed.bed_number,bed.description FROM bed INNER JOIN ward ON ward.ward_Id=bed.ward_Id") or die(mysql_error());
        echo "<table class='table table-bordered table-hover table-striped'>";
        echo "<tr> <th>Bed Id</th><th>Bed Number</th> <th>Ward Name</th> <th>Description</th> <th></th><th></th> </tr>";
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['bed_id'] . '</td>';
                echo '<td>' . $row['bed_number'] . '</td>';
                echo '<td>' . $row['Ward_Name'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';

				
				
				 echo "<td> <a href='edit.php?bed_id=".$row['bed_id']."' class'button btn-xm'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></button></a> </td>";
				echo "<td><a href='viewbedAllotment.php?bed_id=".$row['bed_id']."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></td>";
				
				?>
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
	
<div id="footer" align="Center">MUNI UNIVERSITY HEALTH SERVICE MANAGEMENT SYSTEM 2016/2017. Copyright All Rights Reserved</div>

</div>

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
