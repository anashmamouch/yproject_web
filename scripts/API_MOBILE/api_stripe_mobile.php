<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

// API STRIPE_MOBILE.PHP - CALLED BY APPS MOBILE ONLY
// DATA < 0 => ERREUR SQL
// DATA > 0 => MODIFICATION EFFECTUEE AVEC SUCCES
// DATA = 0 => AUCUNE MODIFICATION A APPLIQUER

require_once('../stripe/vendor/autoload.php');
require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

\Stripe\Stripe::setApiKey('sk_test_2X4s7DmhzyA76TNOeVh5Yrar');

$token_id = $_POST['stripeToken'];
$amount = $_POST['amount'];
$mode = $_POST['mode'];


try{
	
	if($mode == 'checkout'){
		
		\Stripe\Charge::create(array(
				"amount" => $amount,
				"currency" => "eur",
				"source" => $token_id, // obtained with Stripe.js
				"description" => "Charge for test"
		));
		$data = 1;
	}else
		if ($mode == 'subscription'){
			
			$tokenObject = \Stripe\Token::retrieve($token_id);
			
			$customer = \Stripe\Customer::create(array(
					"source" => $token_id,
					"plan" => "gold",
					"email" => $tokenObject ->email)
					);
			$data = 2;
		}else{
			$data = -2;
		}
	
	
	
	
}catch(\Stripe\Error\Card  $e) 
     {  // ERROR AU NIVEAU DU PAIEMENT DE LA CARTE BANCAIRE
    	// PRENONS EN COMPTE LE MAXIMUM D'INFORMATION CONCERNANT LE RETOUR CARTE BLEU    

     	$data = -1;
     	 
     }	

echo json_encode ( array ("data" => $data) );

?>