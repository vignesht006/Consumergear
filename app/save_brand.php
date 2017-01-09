<?php
include_once 'db.php';
$uploadLocation='brands/';
if(isset($_FILES))
{
	
	$file_path='';
	

if(isset($_FILES['p_logo'])){
	$main_image_name = $_FILES['p_logo']['name'];
	$main_image_size = $_FILES['p_logo']['size'];
	$file_tmp = $_FILES['p_logo']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path=$file_destination;
		
	}
		
				 
}


}


if(isset($_POST))
{

$brand_name=$_POST['brand_name'];

$sql_file="insert into brands(name,brand_image,bg_path)
	values('".$brand_name."', '".$main_image_name."', '".$file_path."')";
	if(mysqli_query($con,$sql_file))
	{
	
	echo 'Brand Added Successfully';
	die();
	}
	
else
{
	echo 'Fail To Add';die();
}

	

}
?>