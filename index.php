<?php	
require('head.php');
$sqli="select * from banner where status='1'";
 $resu=mysqli_query($con,$sqli);
 $ban_arr=array();
 while($roww=mysqli_fetch_assoc($resu)){	
  $ban_arr[]=$roww;
 } 
 $sql_i="select * from product where status='1' order by id desc";
 $re_su=mysqli_query($con,$sql_i);
 $get_product=get_product($con,'latest',6,'','');
/* while($ro_ww=mysqli_fetch_assoc($re_su)){	
  $get_product[]=$ro_ww;
 }*/
?>	
<div class="mainbody">
	<div class="banner">
		 <div class="bannercenter">
		 <div class="swiper-container">
		 	 <div class="swiper-wrapper">
		  <?php	
    foreach($ban_arr as $lists){
    ?>									
		 	 <div class="swiper-slide">
		 	 	<img src="product/<?php	 echo $lists['image']; ?>">
		 	 </div>  
		 	 <?php	
    }
    ?>									
		  </div>
		   <!-- Add Pagination --> 
		   <div class="swiper-pagination"></div> 
	  </div>
		</div>
	</div>
	<div class="new-arrival">
	 <div class="new-arrival-center">
	  <div class="center-heading">
	  <h4>New Arrival</h4>
	 </div>
    <div class="product-arrival-container">
    	
        <?php
 foreach($get_product as $list){
 ?>
    	
   <a href="product_detail.php?type=gyas&id=<?php 	echo $list['id'];	?>">
  	  <div class="product-box">
    	 <div class="product-box-image">
    	   <img src="product/<?php	 echo $list['image']; ?>">
     	</div>
     	<div class="product-price-name">
    	   <p><?php 	echo $list['name'];	?>	</p>
    	   <p>
    	   <span>MRP:<?php	echo $list['mrp'];	?>	 &nbsp;|&nbsp;</span>
    	   <span>selling price:<?php	echo $list['price'];	?>	</span>
    	   </p>
     	</div>
    	</div>
   	</a>
  <?php 
  } 
  ?> 	
   
 	 </div>
 </div>
</div>

<div class="best-arrival">
	 <div class="best-arrival-center">
	 <div class="center-heading">
	 <h4> Best Seller</h4>
	 </div>
    <div class="product-arrival-container">
    	
        <?php
     $sql_ib="select * from product where best_sell='1'";
 $re_sub=mysqli_query($con,$sql_ib);
 $get_productb=array();
 while($ro_wwb=mysqli_fetch_assoc($re_sub)){	
  $get_productb[]=$ro_wwb;
 }
 foreach($get_productb as $list){
 ?>
    	
   <a href="product_detail.php?type=gyas&id=<?php 	echo $list['id'];	?>">
  	  <div class="product-box">
    	 <div class="product-box-image">
    	   <img src="product/<?php	 echo $list['image']; ?>">
     	</div>
     	<div class="product-price-name">
    	   <p><?php 	echo $list['name'];	?>	</p>
    	   <p>
    	   <span>MRP:<?php	echo $list['mrp'];	?>	 |</span>
    	   <span>selling price:<?php	echo $list['price'];	?>	</span>
    	   </p>
     	</div>
    	</div>
   	</a>
  <?php 
  } 
  ?> 	   
 	 </div>
 </div>
</div>



<script src="assets/js/swiper.min.js" type="text/javascript"></script>
<script>
		var swiper = new Swiper('.swiper-container', { spaceBetween: 30,loop: true, centeredSlides: true, autoplay: { delay: 2500, disableOnInteraction: false, }, pagination: { el: '.swiper-pagination', clickable: true, }, navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', }, });				 
</script>
 <?php
require('foot.php');
 ?>