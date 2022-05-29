<?php 
require_once 'connect.php';
if(isset($_POST['login']) ){


	$sql = "SELECT * from oneshopy_project.seller where email = :e";
	$pass = md5($_POST['pass']);
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':e',$_POST['email']);
	$stmt->execute();

	if($stmt->rowCount()>0){
		$getRow = $stmt->fetch(PDO::FETCH_ASSOC);
				if($getRow['pass']==$pass)
				{
					myAlert("Login Successfully");
					$email = $_POST['email'];
					$stmt = $conn->query("SELECT sid FROM oneshopy_project.seller where email='$email';");
					$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
					session_start();

					$_SESSION['NavSelSid'] = $row['sid'];
					header("refresh:0; url= sellerDash.php");
					
				}
				else
				{
					myAlert("Password is incorrect");
					header("refresh:0; url= sellerlogin.html");
				}
	}
	else{
	myAlert("Email-id Does not exists");
	header("refresh:0; url= sellerlogin.html");
	}

}
?>
<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>