<?php
require('header.php');
 $sql="select * from contact_us order by id desc";
 $res=mysqli_query($con,$sql);
 if(isset($_GET['type']) && $_GET['type'] != '')
{
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){	
	$id=get_safe_value($con,$_GET['id']);		
		$delete="delete from contact_us where id='$id'";
		mysqli_query($con,$delete);
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
												   	<th>Comment</th>
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
		<td> <?php	echo $row['name'];	?> </td>
		<td> <?php	echo $row['email'];	?> </td>
		<td> <?php	echo $row['mobile'];	?> </td>
		<td> <?php	echo $row['comment'];	?> </td>
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