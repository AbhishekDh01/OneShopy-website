<?php
	require_once 'connect.php';
	session_start();
	$shopid = $_SESSION['NavShopId'];
	$stmt0 = $conn->query("SELECT shopCategory FROM project.shop where shopId = $shopid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product adding</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	

<h1 style="text-align: center;">Enter Product Details</h1>
		<form action="product_upload.php" method="post" enctype="multipart/form-data" style="text-align: center;">
			<input type="hidden" name="shopId" value="<?php echo $shopid; ?>"  required="required"><br>
	<input type="hidden" name="productCate" value="<?php echo $row0['shopCategory']; ?>" required="required"><br>
	
	<input type="text" name="productName" placeholder="Product Name.." required="required"><br>
	<input type="text" name="info" placeholder="Some Info" ><br>

	<input type="number" name="price" placeholder="Price.." required="required"><br>
	<p>Add Images of Product (Max 3) : <input type="file" name="files[]" multiple><p>
			
			<input type="submit" name="submit" value="Add Product" style="background-color: #008CBA; " class="submit"/>

	</form>
</body>
</html>
	