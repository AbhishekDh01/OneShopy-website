
<?php
	require_once 'connect.php';
	session_start();
	$cid = $_SESSION['NavCid'];
	$stmt0 = $conn->query("SELECT pid FROM project.cart where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<style>
		.addstyle{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 80px;
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
			<p><!-- <input type='hidden' name='cid' value="<?php echo $cid; ?>" > -->
			<!-- <span style="margin-right: 650px;"><input type="submit" value="CheckOut" name="CheckOut"></span> -->
			<input type='submit' name='Psubmit' value='Products' />
			<input type='submit' name='Ssubmit' value='Services' />
			<input type='submit' name='Shopsubmit' value='Shops' />
			<input type='submit' name='Esubmit' value='Edit Address' />
			<input type='submit' name='Tsubmit' value='Transactions' />

			<input type='submit' name='Csubmit' value='Cart' />
			<input type='submit' name='Lsubmit' value='Log Out' />
		</p>
	</form>
	<br>
	<form action='customerDashnavi.php' method='POST'
			 style="margin-left: 10%;">
			<p><input  type='hidden' name='cid' value="<?php echo $cid; ?>" >
			<span ><input type="submit" value="CheckOut" name="CheckOut"></span>
			
		</p>
	</form>
	<!-- <h1 style="margin-left: 100px;">
	  All Products </h1> -->
<?php  
		$stmtit = $conn->query("SELECT count(*) as totalItems FROM project.cart where cid = $cid;");
		$stmtprice = $conn->query("SELECT sum(price) as Total FROM project.product P, project.cart A WHERE P.pid = A.pid AND A.cid= $cid;");
		$rowit = $stmtit->fetch(PDO::FETCH_ASSOC);
		$rowprice = $stmtprice->fetch(PDO::FETCH_ASSOC);

?>
<h2 style="margin-left: 10%;">
	  Total Items : <?php echo $rowit['totalItems'];  ?> </h2>

<h2 style="margin-left: 10%">
	  Total Price : <?php echo $rowprice['Total'];  ?> </h2>

<?php
	$image="";
	$dir = 'uploads'; 
	$stmt = $conn->query("SELECT pid FROM project.cart where cid = $cid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$pid = $row['pid'];
		$stmt1 = $conn->query("SELECT productName,pid,img1,img2,img3,price FROM project.product where pid = $pid;");
		$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
		
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
</body>
</html>



<!-- <div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  ">
	<?php 
	 // echo $row['shopName'];
	   ?>
		
	</div> -->

