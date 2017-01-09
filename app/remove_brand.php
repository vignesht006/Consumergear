<?php
include_once 'db.php';

if(isset($_POST) && !empty($_POST['id']))
{
	$id=$_POST['id'];
	$s=mysqli_query($con,"select bg_path from brands where id=".$id);
	
	$bg=mysqli_fetch_array($s);
	if($bg['bg_path'] !=''){
		unlink($bg['bg_path']);
	if(mysqli_query($con,"delete from brands where id =".$id))
	{
		echo '1';
	}
	
	}
	else
	{
		if(mysqli_query($con,"delete from brands where id =".$id))
	{
		echo '1';
	}
	
	}
 
}

?>