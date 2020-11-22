<?php
require('connection.php');
require('function2.php');
if($_POST['user_id']!=''&&$_POST['product_id']!=''&&$_POST['qty']!='')
{
 $user_id=$_POST['user_id'];	 
 $product_id=$_POST['product_id'];	
 $qty=$_POST['qty']; 
  $query="select * from users_cart where use_id='$user_id' && p_id='$product_id'";
$num=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($num);
$r=mysqli_num_rows($num);
if($r>0){
	echo "Product is already in cart.";
}else{
	$sql="insert into users_cart(use_id,p_id,qty) values('$user_id','$product_id','$qty')" ;
  mysqli_query($con,$sql);
  echo "Product Added Successfully.";
   }   
 } 
?>