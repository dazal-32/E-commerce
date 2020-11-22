<?php
require('connection.php');
require('function2.php');
if(isset($_POST['da'])){
$u_id=$_SESSION['USER_ID'];
	$sqlio="select * from users_cart where use_id='$u_id;'";
	$result=mysqli_query($con,$sqlio);
	$count=mysqli_num_rows($result);
	$ctt='';
	if($count>0){
		$ctt=$count;
	}
	else{
		$ctt=0;
	}
	echo $ctt;
}
?>