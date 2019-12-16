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
<link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
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
	<li class="active"><a href="http://muni.ac.ug">HOSPITAL MANAGEMENT SYSTEM</a></li>
	
	</ul> 
	</div> 
</nav>
<div class="container">
  <div class="alert alert-info">
						<a href="dashboard.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

  	<div class="panel-body" style="padding: 2px;">
  <div class=" jumbotron" style="">
  
  
  	<div class="panel-body" style="padding: 2px;">
	<?php 
	
        include_once('connect_db.php');	
	$result = mysql_query("SELECT * FROM notification ORDER BY notification_id ASC") or die(mysql_error());
	
	
        echo "<table class='table table-bordered table-hover table-striped'>";		
        echo "<tr> <th>ID</th><th>Title</th> <th>Time</th> <th></th><th></th> </tr>";
        while($row = mysql_fetch_array( $result )) {
                echo "<tr>";				
                echo '<td>' . $row['notification_id'] . '</td>';
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $row['notification_Time'] . '</td>';
				echo "<td> <a href='editbloodbank.php?notification_id=".$row['notification_id']."' class'button btn-xm'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit 5x'></span></button></a> </td>";
				echo "<td><a href='viewBloodBank.php?notification_id=".$row['notification_id']."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></td>";
				?>
		
				<?php
		 } 
		 
		 
		  
				
		 
        echo "</table>";
?> 
    </div> 
  
  
  </div>
  </div>
</body>
</html>