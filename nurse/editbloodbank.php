<?php 

session_start();
$con=mysql_connect('localhost','root','')or die("cannot connect to server");
mysql_select_db('cms')or die("cannot connect to database");
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}$blood_group_id=$_GET['blood_group_id'];
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
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Edit Item</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
         
            <div class="box-content">
                <!-- Start content here -->
				
					<div class="alert alert-info">
						<a href="client.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
					</div>

<?php
  $query=mysql_query("select * from blood_bank where blood_group_id='$blood_group_id'")or die(mysql_error());
$row=mysql_fetch_array($query);
  ?>					
					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:175px;">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Blood Group</label>
						<div class="col-sm-3">
						  <select type="number" name="blood_group" value="<?php echo $row['blood_group']; ?>" class="form-control" id="inputEmail3" placeholder="School ID.....">
							<option>  </option>
							<?php
								$donor='SELECT * FROM blood_bank';
								$donorgroup=mysql_query($donor);
								while($name=mysql_fetch_array($donorgroup)){
									 echo"<option value='".$name['blood_group']."'> ".$name['blood_group']."</option>";
									
								}
							?>
						  </select>
						</div>
					  </div>				  
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Status</label>
						<div class="col-sm-4">
						  <input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control" id="inputEmail3" placeholder="Firstname.....">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Blood Donor</label>
						<div class="col-sm-4">
						  <select type="time" name="blood_donor_id" value="<?php echo $row['blood_donor_id']; ?>" class="form-control" id="inputEmail3" placeholder="allotment_timestamp" >
						  <option> </option>
						  	<?php
								$do='SELECT * FROM blood_donor';
								$donor=mysql_query($do);
								while($name=mysql_fetch_array($donor)){
									 echo"<option value='".$name['firstname']."'> ".$name['firstname']."</option>";
									
								}
							?>
						  </select>
						</div>
					  </div>
					
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Update</button>
						</div>
					  </div>
					</form>
							
<?php
$bed_allotment_id=$_GET['blood_group_id'];
if (isset($_POST['update'])) {
						$blood_group=$_POST['blood_group'];
						$status=$_POST['status'];
						$blood_donor_id=$_POST['blood_donor_id'];
						

$history_record=mysql_query("select * from blood_bank");
$row=mysql_fetch_array($history_record);
$user=$row['blood_group_id']." ".$row['blood_group_id'];

{
	

mysql_query("UPDATE `cms`.`blood_bank` SET `blood_group` = '$blood_group', `status` = '$status', `blood_donor_id` = '$blood_donor_id'	WHERE `blood_bank`.`blood_group_id` =$blood_group_id;")or die(mysql_error());
echo "<script>alert('Successfully Blood Bank Info!'); window.location='ViewBloodBank.php'</script>";
}

}

?>
					
            </div>
        </div>
    </div>
</div><!--/row-->

