<?php
require('connection.php');
require('function2.php');
if($_POST['up_user_id']!=''&&$_POST['up_product_id']!=''&&$_POST['up_qty']!='')
 {
 $user_id=$_POST['up_user_id'];	 
 $product_id=$_POST['up_product_id'];	
 $qty=$_POST['up_qty'];
 	$l="select * from product where id='$product_id'";
	$s=mysqli_query($con,$l);
 $w=mysqli_fetch_assoc($s);
 $q=$w['qty'];	
 if($qty>$q){
 	   echo "Quantity not in stock";   
 }
 else{
 	  $query="update users_cart set qty='$qty' where use_id='$user_id' && p_id='$product_id'";
mysqli_query($con,$query);
echo "Product Quantity Updated";
   }   
 }  
 ?>