<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

//DATA = 0 ERREUR SQL
//DATA = 1 COMMANDE PASSEE AVEC SUCCES


require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

$id_affiliate               = $_GET['id_affiliate'];
$id_pack                    = $_GET['id_pack'];
$prix_pack_ttc              = $_GET['prix_pack_ttc'];
$prix_pack_ht               = $_GET['prix_pack_ht'];
$mode_paiement              = $_GET['mode_paiement'];
$tva_percent_to_pay         = $_GET['tva_percent_to_pay'];
$id_customer                = 123; // A MODIFIER PAR YASSINE
$prix_pack_upgrade_ttc      = $_GET['prix_pack_upgrade_ttc'];
$prix_pack_upgrade_ht       = $_GET['prix_pack_upgrade_ht'];

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );

switch ( PASS_ORDER_PACK($connection_database, $id_affiliate, $id_pack, $prix_pack_ttc, $prix_pack_ht, $tva_percent_to_pay, $mode_paiement, $id_customer, $prix_pack_upgrade_ttc, $prix_pack_upgrade_ht )){
	case 0 :
		echo json_encode ( array (
				"data" => 0 
		) );
		break;
	case 1 :
		echo json_encode ( array (
				"data" => 1 
		) );
		break;
}




?>