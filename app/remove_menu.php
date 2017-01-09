<?php
include_once 'db.php';

if(isset($_POST) && !empty($_POST['id']))
{
	$id=$_POST['id'];
	$cat=$_POST['cat'];
	if($cat ==1)
	{
	if(mysqli_query($con,"delete from sub_categories where id =".$id))
	{
		echo '1';
	}
  }
  else 
  {
  	if(mysqli_query($con,"delete from sub_categories where parent =".$id))
  	{
  		if(mysqli_query($con,"delete from categories where id =".$id))
  		{
  			echo '1';
  		}
  	}
  	
  }
     
}

?>