<?php
include_once 'db.php';

if(isset($_POST))
{

	$id=$_POST['id'];
	$cat=$_POST['parent_filter'];

	$name=$_POST['name'];
	$value=$_POST['value'];

		$status=$_POST['status'];

				
			
				
			$sql="update  sub_filters set name ='".$name."', value='".$value."' ,status ='".$status."', parent_filter='".$cat."' where id=".$id;

			if(mysqli_query($con,$sql))
			{
				echo 'Sub Filter Modified Successfully';
				die();
			}
			else
			{
				echo 'fail';
				die();
			}
}


?>
