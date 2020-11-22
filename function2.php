<?php
 function pre($arr){
 	echo '<pre>';
 	print_r($arr);
 }
 
 function prx($arr){
 	echo '<pre>';
 	print_r($arr);
 	die();
 }
 
 function get_safe_value($con,$str){
 	if($str!=''){
 		$str=trim($str);
 		return mysqli_real_escape_string($con,$str);
  	}
 }
 function get_product($con,$type='',$limit='',$catg_id='',$product_id=''){
 	
 	 if($product_id!=''){
 	 	 $sql="select * from product where id='$product_id'";
 }
 if($catg_id!=''){
 	 	 $sql="select * from product where categories_id='$catg_id' order by id desc";
 }
 if($type=='latest')
 {
 	 $sql="select * from product where status='1' order by id desc";
}
if($limit!='')
 {
 	 $sql="select * from product where status='1' order by id desc limit $limit";
 }
 
 $res=mysqli_query($con,$sql);
 $product_arr=array();
 while($row=mysqli_fetch_assoc($res)){	
  $product_arr[]=$row;
 }
 	 return $product_arr;
 }	 
 
?>