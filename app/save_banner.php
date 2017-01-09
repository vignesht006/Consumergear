<?php
include_once 'db.php';
$uploadLocation='banners/';
if(isset($_FILES))
{
	
	$file_path='';
	

if(isset($_FILES['p_banner'])){
	$main_image_name = $_FILES['p_banner']['name'];
	$main_image_size = $_FILES['p_banner']['size'];
	$file_tmp = $_FILES['p_banner']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path=$file_destination;
		
	}
		
				 
}


}


if(isset($_POST))
{
$id=$_POST['banner_id'];

$sql_file="update sub_categories set image_path='".$file_path."' where id=".$id;

	
	if(mysqli_query($con,$sql_file))
	{
	
	echo 'Banner Added Successfully';
	die();
	}
	
else
{
	echo 'Fail To Add';die();
}

	

}
?>