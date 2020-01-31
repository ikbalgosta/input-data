<?php
session_start();
 include 'config.php';
 $editid = $_GET['editid'];
 

if($_SESSION['section']=="Television"){
	$sqledit = "SELECT * FROM tv where tv_id=$editid";
	
}elseif($_SESSION['section']=="Fridge"){
	$sqledit = "SELECT * FROM fridge where fridge_id=$editid";
	
}elseif($_SESSION['section']=="Cellphone"){
	$sqledit = "SELECT * FROM mobile where mobile_id=$editid";
	
}elseif($_SESSION['section']=="EMH"){
	$sqledit = "SELECT * FROM emh where emh_id=$editid";
	
}elseif($_SESSION['section']=="AC"){
	$sqledit = "SELECT * FROM ac where ac_id=$editid";

}elseif($_SESSION['section']=="Laptop"){
	$sqledit = "SELECT * FROM laptop where lap_id=$editid";
}
  
  
   	
 
	
	
	
	$cheekedit = mysqli_query($con,$sqledit);
	
	$row=mysqli_fetch_array($cheekedit);

	
	
		?>
	
	


<html>
<head>
<link rel="stylesheet" href="style.css"></link>
<title>input report</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body id="b">
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

</header>
<center>
<div id="divinput">
<form action="" method="POST" >
<table id="tb">
<h3>Dated: <input name="bday" type="text" id="datepicker" value="<?php echo $row[1];?>"></input> </h3>

<tr><td>Receive Indoor</td><td>:</td><td><input name="rcvin" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1"  value="<?php echo $row[2]; ?>"> </input></td>
<td>Receive Outdoor</td><td>:</td><td><input name="rcvout" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1"  value="<?php echo $row[3]; ?>"> </input></td>
</tr>
<tr>
<td>Work Done</td><td>:</td><td><input name="wdone" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[4]; ?>" > </input></td>
<td>Indoor Pending</td><td>:</td><td><input name="inpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[5]; ?>"> </input></td>
</tr>
<tr>
<td>Outdoor Pending</td><td>:</td><td><input name="Outpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[6]; ?>" > </input></td>
<td>Parts Intransit</td><td>:</td><td><input name="intransit" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[7]; ?>"> </input></td>
</tr>
<tr>
<td>Parts pending </td><td>:</td><td><input name="ppending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[8]; ?>"> </input></td>
<td>Decision Pending</td><td>:</td><td><input name="dpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[9]; ?>"> </input></td>
</tr>
<tr>
<td>Red Color Indicates</td><td>:</td><td><input name="redindecate" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[9]; ?>"> </input></td>
<td>Softwar wise pending</td><td>:</td><td><input name="softpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[10]; ?>"> </input></td>
</tr>
<tr>
<td>5 Days Over Pending</td><td>:</td><td><input name="5over" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" value="<?php echo $row[10]; ?>" > </input></td>
<td></td>

</tr>


</table>


<br><br><input name="update" type="submit" id="button" value="Update"></input>
<input name="delete" type="submit" id="button" value="Delete"></input>
<a href="home.php"><input name="back" type="button" id="button" value="Back">
</input>
</div>

</form>

<?php

	if(isset($_POST['update'])){
	
	$bday = $_POST['bday'];
	$rcvin = $_POST['rcvin'];
	$rcvout = $_POST['rcvout'];
	$wdone = $_POST['wdone'];
	$inpending = $_POST['inpending'];
	$Outpending = $_POST['Outpending'];
	$intransit = $_POST['intransit'];
	$ppending = $_POST['ppending'];
	$dpending = $_POST['dpending'];
	$redindecate = $_POST['redindecate'];
	$softpending = $_POST['softpending'];
	$over = $_POST['5over'];
	
	
	
if($_SESSION['section']=="Television"){
$insertion= "UPDATE `tv` SET `tv_date`='".$bday."',`tv_rcvin`='".$rcvin."',`tv_rcvout`='".rcvout."',`tv_wdonein`='".$wdone."',`tv_inpending`='".inpending."',`tv_outpending`='".Outpending."',`tv_intransit`='".$intransit."',`tv_parts_pending`='".$ppending."',`tv_decision`='".$dpending."',`tv_red_color`='".$redindecate."',`tv_soft_wise`='".$softpending."',`tv_5days`='".$over."' WHERE tv_id='".$editid."' ";
}elseif($_SESSION['section']=="Fridge"){
	$insertion= "UPDATE `fridge` SET `fridge_date`='".$bday."',`fridge_rcvin`='".$rcvin."',`fridge_rcvout`='".rcvout."',`fridge_wdonein`='".$wdone."',`fridge_inpending`='".inpending."',`fridge_outpending`='".Outpending."',`fridge_intransit`='".$intransit."',`fridge_parts_pending`='".$ppending."',`fridge_decision`='".$dpending."',`fridge_red_color`='".$redindecate."',`fridge_soft_wise`='".$softpending."',`fridge_5days`='".$over."' WHERE fridge_id='".$editid."' ";
}elseif($_SESSION['section']=="Cellphone"){
	$insertion= "UPDATE `mobile` SET `mobile_date`='".$bday."',`mobile_rcvin`='".$rcvin."',`mobile_rcvout`='".rcvout."',`mobile_wdonein`='".$wdone."',`mobile_inpending`='".inpending."',`mobile_outpending`='".Outpending."',`mobile_intransit`='".$intransit."',`mobile_parts_pending`='".$ppending."',`mobile_decision`='".$dpending."',`mobile_red_color`='".$redindecate."',`mobile_soft_wise`='".$softpending."',`mobile_5days`='".$over."' WHERE mobile_id='".$editid."' ";
}elseif($_SESSION['section']=="EMH"){
	$insertion= "UPDATE `emh` SET `emh_date`='".$bday."',`emh_rcvin`='".$rcvin."',`emh_rcvout`='".rcvout."',`emh_wdonein`='".$wdone."',`emh_inpending`='".inpending."',`emh_outpending`='".Outpending."',`emh_intransit`='".$intransit."',`emh_parts_pending`='".$ppending."',`emh_decision`='".$dpending."',`emh_red_color`='".$redindecate."',`emh_soft_wise`='".$softpending."',`emh_5days`='".$over."' WHERE emh_id='".$editid."' ";
}elseif($_SESSION['section']=="AC"){
	$insertion= "UPDATE `ac` SET `ac_date`='".$bday."',`ac_rcvin`='".$rcvin."',`ac_rcvout`='".rcvout."',`ac_wdonein`='".$wdone."',`ac_inpending`='".inpending."',`ac_outpending`='".Outpending."',`ac_intransit`='".$intransit."',`ac_parts_pending`='".$ppending."',`ac_decision`='".$dpending."',`ac_red_color`='".$redindecate."',`ac_soft_wise`='".$softpending."',`ac_5days`='".$over."' WHERE ac_id='".$editid."' ";
}elseif($_SESSION['section']=="Laptop"){
	$insertion= "UPDATE `laptop` SET `lap_date`='".$bday."',`lap_rcvin`='".$rcvin."',`lap_rcvout`='".rcvout."',`lap_wdonein`='".$wdone."',`lap_inpending`='".inpending."',`lap_outpending`='".Outpending."',`lap_intransit`='".$intransit."',`lap_parts_pending`='".$ppending."',`lap_decision`='".$dpending."',`lap_red_color`='".$redindecate."',`lap_soft_wise`='".$softpending."',`lap_5days`='".$over."' WHERE lap_id='".$editid."' ";
}




	$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo header("Location:search.php");
		
	}else{
		
		echo "Not done";
	}
	}

?>

</center>


</html>