<?php
require_once 'connect.php';
// Check if form was submitted
if(isset($_POST['submit'])) {

	// Configure upload directory and allowed file types
	$upload_dir = 'uploads'.DIRECTORY_SEPARATOR;
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif');
	
	// Define maxsize for files i.e 2MB
	$maxsize = 2 * 1024*1024;

	// Checks if user sent an empty form
	if(!empty(array_filter($_FILES['files']['name']))) {

		// Loop through each file in files[] array
		foreach ($_FILES['files']['tmp_name'] as $key => $value) {
			
			$file_tmpname = $_FILES['files']['tmp_name'][$key];
			$file_name = $_FILES['files']['name'][$key];
			$file_size = $_FILES['files']['size'][$key];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			// Set upload file path
			$filepath = $upload_dir.$file_name;

			// Check file type is allowed or not
			if(in_array(strtolower($file_ext), $allowed_types)) {

				// Verify file size - 2MB max
				if ($file_size > $maxsize)		
					echo "Error: File size is larger than the allowed limit 2MB.";

				// If file with name already exist then append time in
				// front of name of the file to avoid overwriting of file
				if(file_exists($filepath)) {
					$name_used = time().$file_name;
					$filepath = $upload_dir.$name_used;
					
					if( move_uploaded_file($file_tmpname, $filepath)) {
						
						// echo "{$file_name} successfully uploaded <br />";
						myAlert("$file_name Successfully uploaded");
						$file_name = $name_used;
						
					//	header("refresh:1; url= addshopimage.html");
					}
					else {
						myAlert("Error uploading {$file_name}");
						header("refresh:1; url= addshopimagef.php");	
						exit();				
						//echo "Error uploading {$file_name} <br />";
					}
				}
				else {
				
					if( move_uploaded_file($file_tmpname, $filepath)) {
						myAlert("$file_name Successfully uploaded");
					//	header("refresh:1; url= addshopimage.html");
					}
					else {					
						myAlert("Error uploading {$file_name}");
						header("refresh:1; url= addshopimagef.php");	
						exit();				
						//echo "Error uploading {$file_name} <br />";
					}
				}
			}
			else {
				
				// If file extension not valid
			//	echo "Error uploading {$file_name} ";
				myAlert("{$file_ext} file type is not allowed");
				header("refresh:1; url= addshopimagef.php");
				exit();
				// echo "({$file_ext} file type is not allowed)<br / >";
			}
		}
	}
	else {
		
		// If no files selected
		myAlert("No files selected");
		header("refresh:1; url= addshopimagef.php");
		exit();
		// echo "No files selected.";
	}
}

?>

<?php
	session_start();
	$shopId = $_SESSION['NavShopId'];

	$sql = "INSERT INTO oneshopy_project.shopimage(shopId,img1) VALUES(:id,:i1)";
	$stmt = $conn->prepare($sql);
	try{

		
	$stmt->execute(
		array(
			':id' => $shopId,
			':i1' => $file_name
		)
	);
	// myAlert("$file_name added in dataBase");
	header("refresh:1; url= addshopimagef.php");
    exit();
}catch(PDOException $e){
	myAlert("Some Internal Error Occured");
	header("refresh:1; url= addshopimagef.php");
}
?>

<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>