<?php
// Include configuration file 
include_once 'config.php'; 
include_once '../modules/config.php';
// Start session
session_start();

if(isset($_SESSION['ship_id']) && $_SESSION['ship_id'] != NULL){
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Please Subscribe to Activate your Account</title>
<meta charset="utf-8">

<!-- Stylesheet file -->
<link rel="stylesheet" href="css/style.css">

<script>
function getSubsPrice(obj){
	var month = obj.value;
	var price = (month * <?php echo $itemPrice; ?>);
	document.getElementById('subPrice').innerHTML = '$'+price+' USD';
	document.getElementById('paypalValid').value = month;
	document.getElementById('paypalAmt').value = price;
}
</script>
</head>
<body>
<div class="container">
	<h1>Barkomatic Pay</h1>
	
	<div class="subs-box">
		<div class="form-group">
			<label>Subscription Validity:</label>
			<select name="validity" onchange="getSubsPrice(this);">
				<option value="1" selected="selected">1 Month</option>
				<option value="3">3 Month</option>
				<option value="6">6 Month</option>
				<option value="9">9 Month</option>
				<option value="12">12 Month</option>
			</select>
		</div>
		<div class="form-group">
			<p><b>Total Price:</b> <span id="subPrice"><?php echo '$'.$itemPrice.' USD'; ?></span></p>
		</div>
		
		<!-- Buy button -->
		<form action="<?php echo PAYPAL_URL; ?>" method="post">
			<!-- Identify your business so that you can collect the payments -->
			<input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
			<!-- Specify a subscriptions button. -->
			<input type="hidden" name="cmd" value="_xclick-subscriptions">
			<!-- Specify details about the subscription that buyers will purchase -->
			<input type="hidden" name="item_name" value="<?php echo $itemName; ?>">
			<input type="hidden" name="item_number" value="<?php echo $itemNumber; ?>">
			<input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
			<input type="hidden" name="a3" id="paypalAmt" value="<?php echo $itemPrice; ?>">
			<input type="hidden" name="p3" id="paypalValid" value="1">
			<input type="hidden" name="t3" value="M">
			<!-- Custom variable user ID -->
			<input type="hidden" name="custom" value="<?php echo $loggedInUserID; ?>">
			<!-- Specify urls -->
			<input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
			<input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
			<input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
			<!-- Display the payment button -->
			<input class="buy-btn" type="submit" value="Buy Subscription">
		</form>
	</div>
</div>
</body>
</html>
<?php
}
else{
    echo "BAD GATEWAY";
}
?>