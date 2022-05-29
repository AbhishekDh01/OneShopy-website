<?php
	require_once 'connect.php';
	session_start();
	$cid = $_SESSION['NavCid'];
	$stmt0 = $conn->query("SELECT name,email,contactNo FROM oneshopy_project.customer where cid = $cid;");
	$stmt1 = $conn->query("SELECT pri_add,home_add,work_add FROM oneshopy_project.customer_address where cid = $cid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
		<title>Update Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="../CSS/homestyle.css">
	<link rel="stylesheet" href="../CSS/myform.css">

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
  <link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />
	<style>
		
		.nonClick{
			pointer-events: none;
		}
		.reset {
				all:revert;
		}
		input[type=submit] {
  font-family: 'Roboto', sans-serif;
  font-size: 1em;
  line-height: 1.4;
  height: 100%;
  margin: 0;
  padding: 0;
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
			  class="reset">

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

	<!-- <span style="margin-left: 40px;">
	Email-id : <?php echo $row0['email'];  ?>
	</span> -->
	

		<div class="main">
		<form  action="customerdetailsUpdate.php" method="post" style="text-align: center;" enctype="multipart/form-data">
			<h1 style="text-align: center;">Update Details</h1>
			<h3 style="margin-top: -20px; margin-bottom: 8px;"><?php echo $row0['email']; ?></h3>
			<!-- <div class="row Signup">
				<input  type="text" name="name" value="<?php echo $row0['email']; ?>" > 
		</div> -->
			<div class="row Signup">
				<input  type="text" name="name" value="<?php echo $row0['name']; ?>" > 
		</div>
	<!-- <input class= "addstyle" type="email" name="email" placeholder="Email-id" ><br>  -->
	<div class="row Signup">
	<input  type="number" name="num" value="<?php echo $row0['contactNo']; ?>" minlength="10" maxlength="10" title="Contact number is not right" >
	</div>

	<div class="row Signup">		
	<input  type="text" name="Padd" value="<?php echo $row1['pri_add']; ?>">
	</div>
	<div class="row Signup">
	<input  type="text" name="Hadd" value="<?php echo $row1['home_add']; ?>" > 
	</div>
	<div class="row Signup">
	<input  type="number" name="Wadd" value="<?php echo $row1['work_add']; ?>" >
	</div>
	<br>
	<input  type="submit" name="submit"  value="Submit" class="button" style=" padding: 11px;
  font-size: 125%;
  margin-bottom: 18px;"><br>
	
	</form>
</div>
	</div> <!-- END container -->
    </div> <!-- END site-content -->
    <div class="site-cache" id="site-cache"></div>
  </div> <!-- END site-pusher -->
</div> 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
