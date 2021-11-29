<?php
	require_once 'connect.php';
	$dir = 'uploads'; 

	
	If(isset($_POST['addC'])){

		$sql = "INSERT INTO project.cart(cid,pid) VALUES(:c,:p)";
	$stmt = $conn->prepare($sql);
	try{

		
	$stmt->execute(
		array(
			':c' => $_POST['cid'],
			':p' => $_POST['pid']
		)
	);
	myAlert("Product added in Your Cart");
	header("refresh:1; url= customerDash.php");
    exit();
}catch(PDOException $e){
	myAlert("Some Internal Error Occured");
	header("refresh:1; url= customerDash.php");
}
	}

	If(isset($_POST['proD'])){
		session_start();
		$_SESSION['NavPid'] = $_POST['pid'];
		header("refresh:1; url= productDetailsCustomer.php");
		exit();
	}
	If(isset($_POST['rem'])){
		$pid = $_POST['pid'];
		$sql = "DELETE FROM project.cart WHERE pid =:c;";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':c',$pid);
		$stmt->execute();
		if(!$stmt->rowCount()){
		myAlert("Some Internal Error Occured");
		header("refresh:1; url= shopDash.php");
		exit();
		}else
		myAlert("Product Removed From Cart");
		header("refresh:1; url= cutomerCart.php");
		exit();
	}
?>	

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>