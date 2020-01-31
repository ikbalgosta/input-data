<?php
session_start();
 include 'config.php';

 
 
 $point=$_SESSION['pointname'];
 $role=$_SESSION['role'];
 $sec=$_SESSION['section'];
 
 
 $role1="Admin";
 $role2="Branch Manager";
 $role3="Store Officer";
 $role4="Section Manager";
 $role5="Planning";
 
  
 $d= date ("m/d/Y");

 
 
if (isset($_POST['search']))
 {
	$valuToSearch = $_POST['valuToSearch'];
	$query = "SELECT * FROM `ac` WHERE CONCAT(`user`, `section`, `pointname`)LIKE'%$valuToSearch%'";
	$query = "SELECT * FROM `emh` WHERE CONCAT(`user`, `section`, `pointname`)LIKE'%$valuToSearch%'";
	$query = "SELECT * FROM `fridge` WHERE CONCAT(`user`, `section`, `pointname`)LIKE'%$valuToSearch%'";
	$query = "SELECT * FROM `laptop` WHERE CONCAT(`user`, `section`, `pointname`)LIKE'%$valuToSearch%'";
	$query = "SELECT * FROM `mobile` WHERE CONCAT(`user`, `section`, `pointname`)LIKE'%$valuToSearch%'";
	$query = "SELECT * FROM `tv` WHERE CONCAT(`user`, `section`, `pointname`)LIKE'%$valuToSearch%'";
	$run1 = mysqli_query($con,$query);}
 
 
 else{
	 
 
	$query1 = "SELECT * FROM `fridge` WHERE date = '$d' ";
	$query2 = "SELECT * FROM `ac`WHERE date = '$d' ";
	$query3 = "SELECT * FROM `emh`WHERE date = '$d' ";
	$query4 = "SELECT * FROM `laptop` WHERE date = '$d' ";
	$query5 = "SELECT * FROM `mobile` WHERE date = '$d' ";
	$query6 = "SELECT * FROM `tv` WHERE date = '$d' ";

 
 $run1=mysqli_query($con,$query1);
 $run2=mysqli_query($con,$query2);
 $run3=mysqli_query($con,$query3);
 $run4=mysqli_query($con,$query4);
 $run5=mysqli_query($con,$query5);
 $run6=mysqli_query($con,$query6);


 }
 
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
.hide { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }

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
<a href ="logout.php" class="logout">[ LOG-OUT ]<a href="home.php"><input type ="submit" name="back" value="Home" class="logout"><a>
</div>

</center>
</header>

<form action ="" method ="POST">
<center>
<div id="divheader">
<input name="bday" type="text" id="datepicker" class="datepicker" placeholder="Select Report Date"><input name="submit" type="submit" value="Find" id="search"><input type = "text" name="valuToSearch"><input type = "submit" name="search" value="Search" id="search">
</div>
</center>

<?php 

