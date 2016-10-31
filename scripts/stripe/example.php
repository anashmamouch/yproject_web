<?php
require_once('vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_yRPITfOZltraFWNrFWpZ5p8o');

echo "anas";

\Stripe\Charge::create(array(
  "amount" => 2000,
  "currency" => "usd",
  "source" => "tok_195vEdJ9QtOLzYPfgqJpAbEC", // obtained with Stripe.js
  "description" => "Charge for benzinoanas@gmail.com"
));
?>
