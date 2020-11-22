<?php
include('vendor/autoload.php');
require('connection.php');
require('function2.php');
$order_id=$_GET['id'];
$dt="OD192837465".$order_id;
$css=file_get_contents('assets/css/mainstyle.css');
$tpl=0;
$nl="select * from orders where id='$order_id'";
$es=mysqli_query($con,$nl);
$dew=mysqli_fetch_assoc($es);
$html=' <div class="one-in">
      <div class="one-sub-ini allt">
        <h1>Company Name</h1>
        <p>
         Anandapur<br>Anandapur,Paschim Medinipur<br>xvgy@gmail.com
        </p>
     
        <h3>Invoice For Order Id: &nbsp;<span class="fd">';
        $html.=$dt.'</span></h3>        
      </div>
    </div>
    <hr class="in-hr">
    <div class="one-in in-two">
       <h6>BILL TO:</h6> <h3>'.$dew['name'].'</h3>
       <p class="ojklo">
         '.$dew['address'].'<br>'.$dew['road'].'<br>'.$dew['pin'].'<br>'.$dew['city'].'<br>'.$dew['mobile'].'<br>'.$dew['state'].'
        </p>
     </div>
     <hr class="in-hr">
   <table class="in-table">
      <thead>
         <tr>
            <th class="in-th">Product Name</th> 
            <th class="in-th">Price</th>           
            <th class="in-th">Qty</th>           
            <th class="in-th">Total Price</th>
         </tr>
      </thead>
      <tbody>';
		
$oid=$order_id;
$detail_sql="select * from order_detail where order_id='$oid'";
$dres=mysqli_query($con,$detail_sql);
$detail_arr=array();
 while($drow=mysqli_fetch_assoc($dres)){	
  $detail_arr[]=$drow;
 }
 
    foreach($detail_arr as $lists){
   $pro_ductid=$lists['product_id'];
   $product_sql="select * from product where id='$pro_ductid'";
 $pres=mysqli_query($con,$product_sql);
$prow=mysqli_fetch_assoc($pres);
		$tps=$lists['qty']*$prow['price'];
		$tpl=$tpl+$tps;
         $html.='<tr>
            <td class="in-td">'.$prow['name'].'</td>
            <td class="in-td">Rs.'.$prow['price'].'</td>
            <td class="in-td">'.$lists['qty'].'</td>
            <td class="in-td">Rs.'.$tps.'</td>           
         </tr>';
		 }
		 $html.='</tbody>
   </table>
   <hr class="in-hr"><hr class="in-hr">';  
 
      $html.='<div class="ttl alrt">
      <h2> Total Price: Rs.'.$tpl.'</h2>
     </div>
     <hr class="in-hr">
';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=$dt.'.pdf';
$mpdf->Output($file,'D');
?>