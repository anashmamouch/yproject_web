<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

// API API_UPDATE_PROFIL.PHP - CALLED BY APPS MOBILE ONLY
// DATA < 0 => ERREUR SQL
// DATA > 0 => MODIFICATION EFFECTUEE AVEC SUCCES
// DATA = 0 => AUCUNE MODIFICATION A APPLIQUER


require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );

$id_affiliate= $_GET ["id_affiliate"];
$id_affiliate = VALUE_TO_CHECK_NORRIS($connection_database, $id_affiliate);

$phone_number= $_GET ["phone_number"];
$phone_number = VALUE_TO_CHECK_NORRIS($connection_database, $phone_number);

$email= $_GET ["email"];
$email = VALUE_TO_CHECK_NORRIS($connection_database, $email);

$address= $_GET ["address"];
$address = VALUE_TO_CHECK_NORRIS($connection_database, $address);

$zip_code= $_GET ["zip_code"];
$zip_code = VALUE_TO_CHECK_NORRIS($connection_database, $zip_code);

$city= $_GET ["city"];
$city = VALUE_TO_CHECK_NORRIS($connection_database, $city);

$nationality= $_GET ["nationality"];
$nationality = VALUE_TO_CHECK_NORRIS($connection_database, $nationality);

$entreprise_name= $_GET ["entreprise_name"];
$entreprise_name = VALUE_TO_CHECK_NORRIS($connection_database, $entreprise_name);

$SIRET= $_GET ["SIRET"];
$SIRET = VALUE_TO_CHECK_NORRIS($connection_database, $SIRET);

$TVA_INTRA= $_GET ["TVA_INTRA"];
$TVA_INTRA = VALUE_TO_CHECK_NORRIS($connection_database, $TVA_INTRA);

$table_to_update = 'affiliate_details';
$row_field_update_assoc = array('phone_number' => $phone_number, 'email' => $email, 'address' => $address, 'zip_code' => $zip_code, 'city' => $city, 'nationality' => $nationality, 'entreprise_name' => $entreprise_name , 'SIRET' => $SIRET, 'TVA_INTRA' => $TVA_INTRA);
$row_id_key_assoc = array('id_affiliate'=>$id_affiliate);


$result =  UPDATE_TABLE_MANY_FIELD_QUERY($connection_database, $table_to_update, $row_field_update_assoc, $row_id_key_assoc);

echo json_encode ( array ("data" => $result) );

?>