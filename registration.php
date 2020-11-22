<?php
require('connection.php');
require('function2.php');
if($_SESSION['VERIFY']==1){
	if(isset($_POST['submit'])){
		$username=get_safe_value($con,$_POST['regusername']);
		$mobile=get_safe_value($con,$_POST['mobile']);
		$useremail=get_safe_value($con,$_POST['email']);
		$userpassword=get_safe_value($con,$_POST['regpassword']);
  $added_on=date('Y-m-d h:i:s');
$query="select * from users where email='$useremail'";
$num=mysqli_query($con,$query);
$r=mysqli_num_rows($num);
if($r>0){
	?>
<script>
	alert('Email Id Already Exists.');
	window.location.href="user_login_reg.php";
		</script>
<?php
}
else{
	
	$insert="insert into users(username,password,mobile,email,added_on) values('$username','$userpassword','$mobile','$useremail','$added_on')";
		 	mysqli_query($con,$insert);
?>
<script>
	alert('Registration Successfull.');
	window.location.href="user_login_reg.php";
		</script>
<?php
		 	 }
		 	}
		}
		else{
			?>
<script>
	alert('Verify Email First');
	window.location.href="user_login_reg.php";
		</script>
<?php
}
?>