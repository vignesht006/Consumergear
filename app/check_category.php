<?php
include_once 'db.php';


if(isset($_POST))
{

if(isset($_POST['func']) && $_POST['func']=='category')
{
	$uname=$_POST['name'];
	
	$ml=mysqli_query($con,"select * from categories where name='".$uname."'");

if(mysqli_num_rows($ml)>0)
{
echo '1';
}
else
	echo '0';

	
}
else
{
$uname=$_POST['name'];

$ml=mysqli_query($con,"select * from sub_categories where name='".$uname."'");

if(mysqli_num_rows($ml)>0)
{
echo '1';
}
else
	echo '0';

}

}

?>