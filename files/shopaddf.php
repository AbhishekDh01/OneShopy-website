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
	<title>Add Shop</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" href="../CSS/homestyle.css">
	<link rel="stylesheet" href="../CSS/myform.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
  <link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
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
      
      
      <a href="#" class="header__logo__Pc nonClick">Oneshopy</a>
      <a href="#" class="header__logo__Mob nonClick ">Oneshopy</a>

      <nav class="menu">
        <!-- <a href="">rifht</a> -->
		
        <div class="formNav">
        	<form action='sellerDashnavi.php' method='POST'
			 style='text-align: right;' class="reset">
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
    	<div class="container">
    		<div class="main">

		
		<form action="shopAdding.php" method="post" style="text-align: center;">
			<h1 style="text-align: center; margin-top: 8px;">Enter Details</h1>
			<div class="row Signup">
				<input type="text" name="shopName" placeholder="Shop Name.." required="required">
			</div>
			<div class="row Signup">
				<input type="text" name="shopCate" placeholder="Shop Category (electrical,clothes etc..)" required="required">
			</div>
			<div class="row Signup">
				<input type="text" name="shopInfo" placeholder="Enter some lines about your Shop" required="required">
			</div>
			<div class="row Signup">
				<input type="text" name="shopAdd" placeholder="Address of Shop" required="required">
			</div>
			<div class="row Signup">
				<input type="email" name="shopEmail" placeholder="Shop Email Address or yours" required="required">
			</div>
			<div class="row Signup">
				<input type="number" name="shopContact" placeholder="Contact No." required="required" minlength="10" maxlength="10" title="Contact number is not right">
			</div>
	<br>
	
	<input type="submit" name="submit" value ="Add" class="button"style=" padding: 8px; width: 90%;
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

	