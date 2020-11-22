<?php
session_start();


$con= mysqli_connect('0.0.0.0:3306','root','root');
mysqli_select_db($con,'Ecom');

 
if(!isset($_SESSION['USER_ID']))
{
	$_SESSION['USER_ID']='0';
	}
/*if($con)
{
echo"conected";
}
else{
echo"not conected";
}*/
?>
