<?php 
require('connection.php');
require('function2.php');
if(isset($_POST['d'])){
unset($_SESSION['VERIFY']);	
$pu="PayU";
$pn="Pending";
$order_sql_ins="select * from orders where payment_type='$pu' and payment_status='$pn'";
$ores_ins=mysqli_query($con,$order_sql_ins);
$otail_arr_ins=array();
while($orow_ins=mysqli_fetch_assoc($ores_ins)){
	$otail_arr_ins[]=$orow_ins;
 }
 foreach($otail_arr_ins as $list){
$oid_ins=$list['id'];
$detail_sql_ins="delete from orders where id='$oid_ins'";
$detail_sql_ins_dt="delete from order_detail where order_id='$oid_ins'";
mysqli_query($con,$detail_sql_ins);
mysqli_query($con,$detail_sql_ins_dt);
}
}
?>