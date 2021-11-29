<?php
	session_start();
	If(isset($_POST['Psubmit'])){
		header("refresh:1; url= addProduct.php");
		exit();
	}
	If(isset($_POST['Ssubmit'])){
		header("refresh:1; url= sellerServicetab.php");
		exit();
	}
	If(isset($_POST['Esubmit'])){
		header("refresh:1; url= shopDash.php");
		exit();
	}
	If(isset($_POST['Dsubmit'])){
		header("refresh:1; url= sellerDash.php");
		exit();
	}
?>	