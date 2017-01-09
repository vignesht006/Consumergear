<?php
ini_set('max_file_size','60M');
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
	$id=$_POST['id'];
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

$p_date=date('Y/m/d',strtotime($_POST['p_date']));

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
$filter=implode("|",$emp1);

$emp2=array_diff( $_POST['sub_filter'], array(''));

$sub_filters=implode("|",$emp2);


$logo_path=$_POST['brand_path'];
$manu_url=$_POST['manufacturer_url'];

$ret_name=$_POST['retailer_name'];
$ret_path=$_POST['retailer_path'];
$ret_url=$_POST['retailer_url'];

$sql="update product_detail set title='".$p_title."', name='".$p_name."', category='".$p_cat."', sub_category='".$p_sub."', status='".$p_status."', brand_name='".$p_brand."', modelno='".$p_model."', price='".$p_price."', uan='".$p_uan."', usergroup='".$p_user."', creation_data='".$p_date."', outofstock='".$pot."', shortdesc='".$p_short."', longdesc='".$p_long."', height='".$p_height."', width='".$p_width."', weight='".$p_weight."', color_code='".$p_color_code."', color_general='".$p_color."', logo_path='".$logo_path."', manu_url='".$manu_url."', retail_url='".$ret_url."' , retailer='".$ret_name."' , retailer_image='".$ret_path."', filter='".$filter."', sub_filter='".$sub_filters."'";

$sql.=" where id=".$id;

if(mysqli_query($con,$sql))
{
	if($fields !=''){
		$features="update features set features='".$fields."' where product_id=".$id;

		mysqli_query($con,$features);
	}
	
	$sql_file='';
	if($file_path !='' || $file_path1!='' || $file_path2!='' || $file_path3!='' || $file_path4!='')
	{
		$flag=0;
		$sql_file="update product_images set ";
		if($file_path !='')
		{
			$sql_file.=" main_image='".$main_image_name."', main_image_path='".$file_path."' ";
			$flag=1;
		}
		if($file_path1 !='')
		{
			if($flag==1)
			$sql_file.=", image1='".$main_image_name1."', image1_path='".$file_path1."' ";
		else
		{
			$sql_file.=" image1='".$main_image_name1."', image1_path='".$file_path1."' ";
		}
		$flag=1;
		}
		if($file_path2 !='')
		{ 
	       if($flag==1)
			$sql_file.=", image2='".$main_image_name2."', image2_path='".$file_path2."' ";
		 else
			 $sql_file.=" image2='".$main_image_name2."', image2_path='".$file_path2."' ";
			$flag=1; 
		}
		if($file_path3 !='')
		{
			
	       if($flag==1)
			$sql_file.=", image3='".$main_image_name3."', image3_path='".$file_path3."' ";
		 else
			 $sql_file.=" image3='".$main_image_name3."', image3_path='".$file_path3."' ";
			$flag=1; 
		}
		if($file_path4 !='')
		{
			 if($flag==1)
			$sql_file.=", image4='".$main_image_name4."', image4_path='".$file_path4."' ";
		 else
			 $sql_file.=" image4='".$main_image_name4."', image4_path='".$file_path4."' ";
			$flag=1; 
		}
	
	
	if($sql_file !='' && $flag==1)
	{
		$sql_file.=" where product_id=".$id;
		
		if(mysqli_query($con,$sql_file))
	{
	
	echo 'Product updated Successfully';
	die();
	}
	}
	}

	else
	{
		echo 'Product updated ';
	}
	
}
else
{
	echo 'Fail To Update';die();
}
}
?>