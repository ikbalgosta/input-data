<?php
	session_start();
  include 'config.php';
  
?>

<html>
<head>
<link rel="stylesheet" href="style.css"></link>
<title>WEB</title>
<style>

</style>
</head>
<body id="b">
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
<center>

<div id="di">
<br/>
<center><form action="register.php" method="POST">
<BR/>
<BR/>
<table>
<tr>
<td><b><label>Name</label></td>
<td>:</td>
<td><input name="name" type="text" id="form" placeholder="Enter your name" required>
</input></td>
</tr>
<tr><td><br/></td><td><td></td></td><td><td></td></td></tr>
<tr>
<td><b><label>Office_ID</label></td>
<td>:</td>
<td><input name="office_id" type="office_id" id="form" placeholder="Enter your Office ID" required>
</input></td>
</tr>
<tr><td><br/></td><td><td></td></td><td><td></td></td></tr>
<td><b><label>Service Point Name</label></td>
<td>:</td>
<td>
<select name="pointname" required>
<option selected hidden value="">Select Service Point</option>
<option value="WSMS FENI">WSMS FENI</option>
<option value="WSMS COMILLA">WSMS COMILLA</option>
<option value="WSMS CHOWMOHONI">WSMS CHOWMOHONI</option>
<option value="WSMS LAXMIPUR">WSMS LAXMIPUR</option>
<option value="WSMS CHANDPUR">WSMS CHANDPUR</option>
<option value="WSMS AGRABAD">WSMS AGRABAD</option>
<option value="WSMS COMILLA CP">WSMS COMILLA CP</option>
<option value="ALL">ALL</option>
</select>
</td>
</tr>
<tr><td><br/></td><td><td></td></td><td><td></td></td></tr>

<td><b><label>Phone Number</label></td>
<td>:</td>
<td><input name="phone" type="phone" id="form" placeholder="Phone Number" required>
</input></td>
</tr>
<tr><td><br/></td><td><td></td></td><td><td></td></td></tr>
<tr>
<td><b><label>Section Name</label></td>
<td>:</td>
<td>
<select name="section" required>
<option selected hidden value="">Select Section</option>
<option value="Television">Television</option>
<option value="Fridge">Fridge</option>
<option value="Cellphone">Cellphone</option>
<option value="EMH">EMH</option>
<option value="AC">AC</option>
<option value="Laptop">Laptop</option>
<option value="ALL">All</option>
</select>
</tr>
<tr><td><br/></td><td><td></td></td><td><td></td></td></tr>
<tr>
<td><b><label>Point Catagory</label></td>
<td>:</td>
<td>
<select name="cata" required>
<option selected hidden value="">Select Section</option>
<option value="FTEMLA">FTEMLA</option>
<option value="FTEML">FTEML</option>
<option value="FTEA">FTEA</option>
<option value="ML">ML</option>

</select>

</td>
</tr>
<tr><td><br/></td><td><td></td></td><td><td></td></td></tr>
<tr>
<td><b><label>Role</label></td>
<td>:</td>
<td>
<select name="role" required>
<option selected hidden value="">Select role</option>
<option value="Service Expert">Service Expert</option>
<option value="Section Manager">Section Manager</option>
<option value="Store Officer">Store Offcier</option>
<option value="Branch Manager">Branch Manager</option>
<option value="Planning">Planning</option>
<option value="Admin">Admin</option>
</select>
</td>
</tr>
<tr><td><br/></td><td><td></td></td><td><td></td></td></tr>
<tr>
<td><b><label>Password</label></td>
<td>:</td>
<td><input name="pass" type="password" id="form" placeholder="Enter your Password" required>
</input></td>
</tr>
<tr>
<td><b><label>Confirm Password</label></td>
<td>:</td>
<td><input name="cpass" type="password" id="form" placeholder="Confirm Password" required>
</input></td>
</tr>
</table>

<br/><br/><input name="signup" type="submit" id="button" value="SIGN-UP">
</input>
<a href="index.php"><input name="back" id="button" value="SIGN-IN">
</input>
<a href="home.php"><input name="home" id="button" value="Home">
</input>


</form></center>

</center>

<?php
$user=$_SESSION['office_id'];

$query = mysqli_query($con,"SELECT * FROM name WHERE office_id='$user'");

	

$row = mysqli_fetch_array($query);
$id = $row["office_id"];

//coding 

if(isset($_POST['signup'])){
	
	$name = $_POST['name'];
	$office_id = $_POST['office_id'];
	$pointname = $_POST['pointname'];
	$phone = $_POST['phone'];
	$section = $_POST['section'];
	$cata = $_POST['cata'];
	$role=$_POST['role'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	
	
	
	if($pass==$cpass){
		
		$query= "select name, office_id, pointname, phone, section, role, password from name where office_id='$office_id' AND password='$pass'"; 
		$query_run= mysqli_query($con,$query);
		
		
		if($query_run){
			
			if(mysqli_num_rows($query_run) >0){
				
				echo "
		<script>
		alert('User ALready Registered ');
		window.location.href='login.php';
		</script>
		";
				
				
			}else{
				
				
	$insertion= "INSERT INTO `name`(name, office_id, pointname, phone, section, role, password,point_catagory,user_add_by) VALUES('$name','$office_id','$pointname','$phone','$section','$role','$pass','$cata','$id')";
	
	           
				$insertion_run = mysqli_query($con,$insertion);
				
				
				
				if($insertion_run ){
					
					echo "
		<script>
		alert('Registration Successful ');
		</script>
		";
					
				}else{
					
						echo "
		<script>
		alert('Registration Failed  ');
		window.location.href='register.php';
		</script>
		";
				}
				
				
			}
			
			
			
		}else{
			echo "
		<script>
		alert('Database Problem');
		window.location.href='register.php';
		</script>
		";
			
		}
		
		
	}
	else{
		echo "
		<script>
		alert('Password & Confirm Password not match');
		window.location.href='register.php';
		</script>
		";
	}
	
	
}
else{
	
	
}






?>














</div>
</body>

</html>
