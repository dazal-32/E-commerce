<?php	
require('header.php');	
if(isset($_POST['submit'])){

	if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/png'){
		$msg="Not supported.";
	}
	else{
	if($_FILES['image']['name']!=''){
	$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
 move_uploaded_file($_FILES['image']['tmp_name'],'../product/'.$image);	
 $update="update banner set image='$image'";  
 }
  if(isset($_GET['id']) && $id==$row['id']){ 
  	mysqli_query($con,$update); 
 	 $msg="$pname has been Updated suscessfully";
 	 }else
   	 {  
   	$insert="insert into banner(image,status) values('$image','1')";
 	 	mysqli_query($con,$insert); 	 	
 	 	$msg="Image has been added suscessfully."; 
 	 	 //	prILES);
   	 }
 }
}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo $msg;
?>
<?php	require('footer.php');	?>				