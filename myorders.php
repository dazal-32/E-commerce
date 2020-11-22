<?php
require('head.php');
$user_id=$_SESSION['USER_ID'];
if($user_id>0){
$order_sql="select * from orders where u_id='$user_id' order by id desc";
$ores=mysqli_query($con,$order_sql);
 ?>
 

<div class="mainbody">
 <div class="cart-container">
	<div class="cart-container-center">
		
		<table class="table1">
				<thead>
											<tr class="trt">							
													<th></th>						
													<th></th>
													<th></th>
													<th></th>
												</tr>
										</thead>
			<tbody>
 <?php	
 $otail_arr=array();
while($orow=mysqli_fetch_assoc($ores)){
	$otail_arr[]=$orow;
}
foreach($otail_arr as $list){
$oid=$list['id'];
$detail_sql="select * from order_detail where order_id='$oid'";
$dres=mysqli_query($con,$detail_sql);
$detail_arr=array();
 while($drow=mysqli_fetch_assoc($dres)){	
  $detail_arr[]=$drow;
 }
 
    foreach($detail_arr as $lists){
   $pro_ductid=$lists['product_id'];
   $product_sql="select * from product where id='$pro_ductid'";
 $pres=mysqli_query($con,$product_sql);
$prow=mysqli_fetch_assoc($pres);
    ?>											
<tr class="trt" >	
<td class="od-image"><a href="product_detail.php?type=gyas&id=<?php echo $prow['id']; ?>"><img src="product/<?php echo $prow['image']; ?>"></a></td>		
<td class="od-detail"style="text-align:left;padding:0 0 0 9em;">
	<p><h4><?php echo $prow['name']; ?></h4></p>
	<p class="mini od-fade" style="margin:0;"><em>MRP: <?php echo $prow['mrp']; ?></em></p>
	<p class="mini" style="margin:0;">Selling Price:<?php	 echo $lists['price']; ?> </p>
	<p class="od-fade">Quantity: <?php	 echo $lists['qty']; ?></p>
	<p>Payment Type: <?php	 echo $list['payment_type']; ?> <span class="od-fade">(<?php	 echo $list['payment_status']; ?>)</span></p>
	<p>Order Status:<strong style="color:green;"><?php	 echo $list['order_status']; ?>  </strong></p>
		<p>Address: <span class="od-fade" style="margin:0;font-size:0.7em;">
		<?php
			echo "<br>";
		 echo $list['name']; 
		 echo "<br>";
		 echo $list['address']; 
		 echo "<br>";
		 echo $list['road']; 
		 echo "<br>";
		 echo $list['pin']; 
		 echo "<br>";
		 echo $list['mobile']; 
		 echo "<br>";
		 echo $list['city']; 
		 echo "<br>";
		 echo $list['state']; 
		?>
		</span>
		</p>
</td>	
<td>			
</td>
<td></td>
</tr>
 <?php	} ?>
   <tr><td>
    	<?php	 
	 $vfy=$list['order_status']; 
	 if($vfy!="Order Delivered"&&$vfy!="User Canceled"&&$vfy!="Return Requested"&&$vfy!="Return Approved"&&$vfy!="Returned"&&$vfy!="Order Canceled"){
	 	?>
   <button class="buyu" style="width:5em;border-radius:10px;background:red;"onclick="cnclodr(<?php echo $list['id']; ?>)">Cancel</button>
  <?php	
   } 
  else if($vfy=="User Canceled")
  {
  	?> 
   <button class="buyu" style="width:5em;border-radius:10px;background:#EF7B7B;"disabled>Canceled</button>
  <?php
   }
    else if($vfy=="Order Delivered")
    {
    	?>
  <a href="return.php?type=returnasqrr&&id=<?php  echo $list['id']; ?>"> <button class="buyu" style="width:5em;border-radius:0px;background:black;">Return</button></a>
  <?php   
  } else if($vfy=="Return Requested")
    {
  ?>
  <button class="buyu" style="width:10em;border-radius:0px;background:#262626;font-size:10px;"disabled>Return Requested</button>
  
  <?php } else if($vfy=="Return Approved" || $vfy=="Returned")
    { 
    ?>
     <span style="width:10em;border-radius:0px;background:#CCCCCC;font-size:10px;padding:0.6em"disabled>
     <?php 
     echo $vfy;
     ?>
     </span>
    <?php } ?>
   </td><td>
   <strong>Total Price: </strong><em style="color:green;"><?php	 echo $list['total_price']; ?></em>		</td>
   <td>
   	<?php	 
	 $vfy=$list['order_status']; 
	 if($vfy=="Order Delivered"){
	 	?>
   <p style="margin-top:1em;"><a href="invoice.php?id=<?php  echo $list['id']; ?>"><button class="buyu" style="width:5em;border-radius:0px;">Invoice</button></a></p>
<?php	 } ?>
 </td></tr><tr><td></td><td></td><td></td></tr>
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