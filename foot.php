 <div class="foot">
 	 <div class="foot-center">
 	 	   <div class="foot-sub">
 	 	  <span class="span-head">
 	 	  	About Us
 	 	  	</span>
 	 	  	<p class="abpara">
 	 	  		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
 	 	  	</p>
 	 	  	<div class="social">
 	 	  		 <div class="social-sub">
 	 	  		 	<a href="#">
 	 	  		 		<img src="assets/img/insta.jpg">
 	 	  		 	</a>
 	 	  		 	</div>
 	 	  		 	 <div class="social-sub">
 	 	  		 	 	 	<a href="#">
 	 	  		 		<img src="assets/img/fb.jpg">
 	 	  		 	</a>
 	 	  		 	</div>
 	 	  		 	 <div class="social-sub">
 	 	  		 	 	 	<a href="#">
 	 	  		 		<img src="assets/img/linked.jpg">
 	 	  		 	</a>
 	 	  		 	</div>
 	 	  		 	 <div class="social-sub">
 	 	  		 	 	 	<a href="#">
 	 	  		 		<img src="assets/img/google.jpg">
 	 	  		 	</a>
 	 	  		 	</div>
 	 	   	</div>
 	 	   	<span class="span-head">
 	 	  	My Account
 	 	  	</span>
 	 	  	<ul>
 	 	  		<?php 
		if(isset($_SESSION['USER_LOGIN'])){
			?>
 	 	  		 <li><a href="myac.php">My Account</a></li>
 	 	  		 <li><a href="cart.php">My Cart</a></li>
 	 	  		 <li><a href="mywish.php">Wishlist</a></li>
 	 	  		 <li><a href="checkout.php">Checkout</a></li>
 	 	  		<?php 
		} else {
			?> 
 	 	  		 <li><a href="user_login_reg.php">Login</a></li>
 	  	<?php } ?> 	  		 
 	 	  	</ul>
 	   	</div>
 	   	 <div class="foot-sub">
 	   	 	 	<span class="span-head">
 	 	  	INFORMATION
 	 	  	</span>
 	  	<ul class="sub">
 	 	  		 <li><a href="abt.php">About Us</a></li>
 	 	  		 <li><a href="t&c.php">Terms & Condition</a></li>
 	 	  		 <li><a href="pp.php">Privacy Policy</a></li>
 	 	  	</ul>
 	 	</div>
	 <div class="copyright">
	 ©copyright Ayondip Jana
	 </div>
	</div>
</div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/clientmain.js" type="text/javascript"></script>
</body>
</html>