<?php
session_start();
$con= mysqli_connect('0.0.0.0:3306','root','root');
mysqli_select_db($con,'Ecom');
/*$con= mysqli_connect('localhost','u540231764_Ayon_3','Ayon+Dd3');
mysqli_select_db($con,'u540231764_Ecom');*/
// $con= mysqli_connect('sql306.epizy.com','epiz_27140356','u1W4wjPNrZB');
//mysqli_select_db($con,'epiz_27140356_Ecom');
/*$con= mysqli_connect('localhost','id14878184_rootayon','Ayondip_*_ecom@3');
mysqli_select_db($con,'id14878184_ecom');
if($con)
{
echo"conected";
}
else{
echo"not conected";
}*/
?>