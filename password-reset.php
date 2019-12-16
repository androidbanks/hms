
<?php

?>
<?php
//Start session
session_start();
    
//checking connection and connecting to a database
require_once('connect_db.php');
//Connect to mysql server
    $link = mysql_connect('localhost', 'root', '');
    if(!$link) {
        die('Failed to connect to server: ' . mysql_error());
    }
    
    //Select database
    $db = mysql_select_db('cms');
    if(!$db) {
        die("Unable to select database");
    }
?>
<?php
    if(isset($_POST['Submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        //get email
        $email = clean($_POST['email']);
        
        //selecting a specific record from the members table. Return an error if there are no records in the table
        $result=mysql_query("SELECT * FROM doctor WHERE email='$email'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>
<?php
    if(isset($_POST['Change'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        if(trim($_SESSION['doctor_id']) != ''){
            $doctor_id=$_SESSION['doctor_id']; //gets member id from session
            //get answer and new password from form
            $answer = clean($_POST['phone']);
            $new_password = clean($_POST['new_password']);
            
         // update the entry
     $result = mysql_query("UPDATE doctor SET password='".$_POST['new_password']."' WHERE doctor_id='$doctor_id' AND phone='".md5($_POST['phone'])."'")
         or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours. \n");  
         
         if($result){
                unset($_SESSION['doctor_id']);
                header("Location: resetsuccess.php"); //redirect to reset success page         
         }
         else{
                unset($_SESSION['doctor_id']);
                header("Location: resetfailed.php"); //redirect to reset failed page
         }
            }
            else{
                unset($_SESSION['doctor_id']);
                header("Location: resetfailed.php"); //redirect to reset failed page
            }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clinic management system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="bs-css" href="style1/bootstrap-cerulean.min.css" rel="stylesheet">
    <link rel="index/shortcut icon" href="admin/images/1.png">
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
	<li class="active"><a href="http://muni.ac.ug">CLINIC MANAGEMENT SYSTEM</a></li>
	
	</ul> 
	</div> 
</nav>
<body>
<div id="container">
  <div class="container jumbotron">
  <form name="passwordResetForm" id="passwordResetForm" method="post" action="password-reset.php" onSubmit="return passwordResetValidate(this)">
     <table class="table table-responsive" style="text-align:center;">
     <tr>
        <th> Enter Account Email</th>
        <td>
		<input name="email" class="form-control" type="email" class="textfield" id="email" maxlength="35" placeholder="provide registered email" require/></td>
        <td><input type="submit" class="btn btn-primary" name="Submit" value="Check" /></td>
     </tr>
     </table>
 </form>
  <?php
    if(isset($_POST['Submit'])){
        $row=mysql_fetch_assoc($result);
        $_SESSION['doctor_id']=$row['doctor_id']; //creates a member id session
        session_write_close(); //closes session
        $question_id=$row['question_id'];
        
        //get question text based on question_id
        $question=mysql_query("SELECT * FROM questions WHERE question_id='$question_id'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
        
        $question_row=mysql_fetch_assoc($question);
        $question=$question_row['question_text'];
        if($question!=""){
            echo "<div class='alert' style='background:#ccc;'>Your Security Question:</div> ".$question;
        }
        else{
            echo "<div class='alert' style='background:#ccc;'>Your Security Question:<b style='color:red;'> THIS ACCOUNT DOES NOT EXIST! PLEASE CHECK YOUR EMAIL AND TRY AGAIN</b>.</div>";
        }
    }
  ?>
 
<form  name="passwordResetForm" id="passwordResetForm" method="post" action="password-reset.php" onSubmit="return passwordResetValidate_2(this)">
     <table class="table table-responsive"style="text-align:center;">
     <tr>
        <td colspan="2" style="text-align:center;"><b><font color="#FF0000">* </font> Please  fill in all these fields</b></td>
     </tr>
     <tr>
        <th>Your Security Answer</th>
        <td><font color="#FF0000">* </font><input class="form-control" name="answer" type="text" class="textfield" id="answer" maxlength="15" placeholder="provide registered answer" required/></td>
     </tr>
     <tr>
        <th>New Password</th>
        <td ><font color="#FF0000">* </font><input class="form-control" name="new_password" type="password" class="textfield" id="new_password" maxlength="25" placeholder="provide a new password" required/></td>
     </tr>
 
     <tr>
        <td colspan="2"><input class="btn btn-primary" type="reset" name="Reset" value="Clear Fields" />
		<input type="submit" class="btn btn-primary" name="Change" value="Change Password" /></td>
     </tr>
     </table>
 </form>
  </div>
  </div>
</body>
</html>