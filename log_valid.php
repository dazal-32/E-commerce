<?php
require('connection.php');
require('function2.php');
	if(isset($_POST['submit'])){
		$username=get_safe_value($con,$_POST['logusername']);
		$userpassword=get_safe_value($con,$_POST['passwordd']);  
  $query="select * from users where username='$username' && password='$userpassword'";
$num=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($num);
$r=mysqli_num_rows($num);
if($r == 1)
{
	$_SESSION['USER_LOGIN']="YES";
	$_SESSION['USER_ID']=$row['id'];
	?>
	<script>
	window.location.href="index.php";
		</script>
	<?php
}
else{
	?>
	<script>
	alert('Invalid Credentials.');
	window.location.href="user_login_reg.php";
		</script>
	<?php
 }
}
?>