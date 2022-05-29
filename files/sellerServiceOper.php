<?php
	require_once 'connect.php';
	$dir = 'uploads'; 
	
	If(isset($_POST['serDelete'])){
		$serId = $_POST['serId'];
		$sql = "DELETE FROM oneshopy_project.service WHERE serID =:c;";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':c',$serId);
	$stmt->execute();
	if(!$stmt->rowCount()){
	myAlert("Some Internal Error Occured");
	header("refresh:1; url= shopDash.php");
	exit();
	}else
	myAlert("Product deleted Successfully");
	if($_POST['img1']){
		$temp = $dir.'/'.$_POST['img1'];
	if(!unlink($temp)){
		myAlert("img1 Not deleted from Database");
	}else{
		myAlert("img1 deleted from Database");
	}}

	if($_POST['img2']){
	if(!unlink($dir.'/'.$_POST['img2'])){
		myAlert("img2 Not deleted from Database");
	}else{
		myAlert("img1 deleted from Database");
	}}
	

	header("refresh:1; url= sellerServicetab.php");
		exit();
	}

	If(isset($_POST['serDetail'])){
		session_start();
		$_SESSION['NavSerId'] = $_POST['serId'];
		header("refresh:1; url= serviceDetailsSeller.php");
		exit();
	}
?>	

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>