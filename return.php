<?php	
  require('head.php');
  $red=0;
  $od_id=get_safe_value($con,$_GET['id']);
  if($od_id!=''){
  if(isset($_POST['submit'])){
  	 $od_sta=get_safe_value($con,$_POST['returnp']);
  	 $od_reql="insert into returns(od_id,problems) values('$od_id','$od_sta')";
  	 mysqli_query($con,$od_reql);
  	 $od_star="Return Requested";
  	 $od_ql="update orders set order_status='$od_star' where id='$od_id'";
 	 mysqli_query($con,$od_ql);
 	 $red=1;
  }
?>
<div class="mainbody"style="background:rgba(0,0,0,0.9);">
	<div class="login"style="height:19em;">
	 <div class="form-container"style="height:17em;">
	  	<div class="form-container-box">
	 			<div class="form-container-box-sub">
	 			 <h5>Why you want to return?</h5>
	 		   <form method="post" autocomplete="off"style="display:grid;place-items:center;">
	 		 		 <select name="returnp"style="height:1.5em;background:#FAFAFA;outline:none;border:0;margin:1em;">
		     <option>Damage Product received</option>		  
		      <option>Diffrent Product</option>
		       <option>Seal Was Brokem</option>
		       <option>Not Needed Now</option>
		       <option>Other</option>
		      </select>
   		  	 <div class="btncn">
	      <button class="buy" type="submit" name="submit"> Return </button>
	  	   </div>
	  		 </form>
	 	  </div>
	 	 </div>
	 </div>
	</div>	
</div>
<?php
 require('foot.php');
  if($red==1){
  	 ?>
  	 <script>
  	 swal("Return Requested").then(function(){
  	 	window.location.href="myorders.php";
  	 });
  	 </script>
  	 <?php
  }
 }
 else{
 	?>
 	 <script>
  	 	window.location.href="index.php";
  	 </script>
 	<?php
 }
 ?>  