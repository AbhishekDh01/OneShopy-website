
<?php
	require_once 'connect.php';
	session_start();
	$serId = $_SESSION['NavSerId'];
	$stmt0 = $conn->query("SELECT serName,category,baseCharge,img1,img2,info FROM oneshopy_project.service where serId = $serId;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$dir ='uploads';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Services Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	
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
			height: 200px;
			width: 200px;
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
	</style>
</head>
<body>

	<form action='' method='POST'
			 style='text-align: right;'>
			
			<input type='submit' name='back' value='Back' />
		</p>
	</form>
	<h1 style="margin-left: 8%;">Name :
	  <?php echo $row0['serName'];  ?><br><span>SerID :
	  <?php echo $serId;  ?></span><h2 style="margin-left: 8%;"><span>Category :
	  <?php echo $row0['category'];  ?></span><br><span>Base Charge :
	  <?php echo $row0['baseCharge'];  ?> rs<br></span><br>
	<?php echo $row0['info'];  ?></h2>  
	<div style=" background-image: url('<?php echo $dir.'/'.$row0['img1']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;"  class="product"></div>
	<?php if($row0['img2']){ ?>
	<div style=" background-image: url('<?php echo $dir.'/'.$row0['img2']; ?>'); background-size: 100% 100%; background-repeat: no-repeat;"  class="product"></div>
   <?php }  ?>


</body>
</html>

<?php 
	If(isset($_POST['back'])){
		header("refresh:1; url= sellerServicetab.php");
		exit();
	}
 ?>



