<?php
header( 'content-type: text/html; charset=utf-8' );

//DATA = 0 ERREUR SQL
//DATA = 1 COMMANDE PASSEE AVEC SUCCES

require_once('../stripe/vendor/autoload.php');
require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

$id_affiliate             = $_POST['id_affiliate'];
$id_pack                  = $_POST['id_pack'];
$prix_pack_ttc            = $_POST['prix_pack_ttc'];
$prix_pack_ht             = $_POST['prix_pack_ht'];
$mode_paiement            = $_POST['mode_paiement'];
$tva_percent_to_pay       = $_POST['tva_percent_to_pay'];
$id_customer              = $_POST['id_customer'];
$prix_pack_upgrade_ttc    = 0; //$_POST['prix_pack_upgrade_ttc'];
$prix_pack_upgrade_ht     = 0; //$_POST['prix_pack_upgrade_ht'];


List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );

// ON DESACTIVE SUBSCRIPTION CUSTOMER S'IL EST DEJA ABONNE
\Stripe\Stripe::setApiKey('sk_test_2X4s7DmhzyA76TNOeVh5Yrar');
$customer = getCustomerByID($id_customer);
if($customer != ''){
	// 	$list_subscriptions = $customer->subscriptions->data;
	// 	if($list_subscriptions){
	// 		$id_subscription = $list_subscriptions[0]->id;
	// 		//$my_subscription->status = 'canceled';
	// 		//$customer->save();
	// 		var_dump($my_subscription);
	// 		// \Stripe\Subscription::retrieve($id_subscription)->deleteDiscount();
	// 	}

	$customer->delete();

}

switch (PASS_ORDER_PACK($connection_database, $id_affiliate, $id_pack, $prix_pack_ttc, $prix_pack_ht, $tva_percent_to_pay, $mode_paiement, $id_customer, $prix_pack_upgrade_ttc, $prix_pack_upgrade_ht )){
	case 0 :
		echo '<body onLoad="alert(\'Un problème est survenu lors de l\'enregistrement de votre commande. Veuillez réessayer plus tard. \')">';
		echo '<meta http-equiv="refresh" content="0;URL=../../Intranet_order_bundles.php">';
	case 1 :
		echo '<body onLoad="alert(\'Votre commande a été enregistrée avec succès. \')">';
		echo '<meta http-equiv="refresh" content="0;URL=../../Intranet_order_bundles.php">';
}



?>