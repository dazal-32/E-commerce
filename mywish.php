<?php
require('head.php');
$user_id=$_SESSION['USER_ID'];
if($user_id>0){
$order_sql="select * from wishlist where user_id='$user_id'";
$ores=mysqli_query($con,$order_sql);
 ?>
 

<div class="mainbody">
 <div class="cart-container">
	 <div class="cart-container-center">		
		 <table class="table1">
				<thead>
											<tr class="trt">							
													<th>Image</th>						
													<th>Details</th>
													<th>Remove</th>
												</tr>
				</thead>
	  		<tbody>
 <?php	
 $otail_arr=array();
while($orow=mysqli_fetch_assoc($ores)){
	$otail_arr[]=$orow;
}
foreach($otail_arr as $list){

   $pro_ductid=$list['product_id'];
   $product_sql="select * from product where id='$pro_ductid'";
 $pres=mysqli_query($con,$product_sql);
$prow=mysqli_fetch_assoc($pres);
    ?>											
<tr class="trt" >	
<td class="od-image"><img src="product/<?php echo $prow['image']; ?>"></td>		
<td class="od-detail"style="text-align:left;padding:0 0 0 9em;">
	<p><h4><?php echo $prow['name']; ?></h4></p>
	<p class="mini od-fade" style="margin:0;"><em>MRP: <?php echo $prow['mrp']; ?></em></p>
	<p class="mini" style="margin:0;">Selling Price:<?php	 echo $prow['price']; ?> </p>
</td>	
<td>
 <span style='background:#FF3A3A;border-radius:10px;
	padding:0.3em;
	margin-left:0.2em;'> <a style="color:#fff;text-decoration:none;" href="javascript:void(0)"onclick="Delwish(<?php	echo 	$_SESSION['USER_ID'];	?>,<?php	 echo $list['product_id']; ?>)"> Remove </a> </span>
</td>
</tr>
 <?php	
    } 
 ?>							
 	 </tbody>						
	</table>
							
		</div>
</div>


 <?php
 require('foot.php');
 }else{
 	?>
  <script>
  alert('Login to Access');
  window.location.href="user_login_reg.php";
  </script>
 <?php
 }
 ?>