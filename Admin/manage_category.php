<?php	
require('header.php');
$msg='';
$name='';
if(isset($_GET['id'])){ 
$id=get_safe_value($con,$_GET['id']);
 $sql="select * from categories where id='$id'";
 $res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$name=$row['categories'];
}
if(isset($_POST['submit'])){
$categories=get_safe_value($con,$_POST['categories']);
$sqli="select * from categories where categories='$categories'";
$res=mysqli_query($con,$sqli);
$count=mysqli_num_rows($res);
if($count>0 && $categories!=$row['categories']){
	 $msg="$categories alredy exsist.";
}else 
{
 if(isset($_GET['id']) && $id==$row['id']){
 
 $update="update categories set categories='$categories' where id='$id'";
		mysqli_query($con,$update); 
 	 $msg="$name has been Updated suscessfully to $categories.";
 	 }
 	 else
   	 {
 	 	mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
 	 	$msg="$categories has been added suscessfully.";
   	 }
 	 }
}

?>
		<div class="mainbody">
				<div class="contact-manager">
				<div class="form-header">
     <h4> Add/Edit Categories </h4>
     </div>
				
				<form method="post">
					<div class="form-input-block">
   <label for="company">Category Name</label>
										<input type="text" name="categories" placeholder="Enter Category Name" class="form-inputbox" value="<?php			
							echo $name;			
							?>" required/>
									</div>
								
							<div class="place-btn-center">
							<button type="submit" name="submit" class="mart4 btns"> Add / Edit </button>
					</div>
				<div class="success">	<?php			
							echo $msg;			
							?>
    </form>
		 </div>								
		</div>
	<?php	require('footer.php');	?>				