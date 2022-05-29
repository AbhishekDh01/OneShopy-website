
<?php
	require_once 'connect.php';
	session_start();
	$cid = $_SESSION['NavCid'];
	$stmt0 = $conn->query("SELECT name FROM oneshopy_project.customer where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
	<link rel="stylesheet" href="../CSS/homestyle.css">
	<link rel="stylesheet" href="../CSS/simpleProd.css">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	
</head>
<body>

	<div class="site-container">
  <div class="site-pusher">
    
    <header class="header">
      
      <a href="#" class="header__icon" id="header__icon"></a>
      
      
      <a href="#" class="header__logo__Pc nonClick"> <?php echo $row0['name'];  ?></a>
      <a href="#" class="header__logo__Mob nonClick "> <?php echo $row0['name'];  ?></a>

      <nav class="menu">
        <!-- <a href="">rifht</a> -->
		
        <div class="formNav">
        	<form action='customerDashnavi.php' method='POST'
			 style='text-align: right;'>

			<input type='hidden' name='cid' value="<?php echo $cid; ?>" >
			<!-- <span style="margin-right: 500px;"><input type="text" name="proSearch"><input style="margin-left: 10px;" type="submit" name="proSearchSubmit"></span> -->

			
			

			<input class="simpleButton" type='submit' name='Psubmit' value='Products' />
			<input class="simpleButton" type='submit' name='Ssubmit' value='Services' />
			<input class="simpleButton" type='submit' name='Shopsubmit' value='Shops' />
			<input class="simpleButton" type='submit' name='Esubmit' value='Edit Profile' />
			<input class="simpleButton" type='submit' name='Tsubmit' value='Transactions' />

			<input class="simpleButton" type='submit' name='Csubmit' value='Cart' />
			<input class="simpleButton" type='submit' name='Lsubmit' value='Log Out' />

	
	</form>
        </div>

      </nav>
      
    </header>
    <div class="site-content">


	
	<h1 >
	  All Services  </h1>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT serName,serId,img1,img2,baseCharge FROM oneshopy_project.service;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$productId= $row['serId'];
		$image = $dir.'/'.$row['img1'];
		// $stmt2 = $conn->query("SELECT img1 FROM project.shopimage where shopId = $shopid;");
		// $Imgrow=$stmt2->fetch(PDO::FETCH_ASSOC);
		// 	$image= $dir.'/'.$Imgrow['img1'];
?>
	<div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;"  class="product">
		<!-- <h3 style="padding-bottom: 10%; background-color: rgba(0,0,0,.7); text-align: center;">
		<?php 
		 // echo $row['productName']; 
		  ?> -->
		</h3>
		<br>
		<form action='customerSeriveNavi.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='serId' value="<?php echo $row['serId']; ?>" >
				<input type='hidden' name='img1' value="<?php echo $row['img1']; ?>" >
				<input type='hidden' name='img2' value="<?php echo $row['img2'];?>" >

			
			<input class="addstyle nonClick" style="margin-top: 216px;" type='submit' name='' value="<?php echo $row['serName']; ?>" />
			<input  type='submit' class="addstyle" name='serD' value='Details' />
			
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



<!-- <div style=" background-image: url('<?php  $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  ">
	<?php 
	 // echo $row['shopName'];
	   ?>
		
	</div> -->

