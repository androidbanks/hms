<?php
session_start();
unset($_SESSION['opdregisterer_id']);
unset($_SESSION['name']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['email']);
unset($_SESSION['workid']);
unset($_SESSION['staff_id']);
unset($_SESSION['username']);
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
?>



