<?php 
require_once 'connect.php';
if(isset($_POST['submit']) ){

	session_start();
	$ownerSid = $_SESSION['NavSelSid'];
	

	$sql = "INSERT INTO oneshopy_project.shop(ownerSid,shopName,shopCategory,shopInfo,shopAddress,shopEmail,ShopContact) VALUES(:o,:n,:c,:i,:a,:e,:con)";
	$stmt = $conn->prepare($sql);
	try{
		
	$stmt->execute(
		array(
			':o' => $ownerSid,
			':n' => $_POST['shopName'], 
			':c' => $_POST['shopCate'],
			':i' => $_POST['shopInfo'],
			':a' => $_POST['shopAdd'],
			':e' => $_POST['shopEmail'],
			':con' => $_POST['shopContact'],
		)
	);
	myAlert("Shop Successfully Added");
	$name = $_POST['shopName'];
	$stmt = $conn->query("SELECT max(shopId) as shopId FROM oneshopy_project.shop where ownerSid = $ownerSid");
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	
	$_SESSION['NavShopId'] = $row['shopId'];

	header("refresh:1; url= addshopimagef.php");
    exit();
}catch(PDOException $e){
	myAlert("Some Internal Error Occured");
	//header("refresh:1; url= sellerlogin.html");
}
	
}
?>
<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>