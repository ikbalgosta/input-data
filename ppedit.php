<?php
session_start();
 include 'config.php';
 $editid=$_GET['editid'];
 
 	$sqledit = "SELECT * FROM parts_pending where id='$editid'";
	
	$cheekedit = mysqli_query($con,$sqledit);
	
	while($row=mysqli_fetch_array($cheekedit)):
 
?>
 <?php
 
 
 $point=$_SESSION['pointname'];
 $role=$_SESSION['role'];
 $sec=$_SESSION['section'];
 
 
 $role1="Admin";
 $role2="Branch Manager";
 $role3="Store Officer";
 $role4="Section Manager";
 $role5="Planning";
 
 if (isset($_POST['search']))
 {
	$valuToSearch = $_POST['valuToSearch'];
	$query = "SELECT * FROM `parts_pending` WHERE CONCAT(`sr`, `model`, `parts`, `code`, `requisition`, `remarks`,pointname,section,office_id)LIKE'%$valuToSearch%'";
	$run1 = mysqli_query($con,$query);}
 
 
 else{
	 $query1="SELECT * FROM parts_pending";
	 $query2="SELECT * FROM parts_pending WHERE pointname='$point'";
	 $query3="SELECT * FROM parts_pending WHERE pointname='$point'";
	 $query4="SELECT * FROM parts_pending WHERE pointname='$point' AND section='$sec' ";
	 $query5="SELECT * FROM parts_pending WHERE section='$sec' ";
 
 
 
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
 }
 */
 ?>



<html>

<head>
<link rel="stylesheet" href="style.css"></link>
<title> </title>
<style>
table,tr,th,td {border:1px solid blue;}
</style>
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
<form action ="" method ="POST">


<input type = "submit" name="search" value="Search" id="search"><input type = "text" name="valuToSearch"><br><br>

<table>
		<tr>
		<th>Service Point </th>
		<th>Section</th>
		<th>SR Number</th>
		<th>Model</th>
		<th>Parts Name</th>
		<th>Parts Code</th>
		<th>Requisition</th>
		<th>Remarks</th>
		<th>User ID</th>
		<th>Planning Comments</th>
		<th>Action</th>
		
		
		</tr>
		<?php 
		$editid=$_GET['editid'];
 
 	$sqledit = "SELECT * FROM parts_pending where id='$editid'";
	
	$cheekedit = mysqli_query($con,$sqledit);
	
	while($row=mysqli_fetch_array($cheekedit)){
		
		?>
		
		<tr>
		<td><?php echo $row['pointname'];?></td>
		<td><?php echo $row['section'];?></td>
		<td><?php echo $row['sr'];?></td>
		<td><?php echo $row['model'];?></td>
		<td><?php echo $row['parts'];?></td>
		<td><?php echo $row['code'];?></td>
		<td><?php echo $row['requisition'];?></td>
		<td><?php echo $row['remarks'];?></td>
		<td><?php echo $row['office_id'];?></td>
		<th><input type="text" name="comments"></input></th>
		<td><input type="submit" name="sub" value="Save" ></input></td>
		
	<?php } ?>
		</tr>
		<?php endwhile;?>
		
</table></center>

</form>

<center><a href="home.php"><input type ="submit" name="back" value="Back" id="button"> <a href = "logout.php"><input name="logout" type="submit" id="button" value="LOG-OUT"></center>

<?php
if(isset($_POST['sub'])){
	
	
	
	$comments=$_POST['comments'];
	
	$sql="UPDATE parts_pending SET planning='".$comments."' WHERE id='$editid'";
	
	$runsql=mysqli_query($con,$sql);
	
	if($runsql){
		
		echo header("Location:ppendingreport.php");
	}else{
		
		echo 'Not Done';
	}
	
	
	
}


?>

</body>
</html>