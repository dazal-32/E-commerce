<?php
require('head.php');
if($_SESSION['USER_LOGIN']=="YES"){
	$u_id=$_SESSION['USER_ID'];
$sql="select product.*,users_cart.p_id,users_cart.qty from product,users_cart where users_cart.use_id='$u_id' && product.id=users_cart.p_id";
	$res=mysqli_query($con,$sql);
	
	$sqli="select * from users_cart where use_id='$u_id'";
 $ress=mysqli_query($con,$sqli);
 $roww=mysqli_fetch_assoc($ress);
	
	
	$cart_arr=array();
 while($row=mysqli_fetch_assoc($res)){	
  $cart_arr[]=$row;
 }
 ?>
 
 <div class="mainbody">	
	
<div class="cart-container">
	<div class="cart-container-center">
		
		<table class="table">
										<thead>
											<tr class="trt">	
													<th>s/l</th>																	
													<th>Image</th>						
													<th>Name</th>
													<th>Qty</th>
													<th>Price</th>
													<th>Action</th>
												</tr>
										</thead>
											<tbody>
							 <?php	
							 $i=1;
    foreach($cart_arr as $lists){
    ?>												
		      <tr class="trt">	
         	<td><?php	 echo $i; $i++; ?> </td>		
							  	<td><img src="product/<?php	 echo $lists['image']; ?>"></td>
		        <td><?php	 echo $lists['name']; ?></td>
		       	<td><input type="number" id="<?php	 echo $lists['id']; ?>qty" placeholder="<?php	 echo $lists['qty']; ?>"></td>		
		        <td> 	<p class="mini" style="text-decoration:strike;color:#AAAAAA;"><em>Price: <?php	 echo $lists['mrp']; ?>	</em></p>
	  		<p class="mini"style="color:#000;">Selling Price: <?php	 echo $lists['price']; ?>	</p></td>																							
         	<td><span style='background:#FF3A3A;border-radius:10px;
	padding:0.3em;
	margin-left:0.2em;'> <a style="color:#fff;text-decoration:none;" href="javascript:void(0)"onclick="Delmart(<?php	echo 	$_SESSION['USER_ID'];	?>,<?php	 echo $lists['id']; ?>)"> Delete </a> </span>
	<span style='background:#0EBB59;border-radius:10px;
	padding:0.4em;
	margin-left:0.2em;'> <a style="color:#fff;text-decoration:none;" href="javascript:void(0)"onclick="Upmart(<?php	echo 	$_SESSION['USER_ID'];	?>,<?php	 echo $lists['id']; ?>)"> Update </a> </span>
	 </td>
	       </tr>
	    <?php	
   }
    ?>				    
					  					</tbody>
						
						
							</table>	
								<a href="checkout.php"	><button class="f-right">Checkout</button></a>			
		</div>
		
</div>


 <?php
 require('foot.php');
}
else{
		?>
	<script>
alert('Login to Access Cart.');
window.location.href="user_login_reg.php";
		</script>
	<?php
}
 ?>