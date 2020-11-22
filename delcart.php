<?php
require('connection.php');
require('function2.php');
if($_POST['cart_user_id']!=''&&$_POST['cart_product_id']!='')
 {
 $user_id=$_POST['cart_user_id'];	 
 $product_id=$_POST['cart_product_id'];	 
  $query="delete from users_cart where use_id='$user_id' && p_id='$product_id'";
mysqli_query($con,$query);
echo "Product Removed";
 } 
?>