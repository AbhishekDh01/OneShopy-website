<!DOCTYPE html>
<html>
<head>
	<title>Shop adding</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
</head>
<body>
<?php
	session_start();
	// $ownerSid = $_SESSION['NavSelSid'];
	// echo $ownerSid;
?>	

<h1 style="text-align: center;">Enter Shop Details</h1>
		<br>
		<form action="shopAdding.php" method="post" style="text-align: center;">
	<input type="text" name="shopName" placeholder="Shop Name.." required="required"><br>
	<input type="text" name="shopCate" placeholder="Shop Category (electrical,clothes etc..)" required="required"><br>
	<input type="text" name="shopInfo" placeholder="Enter about your Shop" required="required"><br>
	<input type="text" name="shopAdd" placeholder="Address of Shop" required="required"><br>
	<input type="email" name="shopEmail" placeholder="Shop Email Address or yours" required="required"><br>
	<input type="number" name="shopContact" placeholder="Contact No." required="required"><br>
	<br>
	<br>
	<input type="submit" name="submit" value ="Add" style="background-color: #008CBA; " class="submit"><br>

	</form>
</body>
</html>
	