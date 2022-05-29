
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
	<title>Services Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	
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

	<form action='sellerServicetabNavi.php' method='POST'
			 style='text-align: right;'>
			<span>
				<input type='hidden' name='shopid' value="<?php echo $shopid; ?>" >
			<input type='submit' name='Ssubmit' value='Add Service' />
			<input type='submit' name='Dsubmit' value='Go to Dashboard' />
		</span>
	</form>
	<h1 style="margin-left: 10%; font-size: 300%;"><?php 
	  echo $row0['shopName']; 
	   ?></h1>
	
		<br>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT serName,serId,img1,img2,baseCharge FROM oneshopy_project.service where shopId = $shopid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$serId= $row['serId'];
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
		<form action='sellerServiceOper.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='serId' value="<?php echo $row['serId']; ?>" >
				<input type='hidden' name='img1' value="<?php echo $row['img1']; ?>" >
				<input type='hidden' name='img2' value="<?php echo $row['img2'];?>" >

			
			<input class="addstyle nonClick" style="margin-top: 196px;" type='submit'  name='' value="SerID : <?php echo $row['serId']; ?>" />
			<input class="addstyle nonClick" style="margin-top: 196px;" type='submit' name='' value="Rs : <?php echo $row['baseCharge']; ?>" />
			<br>
			<input  type='submit' class="addstyle" name='serDelete' value='Delete' />
			<input  type='submit' class="addstyle" name='serDetail' value='Details' />
		</p>
	</form>
			
		</div>
<?php
	}
	?>
</body>
</html>





