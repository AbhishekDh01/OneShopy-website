
<?php
	require_once 'connect.php';
	header('Cache-Control: no cache');
	session_cache_limiter('private_no_expire');
	session_start();
	$cid = $_SESSION['NavCid'];

	if (!isset($_POST['shopId'])) {
		$_POST['shopId'] = '-9999';
	}


	if($_SESSION['shopId']=='-999' && $_POST['shopId']=='-999'){
		// myAlert('Some Internal Error Occured');
		echo 'working';
		header("Location: customerDash.php");
		exit();
	}
	if ($_SESSION['shopId']!='-999') {
		$shopId = $_SESSION['shopId'];
	} else $shopId = $_POST['shopId'];

	
	
?>
<?php
	$stmt0 = $conn->query("SELECT name FROM oneshopy_project.customer where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$stmtshop = $conn->query("SELECT shopName,shopCategory,shopEmail,shopContact,shopInfo FROM oneshopy_project.shop where shopId = $shopId;");
	$rowshop=$stmtshop->fetch(PDO::FETCH_ASSOC);
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="../CSS/simpleProd.css">
	<link rel="stylesheet" href="../CSS/myform.css">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	<style >
		div{
			float: left;
		}
		.reset{
			all:revert;
		}
		.nonClick{
			pointer-events: none;
}
	</style>
</head>
<body>

	<form action='shopCusback_bad.php' method='POST'
			 style=' all:revert; text-align: right;'>
			
			<input type='submit' class="button" name='back' value='Back' style="width: 80px; height: 32px; padding: 0; text-align: center; margin:1px; font-size: 100%;" onclick="history.back()" />
		</p>
	</form>
	<div style="margin-left: 2%;">
	<span style="font-size: 250%; font-weight: bold"><?php 
	  echo $rowshop['shopName']?? 'Abhi'; 
	   ?> </span>
	   <br>
	   <br>
	   <span style=" font-size: 120%; font-weight: bold">Category :<?php 
	  echo $rowshop['shopCategory']??'Abhi'; 
	   ?></span>
	   <br>
	   <br>
	   <span style=" font-size: 120%; font-weight: bold">Contact : <?php 
	  echo $rowshop['shopEmail']??'Abhi'; 
	   ?></span>
	
	   <span style="margin-left: 1%; font-size: 120%; font-weight: bold">,  <?php 
	  echo $rowshop['shopContact']??'Abhi'; 
	   ?> </span>
	   <br>
	   <span style=" font-size: 120%; font-weight: bold"><?php 
	  echo $rowshop['shopInfo']??'Abhi'; 
	   ?> </span>
	</div>
		<!-- <h1 style="text-align: center; font-size: 250%;">
	  <?php 
	  // echo $row0['shopName']; 
	   ?> Shop</h1> -->
<?php
	$image="";
		$dir = 'uploads'; 
		$stmti = $conn->query("SELECT img1 FROM oneshopy_project.shopimage where shopId = $shopId;");
	while ($rowi=$stmti->fetch(PDO::FETCH_ASSOC)){
			$image= $dir.'/'.$rowi['img1'];
		
		//echo $image;
		?>
			<!-- <div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  "></div> -->
<?php
			}
?>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT productName,pid,img1,img2,img3,price FROM oneshopy_project.product where shopId = $shopId;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$productId= $row['pid'];
		$image = $dir.'/'.$row['img1'];
		// $stmt2 = $conn->query("SELECT img1 FROM oneshopy_project.shopimage where shopId = $shopid;");
		// $Imgrow=$stmt2->fetch(PDO::FETCH_ASSOC);
		// 	$image= $dir.'/'.$Imgrow['img1'];
?>
	<div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%;
	height: 100%; margin-top: 10px; background-repeat: no-repeat;"  class="product">
		<!-- <h3 style="padding-bottom: 10%; background-color: rgba(0,0,0,.7); text-align: center;">
		<?php 
		 // echo $row['productName']; 
		  ?> -->
		</h3>
		<br>
		<form action='productOperCustomer.php' method='POST'
			 style='text-align: right;' class="reset">
			<p><input type='hidden' name='pid' value="<?php echo $row['pid']; ?>" >
				<input type='hidden' name='img1' value="<?php echo $row['img1']; ?>" >
				<input type='hidden' name='img2' value="<?php echo $row['img2'];?>" >
				<input type='hidden' name='cid' value="<?php echo $cid;?>" >
				<input type="hidden" name="shopId" value="<?php echo $shopId ?>">
			<input class="addstyle nonClick" style="margin-top: 236px; width: 90px; height: 32px; padding: 0; text-align: center;  font-size: 100%;" type='submit' name='' value="Rs : <?php echo $row['price']; ?>" />
			<input  type='submit' class="addstyle" style="width: 90px; height: 32px; padding: 0; text-align: center; margin:1px; font-size: 100%;" name='proD' value='Details' />
			<input  type='submit' class="addstyle" style="width: 90px; height: 32px; padding: 0; text-align: center; margin:1px; font-size: 100%;" name='addC' value='Add to Cart' />
		</p>
	</form>
			
		</div>
<?php
	}
	?>
</body>
</html>

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>

<!-- <div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  ">
	<?php 
	 // echo $row['shopName'];
	   ?>
		
	</div> -->

