<?php
	If(isset($_POST['Psubmit'])){
		header("location: sellerDash.php");
		exit();
	}
	If(isset($_POST['Hsubmit'])){
		header("location: transSeller.php");
		exit();
	}
	If(isset($_POST['Asubmit'])){
		header("location: shopaddf.php");
		exit();
	}
	If(isset($_POST['Lsubmit'])){
		header("location: ../index.html");
		exit();
	}
	If(isset($_POST['sellerDash'])){
		header("location: sellerDash.php");
		exit();
	}
?>	