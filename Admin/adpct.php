<?php	
require('header.php');	
if(isset($_POST['submit'])){
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
$res=mysqli_query($con,$sqli);
$count=mysqli_num_rows($res);
if($count>0 && $name!=$row['name']){
	 $msg="$name alredy exsist.";
}else 
{
	if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/jpg'&& $_FILES['image']['type']!='image/png'){
		$msg="Not supported.";
	}
	else{
	$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
 move_uploaded_file($_FILES['image']['tmp_name'],'../product/'.$image);	
   	$insert="insert into product(categories_id,name,image,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,best_sell) values('$categories_id','$name', '$image','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1','$best_sell')";
 	 	mysqli_query($con,$insert); 	 	
 	 	$msg="$name has been added suscessfully."; 
 	 	 //	prILES);
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