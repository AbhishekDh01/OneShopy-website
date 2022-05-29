
<?php
require_once 'connect.php';
	If(isset($_POST['Psubmit'])){
		header("Location: customerDash.php");
		exit();
	}
	If(isset($_POST['Ssubmit'])){
		header("Location: customerServicetab.php");
		exit();
	}
	If(isset($_POST['Shopsubmit'])){
		header("Location: customerShoptab.php");
		exit();
	}
	If(isset($_POST['Esubmit'])){
		header("Location: customerdetailsUpdatefront.php");
		exit();
	}
	If(isset($_POST['Tsubmit'])){
		header("Location: customerTrans.php");
		exit();
	}
	If(isset($_POST['Csubmit'])){
		header("Location: cutomerCart.php");
		exit();
	}
	If(isset($_POST['Lsubmit'])){
		header("Location: ../index.html");
		exit();
	}
	If(isset($_POST['CheckOut'])){

		$cid = $_POST['cid'];
	    
		$stmt = $conn->query("SELECT pid FROM oneshopy_project.cart where cid = $cid;");
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			$pid = $row['pid'];
			$stmt1 = $conn->query("SELECT p.price as proPrice,p.productName as proName, s.sid as sellerId, q.shopName as shopName FROM oneshopy_project.seller S, oneshopy_project.product p, oneshopy_project.shop q WHERE s.sid=q.ownerSid AND q.shopId=p.shopId AND p.pid=$pid;");
			$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

			$sql = "INSERT INTO oneshopy_project.transaction(cid,sid,pid,shopName,price,proName) VALUES(:c,:s,:p,:n,:price,:pro)";
		$stmt3 = $conn->prepare($sql);
			
		try{
		$stmt3->execute(
		array(
			':c' => $cid, 
			':s' => $row1['sellerId'], 
			':p' => $pid,
			':n' => $row1['shopName'],
			':price' => $row1['proPrice'],
			':pro' => $row1['proName'],
		)
		);
		$sid = $row1['sellerId'];
		$sql4 = "update oneshopy_project.seller set balance = balance + '".$row1['proPrice']."' where sid = $sid;";
		$stmt4 = $conn->prepare($sql4);
		$stmt4->execute();

		$sql5 = "DELETE FROM oneshopy_project.cart WHERE cid =:c;";
		$stmt5 = $conn->prepare($sql5);
		$stmt5->bindParam(':c',$cid);
		$stmt5->execute();
	

		}catch(PDOException $e){
		myAlert("Some Internal Error Occured");
		header("refresh:0; url= cutomerCart.php");
		exit();
			}
		}

		myAlert("CheckOut Done Successfully");
		header("refresh:0; url= cutomerCart.php");
		exit();
	}
?>	

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>