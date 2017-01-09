<?php
include_once 'db.php';

if(isset($_POST) && !empty($_POST))
{
$response=array();
$id=$_POST['id'];
$parent=implode(",",$_POST['parent']);

$sql="update sub_categories set parent='".$parent."' where id=".$id;

if(mysqli_query($con,$sql))
	{
	    
			$up="update categories set hasub='1' where id in(".$parent.")";
			
			
			mysqli_query($con,$up);
		
		
		echo 'Sub Category Modified Successfully';
		die();
	}
else
{
	echo 'Fail';
		die();
}


}

?>