<?php
include_once 'db.php';


if(isset($_POST) && !empty($_POST['name']))
{
	$name=$_POST['name'];
	$active=$_POST['active'];
	$cat=$_POST['cat'];
	$id=$_POST['id'];
	if($cat==0)
	{
		
	$sql="update categories set name='".$name."', active=".$active." where id=".$id;
	if(mysqli_query($con,$sql))
	{
		echo 'Category Updated Successfully';
		die();
	}
	else
	{
		echo 'Fail';
		die();
	}
	}
	else if($cat==1)
	{
		
		$sql="update sub_categories set name='".$name."', active=".$active." where id=".$id;
	if(mysqli_query($con,$sql))
	{
		echo 'Sub Category Updated Successfully';
		die();
	}
	else
	{
		echo 'Fail';
		die();
	}
		
		
	}
	
	else 
	{
		$sql="update sub_categories set name='".$name."', active=".$active." where id=".$id;
		if(mysqli_query($con,$sql))
		{
			echo 'Child Category Updated Successfully';
			die();
		}
		else
		{
			echo 'Fail';
			die();
		}
	
	
	}
}
	?>