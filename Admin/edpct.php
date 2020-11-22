<?php	
require('header.php');	
$nid=$_SESSION['PID'];
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
if(isset($_POST['submit'])){
	//prx($_POST);
$categories_id=get_safe_value($con,$_POST['categories_id']);
$name=get_safe_value($con,$_POST['name']);
$mrp=get_safe_value($con,$_POST['mrp']);
$price=get_safe_value($con,$_POST['price']);
$qty=get_safe_value($con,$_POST['qty']);
$short_desc=get_safe_value($con,$_POST['short_desc']);
$description=get_safe_value($con,$_POST['description']);
$meta_title=get_safe_value($con,$_POST['meta_title']);
$meta_desc=get_safe_value($con,$_POST['meta_desc']);
$best_sell=get_safe_value($con,$_POST['best_sell']);
$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
$sqli="select * from product where name='$name'";
$resj=mysqli_query($con,$sqli);
$count=mysqli_num_rows($resj);
$row=mysqli_fetch_assoc($resj);
$pname=$row['name'];
$id=$nid;
if($count>0 && $name!=$pname){
	
	 $msg="$name alredy exsist.";
}else 
{
	if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/jpg'&& $_FILES['image']['type']!='image/png'){
		$msg="Not supported.";
	}
	else{
	if($_FILES['image']['name']!=''){
	$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
 move_uploaded_file($_FILES['image']['tmp_name'],'../product/'.$image);	
 $update="update product set categories_id='$categories_id',name='$name',image='$image',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_sell='$best_sell' where id='$id'";  
 }else{
 	 $update="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_sell='$best_sell' where id='$id'"; 
 }
 
  	mysqli_query($con,$update); 
 	 $msg="Name has been Updated suscessfully to $name.";
 	 
 	  }
 	 }
}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo $msg;
require('footer.php');
?>