
<?php
	require_once 'connect.php';
	session_start();
	$cid = $_SESSION['NavCid'];
	$stmt0 = $conn->query("SELECT pid FROM oneshopy_project.cart where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $conn->query("SELECT name FROM oneshopy_project.customer where cid = $cid;");
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Cart</title>
	<link rel="stylesheet" href="../CSS/homestyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="../CSS/simpleProd.css">
	
	<style>
		.mybutton {
  width: 120px;
  
  font-size: 100%;
  background: #55D3AC;
  
  color: #fff;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  font-family: 'Open Sans', sans-serif;
  margin-top: 15px;
  transition: background 0.2s ease-out;
}

.mybutton:hover {
  background: #15C39A;
  font-weight: bold;
}
	</style>
</head>
<body>

	<div class="site-container">
  <div class="site-pusher">
    
    <header class="header">
      
      <a href="#" class="header__icon" id="header__icon"></a>
      
      
      <a href="#" class="header__logo__Pc nonClick"> <?php echo $row1['name'];  ?></a>
      <a href="#" class="header__logo__Mob nonClick "> <?php echo $row1['name'];  ?></a>

      <nav class="menu">
        <!-- <a href="">rifht</a> -->
		
        <div class="formNav">
        	<form action='customerDashnavi.php' method='POST'
			 style='text-align: right;'>

			<input type='hidden' name='cid' value="<?php echo $cid; ?>" >
			<!-- <span style="margin-right: 500px;"><input type="text" name="proSearch"><input style="margin-left: 10px;" type="submit" name="proSearchSubmit"></span> -->

			
			

			<input class="simpleButton" type='submit' name='Psubmit' value='Products' />
			<!-- <input class="simpleButton" type='submit' name='Ssubmit' value='Services' /> -->
			<input class="simpleButton" type='submit' name='Shopsubmit' value='Shops' />
			<input class="simpleButton" type='submit' name='Esubmit' value='Edit Profile' />
			<input class="simpleButton" type='submit' name='Tsubmit' value='Orders' />

			<input class="simpleButton" type='submit' name='Csubmit' value='Cart' />
			<input class="simpleButton" type='submit' name='Lsubmit' value='Log Out' />

	
	</form>
        </div>

      </nav>
      
    </header>
    <div class="site-content">
	<br>
	
	<?php 
		$stmtit = $conn->query("SELECT count(*) as totalItems FROM oneshopy_project.cart where cid = $cid;");
		$stmtprice = $conn->query("SELECT sum(price) as Total FROM oneshopy_project.product P, oneshopy_project.cart A WHERE P.pid = A.pid AND A.cid= $cid;");
		$rowit = $stmtit->fetch(PDO::FETCH_ASSOC);
		$rowprice = $stmtprice->fetch(PDO::FETCH_ASSOC);

		if($rowit['totalItems']!=0){
			echo "<form action='customerDashnavi.php' method='POST'
			>
			<p><input  type='hidden' name='cid' value="; echo $cid; 
			echo" >
			<span ><input type='submit' value='Check Out' name='CheckOut' class='mybutton' style='height: 35px;'></span>
			
		</p>
	</form>";
		}

	 ?>
	
	<!-- <h1 style="margin-left: 100px;">
	  All Products </h1> -->

<h3 style="margin-left: 5%;">
	  Total Items : <?php echo $rowit['totalItems'];  ?> </h3>

<h3 style="margin-left: 5%">
	  Total Price : <?php echo $rowprice['Total'];  ?> </h3>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT pid FROM oneshopy_project.cart where cid = $cid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$pid = $row['pid'];
		$stmt1 = $conn->query("SELECT productName,pid,img1,img2,img3,price FROM oneshopy_project.product where pid = $pid;");
		$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
		
		$image = $dir.'/'.$row1['img1'];
		// $stmt2 = $conn->query("SELECT img1 FROM oneshopy_project.shopimage where shopId = $shopid;");
		// $Imgrow=$stmt2->fetch(PDO::FETCH_ASSOC);
		// 	$image= $dir.'/'.$Imgrow['img1'];
?>
	<div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;"  class="product myDiv">
		<!-- <h3 style="padding-bottom: 10%; background-color: rgba(0,0,0,.7); text-align: center;">
		<?php 
		 // echo $row['productName']; 
		  ?> -->
		</h3>
		<br>
		<form action='productOperCustomer.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='pid' value="<?php echo $pid; ?>" >
				<input type='hidden' name='img1' value="<?php echo $row1['img1']; ?>" >
				<input type='hidden' name='img2' value="<?php echo $row1['img2'];?>" >
				<input type='hidden' name='cid' value="<?php echo $cid;?>" >
			
			<input class="addstyle nonClick" style="margin-top: 236px;" type='submit' name='' value="Rs : <?php echo $row1['price']; ?>" />
			<input  type='submit' class="addstyle" name='proD' value='Details' />
			<!-- <input  type='submit' class="addstyle" name='addC' value='Add to Cart' /> -->
			<input  type='submit' class="addstyle" name='rem' value='Remove' />
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

