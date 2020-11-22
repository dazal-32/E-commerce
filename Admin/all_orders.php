<?php
require('header.php');
$order_sql="select * from orders order by id desc";
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
<td><?php echo $list['id']; ?></td>
  <td class="od-image">
  <a href="o_dr_m.php?type=<?php echo $list['payment_type']; ?>&id=<?php echo $oid ?>">
  <img src="../product/<?php echo $prow['image']; ?>">
   </a>
   </td>		
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
</tr>
 <?php	
    }
    
  } 
 
 ?>							

    
		      	</tbody>						
							</table>
						
		</div>
</div>


 <?php
 require('footer.php');
 ?>