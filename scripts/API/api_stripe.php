<?php
header( 'content-type: text/html; charset=utf-8' );

require_once('../stripe/vendor/autoload.php');
require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );

\Stripe\Stripe::setApiKey('sk_test_2X4s7DmhzyA76TNOeVh5Yrar');

// PARAM PAIEMENT STRIPE
$token_id                 = $_POST['stripeToken'];
$amount                   = $_POST['amount'];
$mode                     = $_POST['mode'];
$plan                     = $_POST['plan'];
$tva_percent_to_pay       = $_POST['tva_percent_to_pay'];
$id_customer              = $_POST['id_customer'];
$prix_pack_upgrade_ttc    = 0; //$_POST['prix_pack_upgrade_ttc'];
$prix_pack_upgrade_ht     = 0; //$_POST['prix_pack_upgrade_ht'];

// PARAM PASS ORDER
$id_affiliate             = $_POST['id_affiliate'];
$id_pack                  = $_POST['id_pack'];
$prix_pack_ttc            = $_POST['prix_pack_ttc'];
$prix_pack_ht             = $_POST['prix_pack_ht'];


$tokenObject = \Stripe\Token::retrieve($token_id);

try{
	
	if($mode == 'checkout'){
		
		// ON SUPPRIME LE CUSTOMER INSCRIT AVEC CETTE @ ET LE REINSCRIRE EN MODE CHECKOUT
					$list_customer = getCustomerByEmail($tokenObject ->email);
					foreach ($list_customer as $customer){
						$customer->delete();
					}
		
		\Stripe\Charge::create(array(
				"amount" => $amount,
				"currency" => "eur",
				"source" => $token_id, // obtained with Stripe.js
				"description" => "$id_affiliate"
		));
		$data = 1;
	}else
		if ($mode == 'subscription'){

			// ON SUPPRIME LE CUSTOMER INSCRIT AVEC CETTE @ ET LE REINSCIT AVEC LE NOUVEAU ABONNEMENT 
// 			$list_customer = getCustomerByEmail($tokenObject ->email);
// 			foreach ($list_customer as $customer){
// 				$customer->delete();
// 			}
			
// 			$customer = \Stripe\Customer::create(array(
// 					"source" => $token_id,
// 					"plan" => "$plan",
// 					"email" => $tokenObject ->email)
// 					);
			
			// OR UPDATE CUSTOMER
			$customer = getCustomerByID($id_customer);
			// SI LE CUSTOMER EXISTE DEJA
			if($customer != ''){
				// UPDATE CUSTOMER
				$customer->source = $token_id;
				$customer->plan = $plan;
				$customer->email = $tokenObject ->email;
				$customer->description = "$id_affiliate";
				$customer->prorate = false;
				$customer->save();
				//var_dump($customer);
				
				// PASSER LE PAIEMENT
// 				$invoices = \Stripe\Invoice::all(array("limit" => 1));
				
// 				if(count($invoices->data) > 0){
// 					$id_invoice = $invoices->data[0]->id;
// 				}
// 				$invoice = \Stripe\Invoice::retrieve($id_invoice);
				//$invoice->pay();
				
				// GET SUBSCRIPTION
				//$last_subscription = $customer->subscriptions->data[0];
				
				//var_dump($customer->subscriptions->data[0]->id);
				//var_dump($customer->subscriptions->data[0]);
				
// 				$last_subscription->cancel();
				
// 				\Stripe\Subscription::create(array(
// 						"customer" => $id_customer,
// 						"plan" => $plan
// 				));
				
				// UPDATE SUBSCRIPTION
// 				$subscription = \Stripe\Subscription::retrieve($id_subscription);
// 				$subscription->plan = $plan;
// 				$subscription->save();
				
				
			}else{
				$customer = \Stripe\Customer::create(array(
						"source" => $token_id,
						"plan" => "$plan",
						"description" => "$id_affiliate",
						//"prorate" => false,
						"email" => $tokenObject ->email)
						);
				$id_customer = $customer->id;
				
			}			
			
// 			$list_customer = getCustomerByEmail($tokenObject ->email);
// 			if(count($list_customer) >0){
// 				foreach ($list_customer as $customer){
// 					$customer->plan = $plan;
// 					$customer->email = $tokenObject ->email;
// 					$customer->save();
// 				}
// 			}else{
// 							$customer = \Stripe\Customer::create(array(
// 									"source" => $token_id,
// 									"plan" => "$plan",
// 									"email" => $tokenObject ->email)
// 									);		
// 							$id_customer = $customer->id;
							
// 			}
						
			$data = 2;
		}else{
			$data = -2;
		}
	
	
	
	
}catch(\Stripe\Error\Card  $e) 
     {  // ERROR AU NIVEAU DU PAIEMENT DE LA CARTE BANCAIRE
    	// PRENONS EN COMPTE LE MAXIMUM D'INFORMATION CONCERNANT LE RETOUR CARTE BLEU    

     	$data = -1;
     	 
     }	

if($data > 0){
	if(PASS_ORDER_PACK($connection_database, $id_affiliate, $id_pack, $prix_pack_ttc, $prix_pack_ht, $tva_percent_to_pay, $mode, $id_customer , $prix_pack_upgrade_ttc, $prix_pack_upgrade_ht) == 1 ){
		echo '<body onLoad="alert(\'Votre commande a été enregistrée avec succès. \')">';
		echo '<meta http-equiv="refresh" content="0;URL=../../Intranet_order_bundles.php">';
	}else{
		echo '<body onLoad="alert(\'Un problème est survenu lors de l\'enregistrement de votre commande. Veuillez réessayer plus tard. \')">';
		echo '<meta http-equiv="refresh" content="0;URL=../../Intranet_order_bundles.php">';
	}
}else{
	echo '<body onLoad="alert(\'Nous avons été contraints de refuser votre commande suite à un problème de paiement \')">';
	echo '<meta http-equiv="refresh" content="0;URL=../../Intranet_order_bundles.php">';
}

?>