<?php
require('connection.php');
require('function2.php');
 if($_POST['wish_user_id']!=''&&$_POST['wish_product_id']!=''){
 	$wish_user_id=$_POST['wish_user_id'];
 	$wish_product_id=$_POST['wish_product_id'];
 	$wish_add=date('Y-m-d h:i:s');
 	 	if(mysqli_num_rows(mysqli_query($con,"select * from wishlist where user_id='$wish_user_id' and product_id='$wish_product_id'"))>0){
 	 		echo "Product is Already in Wishlist";
 	 	}
 	else{
 	$wish_insert="insert into wishlist(user_id,product_id,added_on) values('$wish_user_id','$wish_product_id','$wish_add')";
		 	mysqli_query($con,$wish_insert);
		 	echo "Product Added To Wishlist";
		 	}
 }
 ?>