<?php
//echo '<b>Transaction In Process, Please do not reload</b>';
require('connection.php');
require('function2.php');
$payment_mode=$_POST['mode'];
$pay_id=$_POST['mihpayid'];
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$MERCHANT_KEY = "gtKFFx"; 
$SALT = "eCwWELxi";
$udf5='';
$keyString 	= $MERCHANT_KEY .'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
$keyArray 	= explode("|",$keyString);
$reverseKeyArray = array_reverse($keyArray);
$reverseKeyString =	implode("|",$reverseKeyArray);
$saltString     = $SALT.'|'.$status.'|'.$reverseKeyString;
$sentHashString = strtolower(hash('sha512', $saltString));


if($sentHashString != $posted_hash){
	$statusse="Failed";
	mysqli_query($con,"update orders set payment_status='$statusse',payu_status='$status', mihpayid='$pay_id' where txnid='$txnid'");	
	?>
	<script>
		window.location.href='payment_fail.php';
	</script>
	<?php	
}else{
	$statusse="Successfull";
	mysqli_query($con,"update orders set payment_status='$statusse',payu_status='$status', mihpayid='$pay_id' where txnid='$txnid'");	
	
	
	?>
	<script>
		window.location.href='myorders.php';
	</script>
	<?php	
}
?>