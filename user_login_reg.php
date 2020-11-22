<?php	
require('head.php');
if(!isset($_SESSION['USER_LOGIN'])){
?>	

<div class="mainbody"style="background:rgba(0,0,0,0.9);">
<div class="otp" id="otp">
  <div class="otp-center">
    <input type="text" name="otp" id="otps" placeholder="Enter OTP Here"><br/>
    <button id="dvr" type="submit"name="submit" class="buyu" onclick="verifyotp()">Verify</button>
  </div>
</div>
	<div class="login">
	<div class="boxrow">
		<div class="boxrow-sub" onclick="login();">
		Log In
	  </div>	
	  <div class="boxrow-sub" onclick="register();">
		Register		
	  </div>	
	  <hr id="indicator">
	 </div>	
	 <div class="form-container">
	 	<div class="form-container-box" id="fswitch">
	 			<div class="form-container-box-sub">
	 		 <form method="post" autocomplete="off"action="log_valid.php">
	 		 		<label for="username">Usernamme</label><br>
   			<input type="text" name="logusername" placeholder="Username" required>
   				<br>
   				<label for="password">Password</label><br>
   			<input type="password" name="passwordd" placeholder="Password" required>
   	<div class="btncn">
	  <button class="buy" type="submit" name="submit"> Sign In </button>
	  	 </div>
	 	<div class="btncn">
	 	<a href="forget_password.php"style="margin-top:1em;font-size:14px;">Forget Password?</a>
  </div>
	 		 </form>
	 	 </div>
	 	 	<div class="form-container-box-sub">
	 		<form method="post" autocomplete="off" action="registration.php">
	 				<label for="email">Email</label><br>
   			<input type="email" name="email" placeholder="Email" style="width:70%;" required id="regmail">
   				 <button id="verify" class="buy" name="submit"style="width:6em;"onclick="otpbox()"> verify </button>
   				<br>
	 		 		<label for="username">Usernamme</label><br>
   			<input type="text" name="regusername" placeholder="Username" id="regusername" required>
   				<br>
   					<label for="mobile">Mobile</label><br>
   			<input type="number"name="mobile" placeholder="Enter Ph no" id="regmobile" required >
   				<br>
   				<label for="password">Password</label><br>
   			<input type="password" name="regpassword" placeholder="Password" id="regpassword" required>
   				<div class="btncn">
	  <button class="buy" type="submit" name="submit" onclick="eneble()"> Register </button>
	  </div>
	 		 </form>
	 	 </div>
	 	 </div>
	 </div>
	</div>	
</div>


<?php
require('foot.php');
}
else{
?>
	<script>
	window.location.href="index.php";
		</script>
<?php
}
?>