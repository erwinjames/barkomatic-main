<?php 
// Include configuration file 
include_once 'paypal_config.php'; 
 
// Include database connection file 
require "../../resources/config.php";


/* 
 * Read POST data 
 * reading posted data directly from $_POST causes serialization 
 * issues with array data in POST. 
 * Reading raw POST data from input stream instead. 
 */         
$raw_post_data = file_get_contents('php://input'); 
$raw_post_array = explode('&', $raw_post_data); 
$myPost = array(); 
foreach ($raw_post_array as $keyval) { 
    $keyval = explode ('=', $keyval); 
    if (count($keyval) == 2) 
        $myPost[$keyval[0]] = urldecode($keyval[1]); 
} 
 
// Read the post from PayPal system and add 'cmd' 
$req = 'cmd=_notify-validate'; 
if(function_exists('get_magic_quotes_gpc')) { 
    $get_magic_quotes_exists = true; 
} 
foreach ($myPost as $key => $value) { 
    if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
    } else { 
        $value = urlencode($value); 
    } 
    $req .= "&$key=$value"; 
} 
 
/* 
 * Post IPN data back to PayPal to validate the IPN data is genuine 
 * Without this step anyone can fake IPN data 
 */ 
$paypalURL = PAYPAL_URL; 
$ch = curl_init($paypalURL); 
if ($ch == FALSE) { 
    return FALSE; 
} 
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
 
// Set TCP timeout to 30 seconds 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
$res = curl_exec($ch); 
 
/* 
 * Inspect IPN validation result and act accordingly 
 * Split response headers and payload, a better way for strcmp 
 */  
$tokens = explode("\r\n\r\n", trim($res)); 
$res = trim(end($tokens)); 
if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) { 
    if ($_POST['item_name']== "avail") {
    // Retrieve transaction info from PayPal
    $ship_name = $_POST['ship_name'];
    $item_name = $_POST['item_name']; 
    $item_number    = $_POST['item_number']; 
    $txn_id         = $_POST['txn_id']; 
    $custom = $_POST['custom'];
    $payment_gross     = $_POST['mc_gross']; 
    $currency_code     = $_POST['mc_currency']; 
    $payment_status = $_POST['payment_status']; 
    $payer_email = $_POST['payer_email'];
    // Check if transaction data exists with the same TXN ID 
    $prevPayment = $con->query("SELECT id FROM tbl_psnger_pymnt WHERE txn_id = '".$txn_id."'"); 
    if($prevPayment->num_rows > 0){ 
        exit(); 
    }else{ 
        // Insert transaction data into the database 
        $insert = $con->query("INSERT INTO tbl_psnger_pymnt(id,reservation_number,txn_id,payer_email,currency,gross_income,payment_status,dates,payer_type,ship_name) VALUES('".$custom."','".$item_number."','".$txn_id."','".$payer_email."','".$currency_code."','".$payment_gross."','".$payment_status."',NOW(),'".$item_name."','".$ship_name."')"); 
    } 
}
else if ($_POST['item_name']== "reserve") {
    // Retrieve transaction info from PayPal
    $ship_name = $_POST['ship_name'];
    $item_name = $_POST['item_name']; 
    $item_number    = $_POST['item_number']; 
    $txn_id         = $_POST['txn_id']; 
    $custom = $_POST['custom'];
    $payment_gross     = $_POST['mc_gross']; 
    $currency_code     = $_POST['mc_currency']; 
    $payment_status = $_POST['payment_status']; 
    $payer_email = $_POST['payer_email'];
    // Check if transaction data exists with the same TXN ID 
    $prevPayment = $con->query("SELECT id FROM tbl_psnger_pymnt WHERE txn_id = '".$txn_id."'"); 
    if($prevPayment->num_rows > 0){ 
        exit(); 
    }else{ 
        // Insert transaction data into the database 
        $insert = $con->query("INSERT INTO tbl_psnger_pymnt(id,reservation_number,txn_id,payer_email,currency,gross_income,payment_status,dates,payer_type,ship_name) VALUES('".$custom."','".$item_number."','".$txn_id."','".$payer_email."','".$currency_code."','".$payment_gross."','".$payment_status."',NOW()'".$item_name."','".$ship_name."')"); 
    } 
}
else if($_POST['item_name']=="Membership_subscription"){
    $unitPrice = 25;
    
    //Payment data
    $subscr_id = $_POST['subscr_id'];
    $payer_email = $_POST['payer_email'];
    $item_number = $_POST['item_number'];
    $txn_id = $_POST['txn_id'];
    $payment_gross = $_POST['mc_gross'];
    $currency_code = $_POST['mc_currency'];
    $payment_status = $_POST['payment_status'];
 
    $subscr_month = ($payment_gross/$unitPrice);
    $subscr_days = ($subscr_month*30);
    $subscr_date_from = date("Y-m-d H:i:s");
    $subscr_date_to = date("Y-m-d H:i:s", strtotime($subscr_date_from. ' + '.$subscr_days.' days'));
   
    if(!empty($txn_id)){
        //Check if subscription data exists with the same TXN ID.
        $prevPayment = $con->query("SELECT id FROM user_subscriptions WHERE txn_id = '".$txn_id."'");
        if($prevPayment->num_rows > 0){
            exit();
        }else{
           
            //Insert tansaction data into the database
            $insert = $con->query("INSERT INTO user_subscriptions(id,payment_method,validity,valid_from,valid_to,item_number,txn_id,payment_gross,currency_code,subscr_id,payment_status,payer_email) VALUES('".$custom."','paypal','".$subscr_month."','".$subscr_date_from."','".$subscr_date_to."','".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','". $subscr_id."','".$payment_status."','".$payer_email."')");
              //Update subscription id in users table
              $custom = $_GET['shp_id'];
            $update = $con->query("UPDATE tbl_ship_detail SET subscription_id = 1 WHERE id = '".$custom."'");
        }
     }

    }
        else {
             echo "something went wrong";
} 
 
}
?>