<?php	
require('head.php');
if(isset($_POST['submit'])){
		$search_name=get_safe_value($con,$_POST['searchstr']);
		}
$search_sql="select * from product where status='1' and(name like '%$search_name%' or description like '%$search_name%')";
 $search_res=mysqli_query($con,$search_sql);
 $search_arr=array();
 while($search_row=mysqli_fetch_assoc($search_res)){	
  $search_arr[]=$search_row;
 }
$sqli="select * from banner where status='1'";
 $resu=mysqli_query($con,$sqli);
 $ban_arr=array();
 while($roww=mysqli_fetch_assoc($resu)){	
  $ban_arr[]=$roww;
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
        if(count($search_arr)>0){
 foreach($search_arr as $list){
 ?>
    	
   <a href="product_detail.php?type=gyas&id=<?php 	echo $list['id'];	?>">
  	  <div class="product-box">
    	 <div class="product-box-image">
    	   <img src="product/<?php	 echo $list['image']; ?>">
     	</div>
     	<div class="product-price-name">
    	   <p><?php 	echo $list['name'];	?>	</p>
    	   <p>
    	   <span>MRP:<?php	echo $list['mrp'];	?> &nbsp;|&nbsp;	</span>
    	   <span>selling price:<?php	echo $list['price'];	?>	</span>
    	   </p>
     	</div>
    	</div>
   	</a>
  <?php 
  } 
    }
    else{
    	echo "   No results found for $search_name";
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