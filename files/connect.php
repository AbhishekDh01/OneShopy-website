<?php
$servername = ""; // paste your server, username details here
$username = ''; 
$password = '';  
$myDB = 'oneshopy_project'; // name your database same as this

try{
	 $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
	// $conn = new PDO("mysql:host=$servername;dbname=$myDB",$username,$password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo "Connection Successfully";
} catch(PDOException $e){
	echo "Connection failed : ".$e->getMessage();
}
?>
