<?php
include_once 'db.php';

if(isset($_POST['id']))
{
	
$sql=mysqli_query($con,"select * from sub_categories where active=1 and parent=".$_POST['id']);

$res='<option value="" >--Choose Sub Category--</option>';
while($row=mysqli_fetch_array($sql))
{

$res.='<option value="'.$row['id'].'"><b>'.$row['name'].'</b></option>';
}
echo $res;

}

?>