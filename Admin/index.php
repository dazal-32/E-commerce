<?php
require('connection.php');
require('function.php');

$msg='';

if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	
		$password= get_safe_value($con,$_POST['password']);
$query="select * from admin_users where username= '$username' && password= '$password' ";
$num=mysqli_query($con,$query);
$count=mysqli_num_rows($num);
if($count>0){
		$_SESSION['ADMIN_LOGIN']='YES';
		$_SESSION['ADMIN_USERNAME']=$username;
	 header('location:catagories.php');
	 die();
}else
 {
	$msg="Enter Correct Login Details";
 }
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>AdminLogin Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="assets/css/style.css">
      </head>
   <body class="displayfull">
      <div class="back-dark-trans displayfull place-ob-center">
        <div class="formbox">
    <div class="form-header">
     <h4>Admin Log In</h4>
     </div>
     <form method="post" autocomplete="off">
      <div class="form-input-block">
								<label>Username</label><br>
								<input type="text" name="username" class="form-inputbox mart4" placeholder="Email" required/>
							</div>
							
							<div class="form-input-block">
								<label>Password</label><br>
								<input type="password" class="form-inputbox mart4" placeholder="Password" name="password" required/>

							</div>
							<div class="place-btn-center">
							<button type="submit" name="submit" class="mart4 btns">Sign in</button>
							</div>
						<div class="err">	<?php			
							echo $msg;			
							?>
							</div>
     </form>
       </div>
      </div>
   </body>
</html>