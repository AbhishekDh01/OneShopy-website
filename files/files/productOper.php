<?php
	require_once 'connect.php';
	$dir = 'uploads'; 
	
	If(isset($_POST['proDelete'])){
		$pid = $_POST['pid'];
		$sql = "DELETE FROM oneshopy_project.product WHERE pid =:c;";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':c',$pid);
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
		// myAlert("img1 deleted from Database");
	}}

	if($_POST['img2']){
	if(!unlink($dir.'/'.$_POST['img2'])){
		myAlert("img2 Not deleted from Database");
	}else{
		// myAlert("img2 deleted from Database");
	}}
	if($_POST['img3']){
	if(!unlink($dir.'/'.$_POST['img3'])){
		myAlert("img3 Not deleted from Database");
	}else{
		// myAlert("img3 deleted from Database");
	}}

	header("refresh:1; url= shopDash.php");
		exit();
	}

	If(isset($_POST['proDetail'])){
		session_start();
		$_SESSION['NavPid'] = $_POST['pid'];
		header("location: productDetailsSeller.php");
		exit();
	}
?>	

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>