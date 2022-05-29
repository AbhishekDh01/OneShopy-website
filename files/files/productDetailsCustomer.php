
<?php
	require_once 'connect.php';
	session_start();
	$pid = $_SESSION['NavPid'];
	$stmt0 = $conn->query("SELECT productName,productCategory,price,img1,img2,img3,info FROM oneshopy_project.product where pid = $pid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$dir ='uploads';
	if (isset($_SESSION['shopId'])) {
		$shopId = $_SESSION['shopId'];
	}
	$_SESSION['shopId'] = $shopId;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
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
	</style>
</head>
<body>

	<form action="shopDetailsCustomer.php" method="POST"  style=' all:revert;  text-align: right;'>
			<input type="hidden" name="shopId" value="<?php echo $shopId; ?>">
			<input type="submit"  class="button"  value="Back"  style="width: 80px; height: 32px; padding: 0; text-align: center; margin:1px; font-size: 100%;">

		
	</form>
	<div>
	<h3 >Name :
	  <?php echo $row0['productName'];  ?></h3><h3 >Category :
	  <?php echo $row0['productCategory'];  ?><br>Price :
	  <?php echo $row0['price'];  ?> rs</h3>
	<h3><?php echo $row0['info'];  ?></h3>  
	</div>
	<div style=" background-image: url('<?php echo $dir.'/'.$row0['img1']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;"  class="product"></div>
	<?php if($row0['img2']){ ?>
	<div style=" background-image: url('<?php echo $dir.'/'.$row0['img2']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;"  class="product"></div>
   <?php }  ?>
   <?php if($row0['img3']){ ?>
	<div style=" background-image: url('<?php echo $dir.'/'.$row0['img3'];; ?>'); background-size: 100% 100%; background-repeat: no-repeat;
	"  class="product"></div>
	<?php }  ?>

</body>
</html>

<?php 
	If(isset($_POST['back'])){
		header("Location: customerDash.php");
		exit();
	}
 ?>



