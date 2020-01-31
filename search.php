<?php
session_start();
 include 'config.php';

 
 
 $point=$_SESSION['pointname'];
 $role=$_SESSION['role'];
 $sec=$_SESSION['section'];
 $id=$_SESSION['office_id'];
 
 
 $role1="Admin";
 $role2="Branch Manager";
 $role3="Store Officer";
 $role4="Section Manager";
 $role5="Planning";
 
 
 $d= date ("m/d/Y");

 
 
 
 ?>


<html>

<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  
  
  </script>
<link rel="stylesheet" href="style.css"></link>
<title> </title>
<style>
table,tr,th,td {border:1px solid blue;}

#wrapper {
  display: flex;
}

#left {
  flex: 0 0;
}

#right {
  flex: 1;
}
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
</div>


</center>
</header>


<form action ="" method ="POST">
<center>
<div id="divheader">
<input name="bday" type="text" id="datepicker" class="datepicker" placeholder="Select Report Date"><input name="submit" type="submit" value="Find" id="search">
</div>

<?php


 
if(isset($_POST['submit'])){
	 $d=$_POST['bday'];
 

	
 
	$query1 = "SELECT * FROM `fridge` WHERE fridge_date = '$d' AND fridge_user ='".$_SESSION['office_id']."' ";
	$query2 = "SELECT * FROM `ac`WHERE ac_date = '$d' AND ac_user ='".$_SESSION['office_id']."' ";
	$query3 = "SELECT * FROM `emh`WHERE emh_date = '$d' AND emh_user ='".$_SESSION['office_id']."' ";
	$query4 = "SELECT * FROM `laptop` WHERE lap_date = '$d' AND lap_user ='".$_SESSION['office_id']."' ";
	$query5 = "SELECT * FROM `mobile` WHERE mobile_date = '$d' AND mobile_user ='".$_SESSION['office_id']."' ";
	$query6 = "SELECT * FROM `tv` WHERE tv_date = '$d' AND tv_user ='".$_SESSION['office_id']."' ";

 if($sec=="Fridge"){
 $run=mysqli_query($con,$query1);
 }elseif($sec=="Cellphone"){
 $run=mysqli_query($con,$query5);
 }elseif($sec=="Television"){
 $run=mysqli_query($con,$query6);}
 elseif($sec=="EMH"){
 $run=mysqli_query($con,$query3);}
 elseif($sec=="AC"){
 $run=mysqli_query($con,$query2);}
 elseif($sec=="Laptop"){
 $run=mysqli_query($con,$query4);}
 
 $row = mysqli_fetch_array($run);

  if(empty($row)){echo '<h2 style = " color:red;">Please Select Valid Date</h2>';}else{
	  echo 'Report Date :'.$d;
	 
	 
?>


<div>
<div>
	<table>
	
		<tr>
			<th rowspan="4">Action</td>
			<th rowspan="4">SL</td>
			<th rowspan="4">Service Point</td><th colspan="11" align="center" ><?php echo $_SESSION['section']; ?></td></tr>
			
			
			
		
		</tr>
		
		<tr>
		
			<th colspan="2" align="center">Receive</td>
			<th rowspan="3" align="center">Work Done</td>
			<th colspan="8" align="center">Pending</td>
		
		</tr>
		<tr>
			<th rowspan="2" align="center">Indoor</td>
			<th rowspan="2" align="center" >Outdoor</td>
			<th rowspan="2" align="center" >Indoor Pending</td>
			<th rowspan="2" align="center" >Outdoor Pending</td>
			<th colspan="2" align="center">Parts Pending</td>
			<th rowspan="2" align="center">Decision Pending</td>
			<th rowspan="2" align="center">Red Color Indicates More than 40</td>
			<th rowspan="2" align="center">Software Wise Total Pending Qty</td>
			<th rowspan="2" align="center">5 Days Over Pending</td>
			
		
		</tr>
		
		<tr>
		
			<th align="center">Intransit</td>
			<th align="center">Without In Intransit</td>
		
		</tr>
		
		<?php 
		
		
		
		
		?>
		
		<tr>
		<td><a href ="edit.php?editid=<?php echo $row[0];?>">Edit</a></td>
			<td></td>
			<td><?php echo $row[15];?></td>
			<td><?php echo $row[2];?></td>
			<td><?php echo $row[3];?></td>
			<td><?php echo $row[4];?></td>
			<td><?php echo $row[5];?></td>
			<td><?php echo $row[6];?></td>
			<td><?php echo $row[7];?></td>
			<td><?php echo $row[8];?></td>
			<td><?php echo $row[9];?></td>
			<td><?php echo $row[10];?></td>
			<td><?php echo $row[11];?></td>
			<td><?php echo $row[12];?></td>
			
		</tr>
		
	</table>
	

</div>
</div>
		</center>
</form>
<br/>
<br/>
<br/><br/>
<br/>
<center><a href="home.php"><input type ="submit" name="back" value="Back" id="button"> <a href = "logout.php"><input name="logout" type="submit" id="button" value="LOG-OUT"></center>
<?php  } }?>
</body>
</html>