<?php
	If(isset($_POST['serD'])){
		session_start();
		$_SESSION['SerId'] = $_POST['serId'];
		header("refresh:1; url= serviceDetailsCustomer.php");
		exit();
	}
?>	