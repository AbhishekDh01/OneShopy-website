<?php
	require_once 'connect.php';
	session_start();
	$shopid = $_SESSION['NavShopId'];
	$stmt0 = $conn->query("SELECT shopCategory FROM oneshopy_project.shop where shopId = $shopid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product adding</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
	

<h1 style="text-align: center;">Enter Services Details</h1>
		<form action="service_upload.php" method="post" enctype="multipart/form-data" style="text-align: center;">
			<input type="hidden" name="shopId" value="<?php echo $shopid; ?>"  required="required"><br>
	<input type="hidden" name="serCate" value="<?php echo $row0['shopCategory']; ?>" required="required"><br>
	
	<input type="text" name="serName" placeholder="Service Name.." required="required"><br>
	<input type="text" name="info" placeholder="Some Info" ><br>

	<input type="number" name="price" placeholder="Base Charge.." required="required"><br>
	<p>Add Images of Service (Max 2) : <input type="file" name="files[]" multiple><p>
			
			<input type="submit" name="submit" value="Add Serive" style="background-color: #008CBA; " class="submit"/>

	</form>
</body>
</html>
	