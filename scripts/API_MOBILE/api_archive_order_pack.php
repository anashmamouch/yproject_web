<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

//DATA = 0 ERREUR SQL
//DATA = 1 ARCHIVE PASSE AVEC SUCCES
//DATA = 2 COMMANDE INNEXISTANTE


require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

$id_affiliate = $_GET['id_affiliate'];

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );


switch (ARCHIVE_PASS_ORDER_PACK($connection_database, $id_affiliate)){
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
		case 2 :
			echo json_encode ( array (
			"data" => 2
			) );
			break;
}


?>