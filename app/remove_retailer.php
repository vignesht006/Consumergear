<?php
include_once 'db.php';

if(isset($_POST) && !empty($_POST['id']))
{
	$id=$_POST['id'];
	$s=mysqli_query($con,"select rt_path from retailers  where id=".$id);
	
	$bg=mysqli_fetch_array($s);
	if($bg['rt_path'] !=''){
		unlink($bg['rt_path']);
	if(mysqli_query($con,"delete from retailers where id =".$id))
	{
		echo '1';
	}
	
	}
	else
	{
		if(mysqli_query($con,"delete from retailers where id =".$id))
	{
		echo '1';
	}
	
	}
 
}

?>