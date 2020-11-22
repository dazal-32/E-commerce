<?php	
require('head.php');
$catg_id=get_safe_value($con,$_GET['id']);
$sqli="select * from banner where status='1'";
 $resu=mysqli_query($con,$sqli);
 $ban_arr=array();
 while($roww=mysqli_fetch_assoc($resu)){	
  $ban_arr[]=$roww;
 }
 
if($catg_id>0){
	$get_product= get_product($con,'none','',$catg_id,'');
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
    <div class="product-arrival-container">
    	
        <?php
        if(count($get_product)>0){
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
    }
    else{
    	echo "   No product found in this category.";
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