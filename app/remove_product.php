<?php
include_once 'db.php';

if(isset($_POST))
{
	$id=$_POST['id'];
	if(mysqli_query($con,"delete from product_detail where id =".$id))
	{
		echo '1';
	}

}

?>