<?php
	require_once 'connect.php';
	session_start();
	$cid = $_SESSION['NavCid'];
	$stmt0 = $conn->query("SELECT name,email,contactNo FROM project.customer where cid = $cid;");
	$stmt1 = $conn->query("SELECT pri_add,home_add,work_add FROM project.customer_address where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
	<style>
		.addstyle{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 400px;
			height: 35px;
			box-sizing: border-box;

		}
	</style>
</head>
<body>
	<form action='customerDashnavi.php' method='POST'
			 style='text-align: right;'>
			<p><input type='hidden' name='cid' value="<?php echo $cid; ?>" >
			
			<input type='submit' name='Psubmit' value='Products' />
			<input type='submit' name='Ssubmit' value='Services' />
			<input type='submit' name='Shopsubmit' value='Shops' />
			<input type='submit' name='Esubmit' value='Edit Address' />
			<input type='submit' name='Tsubmit' value='Transactions' />

			<input type='submit' name='Csubmit' value='Cart' />
			<input type='submit' name='Lsubmit' value='Log Out' />
		</p>
	</form>
<p style="font-size: 150%;"><span style="margin-left: 7%;">
	Name : <?php echo $row0['name'];  ?>
	</span>
	<span style="margin-left: 40px;">
	Email-id : <?php echo $row0['email'];  ?>
	</span>
	<span style="margin-left: 40px;">
	Contact No : <?php echo $row0['contactNo'];  ?>
	</span>
</p>
<p style="margin-left: 40px; font-size: 110%; margin-left: 7%;">
	Primary Address : <?php echo $row1['pri_add'];  ?>
	</p>
	<p style="margin-left: 40px; font-size: 110%; margin-left: 7%;">
	Home Address: <?php echo $row1['home_add'];  ?>
	</p>
	<p style="margin-left: 40px; font-size: 110%; margin-left: 7%;">
	Work Address : <?php echo $row1['work_add'];  ?>
	</p>

<h1 style="text-align: center;">Update Details</h1>
		<br>
		<form  action="customerdetailsUpdate.php" method="post" style="text-align: center;" enctype="multipart/form-data">
	<input class= "addstyle" type="text" name="name" placeholder="Name" ><br> 
	<input class= "addstyle" type="email" name="email" placeholder="Email-id" ><br> 
<!-- 	<input class= "addstyle" type="number" name="num" placeholder="Contach No." ><br>  -->		
	<input class="addstyle" type="text" name="Padd" placeholder="Primary address"><br> 
	<input class= "addstyle" type="text" name="Hadd" placeholder="Home address" ><br> 
	<input class="addstyle" type="text" name="Wadd" placeholder="Work address" ><br> 
	<br>
	<br>
	<input class="addstyle" type="submit" name="submit" value="submit" style="background-color: #008CBA;" class="submit1"><br>

	</form>
</body>
</html>
