<?php
	session_start();
	
	If(isset($_POST['Ssubmit'])){
		header("refresh:1; url= addService.php");
		exit();
	}
	If(isset($_POST['Dsubmit'])){
		header("refresh:1; url= shopDash.php");
		exit();
	}
?>	