<?php
   // Product information
$itemName = 'Membership Subscription';
$itemNumber = 'MS123456';

// Subscription price for one month
$itemPrice = 25.00;
  
// PayPal configuration 
define('PAYPAL_ID', 'williamdoe@shiplines.comm'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'localhost/paypal/success.php'); 
define('PAYPAL_CANCEL_URL', 'localhost/paypal/cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'localhost/paypal/paypal_ipn.php'); 
define('PAYPAL_CURRENCY', 'PHP'); 
 
   
   define("DB_HOST", "localhost");
   define("DB_ROOT", "root");
   define("DB_PASS", "");
   define("DB_NAME", "barkomatic");

 define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
   
   
    $con = mysqli_connect(DB_HOST, DB_ROOT, DB_PASS, DB_NAME);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>