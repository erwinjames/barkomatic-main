<?php
   // Product information
   include_once '../modules/config.php';
   $itemName = 'Membership_subscription';
   $itemNumber = 'MS123456';
   session_start();

   $ship_id = $_SESSION['ship_id'];
   // Subscription price for one month
   $itemPrice = 1500.00;
     
   // PayPal configuration 
   define('PAYPAL_ID', 'williamdoe@shiplines.com'); 
   define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
    
   define('PAYPAL_RETURN_URL', 'https://barkomatic.pagekite.me/barkomatic-main/modules/schedule/paypal_success.php'); 
   define('PAYPAL_CANCEL_URL', 'https://barkomatic.pagekite.me/barkomatic-main/paypal/cancel.php'); 
   define('PAYPAL_NOTIFY_URL', 'https://barkomatic.pagekite.me/barkomatic-main/modules/schedule/paypal_ipn.php'); 
   define('PAYPAL_CURRENCY', 'PHP'); 
    
   
    define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


?>