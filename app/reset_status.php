<?php
session_start();

if(isset($_POST) && $_POST['id'] !='')
{
unset($_SESSION['status']);
echo 1;
}

?>