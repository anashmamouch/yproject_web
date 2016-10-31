<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );

$id_affiliate  =  $_GET['id_affiliate'];
$id_affiliate  =  VALUE_TO_CHECK_NORRIS($connection_database, $id_affiliate);


$listePack = RETURN_INFOS_PACKS($connection_database,$id_affiliate);

echo json_encode($listePack);



?>