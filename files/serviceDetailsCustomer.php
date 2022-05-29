
<?php
	require_once 'connect.php';
	session_start();
	$serId = $_SESSION['SerId'];
	$stmt0 = $conn->query("SELECT serName,shopId,category,baseCharge,img1,img2,info FROM oneshopy_project.service where serId = $serId;");

	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$shopId = $row0['shopId'];
	$stmtshop = $conn->query("SELECT shopName,shopContact,shopEmail FROM oneshopy_project.shop where shopId = $shopId;");
	$rowshop=$stmtshop->fetch(PDO::FETCH_ASSOC);
	$dir ='uploads';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Services Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="../CSS/simpleProd.css">
	<link rel="stylesheet" href="../CSS/myform.css">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	<style >
		div{
			float: left;
		}
	</style>
</head>
<body>
	
	<form action='' method='POST'
			 style=' all:revert; text-align: right;'>
			
			<input type='submit' class="button" name='back' value='Back' style="width: 80px; height: 32px; padding: 0; text-align: center; margin:1px; font-size: 100%;" />
		</p>
	</form>
	<div>
	<h3 >Name :
	  <?php echo $row0['serName'];  ?></h3><h3  >Category :
	  <?php echo $row0['category'];  ?><br>Base Charge :
	  <?php echo $row0['baseCharge'];  ?> rs</h3>
	  </div>
	


	<div style=" background-image: url('<?php echo $dir.'/'.$row0['img1']; ?>'); background-size: 100% 100%; background-repeat: no-repeat; "  class="product"></div>
	<?php if($row0['img2']){ ?>
	<div style=" background-image: url('<?php echo $dir.'/'.$row0['img2']; ?>'); background-size: 100% 100%; background-repeat: no-repeat; "  class="product" ></div>
   <?php }  ?>


 <div>
	<h3 ><?php echo $row0['info'];  ?></h3>  
	<h3 >Shop : <?php echo $rowshop['shopName'];  ?><br>
	  Contact No : <?php echo $rowshop['shopContact'];  ?><br>
	  Email : <?php echo $rowshop['shopEmail'];  ?>
	 , Contact Shop To Avail Service</h3>
	  </div>
   <footer style="padding-top:25%; clear: right;">
   
	  </footer>

</body>
</html>

<?php 
	If(isset($_POST['back'])){
		header("Location: customerServicetab.php");
		exit();
	}
 ?>



