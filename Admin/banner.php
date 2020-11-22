<?php
require('header.php');
 $sql="select * from banner";
 $res=mysqli_query($con,$sql);
 if(isset($_GET['type']) && $_GET['type'] != '')
{
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
	$id=get_safe_value($con,$_GET['id']);
		if($operation =='active'){
			$status=1;
		}
		else{
				$status=0;
		}
		$update="update banner set status='$status' where id='$id'";
		mysqli_query($con,$update);
	}
	
	if($type=='delete'){	
	$id=get_safe_value($con,$_GET['id']);		
		$delete="delete from banner where id='$id'";
		mysqli_query($con,$delete);
	}
	
}

?>
	<div class="mainbody">
		<table class="table">
		<tbody>
			<td class="add"> <?php	echo "<span class='spanclass-active'><a href='manage_banner.php'> Add Banner </a></span>"; ?>		</td>
		</tbody>
		</table>
										<table class="table">
											<thead>
												<tr class="tr">	
													<th>s/l No</th>																	
													<th>ID</th>
													<th>Image</th>
													<th>Status</th>
													<th>Actions</th>
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
		<td><img style="height:3em;width:3em;border:0;outline:none;" src="../product/<?php	 echo $row['image']; ?>"></td>		
				
		<td> <?php	
		if($row['status']==1)
		{
			 echo "<span class='spanclass-active'><a href='banner.php?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>";
		}else{
			echo "<span class='spanclass-deactive'><a href='banner.php?type=status&operation=active&id=".$row['id']."'>Deactive</a></span";
		}
		?>
		</td> 		
			<td> <?php					
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