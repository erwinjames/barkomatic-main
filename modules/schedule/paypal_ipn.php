<?php 
// Include configuration file 
include_once 'paypal_config.php'; 
 
// Include database connection file 
include_once '../../resources/config.php'; 

require "../library/PHPMailer/src/Exception.php";
require "../library/PHPMailer/src/PHPMailer.php";
require "../library/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
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
    if ($_POST['item_name']== "Payment_reservation") {
        
     
    // Retrieve transaction info from PayPal
    $item_name = $_POST['item_name']; 
    $item_number    = $_POST['item_number']; 
    $txn_id         = $_POST['txn_id']; 
    $custom = $_POST['custom'];
    $payment_gross     = $_POST['mc_gross']; 
    $currency_code     = $_POST['mc_currency']; 
    $payment_status = $_POST['payment_status']; 
    $payer_email = $_POST['payer_email'];

    //some data

    $accomodations = $_POST['item_accomodation'];
    
     
    // Check if transaction data exists with the same TXN ID 
    $prevPayment = $con->query("SELECT id FROM tbl_psnger_pymnt WHERE txn_id = '".$txn_id."'"); 
    if($prevPayment->num_rows > 0){ 
        exit(); 
    }else{ 
        // Insert transaction data into the database 
        $insert = $con->query("INSERT INTO tbl_psnger_pymnt(id,reservation_number,txn_id,payer_email,currency,gross_income,payment_status,dates) VALUES('".$custom."','".$item_number."','".$txn_id."','".$payer_email."','".$currency_code."','".$payment_gross."','".$payment_status."',NOW())"); 
        if($insert){
            $mail = new PHPMailer();
            try {
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // $mail->SMTPDebug = 4;
                $mail->isSMTP();
                $mail->Mailer = "smtp";
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Username = 'manugasewinjames@gmail.com';
                $mail->Password = 'HardFact@30';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom($ship_email, 'Reservation');
                $mail->addAddress($_SESSION['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Reservation Confirmation';
                $mail->Body = "
                <!DOCTYPE html>
                <head>
                <style>
                .bodydiv {       

                                  display: flex;
                                  align-items: center;
                                  justify-content: center;
                                  min-height: 100vh;
                                  color: #454f54;
                                  background-color: #f4f5f6;
                                  background-image: linear-gradient(to bottom left, #abb5ba, #d5dadd);
                                }
                                
                                .ticket {
                              
                                  display: grid;
                                  grid-template-rows: auto 1fr auto;
                                  max-width: 4rem;
                                }
                .ticket__header, .ticket__body, .ticket__footer {
                
                  padding: 1.25rem;
                  background-color: white;
                  border: 1px solid #abb5ba;
                  box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
                }
                .ticket__header {
                
                  font-size: 1.5rem;
                  border-top: 0.25rem solid #dc143c;
                  border-bottom: none;
                  box-shadow: none;
                }
                .ticket__wrapper {
                  
                  box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
                  border-radius: 0.375em 0.375em 0 0;
                  overflow: hidden;
                }
                .ticket__divider {
                  
                  position: relative;
                  height: 1rem;
                  background-color: white;
                  margin-left: 0.5rem;
                  margin-right: 0.5rem;
                }
                .ticket__divider::after {
                  
                  content: '';
                  position: absolute;
                  height: 50%;
                  width: 100%;
                  top: 0;
                  border-bottom: 2px dashed #e9ebed;
                }
                .ticket__notch {
                
                  position: absolute;
                  left: -0.5rem;
                  width: 1rem;
                  height: 1rem;
                  overflow: hidden;
                }
                .ticket__notch::after {
                   
                  content: '';
                  position: relative;
                  display: block;
                  width: 2rem;
                  height: 2rem;
                  right: 100%;
                  top: -50%;
                  border: 0.5rem solid white;
                  border-radius: 50%;
                  box-shadow: inset 0 2px 4px rgba(41, 54, 61, 0.25);
                  box-sizing: border-box;
                }
                .ticket__notch--right {
                  
                  left: auto;
                  right: -0.5rem;
                }
                .ticket__notch--right::after {
                  
                  right: 0;
                }
                .ticket__body {
                  
                  border-bottom: none;
                  border-top: none;
                }
                .ticket__body > * + * {
                
                  margin-top: 1.5rem;
                  padding-top: 1.5rem;
                  border-top: 1px solid #e9ebed;
                }
                .ticket__section > * + * {
                    margin: 0;
                  margin-top: 0.25rem;
                }
                .ticket__section > h3 {
                  font-size: 1.125rem;
                  margin-bottom: 0.5rem;
                }
                .ticket__header, .ticket__footer {
                  font-weight: bold;
                  font-size: 1.25rem;
                  display: flex;
                  justify-content: space-between;
                }
                .ticket__footer {
                  border-top: 2px dashed #e9ebed;
                  border-radius: 0 0 0.325rem 0.325rem;
                }
                </style>
                </head>
                <body>
                <div class='row'>
                            <div class='col-sm-12'>
                                <h4>$ship_name</h4><br>
                                <p>Hello $pssngr_fname, Thank you for making your reservation in our shipping line. Please  <a class='link' href='http://localhost/barkomatic-main/payment.php?reservetionId=$item_name&&userId=$custom'>click me</a></p> to <b>Print your ticket</b>

                                <br><br>
                                <p>Again, thank you for choosing us. We look forward to having you as our guest.</p>
                                <p>Best regards,<br><span>Reservation Office</span></p>
                            </div>
                        </div>
                <div class='bodydiv'>
                <article class='ticket>
                <header class='ticket__wrapper'>
                  <div class='ticket__header'>
                    2 🎟
                  </div>
                </header>
                <div class='ticket__divider'>
                  <div class='ticket__notch'></div>
                  <div class='ticket__notch ticket__notch--right'></div>
                </div>
                <div class='ticket__body'>
                  <section class='ticket__section'>
                    <h3>Your Tickets</h3>
                    <p>Accomodation : <b>$accomodations</b> </p>
                    <p>Block 406   Row Q   Seats 34-35</p>
                    <p>Your seats are together</p>
                  </section>
                  <section class='ticket__section'>
                    <h3>Delivery Address</h3>
                    <p>Addis ababa, 2321 px.box</p>
                    <p>Ethiopia</p>
                  </section>
                  <section class='ticket__section'>
                    <h3>Payment Method</h3>
                    <p>Mastercard **** 3232</p>
                  </section>
                </div>
                <footer class='ticket__footer'>
                  <span>Total Paid</span>
                  <span>£173.20</span>
                </footer>
                </article>
                </div>
                </body>
                </html>";
                $mail->send();
                // echo "payment.php?reservetionId=$rsrvtn_num&&userId=$pssngr_id";
            }catch(Exception $e){
                echo "Could not sent the reservation confirmation. Mailer Error: {$mail->ErrorInfo}";
                // echo 'Could not sent the reservation confirmation.{$mail->ErrorInfo}';
            }
        }

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
    $custom = $_SESSION['ship_id'];
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
            $insert = $con->query("INSERT INTO user_subscriptions(user_id,payment_method,validity,valid_from,valid_to,item_number,txn_id,payment_gross,currency_code,subscr_id,payment_status,payer_email) VALUES('".$custom."','paypal','".$subscr_month."','".$subscr_date_from."','".$subscr_date_to."','".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','". $subscr_id."','".$payment_status."','".$payer_email."')");
        }
     }
    }
        else {
             echo "something went wrong";
} 
 
}
?>