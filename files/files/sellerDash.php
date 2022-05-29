
<?php
	require_once 'connect.php';
	session_start();
	$ownerSid = $_SESSION['NavSelSid'];
	$stmt0 = $conn->query("SELECT balance,name FROM oneshopy_project.seller where sid = $ownerSid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$bal = $row0['balance'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Seller Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	

<link rel="stylesheet" href="../CSS/homestyle.css">
	<link rel="stylesheet" href="../CSS/simpleProd.css">
	<link rel="stylesheet" type="text/css" href="../CSS/shop.css">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<style>
		
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
        <!-- <a href="">rifht</a> -->
		
        <div class="formNav">
        	<form action='sellerDashnavi.php' method='POST'
			 style='text-align: right;'>
			<input type='hidden' name='ownersid' value="<?php echo $ownerSid; ?>" >
			
			<input class="simpleButton nonClick" type='submit' name='Bsubmit' value= "Balance : <?php echo $bal; ?> Rs" />
			<!-- <input type='submit' name='Psubmit' value='Edit Profile' /> -->
			<input class="simpleButton" type='submit' name='sellerDash' value='Dashboard' />
			<input class="simpleButton" type='submit' name='Hsubmit' value='History' />

			<input class="simpleButton" type='submit' name='Asubmit' value='Add Shop' />
			<input class="simpleButton" type='submit' name='Lsubmit' value='Log Out' />
		
	</form>
        </div>

      </nav>
      
    </header>
    <div class="site-content">


	
	<h1 style="text-align: center;">
	  Welcome <?php echo $row0['name'];  ?></h1>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT shopName,shopId FROM oneshopy_project.shop where ownerSid = $ownerSid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$shopId = $row['shopId'];
		$stmt1 = $conn->query("SELECT img1 FROM oneshopy_project.shopimage where shopId = $shopId;");
		$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		if(!isset($row1['img1'])){
			$row1['img1']='logo.jpeg';
		}
		$image = $dir.'/'.$row1['img1'];
?>
	<div class="product" style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat; padding-bottom: 0; margin-top: 0;  ">
		
	
		<form action='sellerDashGoToShop.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='shopid' value="<?php echo $row['shopId']; ?>" >
				<input type="hidden" name="img1" value="<?php echo $image; ?>">
				<!-- <input style="margin-top: 256px; padding: 7px;" type="submit" class="addstyle nonClick" value="<?php  echo $row['shopName'];  ?>" name="non"> -->
			<input style=" margin-top: 256px; float: right;  padding: 7px; margin-left: 10px; width: 100px; " type='submit' class="addstyle" name='ShopSubmit' value='Go to Shop' />
			<input  type='submit' class="addstyle" name='ShopDel' value='Delete Shop' style=" margin-top: 4px;   float: left;  padding: 7px; background-color: red; width: 105px; " />
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



<!-- <div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  ">
	<?php 
	 // echo $row['shopName'];
	   ?>
		
	</div> -->

