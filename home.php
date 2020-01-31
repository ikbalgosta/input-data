<?php
session_start();

 include 'config.php';
 $point=$_SESSION['pointname'];
  $section=$_SESSION['section'];
  $role=$_SESSION['role'];
  
  $txt="Admin";
  $expart = "Service Expert";
$sectionmgr= "Section Manager";
$store = "Store Officer";
$mgr = "Branch Manager";
$planning = "Planning";
$monitoring="Monitoirng Officer";
   
  
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  
<link rel="stylesheet" href="style.css"></link>
<style type="text/css">
ul li{display: inline-block;float: left; border:1px solid red; width:110px; height:12px; line-height:12px; padding: 10px 14px; display: block; text-align: center; background-color:#2F4F4F;}
ul li a {text-align: center; color:#F0F0F0; text-decoration: none; font-size:15px; font-weight:bold;}
ul li:hover{background-color:blue;}
ul li ul li{display: none; position:relative; left-margin;0;}
ul li:hover ul li{display:block;}
.logout{text-decoration:none; color:red; font-weight:bold;}.logout:hover{color:yellow;} body { margin: 0; padding: 0; background-color: #ffffcc; }


</style>

</head>
<body id="body">
<header>
<center>
<div id="divheader">
<?php
if(isset($_SESSION['office_id'])){
echo "Welcome " . "  ,  ".$_SESSION['name']."  ,  ".$_SESSION['pointname']."  ,  ".$_SESSION['office_id']."  ,  ".$_SESSION['section']."  ";
}else{
	echo header("Location:index.php");
}
?>
<a href ="logout.php" class="logout">[ LOG-OUT ]</a>
<ul>
<li><a href ="home.php">Home</a></li>
<li><a href ="">Input Panel</a>
<ul>

<li><a href ="ftemla.php">Daily Activity</a>
<li><a href ="fteml.php">Daily Activity</a>
<li><a href ="ftea.php">Daily Activity</a>
<li><a href ="ml.php">Daily Activity</a>

<li><a href ="permormance.php">Work Done</a>
<li><a href ="partspending.php">Parts Pending</a>

</ul>
</li>

<li><a href ="">Edit</a>
<ul>

<li><a href ="search.php">Edit Activity</a>

</ul>
</li>

<li><a href ="">View Report</a>
<ul>
<li><a href ="branch_wise.php">Branch Wise</a>
<li><a href ="perfromreport.php">View Work Done</a>
<li><a href ="ppendingreport.php">Parts Pending</a>
<li><a href ="store_report.php">Store Panel</a>
<li><a href ="regireport.php">User Report</a>
<li><a href ="global_all.php">Global Report</a>

</ul>
</li>
<li><a href ="about.php">About</a></li>


<li><a href ="register.php">Add user</a></li>


</ul>
</center>
</header>
</body>
</html>