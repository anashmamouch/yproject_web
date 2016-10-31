<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

// API API_CONNECTION.PHP - CALLED BY APPS MOBILE ONLY
// RETURN 1 : ERROR DE FORMAT
// RETURN 2 : MEMBRE NON RECONNU OU INACTIF - FAIRE DEMANDE DE MDP OU CONTACTER Y_PROJECT :
// RETURN 100 : OK ON ENTRE DANS L'APPLICATION


require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

$id_affiliate          = $_GET['id_affiliate'];
$password_aff          = $_GET['password'];
$version_application   = $_GET['version_application'];       // INITIALEMENT '1.0.0'

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "");

$id_affiliate = VALUE_TO_CHECK_NORRIS($connection_database, $id_affiliate);
$password_aff = VALUE_TO_CHECK_NORRIS($connection_database, $password_aff);

switch (login ( $connection_database, $id_affiliate, $password_aff, $version_application )) {
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
	case 100 :
		echo json_encode ( array (
				"data" => 100 
		) );
		break;
}


?>