<?php
require('connection.php');
require('function.php');
//pre($_SERVER);
$b=3;
if(isset($_SESSION['ADMIN_LOGIN'])){
?>

<!DOCTYPE html>
<html class="no-js" lang="">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

		<meta charset="utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<title>Dashboard Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="assets/css/style.css" />
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
	<header id="header">
	 <div class="logo">
	 	<h3>COMPANY <span class="colorword">Admin</span></h3>
	 </div>
	 <div id="toggel" class="togg" onclick="toggler()">
			   	    <div></div>
			   	    <div></div>
			   	    <div></div>
				</div>
<span class="close"id="close"onclick="hide()">&times;</span>
	  <nav id="navbar">
	  	<div class="welcome">
	  		 <h3><span class="colorword">Welcome</span>   	<?php echo $_SESSION['ADMIN_USERNAME']?>	 </h3>
	  		</div>
	  		<div class="logout">
	<a class="btns2" href="logout.php"style="color:#fff;" ><i class="fa fa-power-off"> Logout</i></a>
	  		</div>
	  		
	  	   <ul>
	  	   	<li>
							<a href="catagories.php">Catagories Master</a>
						</li>
			   		 	<li>
							<a href="product.php">Product Master</a>
						</li>
						<li>
							<a href="all_orders.php">Order Master</a>
						</li>
						<li>
							<a href="users.php">User Master</a>
						</li>
							<li>
							<a href="contact.php">Contact Master</a>
						</li>
							<li>
							<a href="banner.php">Banner Master</a>
						</li>
			   	</ul>		   	
	  </nav>
</header>
<?php 
}
else{
header('location:index.php');
die();
}
?>