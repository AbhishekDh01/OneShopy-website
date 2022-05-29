<?php
	require_once 'connect.php';
	session_start();
	$shopid = $_SESSION['NavShopId'];
	$stmt0 = $conn->query("SELECT shopCategory,shopName FROM oneshopy_project.shop where shopId = $shopid;");
	$row0=$stmt0->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	
  <link rel="stylesheet" href="../CSS/homestyle.css">
	<link rel="stylesheet" href="../CSS/myform.css">
	<link href="../Images/favicon.ico" rel="icon" type="image/x-icon" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
</head>
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
<body>
	<div class="site-container">
  <div class="site-pusher">
    
    <header class="header">
      
      <a href="#" class="header__icon" id="header__icon"></a>
      
      
      <a href="#" class="header__logo__Pc nonClick">OneShopy</a>
      <a href="#" class="header__logo__Mob nonClick ">OneShopy</a>

      <nav class="menu">
      	 <div class="formNav">
			<form action='shopDashNavi.php' method='POST'
			 style='text-align: right; all: revert;  '>
			
				<input type='hidden' name='shopid' value="<?php echo $shopid; ?>" >
				<input class="simpleButton" type='submit' name='ShopDashSubmit' value="<?php echo $row0['shopName']; ?>" />
			<input class="simpleButton" type='submit' name='Psubmit' value='Add Product' />
					
			<input class="simpleButton" type='submit' name='Esubmit' value='Edit Shop' />
			<input class="simpleButton" type='submit' name='Dsubmit' value='Go to Dashboard' />
			
	</form>
</div>
</nav>
</header>
	 <div class="site-content">
	

		
		<form action="product_upload.php" method="post" enctype="multipart/form-data" style="text-align: center;" class="upload-form">
				<h1 style="text-align: center;">Enter Product Details</h1>
			<input type="hidden" name="shopId" value="<?php echo $shopid; ?>"  required="required">
	<input type="hidden" name="productCate" value="<?php echo $row0['shopCategory']; ?>" required="required">
	<div class="row Signup">
		<input type="text" name="productName" placeholder="Product Name.." required="required">
	</div>
	<div class="row Signup">
		<input type="text" name="info" placeholder="Some Info About Product" >
	</div>
	<div class="row Signup">
		<input type="number" name="price" placeholder="Price.." required="required">
	</div>
	<p>
	Add Images of Product (Max 3) <input type="file" name="files[]" class="upload-file" data-max-size="2097152" multiple style="margin-top: 4px; margin-bottom: 4px; margin-left: 40px;">
	</p>
			
			<input type="submit" name="submit" value="Add Product"  class="button" style=" padding: 8px; width: 90%;
  font-size: 125%; margin-bottom: 18px;
  "/><br>
		
	</form>
</div>
<div class="site-cache" id="site-cache"></div>

</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>

</body>

</html>

<script>
$(function(){
    var fileInput = $('.upload-file');
    var maxSize = fileInput.data('max-size');
    $('.upload-form').submit(function(e){
        if(fileInput.get(0).files.length){
            var fileSize = fileInput.get(0).files[0].size; // in bytes
            if(fileSize>maxSize){
                alert('Error : image size is more then 2MB ');
                return false;
            }else{
                
            }
        }else{
            alert('Please choose atleast 1 image');
            return false;
        }

    });
});
    </script>
