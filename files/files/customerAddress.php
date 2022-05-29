<?php 
require_once 'connect.php';
if(isset($_POST['submit']) ){
	session_start();
	$cusCid = $_SESSION['NavCusCid'];

	$sql = "INSERT INTO oneshopy_project.customer_address(cid,pri_add,home_add,work_add) VALUES(:c,:p,:h,:w)";
	$stmt = $conn->prepare($sql);

	try{
		
	$stmt->execute(
		array(
			':c' => $cusCid, 
			':p' => $_POST['Padd'],
			':h' => $_POST['Hadd'],
			':w' => $_POST['Wadd']
		)
	);
	myAlert("Address Successfully Updated");
	header("refresh:1; url= customerlogin.html");
    exit();
}catch(PDOException $e){
	myAlert("duplicate entry");
	header("refresh:1; url= customeraddress.html");
}
	
}
?>
<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>