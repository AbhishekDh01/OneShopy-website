<?php
	require_once 'connect.php';
	session_start();
	$shopId = $_SESSION['NavShopId'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Images</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<style>
		div{
			/*height: 150px;
			width: 300px;*/
			size: 70%;
			/*padding-left: 25%;*/
			padding-top:30%;
			padding-bottom: 5%;
			margin-left: 15%;
			margin-right: 15%;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			border-radius: 25px;
		}
		
	</style>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>

	<h1 style="text-align: center;">Add 1 Image of Your Shop</h1>
	<h3 style="text-align: center;">Adding image makes it more unique (can skip also)</h3>
	<form action="file_upload.php" method="POST"
			enctype="multipart/form-data" style="text-align: center;">
			<p><input type="file" name="files[]" multiple>
			
			<input type="submit" name="submit" value="Upload"/>
			</p>

	</form>
	
	<!-- <div style="background-color: red"></div> -->
<?php
	$image="";
	$delname='';
		$dir = 'uploads'; 
		$stmt = $conn->query("SELECT img1 FROM project.shopimage where shopId = $shopId;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			$delname=$row['img1'];
			$image= $dir.'/'.$row['img1'];
		
		//echo $image;
		?>
			<div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  "></div>
<?php
			}
?>	
	
	

<?php
	if($image!=null){
		echo "<form action='' method='POST'
			 style='text-align: center;''>
			<p>Not Looks Right,
			<input type='hidden' name='delName' value=$delname >
			<input type='submit' name='dsubmit' value='Delete It' ></p>

	</form>";
	
}
?>
<?php
if(isset($_POST['dsubmit'])){
		$sql = "DELETE FROM project.shopimage WHERE shopId =:c;";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':c',$shopId);
	$stmt->execute();
	if(!$stmt->rowCount()){
	myAlert("Some Internal Error Occured");
	header("refresh:1; url= addshopimagef.php");
	exit();
}else
	myAlert("Image deleted Successfully");
	if(!unlink($image)){
		myAlert("Not deleted from Database");
	}else{
		myAlert("$image deleted from Database");
	}

	header("refresh:1; url= addshopimagef.php");
	exit();
}
?>
<form method="POST" style="text-align: center;">
			<input type="submit" name="button1" value="Done, Go to Dashboard"/>
	</form>

</body>
</html>

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>

<?php
	If(isset($_POST['button1'])){
		header("refresh:0; url= addProduct.php");
		exit();
	}
?>