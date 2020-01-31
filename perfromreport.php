
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
<input type = "text" name="valuToSearch"><input type = "submit" name="search" value="Search: " id="search"">



<table>

		<tr>
		<th>SL</th>
		<th> Name </th>
		<th>Office_id </th>
		<th>Point Name</th>
		<th>Phone </th>
		<th>Day-1</th>
		<th>Day-2</th>
		<th>Day-3</th>
		<th>Day-4</th>
		<th>Day-5</th>
		<th>Day-6</th>
		<th>Day-7</th>
		<th>Day-8</th>
		<th>Day-9</th>
		<th>Day-10</th>
		<th>Day-11</th>
		<th>Day-12</th>
		<th>Day-13</th>
		<th>Day-14</th>
		<th>Day-15</th>
		<th>Day-16</th>
		<th>Day-17</th>
		<th>Day-18</th>
		<th>Day-19</th>
		<th>Day-20</th>
		<th>Day-21</th>
		<th>Day-22</th>
		<th>Day-23</th>
		<th>Day-24</th>
		<th>Day-25</th>
		<th>Day-26</th>
		<th>Day-27</th>
		<th>Day-28</th>
		<th>Day-29</th>
		<th>Day-30</th>
		<th>Day-31</th>
		<th>Total</th>
		
		
		
		
		</tr>
		<?php 
		
		

		$g = 1;

		
		while($row=mysqli_fetch_array($run1)):
		
		$office_id[]=$row['office_id'];
		
		?>
		
		<tr>
		<td><input name="sl[]" type="button" value="<?php echo $g++;?>"></input></td>
		<td><input name="name[]" type="button" value="<?php echo $row['name'];?>"></input></td>
		<td><input name="office_id[]" type="button" value="<?php echo $row['office_id'];?>"></input></td>
		<td><input name="pointname[]" type="button" value="<?php echo $row['pointname'];?>"></input></td>
		<td><input name="phone[]" type="button" value= "<?php echo $row['phone'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day1'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day2'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day3'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day4'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day5'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day6'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day7'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day8'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day9'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day10'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day11'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day12'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day13'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day14'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day15'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day16'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day17'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day18'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day19'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day20'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day21'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day22'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day23'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day24'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day25'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day26'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day27'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day28'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day29'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day30'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day31'];?>"></input></td>
		<td><input type="button" value="<?php echo $row['day1']+$row['day2']+$row['day3']+$row['day4']+$row['day5']+$row['day6']+$row['day7']+$row['day8']+$row['day9']+$row['day10']+$row['day11']+$row['day12']+$row['day13']+$row['day14']+$row['day15']+$row['day16']+$row['day17']+$row['day18']+$row['day19']+$row['day20']+$row['day21']+$row['day22']+$row['day23']+$row['day24']+$row['day25']+$row['day26']+$row['day27']+$row['day28']+$row['day29']+$row['day30']+$row['day31'];?>"></input></td>
		
		</tr>

		<?php endwhile;?>
		
</table></center>
<center>
<a href="home.php"><input name="home" id="button" value="Home">
</input>
</center>
</form>


<?php

$count=mysqli_num_rows($run1);
	
if(isset($_POST['sub'])){
	
	for($i=0; $i<$count; $i++){
	
	
	$day=$_POST['day'];
	$workdone[]=$_POST['workdone'];
	


$sql="UPDATE  name SET $day='$workdone[$i]' WHERE office_id ='$office_id[$i]' ";



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