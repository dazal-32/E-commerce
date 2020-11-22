<?php
require('connection.php');
require('function2.php');
$u_idname=$_SESSION['USER_ID'];
$utp=		$_SESSION['ORDER_TOTAL'];
$u_info=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$u_idname'"));
//include('db.php');
$MERCHANT_KEY = "gtKFFx"; 
$SALT = "eCwWELxi";
$hash_string = '';
//$PAYU_BASE_URL = "https://secure.payu.in";
$PAYU_BASE_URL = "https://test.payu.in";
$action = '';
$posted = array();
if(!empty($_POST)) {
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  }
}
$formError = 0;
$txnid =$_SESSION['TXN'];
$posted['txnid']=$txnid;
$posted['amount']=$utp;
 unset($_SESSION['TXN']);
	unset($_SESSION['ORDER_TOTAL']);
$posted['firstname']=$u_info['username'];
$posted['email']=$u_info['email'];
$posted['phone']=$u_info['mobile'];
$posted['productinfo']="productinfo";
$posted['key']=$MERCHANT_KEY ;
$hash = '';
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
         
  ) {
    $formError = 1;
  } else {    
	$hashVarsSeq = explode('|', $hashSequence);
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

$formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="http://0.0.0.0:8080/payment_complete.php" /><input type="hidden" name="furl" value="http://0.0.0.0:8080/payment_fail.php"/><input type="submit" style="display:none;"/></form>';
echo $formHtml;
echo '<script>document.getElementById("payuForm").submit();</script>';
?>