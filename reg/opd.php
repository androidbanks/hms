<?php 

session_start();
$con=mysql_connect('localhost','root','')or die("cannot connect to server");
mysql_select_db('cms')or die("cannot connect to database");
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
}else{
header("localhost/capstone/index.php");
exit();}



	if(isset($_GET['patient_id'])){
		$qry = "DELETE FROM patient WHERE patient_id='".$_GET['patient_id']."'";
		$del = mysql_query($qry);
		
		if($del){
		
		}
		else {
			echo "".mysql_error($con);
		}
	}


?>

<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinic management system</title>
    <link href="../admin/assets/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
	<link rel="index/shortcut icon" href="../admin/images/1.png">
   </head>
<?php
mysql_select_db('cms',mysql_connect('localhost','root',''))or die(mysql_error());
?>

    <body>
	
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background:#1995dc;">
            <div class="navbar-header" style="background:#100bdc;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><font color="#fff"> CLINIC MANAGEMENT SYSTEM</font> </a>
            </div>
			<button class="btn btn-warning dropdown pull-right" style="list-style:none; margin:2px 2px 2px 2px;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-user fa-fw" ></i> <i class="fa fa-caret-down ">Welcome :  </i><?php echo $username;?>
                    </a>
                    
            </button>
			<a href="../logout.php"><button class="btn btn-warning pull-right"><i class="fa fa-sign-out fa-fw" ></i> Logout</button></a>

          
        </nav>
	
	
<div class="jumbotron" style="margin:1px 1px 1px 1px; padding:5px;" >
 <script type="text/javascript">
        $(function() {
            $("#term").focus();
        });
    </script> 
<div class="alert alert-info" style="margin-top:5px; margin-bottom:5px; padding: 3px 3px 3px 3px; margin-left:1px;"><center> <h3>Search for Patient</h3></center> </div>
<br>
<form method="post" class="form-horizotal" action="" name="form1" id="form1">   

   <div class="panel panel-body" style="padding :3px; margin-bottom:5px;">	
   
   <label for="inputEmail3" class="col-sm-2 control-label"><h4>Search for Patient</h4></label>
   
<div class="col-sm-4">
	<input type="text" style="height:35px;" name="term" id="term" class="col-sm-3 form-control" /> 
</div>
     
 <input type="submit" button class="btn btn-primary" name="submit" style="padding-top:68x; margin-top:5px;"  placeholder="Type the First Name, Last Name,Phone Number, Email Address or ID Number of the User" value="Search Patient" title="Click here to search patient record in the database.">
 
   <a href="registerpatient.php" class="btn btn-primary pull-right" role="button">add new patient</a>
</div>
</p>
</form>
<table  class="table table-striped table-bordered">
                          
                            <thead>
						
                                <tr>								
                                    <th class="text-center"> No</th>
                                    <th class="text-center">Patient ID</th>
                                    <th class="text-center">OPD Number</th>
                                    <th class="text-center">First Name</th>
									<th class="text-center">Sur Name</th>
                                    <th class="text-center">Email Address</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Physical Address</th>
                                    <th class="text-center">Phone Contact</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Age</th>
                                    <th class="text-center">Blood Group</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                 
                                </tr>
                            </thead>
                            <tbody>
					

 <?php
error_reporting(0);

if ($_REQUEST['submit']) {
 
 
$term = $_POST['term'];
 
$XX = "<br><br><h2> <center> No Record Found, Search Again Please </center> </h2>";  
 
 

 $sql = mysql_query("select * from patient where patient_id like '%$term%' or OPDNumber like '%$term%' or firstname like '%$term%' or surname like '%$term%' or email like '%$term%' or category like '%$term%' or address like '%$term%' or phone like '%$term%' or sex like '%$term%' or age like '%$term%' or blood_group like '%$term%' Order by surname ASC") or die('Error in query : $sql. ' .mysql_error());
   
   
   
  if (empty($term)) {
   
echo '<script language="javascript">';
echo 'alert("Please enter some patient detail to Search. Please Try it again.")';
echo '</script>';
 header( "refresh:2; url=index.php" ); 
   }
  
else if (mysql_num_rows($sql) > 0) 
{            
   $i = 1;
 while ($row = mysql_fetch_array($sql)) {
                // Print out the contents of the entry 
                echo '<tr>';
				
                echo '<td class="text-center">' . $i . '</td>';
                echo '<td class="text-center">' .$row['patient_id'] . '</td>';
                echo '<td class="text-center">' . $row['OPDNumber'] . '</td>';
                echo '<td class="text-center">' . $row['firstname'] . '</td>';
                echo '<td class="text-center">' . $row['surname'] . '</td>';
                echo '<td class="text-center">' . $row['email'] . '</td>';
                echo '<td class="text-center">' . $row['category'] . '</td>';
                echo '<td class="text-center">' . $row['address'] . '</td>';
                echo '<td class="text-center">' . $row['phone'] . '</td>';
                echo '<td class="text-center">' . $row['sex'] . '</td>';
                echo '<td class="text-center">' . $row['age'] . '</td>';
                echo '<td class="text-center">' . $row['blood_group'] . '</td>';
				echo "<td> <a href='registerpatient.php?patient_id=".$row['patient_id']."' class'button btn-xm'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit 5x'></span></button></a> </td>";
				echo "<td><a href='opd.php?patient_id=".$row['patient_id']."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></td>";
                $i++;
            }
 } 
else 
{
echo '<script language="javascript">';
echo 'alert("Sorry No Record Found in the Database.")';
echo '</script>';
}
}
?>      
 
      </tbody>
       <tbody></tbody>
    </table>
  </div>
</div>
<div id="footer" align="Center">HOSPITAL MANAGEMENT SYSTEM &copy All Rights Reserved</div>
</div>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="../style1/newweb/vendor/jquery/jquery.min.js"></script>
    <script src="../style1/newweb/vendor/bootstrap/js/bootstrap.min.js"></script>


   </body>
</html>
