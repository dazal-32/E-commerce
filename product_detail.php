<?php
require('head.php');
$product_id=get_safe_value($con,$_GET['id']);
if($product_id>0){
$get_product= get_product($con,'','','',$product_id);
//prx($get_product);

}
else{
 ?>
  <script>
  window.location.href="main.php";
  </script>
 <?php
}
 ?>
 <div class="mainbody">
 	<div class="product-detail">
		<div class="product-detail-center">
		 <div class="product-detail-img">
	  <a href="product/<?php	 echo $get_product[0]['image']; ?>"> <img src="product/<?php	 echo $get_product[0]['image']; ?>"></a>
	  </div>
	  <div class="product-desc">
	  		  	<span><?php 	echo $get_product[0]['name'];	?>	</span>
	  		  		  	<p class="mini" style="text-decoration:strike;color:#AAAAAA;"><em>Price: <?php	echo $get_product[0]['mrp'];	?>	</em></p>
	  		<p class="mini"style="color:#000;">Selling Price: <?php	echo $get_product[0]['price'];	?>	</p>
	  			<p class="mini"><?php
	  			if($get_product[0]['qty']>=1 && $get_product[0]['status']==1)
	  			{
	  				echo "In Stock";
	  			}else{
	  				echo "Out of Stock";
	  			}
	  				?>	</p>
	  				
	  					<p class="product-desc-p">
	  		<?php	echo $get_product[0]['short_desc'];	?>	
	  		</p>
	  				<span style="font-size:1.1em;font-weight:bolder;">Description</span>
	  	<p class="product-desc-p">
	  		<?php	echo $get_product[0]['description'];	?>	
	  		</p>
	  </div>
	  <div class="btnbox">
	    <div class="btncn">
	 <button class="buy"onclick="addwish(<?php 	echo 	$_SESSION['USER_ID'];	?>,	<?php	echo $get_product[0]['id'];	?>)">Add to Wishlist </button>
	  </div>
	  <div class="btncn">
	  <button class="buy" onclick="myAjax(<?php	 echo 	$_SESSION['USER_ID'];	?>,	<?php	echo $get_product[0]['id'];	?>	)"><?php 
	  $user_id=$_SESSION['USER_ID'];
	  $product_id=$get_product[0]['id'];
	  $query="select * from users_cart where use_id='$user_id' && p_id='$product_id'";
$num=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($num);
$r=mysqli_num_rows($num);
if($r>0){
	echo "Added to Cart";
}else{
  echo "Add to Cart";
   }   ?> </button>
	  </div>
	  </div>
  	</div>
	</div>
 
 <?php
require('foot.php');
 ?>