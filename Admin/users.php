<?php
require('header.php');
 $sql="select * from users order by id desc";
 $res=mysqli_query($con,$sql);
 if(isset($_GET['type']) && $_GET['type'] != '')
{
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){	
	$id=get_safe_value($con,$_GET['id']);		
		$delete="delete from users where id='$id'";
		mysqli_query($con,$delete);
 	$del_cart="delete from users_cart where use_id='$id'";
	mysqli_query($con,$del_cart);
}
	$del_orders="select * from orders where u_id='$id'";
	$del_orders_res=mysqli_query($con,$del_orders);
	$del_orders_arr=array();
 while($del_row=mysqli_fetch_assoc($del_orders_res)){
 	 	$del_orders_arr[]=$del_row;  
   }
 foreach($del_orders_arr as $list){
 	$odr_id=$list['id'];
 	$del_order_detail="delete from order_detail where order_id='$odr_id'";
	mysqli_query($con,$del_order_detail);
	 $del_odr="delete from orders where id='$odr_id'";
	mysqli_query($con,$del_odr);
  }  
}
?>
	<div class="mainbody">
										<table class="table">
											<thead>
												<tr class="tr">	
													<th>s/l No</th>																	
											 		<th>ID</th>
												  	<th>Name</th>												
													    <th>Email</th>
											     	<th>Mobile</th>												   
												  	<th>Date</th>	
													<th>Action</th>
												</tr>
											</thead>
										<tbody>
<?php	
$i=1;
while($row=mysqli_fetch_assoc($res)){	
?>											
		<tr class="tr">	
	<td><?php	echo $i;	
	$i++;?></td>		
																										
 	<td> <?php	echo $row['id'];	?>		</td>
		<td> <?php	echo $row['username'];	?> </td>
		<td> <?php	echo $row['email'];	?> </td>
		<td> <?php	echo $row['mobile'];	?> </td>
		<td> <?php	echo $row['added_on'];	?> </td>		
		<td> 
				<?php
echo "<span style='background:#FF3A3A;
	padding:0.3em;
	margin-left:0.2em;'> <a style='color:#fff;' href='?type=delete&id=".$row['id']."'> Delete </a> </span>";
		?>	
					</td>					
	</tr>
															
			<?php	}	?>											
														
											</tbody>
										</table>
</div>					
<?php	require('footer.php');	?>				