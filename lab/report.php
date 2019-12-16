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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $username ?> : HMS</title>
<link id="bs-css" href="../style1/css/bootstrap-cerulean.min.css" rel="stylesheet">
<link rel="index/shortcut icon" href="../admin/images/1.png">
</head>


<body style="background-image:url(images/restaurant.png);">

<nav class="navbar navbar-default" role="navigation"> 
	<div class="navbar-header"> 
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
	<span class="sr-only">Toggle navigation</span> 
	<span class="icon-bar"></span> 
	<span class="icon-bar"></span> 
	<span class="icon-bar"></span> 
	</button>  
	</div> 
	<div class="collapse navbar-collapse" id="example-navbar-collapse"> 
	<ul class="nav navbar-nav"> 
	<li class="active"><a href="http://muni.ac.ug"> HOSPITAL MANAGEMENT SYSTEM </a></li>
	
	</ul> 
	</div> 
</nav>
<div class="container">

<br/><br/>
  <div class=" jumbotron" style="">
  
  <div class="alert alert-info">
						<a href="lab.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
						<h3>Daily Report</h3>
					</div>

  	<div class="panel-body" style="padding: 2px;">
	<?php 
	
        include_once('connect_db.php');	
	$result = mysql_query("SELECT * FROM report ORDER BY report_id ASC") or die(mysql_error());
	

        echo "<div class=' panel panel-body'>";		
        while($row = mysql_fetch_array( $result )) {
                echo "<div>";				
                echo ' ' ?> 
				<table  class="table col-xs-3 table-responsive">
				<tr width="200px">
				<td><?php echo   $row['report_id'];?></td>
				<td><?php echo   $row['type'];?></td>
				<td><?php echo   $row['description'];?></td>
				</tr>
				</table>
				
				<br/><br/><br/><br/>
				<?php
				
				?>
		
				<?php
		 } 
		 
		 
		  
				
		 
        echo "</div>";
?> 
    </div> 
  
  
  </div>
  </div>

  <div id="footer" align="Center">HOSPITAL MANAGEMENT SYSTEM &copy All Rights Reserved</div>
</div>

</body>
  
  
</html>