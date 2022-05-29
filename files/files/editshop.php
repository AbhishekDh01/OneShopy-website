<?php
	require_once 'connect.php';
	session_start();
	$shopid = $_SESSION['NavShopId'];
	$stmt0 = $conn->query("SELECT shopName,shopCategory,shopInfo,shopAddress,shopContact,shopEmail FROM oneshopy_project.shop where shopId = $shopid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Shop</title>
	
	
  <link rel="stylesheet" href="../CSS/homestyle.css">
	<link rel="stylesheet" href="../CSS/myform.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
</head>

	<style>
		
		.nonClick{
			pointer-events: none;
		}
		.reset {
				all:revert;
		}
		input[type=submit] {
  font-family: 'Roboto', sans-serif;
  font-size: 1em;
  line-height: 1.4;
  height: 100%;
  margin: 0;
  padding: 0;
}
		
	</style>

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
			 style='text-align: right; all:revert'>
			
				<input type='hidden' name='shopid' value="<?php echo $shopid; ?>" >
				<input class="simpleButton" type='submit' name='ShopDashSubmit' value="<?php echo $row0['shopName']; ?>" />
			<input class="simpleButton" type='submit' name='Psubmit' value='Add Product' />
			<!-- <input class="simpleButton" type='submit' name='Ssubmit' value='Services Tab' /> -->		
			<input class="simpleButton" type='submit' name='Esubmit' value='Edit Shop' />
			<input class="simpleButton" type='submit' name='Dsubmit' value='Go to Dashboard' />
		
	</form>
        </div>

      </nav>
      
    </header>
    <div class="site-content">
    	<div class="container">
    		<div class="main">

		
		<form action="editShopBack.php" method="post" style="text-align: center;">
			<h1 style="text-align: center; margin-top: 7px;">Enter Details</h1>
				<h3 style="margin-top: -20px; margin-bottom: 8px;"><?php echo $row0['shopEmail']; ?></h3>
			<div class="row Signup">
				<input type="text" name="shopName" value="<?php echo $row0['shopName'] ?>" >
			</div>
			<div class="row Signup">
				<input type="text" name="shopCate" value="<?php echo $row0['shopCategory'] ?>" >
			</div>
			<div class="row Signup">
				<input type="text" name="shopInfo" value="<?php echo $row0['shopInfo'] ?>" >
			</div>
			<div class="row Signup">
				<input type="text" name="shopAdd" value="<?php echo $row0['shopAddress'] ?>" >
			</div>
			<div class="row Signup">
				<input type="number" name="shopContact" value="<?php echo $row0['shopContact'] ?>" minlength="10" maxlength="10" title="Contact number is not right">
			</div>
	<br>
	
	<input type="submit" name="submit" value ="Done" class="button"style=" padding: 6px; width: 47%;
  font-size: 125%;
  margin-bottom: 18px;">
  <input type="submit" name="editImg" value ="Edit Image" class="button"style=" padding: 6px; width: 47%;
  font-size: 125%;
  margin-bottom: 18px;"><br>
	</form>
</div>
	</div> <!-- END container -->
    </div> <!-- END site-content -->
    <div class="site-cache" id="site-cache"></div>
  </div> <!-- END site-pusher -->
</div> 


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>

	