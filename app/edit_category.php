<?php
include_once 'db.php';

if(isset($_POST) && !empty($_POST))
{
$response=array();
$id=$_POST['id'];
$type=$_POST['type'];
if($type==0){
$res=mysqli_query($con,"select * from categories where id=".$id);
$result=mysqli_fetch_array($res);
$response['id']=$result['id'];
$response['name']=$result['name'];
$response['status']=$result['active'];

echo json_encode($response);
die();

}
else
{
$res=mysqli_query($con,"select * from sub_categories where id=".$id);
$result=mysqli_fetch_array($res);
$response['id']=$result['id'];
$response['name']=$result['name'];
$response['status']=$result['active'];

echo json_encode($response);
die();	
}
}


?>