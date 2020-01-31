
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
<form action ="permormance.php" method ="POST">
<tr>
	<td>Day Number</td>
	<td>:</td>
	<td><select name="day" required>
<option selected hidden value="">Select Work done Day</option>
<option value="day1">Day-1</option>
<option value="day2">Day-2</option>
<option value="day3">Day-3</option>
<option value="day4">Day-4</option>
<option value="day5">Day-5</option>
<option value="day6">Day-6</option>
<option value="day7">Day-7</option>
<option value="day8">Day-8</option>
<option value="day9">Day-9</option>
<option value="day10">Day-10</option>
<option value="day11">Day-11</option>
<option value="day12">Day-12</option>
<option value="day13">Day-13</option>
<option value="day14">Day-14</option>
<option value="day15">Day-15</option>
<option value="day16">Day-16</option>
<option value="day17">Day-17</option>
<option value="day18">Day-18</option>
<option value="day19">Day-19</option>
<option value="day20">Day-20</option>
<option value="day21">Day-21</option>
<option value="day22">Day-22</option>
<option value="day23">Day-23</option>
<option value="day24">Day-24</option>
<option value="day25">Day-25</option>
<option value="day26">Day-26</option>
<option value="day27">Day-27</option>
<option value="day28">Day-28</option>
<option value="day29">Day-29</option>
<option value="day30">Day-30</option>
<option value="day31">Day-31</option>

</select></td>


</tr>

<table>

		<tr>
		<th>SL</th>
		<th> Name </th>
		<th>Office_id </th>
		<th>Point Name</th>
		<th>Phone </th>
		<th>Wrok Done (Qty)</th>
		
		</tr>
		<?php 
		
		

		$g = 1;

		
		while($row=mysqli_fetch_array($run1)):
		
		$office_id[]=$row['office_id'];
		
		?>
		
		<tr>
		<td><input name="sl" type="button" value="<?php echo $g++;?>"></input></td>
		<td><input name="name" type="button" value="<?php echo $row['name'];?>"></input></td>
		<td><input name="office_id[]" type="button" value="<?php echo $row['office_id'];?>"></input></td>
		<td><input name="pointname" type="button" value="<?php echo $row['pointname'];?>"></input></td>
		<td><input name="phone" type="button" value= "<?php echo $row['phone'];?>"></input></td>
		<td><input type="number" name="workdone[]"></input></td>
		
		
		</tr>

		<?php endwhile;?>
		
</table></center>
<center>
<input name="sub" type="submit" id="button" value="Save"></></input>
<a href="home.php"><input name="home" id="button" value="Home">
</input>
</center>
</form>


<?php

$count=mysqli_num_rows($run1);
	
if(isset($_POST['sub'])){
	
	for($i=0; $i<$count; $i++){
	
	
	$day=$_POST['day'];
	
	


$sql="UPDATE  name SET $day='".$_POST['workdone'][$i]."' WHERE office_id ='$office_id[$i]' ";



	$run_sql = mysqli_query($con,$sql);}
if($run_sql){
		
		echo "Done";
		
	}else{
		
		echo "Not done";
	}

}

?>

</body>
</html>