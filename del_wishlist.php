<?php
require('connection.php');
require('function2.php');
if($_POST['wish_user_id']!=''&&$_POST['wish_id']!=''){
 	$wish_user_id=$_POST['wish_user_id'];
 	$wish_id=$_POST['wish_id'];
   $wish_query="delete from wishlist where user_id='$wish_user_id' and product_id='$wish_id'";
mysqli_query($con,$wish_query);
echo "Item Removed From Wishlist";
 }
 ?>