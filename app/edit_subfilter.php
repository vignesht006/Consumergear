<?php
include_once 'db.php';

if(isset($_POST) && !empty($_POST))
{
	$response=array();
	$id=$_POST['id'];
	
		$res=mysqli_query($con,"select * from sub_filters where id=".$id);
		$result=mysqli_fetch_array($res);
		$response['id']=$result['id'];
		$response['name']=$result['name'];
		$response['status']=$result['status'];
		$response['parent']=$result['parent_filter'];
		$response['ans']=$result['value'];

		echo json_encode($response);
		die();

	
	
	
}
?>