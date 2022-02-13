<?php
   // Product information
   $itemName = 'Membership_subscription';
   $itemNumber = 'MS123456';
   
   // Subscription price for one month
   $itemPrice = 1500.00;
     
   // PayPal configuration 
   define('PAYPAL_ID', 'williamdoe@shiplines.com'); 
   define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
    
   define('PAYPAL_RETURN_URL', 'https://b4d7-175-176-68-12.ngrok.io/barkomatic-main/paypal/success.php'); 
   define('PAYPAL_CANCEL_URL', 'https://b4d7-175-176-68-12.ngrok.io/barkomatic-main/paypal/cancel.php'); 
   define('PAYPAL_NOTIFY_URL', 'https://b4d7-175-176-68-12.ngrok.io/barkomatic-main/modules/schedule/paypal_ipn.php'); 
   define('PAYPAL_CURRENCY', 'PHP'); 
    
    
   
    define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


?>