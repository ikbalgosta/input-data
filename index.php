<?php
session_start();
    include 'config.php';
?>

<!tutorial>
<html lang="en">
  <head>
  <link rel="stylesheet" href ="style.css"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  <style> #input{ width: 100%;  padding: 12px 20px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}

</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	


    <title>login</title>
  </head>
  <body id="body" >
  <header>
	<center><img src="logo.png" class="img" id="logo"></img>
	</center>
  </header>
  
<center><form action="" method="POST">
<center><div id="div1" align="center"><level class="login"><h3><b>Login</b></h3></level><hr class="style-seven" />
	
	<div>
	
	<table id="table">
	<tr> <td><br></td><td><br></td><td><br></td></tr>
<tr> <td><font color = "blue">Office ID</font></td><td>:</td><td> <i class="fa fa-user icon"></i><input type="user" name="office_id" placeholder="Office ID"></input></td></tr></input>
<tr> <td><br></td><td><br></td><td><br></td></tr>
	<tr> <td><font color= "blue">Password</font></td><td>:</td><td><i class="fa fa-key icon"></i><input type="password" name="password" placeholder="Password"></input></td></tr>


	
	</table>
	<br><br><input name="login" type="submit" value="LOGIN" id ="button"></input>
	</div>
	</div>
	
	
	</center>
	
	
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php

    if(isset($_POST['login'])){
		
		$sqlselect = "select*from name where office_id='$_POST[office_id]' AND password ='$_POST[password]'";
		$record=mysqli_query($con,$sqlselect);
		
		$count = mysqli_num_rows($record);
		
		
		if($count==1){
			
				$field = mysqli_fetch_array($record);
				
				$_SESSION['office_id']=$field['office_id'];
				$_SESSION['name']= $field['name'];
				$_SESSION['pointname']= $field['pointname'];
				$_SESSION['section']= $field['section'];
				$_SESSION['role']= $field['role'];
				$_SESSION['cata']= $field['point_catagory'];
				$phone = $_POST['phone'];
				$pass = $_POST['pass'];
				$cpass = $_POST['cpass'];
					
				echo"
				<script>
				window.location.href='home.php';			
				</script>
				";
				
				
			}else{
				
				echo"
				<script>
				alert('Password or Office_ID not Found ');
				window.location.href('register.php');
				</script>
				";
			}
			
			
		
		}
		
?>













