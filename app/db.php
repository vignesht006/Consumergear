<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$db='consume_db';
global $con;
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
