<?php
include_once 'db.php';
$uploadLocation='Retailer/';
if(isset($_FILES))
{
	
	$file_path='';
	

if(isset($_FILES['r_logo'])){
	$main_image_name = $_FILES['r_logo']['name'];
	$main_image_size = $_FILES['r_logo']['size'];
	$file_tmp = $_FILES['r_logo']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path=$file_destination;
		
	}
		
				 
}


}


if(isset($_POST))
{

$retail_name=$_POST['retail_name'];

$sql_file="insert into retailers(name,retailer_image,rt_path)
	values('".$retail_name."', '".$main_image_name."', '".$file_path."')";
	if(mysqli_query($con,$sql_file))
	{
	
	echo 'Retailer Added Successfully';
	die();
	}
	
else
{
	echo 'Fail To Add';die();
}

	

}
?>