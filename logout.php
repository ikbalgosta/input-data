<?php  

		session_unset(); 
		session_destroy();
	  echo header("Location:index.php");
	  
?>