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
 
 $DisplayTable=True;
 
 if(isset($_POST['submit'])){
	 $d=$_POST['bday'];
	 $DisplayTable=False;
	}
 
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
<h2><input name="bday" type="text" id="datepicker" class="datepicker" placeholder="Select Report Date"><input name="submit" type="submit" value="Find" id="search"></h2> <h3><input type = "text" name="valuToSearch"><input type = "submit" name="search" value="Search" id="search"></h3>


<div id="wrapper">
<div id="left">
	<table>
	
		<tr>
			<th rowspan="4">SL</td>
			<th rowspan="4">Zone</td>
			<th rowspan="4">Service Point</td><th colspan="11" align="center"> Fridge</td></tr>
			
			
		
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
			<th rowspan="4" style="display:none;">SL</td>
			<th rowspan="4" style="display:none;">Zone</td>
			<th rowspan="4" style="display:none;">Service Point</td><th colspan="11" align="center"> AC</td></tr>
			
			
		
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
		$i=1;
		while($row=mysqli_fetch_array($run2)){
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
			<th rowspan="4">SL</td>
			<th rowspan="4">Zone</td>
			<th rowspan="4">Service Point</td><th colspan="11" align="center"> TV</td></tr>
			
			
		
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
		$i=1;
		while($row=mysqli_fetch_array($run6)){
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
			<th rowspan="4">SL</td>
			<th rowspan="4">Zone</td>
			<th rowspan="4">Service Point</td><th colspan="11" align="center">EMH</td></tr>
			
			
		
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
		$i=1;
		while($row=mysqli_fetch_array($run3)){
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
			<th rowspan="4">SL</td>
			<th rowspan="4">Zone</td>
			<th rowspan="4">Service Point</td><th colspan="11" align="center"> Mobile</td></tr>
			
			
		
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
		$i=1;
		while($row=mysqli_fetch_array($run5)){
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
			<th rowspan="4">SL</td>
			<th rowspan="4">Zone</td>
			<th rowspan="4">Service Point</td><th colspan="11" align="center"> Laptop</td></tr>
			
			
		
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
		$i=1;
		while($row=mysqli_fetch_array($run4)){
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
</div>
		
		


</form>
<br/>
<br/>
<br/><br/>
<br/>
<center><a href="home.php"><input type ="submit" name="back" value="Back" id="button"> <a href = "logout.php"><input name="logout" type="submit" id="button" value="LOG-OUT"></center>

</body>
</html>