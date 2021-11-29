
<?php
	require_once 'connect.php';
	session_start();
	$shopid = $_SESSION['NavShopId'];
	$stmt0 = $conn->query("SELECT shopName,shopCategory FROM project.shop where shopId = $shopid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<style>
		.addstyle{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 100px;
			height: 35px;
			box-sizing: border-box;

		}
		div{
			/*height: 500px;
			width:500px;*/
			size: 50%;
			padding-left: 25%;
			padding-top:30%;
			margin-left: 10%;
			margin-right: 10%;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			border-radius: 25px;
		}
		
		.product{
			/*height: 250px;
			width: 180px;*/
			/*size : 25%;*/
			padding-left: 4%;
			padding-top: 0%;
			padding-right: 4%;
			margin-left: 7%;
			margin-right: 2%;
			margin-top: 2%;
			margin-bottom: 4%;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			border-radius: 25px;
			float: left;
			text-align: center;
		}
		.nonClick{
			pointer-events: none;
		}
	</style>
</head>
<body>

	<form action='shopDashNavi.php' method='POST'
			 style='text-align: right;'>
			<p><span>
				<input type='hidden' name='shopid' value="<?php echo $shopid; ?>" >
			<input type='submit' name='Psubmit' value='Add Product' />
			<input type='submit' name='Ssubmit' value='Services Tab' />		
			<!-- <input type='submit' name='Esubmit' value='Edit Shop Details' /> -->
			<input type='submit' name='Dsubmit' value='Go to Dashboard' />
			</span>

		</p>
	</form>
	<h1 style="margin-left: 10%; font-size: 300%;"><?php 
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
		$stmti = $conn->query("SELECT img1 FROM project.shopimage where shopId = $shopid;");
	while ($rowi=$stmti->fetch(PDO::FETCH_ASSOC)){
			$image= $dir.'/'.$rowi['img1'];
		
		//echo $image;
		?>
			<div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  "></div>
<?php
			}
?>	
	
	</p>
		<br>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT productName,pid,img1,img2,img3,price FROM project.product where shopId = $shopid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$productId= $row['pid'];
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
</body>
</html>





