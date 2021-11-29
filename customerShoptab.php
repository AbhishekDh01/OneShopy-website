
<?php
	require_once 'connect.php';
	session_start();
	$cid = $_SESSION['NavCid'];
	$stmt0 = $conn->query("SELECT name FROM project.customer where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<style>
		.addstyle{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 160px;
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
			margin-right: -2%;
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

	<form action='customerDashnavi.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='cid' value="<?php echo $cid; ?>" >
			<!-- <span style="margin-right: 500px;"><input type="text" name="proSearch"><input style="margin-left: 10px;" type="submit" name="proSearchSubmit"></span> -->
			<input type='submit' name='Psubmit' value='Products' />
			<input type='submit' name='Ssubmit' value='Services' />
			<input type='submit' name='Shopsubmit' value='Shops' />
			<input type='submit' name='Esubmit' value='Edit Address' />
			<input type='submit' name='Tsubmit' value='Transactions' />

			<input type='submit' name='Csubmit' value='Cart' />
			<input type='submit' name='Lsubmit' value='Log Out' />
		</p>
	</form>
	<h1 style="margin-left: 100px;">
	  All Shops </h1>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT shopName,shopId,shopCategory FROM project.shop;");

	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$shopId = $row['shopId'];
		$stmt1 = $conn->query("SELECT img1 FROM project.shopimage where shopId = $shopId;");
		$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

		$image = $dir.'/'.$row1['img1'];
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
		<form action='shopDetailsCustomer.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='shopId' value="<?php echo $row['shopId']; ?>" >
				<input type='hidden' name='img1' value="<?php echo $row1['img1']; ?>" >

			
			<input class="addstyle nonClick" style="margin-top: 216px;" type='submit' name='' value="<?php echo $row['shopName']; ?>" />
			<input class="addstyle nonClick" style=" " type='submit' name='' value="<?php echo $row['shopCategory']; ?>" />
			<input  type='submit' class="addstyle" name='proDelete' value='Go To Shop' style="width: 100px; margin-left: 20px;" />
			
		</p>
	</form>
			
		</div>
<?php
	}
	?>
</body>
</html>



<!-- <div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  ">
	<?php 
	 // echo $row['shopName'];
	   ?>
		
	</div> -->

