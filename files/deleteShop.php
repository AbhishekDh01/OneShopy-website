<?php 
require_once 'connect.php';
	$dir = 'uploads'; 

	session_start();
	$shopid = $_SESSION['NavShopId'];
	$shopimg1 = $_SESSION['img1'];
	$stmt = $conn->query("SELECT productName,pid,img1,img2,img3,price FROM oneshopy_project.product where shopId = $shopid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$img1 = $row['img1'];
		// echo $img1;
		$img2 = $row['img2'];
		$img3 = $row['img3'];
		$sql = "DELETE FROM oneshopy_project.product WHERE pid =:c;";
		$stmt2 = $conn->prepare($sql);
		$stmt2->bindParam(':c',$row['pid']);
		$stmt2->execute();
		if(!$stmt2->rowCount()){
			myAlert("Some Internal Error Occured");
			header("refresh:1; url= shopDash.php");
			exit();
			}else
			// myAlert("Product deleted Successfully");
			if($img1){
				$temp = $dir.'/'.$img1;
			if(!unlink($temp)){
				myAlert("img1 Not deleted from Database");
			}else{
				// myAlert("img1 deleted from Database");
			}}

			if($row['img2']){
			if(!unlink($dir.'/'.$img2)){
				myAlert("img2 Not deleted from Database");
			}else{
				// myAlert("img2 deleted from Database");
			}}
			if($row['img3']){
			if(!unlink($dir.'/'.$img3)){
				myAlert("img3 Not deleted from Database");
			}else{
				// myAlert("img3 deleted from Database");
			}}
	}
	$sql3 = "DELETE FROM oneshopy_project.shop WHERE shopId =:c;";
			$stmt3 = $conn->prepare($sql3);
			$stmt3->bindParam(':c',$shopid);
			$stmt3->execute();
				if(!$stmt3->rowCount()){
				myAlert("Some Internal Error Occured");
				header("refresh:1; url= shopDash.php");
				
				}else
				myAlert("Shop Deleted Successfully");
				if(!unlink($shopimg1) ){
				myAlert("img1 Not deleted from Database");
				}else{
				// myAlert("img1 deleted from Database");
				}
				header("refresh:1; url= sellerDash.php");
		exit();

 ?>
<?php
 function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}
?>