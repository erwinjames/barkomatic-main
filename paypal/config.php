<?php
   // Product information
   $itemName = 'Membership Subscription';
   $itemNumber = 'MS123456';
   
   // Subscription price for one month
   $itemPrice = 25.00;
     
   // PayPal configuration 
   define('PAYPAL_ID', 'williamdoe@shiplines.com'); 
   define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
    
   define('PAYPAL_RETURN_URL', 'http://18ea-202-175-242-179.ngrok.io/barkomatic-main/paypal/success.php'); 
   define('PAYPAL_CANCEL_URL', 'http://18ea-202-175-242-179.ngrok.io/barkomatic-main/paypal/cancel.php'); 
   define('PAYPAL_NOTIFY_URL', 'http://18ea-202-175-242-179.ngrok.io/barkomatic-main/paypal/paypal_ipn.php'); 
   define('PAYPAL_CURRENCY', 'USD'); 
    
      
    //   define("DB_HOST", "localhost");
    //   define("DB_ROOT", "root");
    //   define("DB_PASS", "");
    //   define("DB_NAME", "barkomatic");
   
    define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


?>