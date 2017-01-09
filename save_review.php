<?php
session_start();
include_once 'app/db.php';


if(isset($_POST))
{
	$rate=$_POST['rate'];
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	$date=date('Y-m-d');
	$eventid=$_POST['id'];
	$name=$_POST['name'];
	$username=$_SESSION['username'];
	if(mysqli_query($con,"insert into reviews(rate,comments,dateof,product_id,username) values('".$rate."' , '".$comment."', '".$date."', '".$eventid."', '".$username."')"))
	{
	 echo '1';die();
	}
}

?>