if(isset($_POST['submit'])){
	 $d=$_POST['bday'];
	
?>
<div id="wrapper">
<div id="left">
	<table>
	
		<tr>
			<th rowspan="4">SL</th>
			<th rowspan="4">Zone</th>
			<th rowspan="4" class="hide">Service Point</th><th colspan="11" align="center"> Fridge</td></tr>
			
			
		
		</tr>
		
		<tr>
		
			<th colspan="2" align="center">Receive</th>
			<th rowspan="3" align="center">Work Done</th>
			<th colspan="8" align="center">Pending</th>
		
		</tr>
		<tr>
			<th rowspan="2" align="center">Indoor</th>
			<th rowspan="2" align="center" >Outdoor</th>
			<th rowspan="2" align="center" >Indoor Pending</th>
			<th rowspan="2" align="center" >Outdoor Pending</th>
			<th colspan="2" align="center">Parts Pending</th>
			<th rowspan="2" align="center">Decision Pending</th>
			<th rowspan="2" align="center">Red Color Indicates More than 40</th>
			<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
			<th rowspan="2" align="center">5 Days Over Pending</th>
		
		</tr>
		
		<tr>
		
			<th align="center">Intransit</th>
			<th align="center">Without In Intransit</th>
		
		</tr>
		
		<?php 
		$i=1;
		while($row=mysqli_fetch_array($run1)){
		?>
		
		<tr>
			<td><?php echo $i++;?></td>
			<td>Zone</td>
			<td><?php echo $row['pointname'];?></td>
			<td><?php echo $row['rcvin'];?></td>
			<td><?php echo $row['rcvout'];?></td>
			<td><?php echo $row['wdonein'];?></td>
			<td><?php echo $row['inpending'];?></td>
			<td><?php echo $row['outpending'];?></td>
			<td><?php echo $row['intransit'];?></td>
			<td><?php echo $row['parts_pending'];?></td>
			<td><?php echo $row['decision'];?></td>
			<td><?php echo $row['red_color'];?></td>
			<td><?php echo $row['soft_wise'];?></td>
			<td><?php echo $row['5days'];?></td>
		</tr>
		
		<?php } ?>
		
	</table>
</div>
<div id="right">
	<table>
	
		<tr>
			<th rowspan="4" style = "display: none;">SL</th>
			<th rowspan="4" style = "display: none;">Zone</th>
			<th rowspan="4" style = "display: none;">Service Point</th><th colspan="11" align="center"> AC</td></tr>
			
			
		
		</tr>
		
		<tr>
		
			<th colspan="2" align="center">Receive</th>
			<th rowspan="3" align="center">Work Done</th>
			<th colspan="8" align="center">Pending</th>
		
		</tr>
		<tr>
			<th rowspan="2" align="center">Indoor</th>
			<th rowspan="2" align="center" >Outdoor</th>
			<th rowspan="2" align="center" >Indoor Pending</th>
			<th rowspan="2" align="center" >Outdoor Pending</th>
			<th colspan="2" align="center">Parts Pending</th>
			<th rowspan="2" align="center">Decision Pending</th>
			<th rowspan="2" align="center">Red Color Indicates More than 40</th>
			<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
			<th rowspan="2" align="center">5 Days Over Pending</th>
		
		</tr>
		
		<tr>
		
			<th align="center">Intransit</th>
			<th align="center">Without In Intransit</th>
		
		</tr>
		
		
		<?php 
		$i=1;
		while($row=mysqli_fetch_array($run2)){
		?>
		
		<tr>
			
			<td><?php echo $row['rcvin'];?></td>
			<td><?php echo $row['rcvout'];?></td>
			<td><?php echo $row['wdonein'];?></td>
			<td><?php echo $row['inpending'];?></td>
			<td><?php echo $row['outpending'];?></td>
			<td><?php echo $row['intransit'];?></td>
			<td><?php echo $row['parts_pending'];?></td>
			<td><?php echo $row['decision'];?></td>
			<td><?php echo $row['red_color'];?></td>
			<td><?php echo $row['soft_wise'];?></td>
			<td><?php echo $row['5days'];?></td>
		</tr>
		
		<?php } ?>
		
	</table>
</div>
<div id="right">
	<table>
	
		<tr>
			<th rowspan="4" style = "display: none;">SL</th>
			<th rowspan="4" style = "display: none;">Zone</th>
			<th rowspan="4" style = "display: none;">Service Point</th><th colspan="11" align="center"> TV</td></tr>
			
			
		
		</tr>
		
		<tr>
		
			<th colspan="2" align="center">Receive</th>
			<th rowspan="3" align="center">Work Done</th>
			<th colspan="8" align="center">Pending</th>
		
		</tr>
		<tr>
			<th rowspan="2" align="center">Indoor</th>
			<th rowspan="2" align="center" >Outdoor</th>
			<th rowspan="2" align="center" >Indoor Pending</th>
			<th rowspan="2" align="center" >Outdoor Pending</th>
			<th colspan="2" align="center">Parts Pending</th>
			<th rowspan="2" align="center">Decision Pending</th>
			<th rowspan="2" align="center">Red Color Indicates More than 40</th>
			<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
			<th rowspan="2" align="center">5 Days Over Pending</th>
		
		</tr>
		
		<tr>
		
			<th align="center">Intransit</th>
			<th align="center">Without In Intransit</th>
		
		</tr>
		
		<?php 
		$i=1;
		while($row=mysqli_fetch_array($run6)){
		?>
		
		<tr>
			
			<td><?php echo $row['rcvin'];?></td>
			<td><?php echo $row['rcvout'];?></td>
			<td><?php echo $row['wdonein'];?></td>
			<td><?php echo $row['inpending'];?></td>
			<td><?php echo $row['outpending'];?></td>
			<td><?php echo $row['intransit'];?></td>
			<td><?php echo $row['parts_pending'];?></td>
			<td><?php echo $row['decision'];?></td>
			<td><?php echo $row['red_color'];?></td>
			<td><?php echo $row['soft_wise'];?></td>
			<td><?php echo $row['5days'];?></td>
		</tr>
		
		<?php } ?>
	</table>
</div>
<div id="right">
	<table>
	
		<tr>
			<th rowspan="4" style = "display: none;">SL</th>
			<th rowspan="4" style = "display: none;">Zone</th>
			<th rowspan="4" style = "display: none;">Service Point</th><th colspan="11" align="center"> EMH</td></tr>
			
			
		
		</tr>
		
		<tr>
		
			<th colspan="2" align="center">Receive</th>
			<th rowspan="3" align="center">Work Done</th>
			<th colspan="8" align="center">Pending</th>
		
		</tr>
		<tr>
			<th rowspan="2" align="center">Indoor</th>
			<th rowspan="2" align="center" >Outdoor</th>
			<th rowspan="2" align="center" >Indoor Pending</th>
			<th rowspan="2" align="center" >Outdoor Pending</th>
			<th colspan="2" align="center">Parts Pending</th>
			<th rowspan="2" align="center">Decision Pending</th>
			<th rowspan="2" align="center">Red Color Indicates More than 40</th>
			<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
			<th rowspan="2" align="center">5 Days Over Pending</th>
		
		</tr>
		
		<tr>
		
			<th align="center">Intransit</th>
			<th align="center">Without In Intransit</th>
		
		</tr>
		
		<?php 
		$i=1;
		while($row=mysqli_fetch_array($run3)){
		?>
		
		<tr>
			
			<td><?php echo $row['rcvin'];?></td>
			<td><?php echo $row['rcvout'];?></td>
			<td><?php echo $row['wdonein'];?></td>
			<td><?php echo $row['inpending'];?></td>
			<td><?php echo $row['outpending'];?></td>
			<td><?php echo $row['intransit'];?></td>
			<td><?php echo $row['parts_pending'];?></td>
			<td><?php echo $row['decision'];?></td>
			<td><?php echo $row['red_color'];?></td>
			<td><?php echo $row['soft_wise'];?></td>
			<td><?php echo $row['5days'];?></td>
		</tr>
		
		<?php } ?>
	</table>
</div>
<div id="right">
	<table>
	
	<tr>
			<th rowspan="4" style = "display: none;">SL</th>
			<th rowspan="4" style = "display: none;">Zone</th>
			<th rowspan="4" style = "display: none;">Service Point</th><th colspan="11" align="center"> Mobile</td></tr>
			
			
		
		</tr>
		
		<tr>
		
			<th colspan="2" align="center">Receive</th>
			<th rowspan="3" align="center">Work Done</th>
			<th colspan="8" align="center">Pending</th>
		
		</tr>
		<tr>
			<th rowspan="2" align="center">Indoor</th>
			<th rowspan="2" align="center" >Outdoor</th>
			<th rowspan="2" align="center" >Indoor Pending</th>
			<th rowspan="2" align="center" >Outdoor Pending</th>
			<th colspan="2" align="center">Parts Pending</th>
			<th rowspan="2" align="center">Decision Pending</th>
			<th rowspan="2" align="center">Red Color Indicates More than 40</th>
			<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
			<th rowspan="2" align="center">5 Days Over Pending</th>
		
		</tr>
		
		<tr>
		
			<th align="center">Intransit</th>
			<th align="center">Without In Intransit</th>
		
		</tr>
	
		
		<?php 
		$i=1;
		while($row=mysqli_fetch_array($run5)){
		?>
		
		<tr>
			
			<td><?php echo $row['rcvin'];?></td>
			<td><?php echo $row['rcvout'];?></td>
			<td><?php echo $row['wdonein'];?></td>
			<td><?php echo $row['inpending'];?></td>
			<td><?php echo $row['outpending'];?></td>
			<td><?php echo $row['intransit'];?></td>
			<td><?php echo $row['parts_pending'];?></td>
			<td><?php echo $row['decision'];?></td>
			<td><?php echo $row['red_color'];?></td>
			<td><?php echo $row['soft_wise'];?></td>
			<td><?php echo $row['5days'];?></td>
		</tr>
		
		<?php } ?>
	</table>
</div>
<div id="right">
	<table>
	<tr>
			<th rowspan="4" style = "display: none;">SL</th>
			<th rowspan="4" style = "display: none;">Zone</th>
			<th rowspan="4" style = "display: none;">Service Point</th><th colspan="11" align="center"> Laptop</td></tr>
			
			
		
		</tr>
		
		<tr>
		
			<th colspan="2" align="center">Receive</th>
			<th rowspan="3" align="center">Work Done</th>
			<th colspan="8" align="center">Pending</th>
		
		</tr>
		<tr>
			<th rowspan="2" align="center">Indoor</th>
			<th rowspan="2" align="center" >Outdoor</th>
			<th rowspan="2" align="center" >Indoor Pending</th>
			<th rowspan="2" align="center" >Outdoor Pending</th>
			<th colspan="2" align="center">Parts Pending</th>
			<th rowspan="2" align="center">Decision Pending</th>
			<th rowspan="2" align="center">Red Color Indicates More than 40</th>
			<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
			<th rowspan="2" align="center">5 Days Over Pending</th>
		
		</tr>
		
		<tr>
		
			<th align="center">Intransit</th>
			<th align="center">Without In Intransit</th>
		
		</tr>
		
		<?php 
		$i=1;
		while($row=mysqli_fetch_array($run4)){
		?>
		
		<tr>
		
			<td><?php echo $row['rcvin'];?></td>
			<td><?php echo $row['rcvout'];?></td>
			<td><?php echo $row['wdonein'];?></td>
			<td><?php echo $row['inpending'];?></td>
			<td><?php echo $row['outpending'];?></td>
			<td><?php echo $row['intransit'];?></td>
			<td><?php echo $row['parts_pending'];?></td>
			<td><?php echo $row['decision'];?></td>
			<td><?php echo $row['red_color'];?></td>
			<td><?php echo $row['soft_wise'];?></td>
			<td><?php echo $row['5days'];?></td>
		</tr>
		
		<?php } ?>
		

		
		
	</table>
</div>
</div>
		
		
<?php }else{}	?>

</form>
<br/>


</form>
</body>
</html>
