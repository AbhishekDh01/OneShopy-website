<?php 
require_once 'connect.php';
if (isset($_POST['editImg'])) {
	header("location: changeShopImage.php");
	exit();
}
if(isset($_POST['submit']) ){
	session_start();
	$shopid = $_SESSION['NavShopId'];
	
	

	
	$sql1 = "update oneshopy_project.shop set shopName ='".$_POST['shopName']."' where shopId = $shopid;";
	
	$sql2 = "update oneshopy_project.shop set shopCategory ='".$_POST['shopCate']."' where shopId = $shopid;";

	$sql3 = "update oneshopy_project.shop set shopInfo = '".$_POST['shopInfo']."' where shopId = $shopid;";
	$sql4 = "update oneshopy_project.shop set shopAddress ='".$_POST['shopAdd']."' where shopId = $shopid;";
	$sql5 = "update oneshopy_project.shop set shopContact = '".$_POST['shopContact']."' where shopId = $shopid;";

	$stmt1 = $conn->prepare($sql1);
	$stmt2 = $conn->prepare($sql2);
	$stmt3 = $conn->prepare($sql3);
	$stmt4 = $conn->prepare($sql4);
	$stmt5 = $conn->prepare($sql5);
	// $stmt6 = $conn->prepare($sql6);

	// $sql2 = "update oneshopy_project.customerset name = ':n', email = ':e' and contachtNo = ':w' where cid = $cid;";
	// $stmt2 = $conn->prepare($sql2);

	try{
	if($_POST['shopName'])	$stmt1->execute();
	
	if($_POST['shopCate'])	$stmt2->execute();
	
	if($_POST['shopInfo'])	$stmt3->execute();

	if($_POST['shopAdd'])	$stmt4->execute();

	if($_POST['shopContact'])	$stmt5->execute();

	
	myAlert("Details Successfully Updated");
	header("refresh:1; url= editshop.php");
    exit();
}catch(PDOException $e){
	myAlert("Some Error Occured");
	header("refresh:1; url= editshop.php");
}
	
}
?>
<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>