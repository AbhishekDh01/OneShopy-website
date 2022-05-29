<?php
$servername = "localhost"; 
$port_no = 3306; // Port number for Windows 
$username = 'oneshopy_project';
$password = 'Abhi2001$';
$myDB = 'oneshopy_project'; 

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