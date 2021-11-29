
<?php
	require_once 'connect.php';
	session_start();
	$ownerSid = $_SESSION['NavSelSid'];
	$stmt0 = $conn->query("SELECT balance,name FROM project.seller where sid = $ownerSid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$bal = $row0['balance'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Seller Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<style>
		.addstyle{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 200px;
			height: 35px;
			box-sizing: border-box;

		}
		div{
			/*height: 500px;
			width:500px;*/
			size: 25%;
			padding-left: 6%;
			padding-top: 2%;
			padding-bottom: 2%;
			padding-right: 6%;
			margin-left: 5%;
			margin-top: 5%;
			/*margin-right: 5%;*/
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

	<form action='sellerDashnavi.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='ownersid' value="<?php echo $ownerSid; ?>" >
			Balance :
			<input class="nonClick" type='button' name='Bsubmit' value= "<?php echo $bal; ?> Rs" />
			<!-- <input type='submit' name='Psubmit' value='Edit Profile' /> -->
			<input type='submit' name='Hsubmit' value='History' />

			<input type='submit' name='Asubmit' value='Add Shop' />
			<input type='submit' name='Lsubmit' value='Log Out' />
		</p>
	</form>
	<p>
	<h1 style="margin-left: 10%; font-size: 300%;">
	  Welcome <?php echo $row0['name'];  ?></h1>
	</p>
	

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT shopName,shopId FROM project.shop where ownerSid = $ownerSid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$shopId = $row['shopId'];
		$stmt1 = $conn->query("SELECT img1 FROM project.shopimage where shopId = $shopId;");
		$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

		$image = $dir.'/'.$row1['img1'];
?>
	<div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;">
		
	
		<form action='sellerDashGoToShop.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='shopid' value="<?php echo $row['shopId']; ?>" >
				<input style="margin-top: 216px;" type="submit" class="nonClick addstyle" value="<?php  echo $row['shopName'];  ?>" name="non">
			<input style="margin-left: 20px;" type='submit' class="addstyle" name='ShopSubmit' value='Go to Shop' />
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

