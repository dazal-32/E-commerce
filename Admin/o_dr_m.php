<?php
require('header.php');
$g_id=get_safe_value($con,$_GET['id']); 
$g_type=get_safe_value($con,$_GET['type']); 
 if(isset($_POST['updatestat'])){
 	 $up_sta=$_POST['updatestat'];
 	 
 	 if($up_sta=="Update Status"){
 	 	  ?>
 	 	   <script>
  	 alert("Not alowed");
  	 window.location.href="all_orders.php";
  	 </script>
 	 	  
 	 	  <?php
 	 	  die();
 	 }
 	 
 	 if($up_sta=="Order Delivered"&&$g_type=="COD"){
 	 	$up_stai="Successfull";
 	 }else{
 	 	$up_stai="Pending";
 	 } 	 
 	 if($up_sta=="Order Delivered"&&$g_type=="PayU"){
 	 	$up_stai="Successfull";
 	 }
 	if($up_sta=="Order Canceled"){ 	 	
 	$fdod=mysqli_query($con,"select * from order_detail where order_id='$g_id'");
 	while($orowui=mysqli_fetch_assoc($fdod)){
	$cou=$orowui['qty'];
	$upod=$orowui['product_id'];
	$utypabl="select * from product where id='$upod'";
	$utypaes=mysqli_query($con,$utypabl);
 $utypaow=mysqli_fetch_assoc($utypaes);
 $uustq=$utypaow['qty'];	
 $cou=$cou+$uustq;
 $updpa="update product set qty='$cou' where id='$upod'";
	mysqli_query($con,$updpa);
}
 	 } 	  	 
 	 	if($up_sta=="Returned"){ 	 	
 	$fdod=mysqli_query($con,"select * from order_detail where order_id='$g_id'");
 	while($orowui=mysqli_fetch_assoc($fdod)){
	$cou=$orowui['qty'];
	$upod=$orowui['product_id'];
	$utypabl="select * from product where id='$upod'";
	$utypaes=mysqli_query($con,$utypabl);
 $utypaow=mysqli_fetch_assoc($utypaes);
 $uustq=$utypaow['qty'];	
 $cou=$cou+$uustq;
 $updpa="update product set qty='$cou' where id='$upod'";
	mysqli_query($con,$updpa);
}
 	 } 	 
  	 $up_ql="update orders set order_status='$up_sta' where id='$g_id'";
 	 mysqli_query($con,$up_ql);
 	  $up_qli="update orders set payment_status='$up_stai' where id='$g_id'";
 	 mysqli_query($con,$up_qli);
 }
$order_sql="select * from orders where id='$g_id'";
$ores=mysqli_query($con,$order_sql);
 ?>
<div class="mainbody">
<div class="cart-container">
	<div class="cart-container-center">
		<table class="table1">
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
<td class="od-image"><img src="../product/<?php echo $prow['image']; ?>"></td>		
<td class="od-detail"style="text-align:left;padding:0 0 0 9em;">
	<p><h4><?php echo $prow['name']; ?></h4></p>
	<p class="mini od-fade" style="margin:0;"><em>MRP: <?php echo $prow['mrp']; ?></em></p>
	<p class="mini" style="margin:0;">Selling Price:<?php	 echo $lists['price']; ?> </p>
	<p class="od-fade">Quantity: <?php	 echo $lists['qty']; ?></p>
	<p>Payment Type: <?php	 echo $list['payment_type']; ?> <span class="od-fade">(<?php	 echo $list['payment_status']; ?>)</span></p>
	<p>Order Status: <strong style="color:green;"><?php	 echo $list['order_status']; ?>  </strong></p>
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
</tr>
 <?php	
    }    
  }  
 if($list['order_status']=="Return Requested" || $list['order_status']=="Return Approved" || $list['order_status']=="Returned"){
 ?>					
 <tr class="trt">
  <td>
  <h4>Returned For:<br> <span style="color:crimson">
   <?php 
   $rid=$list['id'];
   $ror_r=mysqli_fetch_assoc(mysqli_query($con,"select * from returns where od_id='$rid'"));
   echo $ror_r['problems'];
   ?>
   </span>
   </td>
 </tr>		
 <?php } ?>
		      	</tbody>						
	</table>
		</div>
				<strong>Total Price: </strong><em style="color:green;"><?php	 echo $list['total_price']; ?></em>
		<form method="post">
		<div class="update">
		<p style="margin:1em;">
		<strong>Current Status: </strong><em style="color:green;"><?php	 echo $list['order_status']; ?></em>
		</p>
		<select name="updatestat">
		 <option>Update Status</option>
		 <?php if($list['order_status']=="Order Delivered" || $list['order_status']=="Order Canceled" || $list['order_status']=="User Canceled"){ ?>
		  <option disabled>Pending</option>
		  <option disabled>Order Confirmed</option>
		  <option disabled>Order Packed</option>
		  <option disabled>Order Shipped</option>
		  <option disabled>Order in transit</option>
		  <option disabled>Order Delivered</option>
		  <option disabled>Order Canceled</option>
		  <?php } else if($list['order_status']=="Return Requested" || $list['order_status']=="Return Approved" || $list['order_status']=="Returned"){ ?>
		  <option disabled>Pending</option>
		  <option disabled>Order Confirmed</option>
		  <option disabled>Order Packed</option>
		  <option disabled>Order Shipped</option>
		  <option disabled>Order in transit</option>
		  <option disabled>Order Delivered</option>
		  <option disabled>Order Canceled</option>
		  <option>Return Approved</option>
		  <option>Returned</option>
		  <?php } else { ?>
		  <option>Pending</option>
		  <option>Order Confirmed</option>
		  <option>Order Packed</option>
		  <option>Order Shipped</option>
		  <option>Order in transit</option>
		  <option>Order Delivered</option>
		  <option>Order Canceled</option>
		  <?php } ?>
		</select>
			<div class="btncn">
	  <button class="buy" type="submit" name="submit"> Update </button>
	  </div>
	</div>
	</form>
</div>
 <?php
 require('footer.php');
 ?>