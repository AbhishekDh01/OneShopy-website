
<?php
	require_once 'connect.php';
	session_start();
	$sid = $_SESSION['NavSelSid'];
	$stmt0 = $conn->query("SELECT name,balance FROM project.seller where sid = $sid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$bal = $row0['balance'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transactions History</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<style>
		table, th, td{
			border-collapse: collapse;
			text-align: center;
			table-layout: auto;
			border : 1px solid black;
		}
		th,td{
			padding: 5px;
			font-size: 120%;
			margin: 4px;
		}
		th{
			color: #0000cc;

		}
		td{
			color: #e65c00;
			font-weight: 500;
		}
		table.center{
			margin-left: auto;
			margin-right: auto;

		}
	</style>
	
</head>
<body>

		<form action='sellerDashnavi.php' method='POST'
			 style='text-align: right;'>
			<p>
			<input type='submit' name='Psubmit' value='Go To Dashboard' />
		</p>
	</form>
	<h1 style="margin-left: 100px;">
	  Transaction History </h1>

	  <table class="center" border="2">
	<col width="240">
	<!-- <col width="160"> -->
	<col width="240">
	<col width="140">
	<col width="140">
	<col width="180">
	<col width="180">
	<tr>
		<th>Product Name</th>
		<th>Pid</th>
		<th>Cid</th>
		<th>Shop Name</th>
		<th>CheckOut Time</th>
		<th>Price</th>
		
	</tr>
	<?php
	$stmt = $conn->query("SELECT pid,cid,proName,shopName,trans_time,price FROM project.transaction where sid = $sid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo '<td>';
	echo $row['proName'];
	echo '</td>';
	echo '<td>';
	echo $row['pid'];
	echo '</td>';
	echo '<td>';
	echo $row['cid'];
	echo '</td>';
	echo '<td>';
	echo $row['shopName'];
	echo '</td>';
	echo '<td>';
	echo $row['trans_time'];
	echo '</td>';
	echo '<td>';
	echo $row['price'];
	echo '</td>';
		echo "</tr>";
	}
	?>
</table>

</body>
</html>



<!-- <div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  ">
	<?php 
	 // echo $row['shopName'];
	   ?>
		
	</div> -->

