<?php
include_once 'db.php';


if(isset($_POST) && !empty($_POST['name']))
{
	$name=$_POST['name'];
	$active=$_POST['active'];
	$cat=$_POST['cat'];
	
	if($cat==0)
	{
	$sql="insert into categories(name,active,hasub) values('".$name."', ".$active.", '0')";
	if(mysqli_query($con,$sql))
	{
		echo 'Category Added Successfully';
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
		$main=$_POST['main'];
		$up="update categories set hasub='1' where id=".$main;
		mysqli_query($con,$up);
		$sql="insert into sub_categories(name,active,parent,haschild) values('".$name."', ".$active.", ".$main.", '0')";
	if(mysqli_query($con,$sql))
	{
		echo 'Sub Category Added Successfully';
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
		$prev=$_POST['prev'];
	
		$up="update sub_categories set haschild='1' where id=".$prev;
		if(mysqli_query($con,$up)){
		$sql="insert into sub_categories(name,active,parent,prev,haschild) values('".$name."', ".$active.", '0', ".$prev.", '0')";
		if(mysqli_query($con,$sql))
		{
			echo 'Child Category Added Successfully';
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
			echo 'Fail';
			die();
		}
			
	
	}
	
	
	
	
	
}

?>