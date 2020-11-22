<?php	
require('header.php');	
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$msg='';
$space=' ';
$pname='';
$best_sell='';
$required='required';
?>
		<div class="mainbody">
				<div class="contact-manager" style="min-height:60em;">
				<div class="form-header">
     <h4> Add/Update Product </h4>
     </div>				
				<form method="post" enctype="multipart/form-data" action="adpct.php">				
					<div class="form-input-block">
   <label for="Product">Select Category</label>
										<select class="form-inputbox" name="categories_id">
										<option>Select Category</option>
										<?php	
    $select="select id,categories from categories order by id desc";
		$res=mysqli_query($con,$select);
		while($row=mysqli_fetch_assoc($res)){
			if($row['id']==$idd){
				echo "	<option selected value=".$row['id'].">".$row['categories']."</option>";
			}else {
				echo "	<option value=".$row['id'].">".$row['categories']."</option>";				
			}		
		}
?>
										</select>
									</div>
							<div class="form-input-block">
   <label for="Product">Best Seller</label>
										<select class="form-inputbox" name="best_sell">
										<option value=''>Select</option>
										<?php
										if($best_sell==1){
									echo "<option value='1' selected>Yes</option>
								  	<option value='0'>No</option>";
										}else if($best_sell==0){
												echo " <option value='1'>Yes</option>
								  	<option value='0' selected>No</option>";
										}else{
												echo " <option value='1'>Yes</option>
								  	<option value='0'>No</option>";
										}
										?>
										</select>
									</div>
				<div class="form-input-block">
   <label for="Product">Product Name</label>
										<input type="text" placeholder="Enter your pruduct name" class="form-inputbox" name="name" required value="<?php echo $pname;?>"/>
									</div>
									
									<div class="form-input-block">
										<label for="mrp">MRP</label>
										<input type="text" placeholder="Enter MRP" class="form-inputbox" name="mrp"required
									value="<?php			
							echo $mrp;			
							?>"	/>
									</div>
									
									<div class="form-input-block">
										<label for="Selling Price">Selling Price</label>
										<input type="text" placeholder="Enter Selling Price" class="form-inputbox" name="price"required
										value="<?php			
							echo $price;			
							?>"/>
									</div>
									
									<div class="form-input-block">
										<label for="qty">Quantity</label>
										<input type="text" placeholder="Enter quantity you have" class="form-inputbox" name="qty"required
										value="<?php			
							echo $qty;			
							?>"/>
									</div>
									
										<div class="form-input-block">
										<label for="qty">Image</label>
										<input type="file" class="form-inputbox" name="image" <?php		echo $required;		?>/>
									</div>
									
										<div class="form-input-block">
										<label for="short_desc">Short Description</label>
										<textarea class="form-inputbox" name="short_desc" placeholder="Enter Product's Short Description"required><?php			
							echo $short_desc;			
							?></textarea>
									</div>
										
										<div class="form-input-block">
										<label for="description">Description</label>
										<textarea class="form-inputbox" name="description" placeholder="Enter Product's Description"required><?php			
							echo $description;			
							?></textarea>
									</div>
										
										<div class="form-input-block">
										<label for="meta_title">Meta Tittle</label>
										<textarea class="form-inputbox" name="meta_title" placeholder="Enter Product's meta tittle"	><?php			
							echo $meta_title;			
							?></textarea>
									</div>
										
										<div class="form-input-block">
										<label for="meta_desc">Meta Description</label>
										<textarea class="form-inputbox" name="meta_desc" placeholder="Enter Product's meta Desscription" ><?php	echo $meta_desc;?>
										</textarea>
									</div>
									
										<div class="form-input-block">
										<label for="meta_keyword">Meta Keyword</label>
										<textarea class="form-inputbox" name="meta_keyword" placeholder="Enter Product's meta keyword"><?php			
							echo $meta_keyword;			
							?></textarea>
									</div>
									
									
									
							<div class="place-btn-center">
							<button type="submit" name="submit" class="mart4 btns">Add/Update</button>
							</div>
							<?php			
							echo $msg;			
							?>
     </form>				
		 </div>								
		</div>
	<?php	require('footer.php');	?>				