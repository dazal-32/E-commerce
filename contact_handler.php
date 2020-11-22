<?php
require('connection.php');
require('function2.php');
	if(isset($_POST['submit'])){
		$name=get_safe_value($con,$_POST['name']);
		$email=get_safe_value($con,$_POST['email']);
		$mobile=get_safe_value($con,$_POST['mobile']);
		$comment=get_safe_value($con,$_POST['Comment']);
  $added_on=date('Y-m-d h:i:s');
	 $insert="insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')";
		 	mysqli_query($con,$insert);
		}
		echo "<h1>Your message has been sent successfully.We will contact you shortly.</h1>"
?>
