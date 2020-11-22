<?php 
require('connection.php');
require('function2.php');

if($_POST['id']!=''){
	$g_iid=$_POST['id'];
	$fgd=mysqli_query($con,"select * from order_detail where order_id='$g_iid'");
 	while($oui=mysqli_fetch_assoc($fgd)){
	$dou=$oui['qty'];
	$capod=$oui['product_id'];
	$cty="select * from product where id='$capod'";
	$utypaes=mysqli_query($con,$cty);
 $ctypaow=mysqli_fetch_assoc($utypaes);
 $ccg=$ctypaow['qty'];	
 $dou=$dou+$ccg;
 $uhj="update product set qty='$dou' where id='$capod'";
	mysqli_query($con,$uhj);
	 }
	 $usrc="User Canceled";
	 mysqli_query($con,"update orders set order_status='$usrc' where id='$g_iid'");
	 echo "Order Canceled";
	}
?>