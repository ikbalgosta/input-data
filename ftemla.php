<?php
session_start();
 include 'config.php';
?>

<html>
<head>
<style>#input{ width: 100%;  padding: 12px 20px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}</style>
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
<form action="ftemla.php" method="POST">
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
<table id="tb">
<h3>Dated: <input name="bday" type="text" id="datepicker" required> </h3>

<tr><td>Receive Indoor</td><td>:</td><td><input name="rcvin" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required > </input></td>
<td>Receive Outdoor</td><td>:</td><td><input name="rcvout" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required > </input></td>
</tr>
<tr>
<td>Work Done</td><td>:</td><td><input name="wdone" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required > </input></td>
<td>Indoor Pending</td><td>:</td><td><input name="inpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required> </input></td>
</tr>
<tr>
<td>Outdoor Pending</td><td>:</td><td><input name="Outpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required > </input></td>
<td>Parts Intransit</td><td>:</td><td><input name="intransit" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required> </input></td>
</tr>
<tr>
<td>Parts pending </td><td>:</td><td><input name="ppending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required> </input></td>
<td>Decision Pending</td><td>:</td><td><input name="dpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required> </input></td>
</tr>
<tr>
<td>Red Color Indicates</td><td>:</td><td><input name="redindecate" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required> </input></td>
<td>Softwar wise pending</td><td>:</td><td><input name="softpending" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required> </input></td>
</tr>
<tr>
<td>5 Days Over Pending</td><td>:</td><td><input name="5over" type="number" min="0" max="999" placeholder = "Qty"  maxlength="10" id="t1" required > </input></td>
<td></td>

</tr>


</table>

<br><br><input name="sub" type="submit" id="button" value="Save"></input>

<a href="home.php"><input name="back" type="button" id="button" value="Back">
</input>
</div>

</form>

<?php

/*
$sec_tv ="Television";
$sec_frig ="Fridge";
$sec_cell ="Cellphone";
$sec_emh ="EMH";
$sec_ac ="AC";

$tbl_ac="ac";
$tbl_frig="fridge";
$tbl_tv="tv";
$tbl_cell="mobile";
$tbl_emh="emh";
*/
	
	
$user = $_SESSION['office_id'];
$cata = $_SESSION['cata'];

$query = mysqli_query($con,"SELECT * FROM name WHERE office_id='$user'");

	

$row = mysqli_fetch_array($query);
$id = $row["office_id"];
$pointname = $row["pointname"];
$name = $row["name"];
$section = $row["section"];



if(isset($_POST['sub']) && !empty($_POST['bday'])){
	
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
	$sql="SELECT * FROM tv WHERE tv_date= '$bday' AND tv_user = '$user' ";
	$record= mysqli_query($con,$sql);
	$count= mysqli_num_rows($record);
	if($count==0){
	$insertion= "insert into tv (`tv_date`, `tv_rcvin`, `tv_rcvout`, `tv_wdonein`, `tv_inpending`, `tv_outpending`, `tv_intransit`, `tv_parts_pending`, `tv_decision`, `tv_red_color`, `tv_soft_wise`, `tv_5days`, `tv_user`, `tv_section`, `tv_pointname`) Values('$bday','$rcvin','$rcvout','$wdone','$inpending','$Outpending','$intransit','$ppending','$dpending','$redindecate','$softpending','$over','$user','$section','$pointname')";
$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo header("Location:permormance.php");
	}
}else{echo header("Location:ftemla.php");}

}
elseif($_SESSION['section']=="Fridge"){
	$sql="SELECT * FROM fridge WHERE fridge_date= '$bday' AND fridge_user = '$user' ";
	$record= mysqli_query($con,$sql);
	$count= mysqli_num_rows($record);
	if($count==0){
	$insertion= "insert into fridge (fridge_date, `fridge_rcvin`, `fridge_rcvout`, `fridge_wdonein`, `fridge_inpending`, `fridge_outpending`, `fridge_intransit`, `fridge_parts_pending`, `fridge_decision`, `fridge_red_color`, `fridge_soft_wise`, `fridge_5days`, `fridge_user`, `fridge_section`, `fridge_pointname`) Values('$bday','$rcvin','$rcvout','$wdone','$inpending','$Outpending','$intransit','$ppending','$dpending','$redindecate','$softpending','$over','$user','$section','$pointname')";
	
	$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo header("Location:permormance.php");
	}
}else{echo header("Location:ftemla.php");}

}

