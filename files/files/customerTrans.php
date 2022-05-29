
<?php
	require_once 'connect.php';
	session_start();
	$cid = $_SESSION['NavCid'];
	$stmt0 = $conn->query("SELECT name FROM oneshopy_project.customer where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Orders History</title>
	<link rel="stylesheet" href="../CSS/homestyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
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

	<div class="site-container">
  <div class="site-pusher">
    
    <header class="header">
      
      <a href="#" class="header__icon" id="header__icon"></a>
      
      
      <a href="#" class="header__logo__Pc nonClick"> <?php echo $row0['name'];  ?></a>
      <a href="#" class="header__logo__Mob nonClick "> <?php echo $row0['name'];  ?></a>

      <nav class="menu">
        <!-- <a href="">rifht</a> -->
		
        <div class="formNav">
        	<form action='customerDashnavi.php' method='POST'
			 style='text-align: right;'>

			<input type='hidden' name='cid' value="<?php echo $cid; ?>" >
			<!-- <span style="margin-right: 500px;"><input type="text" name="proSearch"><input style="margin-left: 10px;" type="submit" name="proSearchSubmit"></span> -->

			
			

			<input class="simpleButton" type='submit' name='Psubmit' value='Products' />
			<!-- <input class="simpleButton" type='submit' name='Ssubmit' value='Services' /> -->
			<input class="simpleButton" type='submit' name='Shopsubmit' value='Shops' />
			<input class="simpleButton" type='submit' name='Esubmit' value='Edit Profile' />
			<input class="simpleButton" type='submit' name='Tsubmit' value='Orders' />

			<input class="simpleButton" type='submit' name='Csubmit' value='Cart' />
			<input class="simpleButton" type='submit' name='Lsubmit' value='Log Out' />

	
	</form>
        </div>

      </nav>
      
    </header>
    <div class="site-content">
      <div class="container">
	<h1 style="margin-left: 3%;">
	  Orders History </h1>
	  <div style="overflow-x: auto;">
	  <table class="center" border="2" >
	<col width="60">
	<col width="200">
	<!-- <col width="160"> -->
	<col width="200">
	<col width="180">
	<col width="120">
	<col width="140">
	<tr>
		<th>S.N.</th>
		<th>Product Name</th>
		<th>Shop Name</th>
		<th>CheckOut Time</th>
		<th>Price</th>
		<th>Status</th>
		
	</tr>
	<?php
	$i = 1;
	$stmt = $conn->query("SELECT proName,shopName,trans_time,price FROM oneshopy_project.transaction where cid = $cid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo '<td>';
	echo $i;
	$i++;
	echo '</td>';
		echo '<td>';
	echo $row['proName'];
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
	echo '<td>';
	echo "In Transit";
	echo '</td>';
		echo "</tr>";
	}
	?>
</table>
</div>

</div>

</div>
<div class="site-cache" id="site-cache"></div>

</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>
</body>
</html>



<!-- <div style=" background-image: url('<?php echo $image; ?>'); background-size: 100% 100%; background-repeat: no-repeat;  ">
	<?php 
	 // echo $row['shopName'];
	   ?>
		
	</div> -->

