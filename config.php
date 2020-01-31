<?php
$host ="localhost";
$uname="root";
$pass="";
$dbname="wsms";
$con = mysqli_connect($host,$uname,$pass) or die ('Unable to connect Database');
mysqli_select_db($con,$dbname);
?>
