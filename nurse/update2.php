<?php

$link = mysql_connect("localhost", "root", "");
$db=mysql_select_db("cms");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} 
?>

 
<?php    
 
	
	$bloodg=$_GET['blg_id'];
	$st=$_POST['status'];
	$bg=$_POST['blood_group'];
	
	$sql='UPDATE blood_bank set blood_group="'.$_POST['blood_group'].'",status="'.$_POST['status'].'" where blood_group_id="'.$_GET['blg_id'].'"';
	
	$resul=mysql_query($sql);
	
	if($resul){
		echo "success";
	}
	
	 

?>