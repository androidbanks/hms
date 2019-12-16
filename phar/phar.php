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
<div class="box col-md-10" style="margin:0 0 0 244px; width:84%; ">
	<div class="panel panel-default" style="margin-top:2px; width:100%; margin-bottom:2px; background:#19d5dc;"> 
	<div class="panel-body"style="padding:5px;">
	            <div class="row">
				
				
				<a href="pharcategory.php">
				<div class="col-lg-3 col-md-3">
                    <div class="panel panel-purple" style="margin-bottom: 5px; background:#ccc;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>
										<a href="#"> </a>
									</div>
                                </div>
                            </div>
                        </div>
                        <a href="pharcategory.php">
                            <div class="panel-footer">
                                <span class="pull-left">Medicine Category</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></a>
				
				
				<a href="pharmedicine.php">
				<div class="col-lg-3 col-md-3">
                    <div class="panel panel-purple" style="margin-bottom: 5px; background:#ccc;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-medkit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>
										<a href="#"> </a>
									</div>
                                </div>
                            </div>
                        </div>
                        <a href="pharmedicine.php">
                            <div class="panel-footer">
                                <span class="pull-left">Manage Medicine</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></a>
				
                
                <a href="pharprovide.php">
				<div class="col-lg-3 col-md-3">
                    <div class="panel panel-purple" style="margin-bottom: 5px; background:#ccc;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-stethoscope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>
										<a href="#"> </a>
									</div>
                                </div>
                            </div>
                        </div>
                        <a href="pharprovide.php">
                            <div class="panel-footer">Provide Medication</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></a>
				
		

				<a href="report.php">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-purple" style="margin-bottom: 5px; background:#ccc;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-pdf-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <a href="#">Reports</a>
                                </div>
                            </div>
                        </div>
                        <a href="report.php">
                            <div class="panel-footer">
                                <span class="pull-left">Reports</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></a>
            </div>
 </div>
</div>
<div class="panel panel-default"> <div class="panel-body"> 
	<div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
					
					<div id="myCarousel" class="carousel slide"> 
						<ol class="carousel-indicators"> 
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
							<li data-target="#myCarousel" data-slide-to="1"></li> 
							<li data-target="#myCarousel" data-slide-to="2"></li> 
						</ol>
						<div class="carousel-inner"> 
							<div class="item active"> <img src="../images/21.jpg" alt="First slide"><div class="carousel-caption">Muni University </div></div> 
							<div class="item"> <img src="../images/22.jpg" alt="Second slide"> <div class="carousel-caption">Muni University </div> </div> 
							<div class="item"> <img src="../images/30.jpg" alt="Third slide"> <div class="carousel-caption">Muni University </div> </div> 
							<div class="item"> <img src="../images/22.jpg" alt="forth slide"> <div class="carousel-caption">Muni University </div> </div> 
						</div>
						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> 
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> 
					</div>
                    </div>
                </div>
				
				
				
				
				
				
				
                <div class="col-lg-6">
                    <div class="panel panel-default" >
                        <div class="panel-heading"style="background:#19d5dc;">
                            <i class="fa fa-bell fa-fw"></i> Notice Board
                        </div><div class="panel-body">
						<a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                </a>
                        <?php
						$result = mysql_query("SELECT * FROM notification ORDER BY notification_id ASC") or die(mysql_error());
						while($row = mysql_fetch_array( $result )) {
							?>
                        
                            
                                
                                <a href="<?php echo "not.php"; ?>" class="list-group-item">
                                    <i class="fa fa-medkit fa-fw"></i><?php echo  $row['title']?>
									
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                        
						<?php
						}
						
						?></div>
                    </div>
                </div>


            </div>
</div> </div>
</div>
<div id="footer" align="Center">HOSPITAL MANAGEMENT SYSTEM &copy All Rights Reserved</div>
</div>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="../style1/newweb/vendor/jquery/jquery.min.js"></script>
    <script src="../style1/newweb/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>



