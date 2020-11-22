<?php	
require('head.php');
$ertg='';
	if(isset($_POST['submit'])){
 $fgtmail=$_POST['fgtmail'];
 $cnt=mysqli_num_rows(mysqli_query($con,"select * from users where email='$fgtmail'"));
 if($cnt>0){
 	 $gu=mysqli_fetch_assoc(mysqli_query($con,"select * from users where email='$fgtmail'"));
  $user_p=$gu['password'];
  $email="ayondip2001@gmail.com";
	 $to=$_POST['regmail'];
  $subject='OTP';
  	$message="Your Password is:  $user_p";
	 $headers="From: ".$email;
	 mail($to, $subject, $message, $headers);
	 $ertg="Password has been sent to your registered email id";
 }else{
 	 $ertg="Email is not Registerded";
 }
}
?>	
<div class="mainbody"style="background:rgba(0,0,0,0.9);">
	<div class="login"style="height:19em;">
	 <div class="form-container"style="height:17em;">
	  	<div class="form-container-box">
	 			<div class="form-container-box-sub">
	 		  <form method="post" autocomplete="off">
	 		 		 <label for="email">Email</label><br>
   			 <input type="email" name="fgtmail" placeholder="Enter Your Registered Email Id" required>
   				<div class="btncn">
	     <button class="buy" type="submit" name="submit"> Get Password </button>
	  	   </div>
	  		 </form>
	  		 <span style="color:red;"><?php echo $ertg; ?></span>
	 	  </div>
	 	 </div>
	 </div>
	</div>	
</div>
<?php
require('foot.php');
?>