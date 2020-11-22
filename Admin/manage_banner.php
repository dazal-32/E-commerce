<?php	
require('header.php');	
$required='required';
?>
		<div class="mainbody">
				<div class="contact-manager" style="min-height:60em;">
				<div class="form-header">
     <h4> Add Banner </h4>
     </div>				
				<form method="post" enctype="multipart/form-data" action="mb.php">				
									
										<div class="form-input-block">
										<label for="qty">Image</label>
										<input type="file" class="form-inputbox" name="image" <?php		echo $required;		?>/>
									</div>									
							<div class="place-btn-center">
							<button type="submit" name="submit" class="mart4 btns">Add</button>
							</div>
     </form>				
		 </div>								
		</div>
<?php	require('footer.php');	?>				