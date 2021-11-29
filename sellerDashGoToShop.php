<?php
	
	If(isset($_POST['ShopSubmit'])){
		session_start();
	$_SESSION['NavShopId'] = $_POST['shopid'];
		header("refresh:1; url= shopDash.php");
		exit();
	}

?>