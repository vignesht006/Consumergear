<?php

// Inialize session
session_start();

// Include database connection settings
require_once('app/db.php');


// Retrieve username and password from database according to user's input
$login = mysqli_query($con,"SELECT * FROM users WHERE (username = '" . mysqli_real_escape_string($con,$_POST['username']) . "') and (password = '" . md5(mysqli_real_escape_string($con,$_POST['password']) ). "')");





// Check username and password match
if (mysqli_num_rows($login) == 1) {
	
	$row=mysqli_fetch_assoc($login);

// Set username session variable
$_SESSION['username'] = $row['username'];
$_SESSION['id']=$row['id'];
$_SESSION['tb']='1';
// Jump to secured page
unset($_SESSION['fail']);
header("Location: home.php");
}
else {
// Jump to login page
$_SESSION['fail']=1;
header('Location: index.php');

}

?>
