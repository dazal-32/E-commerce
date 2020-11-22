<?php
require('head.php');
$us_id=$_SESSION['USER_ID'];
$sqlis="select * from users_cart where use_id='$us_id'";
$resu=mysqli_query($con,$sqlis);	
$c=mysqli_num_rows($resu);
if($c>=1){
$sql="select product.*,users_cart.p_id,users_cart.qty from product,users_cart where users_cart.use_id='$us_id' && product.id=users_cart.p_id";
	$res=mysqli_query($con,$sql);	
	$cart_arr=array();
 while($row=mysqli_fetch_assoc($res)){	
  $cart_arr[]=$row;
 }
 ?>
 
<div class="mainbody">
	<div class="check-container">
	 <div class="check-container-box">
	 	 <div class="check-container-box-sub">	 	 	
	 	  <div class="check-container-i" id="check-i">
		   <div class="ch-name">
		    <span>Address</span>
		     <button id="ch1"onclick="checkoutshow()">&#x271B;</button>
		      <button id="ch2"onclick="checkouthide()">&#x268A;</button>
		      	</div>
			      	<div class="ch-list" id="ch-li">
		         <input type="text" name="addname" placeholder="Enter your name" id="addname" required>
   				      <br>
   		 	       <input type="text" name="addhouse" placeholder="Enter Bulding Address,House No." id="addhouse" required>
   		      	<br>
   			    <input type="text" name="addroad" placeholder="Road Name,Colony Name" id="addroad" required>
   			   <br>
   		   <input type="number" name="addpin" id="addpin" placeholder="Pincode"required></input>
   		  <br>
   		 <input type="number" name="addnum" id="addnum" placeholder="Mobile"required></input>
   		<br>
   <input type="text" name="addcity" id="addcity" placeholder="City"required></input>
 <br>
  <input type="text" name="addstate" id="addstate" placeholder="State"required></input>
		 	</div>
		   </div>
	      <div class="check-container-i" id="check-i1">
		      <div class="ch-name">
		       <span>Payment Method</span>
		        <button id="ch11"onclick="checkoutshow1()">&#x271B;</button>
		         <button id="ch21"onclick="checkouthide1()">&#x268A;</button>
		         	</div>
				       <div class="ch-list" id="ch-li1">
			       <select id="ch-select" name="ch-select" style="margin-top:4em;margin-bottom:3em;outline:none;">
			     	<option>Select Payment Method</option>
				   	<option>COD</option>
				 	 <option>PayU</option>
		   	</select>
		  	</div>
		 </div>	 
		</div>
	 	  	<div class="check-container-box-sub">
	 	 		 <div class="tbdv">
	 	 	   <table>
	 	 	 	   <tbody>
	 	 	 	   <?php	
	 	 	 	   	$total_price=0;
        foreach($cart_arr as $lists){
       	$total_price=$total_price+($lists['qty']*$lists['price']);
        ?>											
	 	 	 	   	<tr>
	 	 	 	  		<td class="tleft"><?php	 echo $lists['name']; ?></td>		
	 	 	 	  		<td class="tcenter"><?php	 echo $lists['qty']; ?></td>		
	 	 	 	  		<td class="tright"><?php	 echo $lists['price']; ?></td>		
	 	 	 	  	</tr>
	 	 	 	  	<?php	
      }
     ?>				   
	 	 	 	 </tbody>
	 	 	 	</table>
	 	 	</div>
	 	 	 	<table style="margin:2em 0 0 0;">
	 	 	 	  <thead>
	 	 	 	  		<th class="tleft">Grand Total</td>		
	 	 	 	  		 <th class="tright" id="od-total">Rs: <?php	
	 	 		  		  echo $total_price;
	 	 	 	     ?></td>		
	 	 	 	    </thead>	 	 	 	  	 	 	 	  
	 	 	 	   </table>
	 	 	 	   <button class="buy transparent-h" onclick="addorder(<?php	 echo $total_price; ?>)">Checkout</button>
	   </div>
	 	 	</div>
	 </div>
 </div>
	

 <?php
 require('foot.php');
}
else
{
	?>
		<script>
alert('Nothing in Cart.');
window.location.href="cart.php";
		</script>
	<?php
} 
 ?>