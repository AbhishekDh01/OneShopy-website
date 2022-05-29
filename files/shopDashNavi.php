<?php
	session_start();
	
	If(isset($_POST['ShopDashSubmit'])){
		header("location: shopDash.php");
		exit();
	}
	If(isset($_POST['Psubmit'])){
		header("location: addProduct.php");
		exit();
	}
	If(isset($_POST['Ssubmit'])){
		header("location: sellerServicetab.php");
		exit();
	}
	If(isset($_POST['Esubmit'])){
		header("location: editShop.php");
		exit();
	}
	If(isset($_POST['Dsubmit'])){
		header("location: sellerDash.php");
		exit();
	}
?>	