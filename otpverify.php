<?php
require('connection.php');
require('function2.php');
if(isset($_POST['resotp'])){
	$resotp=$_POST['resotp'];
	$pre_otp=$_SESSION['OTP'];
	if($resotp==$pre_otp){
		unset($_SESSION['OTP']);
		echo "ok";
		$_SESSION['VERIFY']=1;
	}
	else{
		echo "fail";
		$_SESSION['VERIFY']=0;
	}
}
?>