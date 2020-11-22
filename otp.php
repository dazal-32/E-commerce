<?php
require('connection.php');
require('function2.php');
if(isset($_POST['regmail'])){
$regmail=$_POST['regmail'];
$queryi="select * from users where email='$regmail'";
$numi=mysqli_query($con,$queryi);
$ri=mysqli_num_rows($numi);
if($ri>0){
	echo "exist";
}
else{
	$otp=rand(1111,9999);
	$_SESSION['OTP']=$otp;
	$email="ayondip2001@gmail.com";
	$to=$_POST['regmail'];
	$subject='OTP';
	$message="Your OTP is: ".$otp;
	$headers="From: ".$email;
	if(mail($to,$subject,$message,$headers)){
			echo "OTP has been sent to your email id.";
		} 	
		//echo "OTP has been sent to your email id. $otp";
 }
}
 ?>