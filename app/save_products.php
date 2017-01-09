<?php
include_once 'db.php';
$uploadLocation='products/';
if(isset($_FILES))
{
	
	$file_path='';
	$file_path1='';
	$file_path2='';
	$file_path3='';
	$file_path4='';
	$file_path5='';

if(isset($_FILES['p_main'])){
	$main_image_name = $_FILES['p_main']['name'];
	$main_image_size = $_FILES['p_main']['size'];
	$file_tmp = $_FILES['p_main']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path=$file_destination;
		
	}
		
				 
}

if(isset($_FILES['p_sub1'])){
	$main_image_name1 = $_FILES['p_sub1']['name'];
	$main_image_size = $_FILES['p_sub1']['size'];
	$file_tmp = $_FILES['p_sub1']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name1;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path1=$file_destination;
		
	}
		
				 
}

if(isset($_FILES['p_sub2'])){
	$main_image_name2 = $_FILES['p_sub2']['name'];
	$main_image_size = $_FILES['p_sub2']['size'];
	$file_tmp = $_FILES['p_sub2']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name2;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path2=$file_destination;
		
	}
		
				 
}

if(isset($_FILES['p_sub3'])){
	$main_image_name3 = $_FILES['p_sub3']['name'];
	$main_image_size = $_FILES['p_sub3']['size'];
	$file_tmp = $_FILES['p_sub3']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name3;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path3=$file_destination;
		
	}
		
				 
}


if(isset($_FILES['p_sub4'])){
	$main_image_name4 = $_FILES['p_sub4']['name'];
	$main_image_size = $_FILES['p_sub4']['size'];
	$file_tmp = $_FILES['p_sub4']['tmp_name'];
	$file_destination = $uploadLocation.$main_image_name4;
     
	if(move_uploaded_file($file_tmp,$file_destination))
	{
		$file_path4=$file_destination;
		
	}
		
				 
}





}


if(isset($_POST))
{
$p_title=$_POST['p_title'];
$p_name=$_POST['p_name'];	
$p_cat=$_POST['p_cat'];
$p_sub=$_POST['p_sub'];

$p_status=$_POST['p_status'];
$p_brand=$_POST['p_brand'];	
$p_model=$_POST['p_model'];	
$p_uan=	$_POST['p_uan'];
$p_price=$_POST['p_price'];	
$p_user=implode(",",$_POST['p_user']);
$p_date=date('y/m/d',strtotime($_POST['p_date']));
$pot=$_POST['p_outstack'];
$p_long=mysqli_real_escape_string($con,$_POST['p_long']);
$p_short=mysqli_real_escape_string($con,$_POST['p_short']);
$p_color=$_POST['p_color'];
$p_color_code=$_POST['p_color_code'];
$p_weight=$_POST['p_weight'];	
$p_width=$_POST['p_width'];
$p_height=$_POST['p_height'];

$emp=array_diff( $_POST['fields'], array(''));

$fields=implode("|",$emp);

$emp1=array_diff( $_POST['filter'], array(''));

$filters=implode("|",$emp1);

$emp2=array_diff( $_POST['sub_filter'], array(''));

$sub_filters=implode("|",$emp2);

$p_logo=$_POST['brand_name'];
$logo_path=$_POST['brand_path'];
$manu_url=$_POST['manufacturer_url'];

$ret_name=$_POST['retailer_name'];
$ret_path=$_POST['retailer_path'];
$ret_url=$_POST['retailer_url'];

$sql="insert into product_detail(title,name,category,sub_category,status,brand_name,modelno,price,uan,usergroup,creation_data,outofstock,shortdesc,longdesc,height,width,weight,color_code,color_general,logo_path,manu_url,retailer,retail_url,retailer_image,filter,sub_filter) 
values('".$p_title."', '".$p_name."', '".$p_cat."', '".$p_sub."', '".$p_status."', '".$p_brand."', '".$p_model."', '".$p_price."', '".$p_uan."', '".$p_user."', '".$p_date."', '".$pot."', '".$p_short."', '".$p_long."', '".$p_height."', '".$p_width."', '".$p_weight."', '".$p_color_code."', '".$p_color."', '".$logo_path."', '".$manu_url."', '".$ret_name."', '".$ret_url."', '".$ret_path."', '".$filters."', '".$sub_filters."')";

//echo $sql;

if(mysqli_query($con,$sql))
{
	$id=mysqli_insert_id($con);
	
	if($fields !=''){
	$features="insert into features(product_id,features) values('".$id."', '".$fields."')";
	mysqli_query($con,$features);
	}
	else
	{
		$features="insert into features(product_id,features) values('".$id."', '')";
	mysqli_query($con,$features);
	}
	
	$sql_file="insert into product_images(product_id,main_image,main_image_path,image1,image1_path,image2,image2_path,
	image3,image3_path,image4,image4_path)
	values('".$id."', '".$main_image_name."', '".$file_path."', '".$main_image_name1."', '".$file_path1."', '".$main_image_name2."', '".$file_path2."', '".$main_image_name3."', '".$file_path3."', '".$main_image_name4."', '".$file_path4."')";
	if(mysqli_query($con,$sql_file))
	{
	
	echo 'Product Added Successfully';
	die();
	}
	else
	{
		echo 'Product Added ';
	}
	
}
else
{
	echo 'Fail To Add';die();
}
}
?>