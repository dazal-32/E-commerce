<?php
require('connection.php');
require('function2.php');
 $sql="select * from categories where status='1'";
 $res=mysqli_query($con,$sql);
 $cat_arr=array();
 while($row=mysqli_fetch_assoc($res)){	
  $cat_arr[]=$row;
 }
 if($_SERVER['SCRIPT_NAME']=="/product_detail.php"){
 	 
 	 
 }

 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce HTML5 Templatee</title>
    <meta name="description" content="<?php  echo $_SERVER['SCRIPT_NAME']; echo 'bad';?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/mainstyle.css"/>
		<link rel="stylesheet" href="assets/css/swiper.min.css"/>		
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo2.png">
</head>
<body onload="resetvar()">
<div class="mnji" id="model">
  <div class="mnji-center">
   <form method="post" action="search.php" autocomplete="off">
    <input type="text" name="searchstr" placeholder="Search Here"><br/>
    <button type="submit"name="submit" class="buyu"onclick="searchboxhide()">Search</button>
   </form>
  </div>
</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

	<header id="header">
		<div class="header-center">
	 <div class="logo">
	  <a href="index.php"><img src="assets/img/logo2.png"></a>
	 </div>
	 <div id="toggel" class="togg" onclick="toggler()">
			   	    <div></div>
			   	     <div></div>
			   	    <div></div>
				</div>
				<div class="user"style="margin:0 2em 0 0;position:relative;"> <a href="cart.php">&#x1f6d2;</a>
	<span class="cart-num"id="countCart">0
	</span></div>
					 
					 	<div class="user"style="margin:0 2em 0 0;position:relative;"> <button onclick="searchbox()" class="search-btn"><img src="assets/img/images.png"></button>
					 </div>
					 
					 
       <span class="close"id="close"onclick="hide()">&times;</span>
	       <nav id="navbar">
	  	     <ul>
	  	     <div style="display:grid;place-items:center;height:3em;width:100%;">
	  	    <span style="background:#3731DD;color:#fff;font-size:0.8em;padding:0.7em;border-radius:10px;">
	  	    <?php
	  	     if($_SESSION['USER_LOGIN']=="YES"){	  	     	 
	  	     	 ?>
	  	     	 <a href='user_logout.php' style="text-decoration:none; color:#fff;"> 
	  	     	 <?php echo "Logout"; ?>
	  	     	 </a>
	  	     	 <?php 
	  	     }
	  	     else{
	  	     	?>
	  	     	<a href='user_login_reg.php'style="text-decoration:none; color:#fff;"> <?php echo "Login/Registration"; ?> </a>
	  	     	<?php
	  	     }
	  	    ?>
	  	    </span>
	  	     </div>
	  		      <li><a href="index.php">Home</a></li>
	  		       <li>
	           <div class="catcontainer" id="hi">
		           <div class="one">
		   <span>Categories</span>
		   <button id="btn1"onclick="showcat()">&#x271B;</button>
		   <button id="btn2"onclick="hidecat()">&#x268A;</button>
			</div>
				<div class="list" id="hii">
		     <ul>
		     
		     <?php	
    foreach($cat_arr as $list){
    ?>									
	 <a href="catproduct.php?type=6yu&id= <?php	
	 echo $list['id'];	
	 ?>	"><li><?php	echo $list['categories'];	?>	</li></a>
			   		 
			   		 <?php	    }    ?>									
			   	</ul>		   	
		 	</div>
			</div>
			</li>
		 <li><a href="contact_us.php">Contact Us</a></li>
		<?php 
		if($_SESSION['USER_LOGIN']=="YES"){			
			?>
		 <li><a href="myorders.php">My Orders</a></li> 
		 <li><a href="mywish.php">Wishlist</a></li> 
		 <?php } ?>
			</ul>			
	  </nav>
	</div>
</header>