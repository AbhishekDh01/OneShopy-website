<?php 
require_once 'connect.php';
if(isset($_POST['submit']) ){


	$sql = "INSERT INTO oneshopy_project.seller(name,email,contactNO,pass) VALUES(:n,:e,:c,:p)";
	$pass = md5($_POST['password']);
	$stmt = $conn->prepare($sql);
	try{
		
	$stmt->execute(
		array(
			':n' => $_POST['name'], 
			':e' => $_POST['email'],
			':c' => $_POST['contactNo'],
			':p' => $pass,
		)
	);
	myAlert("Seller Successfully Registered");
	header("refresh:1; url= sellerlogin.html");
    exit();
}catch(PDOException $e){
	myAlert("duplicate entry");
	header("refresh:1; url= sellerreg.html");
}
	
}
?>
<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>