<?php
	require_once 'connect.php';
	session_start();
	$shopId = $_SESSION['NavShopId'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Image</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
  <link rel="stylesheet" href="../CSS/simpleProd.css">
	<link rel="stylesheet" href="../CSS/myform.css">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	<style>
		div{
			/*height: 150px;
			width: 300px;*/
			size: 68%;
			/*padding-left: 25%;*/
			padding:30%;
			padding-bottom: 2%;
			margin-left: 15%;
			margin-right: 15%;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			border-radius: 25px;
		}
		.text{
			font-family: 'Roboto', sans-serif;
		}
		@media only screen and (max-width: 700px) {
			div{
			/*height: 150px;
			width: 300px;*/
			size: 95%;			/*padding-left: 25%;*/
			padding:30%;
			
			margin-left: 2.5%;
			margin-right: 2.5%;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
			border-radius: 25px;
		}
		}
	</style>
	
</head>
<body>

	<h2 class="text" style="text-align: center; margin-bottom: 8px;">Add Image of Your Shop, Makes it StandOut</h2>
	<!-- <h3 class="text" style="text-align: center; margin-top: 0; margin-bottom: 4px;">Adding image of your shop makes it unique.</h3> -->
	<!-- <form action="file_upload.php" method="POST"
			enctype="multipart/form-data" style="all:revert; text-align: center;">
			<input type="file"  name="files[]" required="required" style="margin-left: 77px;" >
			
			<input type="submit" class="button" style="width: 100px;  padding: 4px; font-size: 110%;" name="submit" value="Upload"/>
			

	</form> -->
	
	<!-- <div style="background-color: red"></div> -->
<?php
	$image="";
	$delname='';
		$dir = 'uploads'; 
		$stmt = $conn->query("SELECT img1 FROM oneshopy_project.shopimage where shopId = $shopId;");
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
			 style=' all: revert; text-align: center;''>
			<h3>Not Looks Right,&nbsp;
			<input type='hidden' name='delName' value=$delname >
			<input type='submit' name='dsubmit' class = 'button' style='width: 100px;  padding: 6px; font-size: 100%; margin-bottom:0; ' value='Delete It' > or 
			<input type='submit' class='button' name='button1' style='width: 180px;  padding: 6px; font-size: 100%;' value='Done, Go to Shop'/></h3>
	</form>";
}
	if($image==null){
		echo "<form action='file_upload.php' class='upload-form' method='POST'
			enctype='multipart/form-data' style='all:revert; text-align: center;' >
			<input type='file'  name='files[]' class='upload-file' data-max-size='2097152' required='required' style='margin-left: 77px;' >
			(Max-size 2MB)
			<input type='submit' class='button' style='width: 100px;  padding: 4px; font-size: 110%;' name='submit' value=
			'Upload'/>
			

	</form>";
	
}
?>
<?php
if(isset($_POST['dsubmit'])){
		$sql = "DELETE FROM oneshopy_project.shopimage WHERE shopId =:c;";
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
		// myAlert("$image deleted from Database");
	}

	header("refresh:1; url= addshopimagef.php");
	exit();
}
?>


</body>
</html>

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>

<?php
	If(isset($_POST['button1'])){
		header("refresh:0; url= shopDash.php");
		exit();
	}
?>

<script>
$(function(){
    var fileInput = $('.upload-file');
    var maxSize = fileInput.data('max-size');
    $('.upload-form').submit(function(e){
        if(fileInput.get(0).files.length){
            var fileSize = fileInput.get(0).files[0].size; // in bytes
            if(fileSize>maxSize){
                alert('Error : image size is more then 2MB ');
                return false;
            }else{
                
            }
        }else{
            alert('Please choose image');
            return false;
        }

    });
});
    </script>