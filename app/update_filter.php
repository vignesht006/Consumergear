<?php
include_once 'db.php';

if(isset($_POST))
{
$id=$_POST['id'];	
$cat=implode(",",$_POST['category']);

$name=$_POST['filter_name'];
$value=$_POST['value'];	

if(isset($_POST['active_filter']))
	$status=1;
	
else
	$status=0;
	
$sql="update filters set name='".$name."', val='".$value."', status='".$status."', category='".$category."' where id=".$id;


if(mysqli_query($con,$sql))
{
	echo 'Filter Modified ';
	die();
}
else
{
	echo 'fail';
	die();
}
}


?>
