<?php
	If(isset($_POST['Psubmit'])){
		header("refresh:1; url= sellerDash.php");
		exit();
	}
	If(isset($_POST['Hsubmit'])){
		header("refresh:1; url= transSeller.php");
		exit();
	}
	If(isset($_POST['Asubmit'])){
		header("refresh:1; url= shopaddf.php");
		exit();
	}
	If(isset($_POST['Lsubmit'])){
		header("refresh:1; url= index.html");
		exit();
	}
?>	