<?php 
require_once 'connect.php';
if(isset($_POST['submit']) ){
	session_start();
	$cid = $_SESSION['NavCid'];
	
	$p = $_POST['Padd'];
	$nou = $_POST['num'];
	$n2 = $_POST['Wadd'];


	$sql2 = "update oneshopy_project.customer_address set work_add ='".$n2."' where cid = $cid;";
	$sql1 = "update oneshopy_project.customer_address set pri_add ='".$_POST['Padd']."' where cid = $cid;";
	

	$sql3 = "update oneshopy_project.customer_address set home_add = '".$_POST['Hadd']."' where cid = $cid;";
	$sql4 = "update oneshopy_project.customer set name ='".$_POST['name']."' where cid = $cid;";
	$sql5 = "update oneshopy_project.customer set contactNo = '".$nou."' where cid = $cid;";

	$stmt1 = $conn->prepare($sql1);
	$stmt2 = $conn->prepare($sql2);
	$stmt3 = $conn->prepare($sql3);
	$stmt4 = $conn->prepare($sql4);
	$stmt5 = $conn->prepare($sql5);
	// $stmt6 = $conn->prepare($sql6);

	// $sql2 = "update oneshopy_project.customerset name = ':n', email = ':e' and contachtNo = ':w' where cid = $cid;";
	// $stmt2 = $conn->prepare($sql2);

	try{
	if($_POST['Padd'])	$stmt1->execute();
	
	if($_POST['Wadd'])	$stmt2->execute();
	
	if($_POST['Hadd'])	$stmt3->execute();

	if($_POST['name'])	$stmt4->execute();

	if($_POST['num'])	$stmt5->execute();

	
	myAlert("Details Successfully Updated");
	header("refresh:1; url= customerdetailsUpdatefront.php");
    exit();
}catch(PDOException $e){
	myAlert("duplicate entry");
	header("refresh:1; url= customerdetailsUpdatefront.php");
}
	
}
?>
<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>