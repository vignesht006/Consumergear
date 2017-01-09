<?php
include_once 'db.php';

if(isset($_POST))
{

	$cat=$_POST['parent_filter'];

	$name=$_POST['name'];
	$value=$_POST['value'];

	if(isset($_POST['status']))
		$status=1;

		else
			$status=0;

			
			mysqli_query($con, "update filters set has_sub='1' where id=".$cat);
			
			$sql="insert into sub_filters(name,value,status,parent_filter) values('".$name."', '".$value."', '".$status."', '".$cat."')";

			if(mysqli_query($con,$sql))
			{
				echo 'Sub Filter Added Successfully';
				die();
			}
			else
			{
				echo 'fail';
				die();
			}
}


?>
