<?php
require('header.php');
 $sql="select * from categories order by categories asc";
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
		$update="update categories set status='$status' where id='$id'";
		mysqli_query($con,$update);
		?>
		<script>
		window.location.href="catagories.php";
		</script>
		<?php
	}
	
	if($type=='delete'){	
	$id=get_safe_value($con,$_GET['id']);		
		$delete="delete from categories where id='$id'";
		mysqli_query($con,$delete);
	}
	
}
?>
	<div class="mainbody">
		<table class="table">
		<tbody>
			<td class="add"> <?php	echo "<span class='spanclass-active'><a href='manage_category.php'> Add Category </a></span>"; ?>		</td>
							</tbody>
				</table>
										<table class="table">
											<thead>
												<tr class="tr">	
													<th>s/l No</th>																	
													<th>ID</th>
													<th>Name</th>												
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
		<td> <?php	echo $row['categories'];	?> </td>
		<td> <?php	
		if($row['status']==1)
		{
			 echo "<span class='spanclass-active'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>";
		}else{
			echo "<span class='spanclass-deactive'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span";
		}		
			?> </td>						
				<td> 
				<?php
				echo "<span style='background:#3DB16F;
	padding:0.3em;
	margin-left:0.2em;'> <a style='color:#fff;' href='manage_category.php?&id=".$row['id']."'> Edit </a> </span>";
				
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