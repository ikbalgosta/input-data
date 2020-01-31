<?php
session_start();
 include 'config.php';
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
<form action="input.php" method="POST">
<header>
<div id="divheader">
<?php
echo "Welcom " . "  ,  ".$_SESSION['name']."  ,  ".$_SESSION['pointname']."  ,  ".$_SESSION['office_id']."  ,  ".$_SESSION['section'];
?>
</div>
</header>
<center>
<div id="divinput">
<table border = "3" id="tb">
<p><h3>Dated: <input name="bday" type="text" id="datepicker"> </h3></p>
<td>


<br><br><level>Receive Indoor &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp:</level>
<input name="rcvin" type="number" min="0" max="999" placeholder = "Receive Indoor Qty"  maxlength="10" id="t1" > </input>
<br><br><level>Receive Outdoor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</level>
<input name="rcvout" type="number" min="0" max="999" placeholder = "Receive Outdoor Qty" maxlength="10" id="t1" > </input>
<br><br><level>Work Done Indoor &nbsp;&nbsp;:</level>
<input name="wdonein" type="number" min="0" max="999" placeholder = "Work Done Indoor Qty" maxlength="10" id="t1" > </input>
<br><br><level>Work Done Outdoor:</level>
<input name="wdoneout" type="number" min="0" max="999" placeholder = "Work Done Outdoor Qty" maxlength="10" id="t1" > </input>

</td>

<td>
	<br><br><level>Parts pending Indoor &nbsp;&nbsp;:</level>
	<input name="ppin" type="number" min="0" max="999" placeholder = "Parts pending In Qty" maxlength="10" > </input>
	<br><br><level>Parts pending Outdoor:</level>
	<input name="ppout" type="number" min="0" max="999" placeholder = "Parts pending Out Qty" maxlength="10" > </input>
	<br><br><level>Decision pending &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;: </level>
	<input name="decision" type="number" min="0" max="999" placeholder = "Decision Pending Qty" maxlength="10" > </input>
	<br><br><level> 5Days Over Pending &nbsp;&nbsp;:</level>
	<input name="dayover" type="number" min="0" max="999" placeholder = "5 Days Overpending Qty" maxlength="10" > </input>
	
	

</td>

</table>
<tr><level><b>Remarks:</b></level> 

<input name="remarks" type="text" id="tremarks"  ></input></tr>

<br><br><input name="sub" type="submit" id="button" value="Save"></input>

<a href="home.php"><input name="back" type="button" id="button" value="Back">
</input>
</div>

</form>

<?php

	
	
$user=$_SESSION['office_id'];

$query = mysqli_query($con,"SELECT * FROM name WHERE office_id='$user'");

	

$row = mysqli_fetch_array($query);
$id = $row["office_id"];
$pointname = $row["pointname"];
$name = $row["name"];
$section = $row["section"];

if(isset($_POST['sub'])){
	
	$bday = $_POST['bday'];
	$rcvin = $_POST['rcvin'];
	$rcvout = $_POST['rcvout'];
	$wdonein = $_POST['wdonein'];
	$wdoneout = $_POST['wdoneout'];
	$ppin = $_POST['ppin'];
	$ppout = $_POST['ppout'];
	$decision = $_POST['decision'];
	$dayover = $_POST['dayover'];
	$remarks = $_POST['remarks'];
	
	$insertion= "insert into input(date,rcvin,rcvout,wdonein,wdoneout,ppin,ppout,decision,dayover,remarks,user_id,pointname,name,section,updated_by,modified_date, modified_time) Values('$bday','$rcvin','$rcvout','$wdonein','$wdoneout','$ppin','$ppout','$decision','$dayover','$remarks','$id','$pointname','$name','$section','$id',CURDATE(), CURTIME())";

	$query_run= mysqli_query($con,$insertion);
	
	if($query_run){
		
		echo "Done";
		
	}else{
		
		"Not done";
	}
	

	}
?>

</center>


</html>