elseif($_SESSION['section']=="Cellphone"){
	$sql="SELECT * FROM mobile WHERE mobile_date= '$bday' AND mobile_user = '$user' ";
	$record= mysqli_query($con,$sql);
	$count= mysqli_num_rows($record);
	if($count==0){
	$insertion= "insert into mobile (`mobile_date`, `mobile_rcvin`, `mobile_rcvout`, `mobile_wdonein`, `mobile_inpending`, `mobile_outpending`, `mobile_intransit`, `mobile_parts_pending`, `mobile_decision`, `mobile_red_color`, `mobile_soft_wise`, `mobile_5days`, `mobile_user`, `mobile_section`, `mobile_pointname`) Values('$bday','$rcvin','$rcvout','$wdone','$inpending','$Outpending','$intransit','$ppending','$dpending','$redindecate','$softpending','$over','$user','$section','$pointname')";
$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo header("Location:permormance.php");
	}
}else{echo header("Location:ftemla.php");}

}


elseif($_SESSION['section']=="EMH"){
	$sql="SELECT * FROM emh WHERE emh_date= '$bday' AND emh_user = '$user' ";
	$record= mysqli_query($con,$sql);
	$count= mysqli_num_rows($record);
	if($count==0){
	$insertion= "insert into emh (`emh_date`, `emh_rcvin`, `emh_rcvout`, `emh_wdonein`, `emh_inpending`, `emh_outpending`, `emh_intransit`, `emh_parts_pending`, `emh_decision`, `emh_red_color`, `emh_soft_wise`, `emh_5days`, `emh_user`, `emh_section`, `emh_pointname`) Values('$bday','$rcvin','$rcvout','$wdone','$inpending','$Outpending','$intransit','$ppending','$dpending','$redindecate','$softpending','$over','$user','$section','$pointname')";
$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo header("Location:permormance.php");
	}
}else{echo header("Location:ftemla.php");}

}


elseif($_SESSION['section']=="AC"){
	$sql="SELECT * FROM ac WHERE ac_date= '$bday' AND ac_user = '$user' ";
	$record= mysqli_query($con,$sql);
	$count= mysqli_num_rows($record);
	if($count==0){
	$insertion= "insert into ac (`ac_date`, `ac_rcvin`, `ac_rcvout`, `ac_wdonein`, `ac_inpending`, `ac_outpending`, `ac_intransit`, `ac_parts_pending`, `ac_decision`, `ac_red_color`, `ac_soft_wise`, `ac_5days`, `ac_user`, `ac_section`, `ac_pointname`) Values('$bday','$rcvin','$rcvout','$wdone','$inpending','$Outpending','$intransit','$ppending','$dpending','$redindecate','$softpending','$over','$user','$section','$pointname')";
$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo header("Location:permormance.php");
	}
}else{echo header("Location:ftemla.php");}

}


elseif($_SESSION['section']=="Laptop"){
	$sql="SELECT * FROM laptop WHERE lap_date= '$bday' AND lap_user = '$user' ";
	$record= mysqli_query($con,$sql);
	$count= mysqli_num_rows($record);
	if($count==0){
	$insertion= "insert into laptop (`lap_date`, `lap_rcvin`, `lap_rcvout`, `lap_wdonein`, `lap_inpending`, `lap_outpending`, `lap_intransit`, `lap_parts_pending`, `lap_decision`, `lap_red_color`, `lap_soft_wise`, `lap_5days`, `lap_user`, `lap_section`, `lap_pointname`) Values('$bday','$rcvin','$rcvout','$wdone','$inpending','$Outpending','$intransit','$ppending','$dpending','$redindecate','$softpending','$over','$user','$section','$pointname')";
$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo header("Location:permormance.php");
	}
}else{echo header("Location:ftemla.php");}

}

























}else{
	
	$_POST=NULL;
}


?>

</center>
</html>