<?php
require('connection.php');
require('function2.php');

if($_POST['addname']!=''&&$_POST['addhouse']!=''&&$_POST['addroad']!=''&&$_POST['addpin']!=''&&$_POST['addnum']!=''&&$_POST['addcity']!=''&&$_POST['addstate']!=''&&$_POST['addpay']!=''&&$_POST['addtotal']!=''){
	
$user_id=get_safe_value($con,$_SESSION['USER_ID']);
$addname=get_safe_value($con,$_POST['addname']);
$addhouse=get_safe_value($con,$_POST['addhouse']);
$addroad=get_safe_value($con,$_POST['addroad']);
$addpin=get_safe_value($con,$_POST['addpin']);
$addnum=get_safe_value($con,$_POST['addnum']);
$addcity=get_safe_value($con,$_POST['addcity']);
$addstate=get_safe_value($con,$_POST['addstate']);
$addpay=get_safe_value($con,$_POST['addpay']);
$addtotal=get_safe_value($con,$_POST['addtotal']);
$pay_id='';
$txnid='';
$status='';
$order_status="Pending";
$added_on=date('Y-m-d h:i:s');
    if($addpay=='COD'){
	     $payment_status='Pending';
    	}
    	
 	$sqlty="insert into orders(u_id,name,address,road,pin,mobile,city,state,total_price,payment_type,payment_status,order_status,mihpayid,txnid,payu_status,added_on) values('$user_id','$addname','$addhouse','$addroad','$addpin','$addnum','$addcity','$addstate','$addtotal','$addpay','$payment_status','$order_status','$pay_id','$txnid','$status','$added_on')" ;
  $ss=mysqli_query($con,$sqlty);
 $sqlo="select product.*,users_cart.p_id,users_cart.qty from product,users_cart where users_cart.use_id='$user_id' && product.id=users_cart.p_id";
	$reso=mysqli_query($con,$sqlo);
	
	$c_arr=array();
 while($riow=mysqli_fetch_assoc($reso)){	
  $c_arr[]=$riow;
 } 
 $abl="select * from orders where u_id='$user_id' order by id desc";
	$aes=mysqli_query($con,$abl);
 $aow=mysqli_fetch_assoc($aes);
 $recent=$aow['id']; 
 foreach($c_arr as $lists)
 { 	 
 	  $productid=$lists['id'];
 	  $qty=$lists['qty'];
 	  $price=$lists['price']; 	  
 	   	$sq="insert into order_detail(order_id,product_id,price,qty) values('$recent','$productid','$price','$qty')" ;
  mysqli_query($con,$sq); 	  
 }  
 $pabl="select * from product where id='$productid'";
	$paes=mysqli_query($con,$pabl);
 $paow=mysqli_fetch_assoc($paes);
 $stq=$paow['qty'];
 $stq=$stq-$qty;
 $updpabl="update product set qty='$stq' where id='$productid'";
	mysqli_query($con,$updpabl);
 
 	echo "Order Placed Successfully.";
 	$queri="delete from users_cart where use_id='$user_id'";
$zz=mysqli_query($con,$queri);
}
else{
	echo "Bad Request";
}
?>