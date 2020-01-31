
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
 
 
 if(isset($_POST['search']))
 {
	$valuToSearch = $_POST['valuToSearch'];
	$query = "SELECT * FROM `name` WHERE CONCAT(`ID`, `name`, `office_id`, `pointname`, `phone`, `password`)LIKE'%$valuToSearch%'";
	$run1 = mysqli_query($con,$query);}
 
 else{
	 $query1="SELECT * FROM name";
	 $query2="SELECT * FROM name WHERE pointname='$point'";
	 $query3="SELECT * FROM name WHERE pointname='$point'";
	 $query4="SELECT * FROM name WHERE pointname='$point' AND section='$sec' ";
	 $query5="SELECT * FROM name WHERE section='$sec' ";
	 
 
 
 
 
 if($role==$role1){
	 $run1=mysqli_query($con,$query1);
 }
 elseif($role==$role2){
	 $run1=mysqli_query($con,$query2);
 }
 elseif($role==$role3){
	 $run1=mysqli_query($con,$query3);
 }
 elseif($role==$role4){
	 $run1=mysqli_query($con,$query4);
 }
 elseif($role==$role5){
	 $run1=mysqli_query($con,$query5);
 }
 }
 
 /*function filterTable($query){
	$connect=mysqli_connect("localhost","root","","uni");
 	$filter_result = mysqli_query($connect,$query);
	return $filter_result;
 }*/
 

 
 
 
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
<link rel="stylesheet" href="style.css"></link>
<title> DATA SEARCH</title>
<style>
table,tr,th,td {border:1px solid blue;}
</style>
</head>

<body id="b">
<center>
<header>
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

</div>
<form action ="" method ="POST">
<h2>Total Parts Pending : <input type="text" placeholder="Qty" name="ppqty"></input><input type="submit" value="Create" name="submit"></input></h2>


<table>

		<tr>
		<th>SR Number</th>
		<th>Product Model</th>
		<th>Parts Name</th>
		<th>Parts Code</th>
		<th>Requisition Number</th>
		<th>Remarks</th>
		
		
		
		</tr>
		
		<?php 
		
		$user=$_SESSION['office_id'];

$query = mysqli_query($con,"SELECT * FROM name WHERE office_id='$user'");

	

$row = mysqli_fetch_array($query);
$id = $row["office_id"];
$pointname = $row["pointname"];
$name = $row["name"];
$section = $row["section"];
		
		if(isset($_POST['ppqty']))
		{$num=$_POST['ppqty'];
		
		for($i=1; $i<=$num; $i++){
			
		
		?>
		
		<tr>
		<td><input type="number" name="sr[]"></input></td>
		<td><input type="text" name="model[]"></input></td>
		<td><input type="text" name="parts[]"></input></td>
		<td><input type="text" name="code[]"></input></td>
		<td><input type="text" name="requisition[]"></input></td>
		<td><input type="text" name="remarks[]"></input></td>
		</tr>
		<?php }}?>

		
</table></center>
<center>
<input name="sub" type="submit" id="button" value="Save"></input>
<a href="home.php"><input name="home" id="button" value="Home">
</input>
</center>
</form>


<?php

	/*$sql = "INSERT INTO `parts_pending` (`sr`, `model`, `parts`, `code`, `requisition`, `remarks`,pointname,section,office_id) VALUES";*/
if(isset($_POST['sub'])){
	
	for($i=0; $i<$_POST['ppqty']; $i++){
		
	$sql = "INSERT INTO `parts_pending` (`sr`, `model`, `parts`, `code`, `requisition`, `remarks`,pointname,section,office_id) VALUES ('".$_POST['sr'][$i]."','".$_POST['model'][$i]."','".$_POST['parts'][$i]."','".$_POST['code'][$i]."','".$_POST['requisition'][$i]."','".$_POST['remarks'][$i]."','$pointname','$section','$id')";
 /*$sql .="('".$_POST['sr'][$i]."','".$_POST['model'][$i]."','".$_POST['parts'][$i]."','".$_POST['code'][$i]."','".$_POST['requisition'][$i]."','".$_POST['remarks'][$i]."',),";*/

/*$s=rtrim($sql,",");*/
$s = mysqli_query($con,$sql);
	
if($s){
		
		echo "Record Save Successfully <br />";
		
	}else{
		
		echo mysqli_errno();
	}

}
}

?>

</body>
</html>