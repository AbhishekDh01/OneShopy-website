

<?php
	require_once 'connect.php';
	$dir = 'uploads'; 
	session_start();
	If(isset($_POST['ShopSubmit'])){
		
	 $_SESSION['NavShopId'] = $_POST['shopid'];
		header("Location: shopDash.php");
		exit();
	}
	If(isset($_POST['ShopDel'])){
		$shopid = $_POST['shopid'];
		$_SESSION['img1'] = $_POST['img1'];

		 myConfirm('Do you really want to delete your Shop?');
		
	// 	if($var){
	// 		$sql = "DELETE FROM oneshopy_project.shop WHERE shopId =:c;";
	// 		$stmt = $conn->prepare($sql);
	// 		$stmt->bindParam(':c',$shopid);
	// 		$stmt->execute();
	// 			if(!$stmt->rowCount()){
	// 			myAlert("Some Internal Error Occured");
	// 			header("refresh:1; url= shopDash.php");
				
	// 			}else
	// 			myAlert("Shop Deleted Successfully");
	// 			if(!unlink($_POST['img1']) ){
	// 			myAlert("img1 Not deleted from Database");
	// 			}else{
	// 			// myAlert("img1 deleted from Database");
	// 			}
	// 			header("refresh:1; url= sellerDash.php");
	// 	exit();
	// }
	myAlert("Some Internal Error Occured");
	header("refresh:1; url= sellerDash.php");
	// exit();
}
?>


<?php
function myConfirm($msg){
	echo "<script>

	if(confirm('$msg')){
		window.location.href = 'deleteShop.php';
	}else window.location.href = 'SellerDash.php';
	;
	</script>";

	
}
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}
?>




