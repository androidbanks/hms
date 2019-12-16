<?php
include_once 'connect_db.php';
	if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$position=$_POST['position'];
	switch($position){
	case 'Admin':
	$result=mysql_query("SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);
	if($row>0){
	session_start();
	$_SESSION['admin_id']=$row[0];
	$_SESSION['username']=$row[1];
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin/admin.php");
	}else{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Pharmacist':
	$result=mysql_query("SELECT pharmacist_id, firstname,surname,email,username FROM pharmacist WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);
	if($row>0){
	session_start();
	$_SESSION['pharmacist_id']=$row[0];
	$_SESSION['firstname']=$row[1];
	$_SESSION['surname']=$row[2];
	$_SESSION['email']=$row[3];
	$_SESSION['username']=$row[4];
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/phar/phar.php");
	}else{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Nurse':
	$result=mysql_query("SELECT nurse_id, firstname,surname,phone,username FROM nurse WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);
	if($row>0){
	session_start();
	$_SESSION['nurse_id']=$row[0];
	$_SESSION['firstname']=$row[1];
	$_SESSION['surname']=$row[2];
	$_SESSION['phone']=$row[3];
	$_SESSION['username']=$row[4];
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/nurse/dashboard.php");
	}else{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Labaratorian': 
	$result=mysql_query("SELECT laboratorist_id, firstname,surname,phone,username FROM labaratorian WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);
	if($row>0){
	session_start();
	$_SESSION['laboratorist_id']=$row[0];
	$_SESSION['firstname']=$row[1];
	$_SESSION['surname']=$row[2];
	$_SESSION['phone']=$row[3];
	$_SESSION['username']=$row[4];
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/lab/lab.php");
	}else{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Doctor':
	$result=mysql_query("SELECT doctor_id, docfirstname,docsurname,phone,username FROM doctor WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);
	if($row>0){
	session_start();
	$_SESSION['doctor_id']=$row[0];
	$_SESSION['firstname']=$row[1];
	$_SESSION['surname']=$row[2];
	$_SESSION['phone']=$row[3];
	$_SESSION['username']=$row[4];
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/doc/doc.php");
	}else{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	
	
	
	
	
	
	case 'OPD register':
	$result=mysql_query("SELECT opdregisterer_id, name,username,password FROM opdregister WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);
	if($row>0){
	session_start();
	$_SESSION['opdregisterer_id']=$row[0];
	$_SESSION['name']=$row[1];
	$_SESSION['username']=$row[2];
	$_SESSION['password']=$row[3];
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/reg/opd.php");
	}else{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	}}
echo <<<LOGIN
<html>
<head>
    <meta charset="utf-8">
    <title>Clinic management system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="bs-css" href="style1/bootstrap-cerulean.min.css" rel="stylesheet">
    <link rel="index/shortcut icon" href="admin/images/1.png">
</head>
<body>
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
	<li class="active"><a href="http://muni.ac.ug">CLINIC MANAGEMENT SYSTEM</a></li>
	
	</ul> 
	</div> 
</nav>
			<div class="row">
				<div class="col-sm-offset-4 col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 class="panel-title"><i class="fa fa-lock"></i> Please enter your login details.</h1>
						</div>
						<div class="panel-body">
							<form action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="input-username">Username</label>                
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" name="username" value="" placeholder="Username" id="input-username" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label for="password">Position</label>
								<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-users"></i>
								</span>
									<select class="form-control" name="position">
									<option>OPD register</option>
									<option>Doctor </option>
									<option>Admin </option>
									<option>Nurse</option>
									<option>Pharmacist</option>
									<option>Labaratorian</option>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label for="input-password">Password</label>                
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
								</div>
								<span class="help-block"><a href="password-reset.php">Forgotten Password</a></span>
							</div>
							<div class="text-right">
								<button type="submit" name="submit" value="Login" class="btn btn-primary"><i class="fa fa-key"></i> Log in</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</body>
</html>


LOGIN;
?>
