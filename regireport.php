
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
<form action ="regireport.php" method ="POST">


<input type = "submit" name="search" value="Search: " id="search""><input type = "text" name="valuToSearch"><br><br>

<table>
		<tr>
		<th>SL</th>
		<th> Name </th>
		<th>Office_id </th>
		<th>Point Name</th>
		<th>Phone </th>
		<th>Section</th>
		<th>Role</th>
		
		
		</tr>
		<?php 
		
		

		$i = 1;

		
		while($row=mysqli_fetch_array($run1)):
		
		
		?>
		
		<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['office_id'];?></td>
		<td><?php echo $row['pointname'];?></td>
		<td><?php echo $row['phone'];?></td>
		<td><?php echo $row['section'];?></td>
		<td><?php echo $row['role'];?></td>
		
		</tr>
		<?php endwhile;?>
		
</table></center>
</form>

<center><a href="home.php"><input type ="submit" name="back" value="Back" id="button"></center>
</body>
</html>

