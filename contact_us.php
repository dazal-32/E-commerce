<?php	
require('head.php');
?>	
<div class="mainbody"style="background:rgba(0,0,0,0.9);">
<div class="contact-container">
<div class="contact-center">
	<h3>Contact Us</h3>
   <form method="post" autocomplete="off" action="contact_handler.php">
   			<input type="text" name="name" placeholder="Enter your name" required>
   				<br>
   			<input type="email" name="email" placeholder="Email" required>
   				<br>
   						<input type="number" name="mobile" placeholder="Mobile" required>
   				<br>
   		 <textarea name="Comment" placeholder="Your Message"required></textarea>
   				<div class="btncn">
	  <button class="buy transparent-h" type="submit" name="submit"> Send </button>
	  </div>
	 		 </form>
 </div>
 	<div class="contact-center">
 		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.382378225388!2d87.40636961443388!3d22.564797638944793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1d57bade25d591%3A0x8a4759d7e1878e4f!2sNANDI%20STUDIO!5e0!3m2!1sen!2sin!4v1598110530770!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
</div>
<?php
require('foot.php');
?>