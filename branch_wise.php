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
<style type ="text/css">
table,tr,th,td {border:1px solid blue;}


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
	 
	 	$query1 = "SELECT * FROM fridge,tv,emh,mobile,laptop WHERE fridge_pointname = '".$point."' AND fridge_date= '".$d."' AND tv_pointname = '".$point."' AND tv_date= '".$d."' AND emh_pointname = '".$point."' AND emh_date= '".$d."' AND mobile_pointname = '".$point."' AND mobile_date= '".$d."' AND lap_pointname = '".$point."' AND lap_date= '".$d."'";
		
	$run1=mysqli_query($con,$query1);  
		$row = mysqli_fetch_array($run1); 
		
			if(empty($row)){echo '<h2 style = " color:red;">Please Select Valid Date</h2>';}else{
			
		 echo 'Report Date: '.$d;
		?>
		
	


	<table>
	
	<tr>
		<th rowspan="4">SL</th>
		<th rowspan="4">Zone</th>
		<th rowspan="4" class="hide" >Service Point</th>
		<th colspan="11" align="center">FRIDGE</th>
		<th colspan="11" align="center">TV</td>
		<th colspan="11" align="center">EMH</td>
		<th colspan="11" align="center">MOBILE</th>
		<th colspan="11" align="center">LAPTOP</td>
		<th colspan="11" align="center">AC</td>
		
	</tr>
	
	<tr>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
		<th colspan="2" align="center">Receive</th>
		<th rowspan="3" align="center">Work Done</th>
		<th colspan="8" align="center">Pending</th>
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
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
		<th rowspan="2" align="center">Indoor</th>
		<th rowspan="2" align="center" >Outdoor</th>
		<th rowspan="2" align="center" >Indoor Pending</th>
		<th rowspan="2" align="center" >Outdoor Pending</th>
		<th colspan="2" align="center">Parts Pending</th>
		<th rowspan="2" align="center">Decision Pending</th>
		<th rowspan="2" align="center">Red Color Indicates More than 40</th>
		<th rowspan="2" align="center">Software Wise Total Pending Qty</th>
		<th rowspan="2" align="center">5 Days Over Pending</th>
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
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		<th align="center">Intransit</th>
		<th align="center">Without In Intransit</th>
		
	</tr>
	
	
	
		<tr>
			<td>1</td>
			<td>Zone</td>
			<td><?php echo $point;?></td>
			<td><?php echo $row['fridge_rcvin'];?></td>
			<td><?php echo $row['fridge_rcvout'];?></td>
			<td><?php echo $row['fridge_wdonein'];?></td>
			<td><?php echo $row['fridge_inpending'];?></td>
			<td><?php echo $row['fridge_outpending'];?></td>
			<td><?php echo $row['fridge_intransit'];?></td>
			<td><?php echo $row['fridge_parts_pending'];?></td>
			<td><?php echo $row['fridge_decision'];?></td>
			<td><?php echo $row['fridge_red_color'];?></td>
			<td><?php echo $row['fridge_soft_wise'];?></td>
			<td><?php echo $row['fridge_5days'];?></td>
			
			<td><?php if (empty(['tv_rcvin'])){echo "Null";}echo $row['tv_rcvin'];?></td>
			<td><?php echo $row['tv_rcvout'];?></td>
			<td><?php echo $row['tv_wdonein'];?></td>
			<td><?php echo $row['tv_inpending'];?></td>
			<td><?php echo $row['tv_outpending'];?></td>
			<td><?php echo $row['tv_intransit'];?></td>
			<td><?php echo $row['tv_parts_pending'];?></td>
			<td><?php echo $row['tv_decision'];?></td>
			<td><?php echo $row['tv_red_color'];?></td>
			<td><?php echo $row['tv_soft_wise'];?></td>
			<td><?php echo $row['tv_5days'];?></td>
			
			<td><?php echo $row['emh_rcvin'];?></td>
			<td><?php echo $row['emh_rcvout'];?></td>
			<td><?php echo $row['emh_wdonein'];?></td>
			<td><?php echo $row['emh_inpending'];?></td>
			<td><?php echo $row['emh_outpending'];?></td>
			<td><?php echo $row['emh_intransit'];?></td>
			<td><?php echo $row['emh_parts_pending'];?></td>
			<td><?php echo $row['emh_decision'];?></td>
			<td><?php echo $row['emh_red_color'];?></td>
			<td><?php echo $row['emh_soft_wise'];?></td>
			<td><?php echo $row['emh_5days'];?></td>
			
			<td><?php echo $row['mobile_rcvin'];?></td>
			<td><?php echo $row['mobile_rcvout'];?></td>
			<td><?php echo $row['mobile_wdonein'];?></td>
			<td><?php echo $row['mobile_inpending'];?></td>
			<td><?php echo $row['mobile_outpending'];?></td>
			<td><?php echo $row['mobile_intransit'];?></td>
			<td><?php echo $row['mobile_parts_pending'];?></td>
			<td><?php echo $row['mobile_decision'];?></td>
			<td><?php echo $row['mobile_red_color'];?></td>
			<td><?php echo $row['mobile_soft_wise'];?></td>
			<td><?php echo $row['mobile_5days'];?></td>
			
			<td><?php echo $row['lap_rcvin'];?></td>
			<td><?php echo $row['lap_rcvout'];?></td>
			<td><?php echo $row['lap_wdonein'];?></td>
			<td><?php echo $row['lap_inpending'];?></td>
			<td><?php echo $row['lap_outpending'];?></td>
			<td><?php echo $row['lap_intransit'];?></td>
			<td><?php echo $row['lap_parts_pending'];?></td>
			<td><?php echo $row['lap_decision'];?></td>
			<td><?php echo $row['lap_red_color'];?></td>
			<td><?php echo $row['lap_soft_wise'];?></td>
			<td><?php echo $row['lap_5days'];?></td>
			
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			
		</tr>
		
	</table>
		
<?php } }

/*
		$sql = "SELECT * FROM tv,fridge,emh WHERE tv.pointname = 'WSMS FENI' AND fridge.pointname ='WSMS FENI' AND emh.pointname='WSMS FENI' AND tv.date= '11/20/2019' AND fridge.date= '11/20/2019' AND emh.date= '11/20/2019' ";






$result = mysqli_query($con,$sql);

while($row= mysqli_fetch_array($result)){ 

echo '<pre><br>';
print_r ($row);
echo '<pre><br>';



}	
*/

?>

</form>
</body>
</html>