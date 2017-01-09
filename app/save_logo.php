<?php

include_once 'db.php';

$uploadLocation="backgrounds/";

$file_path1='';

if(isset($_FILES['image'])){
	$main_image_name = $_FILES['image']['name'];
	$main_image_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name;
	 
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path1=$file_destination;
		unlink('buffer/'.$main_image_name);
	}

		
}

if(isset($_REQUEST))
{
	$url=$_POST['url'];
	if($file_path1 !='')
	{
		$fname=$main_image_name;
		$sql="update backgrounds set image_name='".$main_image_name."', image_path='".$file_path1."' , type='0' where id=2";

	}
	else
	{
		$fname='';
		$sql="update backgrounds set  image_path='".$url."' , type='1' where id=2";
	}

	if(mysqli_query($con,$sql))
	{
		echo '1';
	}
}

?>