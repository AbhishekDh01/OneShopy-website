
<?php
	require_once 'connect.php';
	session_start();
	$shopid = $_SESSION['NavShopId'];
	$stmt0 = $conn->query("SELECT shopName,shopCategory FROM oneshopy_project.shop where shopId = $shopid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="../CSS/homestyle.css">
	<link rel="stylesheet" href="../CSS/simpleProd.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<style>
		.text{
			font-family: 'Open Sans', sans-serif;
			font-size: 250%;
		}

		.shopi{
			height: 400px;
			width: 65%;
			min-height: 316px;
			margin-left: 18%;
			margin-right: 17.5%;
			display: block;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			border-radius: 25px;
			min-height: 316px;
		}
		@media only screen and (max-width: 1007px) {
			.shopi{
				all:revert;

			}
			.text{
			font-family: 'Roboto', sans-serif;
			font-size: 200%;
			margin-bottom: 0;
		}

		}
	</style>
</head>
<body>
	<div class="site-container">
  <div class="site-pusher">
    
    <header class="header">
      
      <a href="#" class="header__icon" id="header__icon"></a>
      
      
      <a href="#" class="header__logo__Pc nonClick">OneShopy</a>
      <a href="#" class="header__logo__Mob nonClick ">OneShopy</a>

      <nav class="menu">
      	 <div class="formNav">
			<form action='shopDashNavi.php' method='POST'
			 style='text-align: right;'>
			
				<input type='hidden' name='shopid' value="<?php echo $shopid; ?>" >
				<input class="simpleButton" type='submit' name='ShopDashSubmit' value="<?php echo $row0['shopName']; ?>" />
			<input class="simpleButton" type='submit' name='Psubmit' value='Add Product' />
		<!-- 	<input class="simpleButton" type='submit' name='Ssubmit' value='Services Tab' /> -->		
			<input class="simpleButton" type='submit' name='Esubmit' value='Edit Shop' />
			<input class="simpleButton" type='submit' name='Dsubmit' value='Go to Dashboard' />
			
	</form>
</div>
</nav>
</header>
	 <div class="site-content">
	<h1 style="text-align: center;  "><?php 
	  echo $row0['shopName']; 
	   ?> </h1>
	<p>
		<!-- <h1 style="text-align: center; font-size: 250%;">
	  <?php 
	  // echo $row0['shopName']; 
	   ?> Shop</h1> -->
<?php
	$image="";
		$dir = 'uploads'; 
		$stmti = $conn->query("SELECT img1 FROM oneshopy_project.shopimage where shopId = $shopid;");
	while ($rowi=$stmti->fetch(PDO::FETCH_ASSOC)){
			$image= $dir.'/'.$rowi['img1'];
		
		// echo $image;
		?>
			<div class="shopi" style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  padding-bottom: 0; margin-top: 0;"></div>
<?php
			}
?>	
	
	</p>
		<br>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT productName,pid,img1,img2,img3,price FROM oneshopy_project.product where shopId = $shopid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$productId= $row['pid'];
		$image = $dir.'/'.$row['img1'];
		// $stmt2 = $conn->query("SELECT img1 FROM oneshopy_project.shopimage where shopId = $shopid;");
		// $Imgrow=$stmt2->fetch(PDO::FETCH_ASSOC);
		// 	$image= $dir.'/'.$Imgrow['img1'];
?>
	<div   class="product" style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;">
		<!-- <h3 style="padding-bottom: 10%; background-color: rgba(0,0,0,.7); text-align: center;">
		<?php 
		 // echo $row['productName']; 
		  ?> -->
		</h3>
		<br>
		<form action='productOper.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='pid' value="<?php echo $row['pid']; ?>" >
				<input type='hidden' name='img1' value="<?php echo $row['img1']; ?>" >
				<input type='hidden' name='img2' value="<?php echo $row['img2'];?>" >
				<input type='hidden' name='img3' value="<?php echo $row['img3']; ?>" >

			
			<input class="addstyle nonClick" style="margin-top: 196px;" type='submit'  name='' value=" Pid : <?php echo $row['pid']; ?>" />
			<input class="addstyle nonClick" style="margin-top: 196px;" type='submit' name='' value="Rs : <?php echo $row['price']; ?>" />
			<br>
			<input  type='submit' class="addstyle" name='proDelete' value='Delete' />
			<input  type='submit' class="addstyle" name='proDetail' value='Details' />
		</p>
	</form>
			
		</div>
<?php
	}
	?>
</div>
<div class="site-cache" id="site-cache"></div>

</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>

</body>

</html>




