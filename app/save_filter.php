<?php
include_once 'db.php';

if(isset($_POST))
{
	
$cat=implode(",",$_POST['category']);

$name=$_POST['filter_name'];
$value=$_POST['value'];	

if(isset($_POST['active_filter']))
	$status=1;
	
else
	$status=0;
	
$sql="insert into filters(name,val,status,category) values('".$name."', '".$value."', '".$status."', '".$cat."')";

if(mysqli_query($con,$sql))
{
	echo 'Filter Added Successfully';
	die();
}
else
{
	echo 'fail';
	die();
}
}


?>
