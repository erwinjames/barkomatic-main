<?php
   // Product information
   // Subscription price for one month
   //$itemPrice = 25.00;
     
   // PayPal configuration 
   define('PAYPAL_ID', 'williamdoe@shiplines.com'); 
   define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
    
   define('PAYPAL_RETURN_URL', 'http://barkomatic.xyz/modules/schedule/paypal_success.php'); 
   define('PAYPAL_CANCEL_URL', 'http://barkomatic.xyz/modules/schedule/paypal_cancel.php'); 
   define('PAYPAL_NOTIFY_URL', 'http://barkomatic.xyz/modules/schedule/paypal_ipn.php'); 
   define('PAYPAL_CURRENCY', 'PHP'); 
    
      
    //   define("DB_HOST", "localhost");
    //   define("DB_ROOT", "root");
    //   define("DB_PASS", "");
    //   define("DB_NAME", "barkomatic");
   
    define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


?>