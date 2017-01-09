<?php
include_once 'db.php';

if(isset($_POST) && !empty($_POST))
{
$response=array();
$id=$_POST['id'];
$cat=mysqli_query($con,"select * from categories");

$res=mysqli_query($con,"select id,parent from sub_categories where id=".$id);

$result=mysqli_fetch_array($res);


$response['id']=$result['id'];

$arr=explode(",",$result['parent']);
$html='';
while($pmap=mysqli_fetch_assoc($cat))
{
   if(in_array($pmap['id'],$arr))
	   $html.='<option value="'.$pmap['id'].'" selected >'.$pmap['name'].'</option>';
   else
	   $html.='<option value="'.$pmap['id'].'" >'.$pmap['name'].'</option>';

}

$response['parent']=$html;

echo json_encode($response);
die();

}

?>