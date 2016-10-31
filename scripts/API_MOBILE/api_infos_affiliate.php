<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );

$term = $_GET ["term"];
$id_affiliate = VALUE_TO_CHECK_NORRIS($connection_database, $term);

List( $id_parrain ,$first_name, $last_name, $first_and_last_name, $is_activated, $address, $zip_code, $city, $phone_number, $email, $creation_date, $birth_place, $nationality, $birth_date , $last_connection_date, $mode, $contract_signed, $id_securite_sociale, $affiliate_latitude, $affiliate_longitude, $creation_depuis, $connection_depuis, $password, $entreprise_name, $kbis_recu, $SIRET, $TVA_INTRA , $kbis_commercial, $numero_facture )= RETURN_INFO_AFFILIATE( $connection_database, $id_affiliate   );

List( $id_parrain2 ,$first_name_p2, $last_name_p2, $first_and_last_name_p2, $is_activated_p2, $address_p2, $zip_code_p2, $city_p2, $phone_number_p2, $email_p2, $creation_date2, $birth_place2, $nationality2, $birth_date2 , $last_connection_date2, $mode2, $contract_signed2, $id_securite_sociale2, $affiliate_latitude2, $affiliate_longitude2, $creation_depuis2, $connection_depuis2, $password2  )= RETURN_INFO_AFFILIATE( $connection_database, $id_parrain  );

List( $code_banque, $code_guichet, $numero_compte, $cle_rib, $IBAN, $iban_creation_date , $nom_banque, $BIC_CLIENT ) = RETURN_INFO_AFF_IBAN($connection_database, $id_affiliate);

switch ($nationality){
	case 'Française' : $pays = "France"; Break;
	default : $pays = "France"; Break;
}

$list_type_entreprise = RETURN_TYPE_ENTREPRISE_BY_COUNTRY($connection_database, $pays);


echo json_encode ( array (
		"id_parrain" => $id_parrain,
		"first_name" => $first_name,
		"last_name" => $last_name,
		"first_and_last_name" => $first_and_last_name,
		"is_activated" => $is_activated,
		"address" => $address,
		"zip_code" => $zip_code,
		"city" => $city,
		"phone_number" => $phone_number,
		"email" => $email,
		"creation_date" => $creation_date,
		"birth_place" => $birth_place,
		"nationality" => $nationality,
		"pays" => $pays,
		"birth_date" => $birth_date,
		"last_connection_date" => $last_connection_date,
		"mode" => $mode,
		"contract_signed" => $contract_signed,
		"id_securite_sociale" => $id_securite_sociale,
		"affiliate_latitude" => $affiliate_latitude,
		"affiliate_longitude" => $affiliate_longitude,
		"creation_depuis" => $creation_depuis,
		"connection_depuis" => $connection_depuis,
		"password" => $password,
		"entreprise_name" => $entreprise_name,
		"kbis_recu" => $kbis_recu,
		"SIRET" => $SIRET,
		"TVA_INTRA" => $TVA_INTRA,
		"kbis_commercial" => $kbis_commercial,
		"numero_facture" => $numero_facture,
		"id_parrain2" => $id_parrain2,
		"first_name_p2" => $first_name_p2,
		"first_name_p2" => $first_name_p2,
		"first_and_last_name_p2" => $first_and_last_name_p2,
		"is_activated_p2" => $is_activated_p2,
		"address_p2" => $address_p2,
		"zip_code_p2" => $zip_code_p2,
		"city_p2" => $city_p2,
		"phone_number_p2" => $phone_number_p2,
		"email_p2" => $email_p2,
		"creation_date2" => $creation_date2,
		"birth_place2" => $birth_place2,
		"nationality2" => $nationality2,
		"birth_date2" => $birth_date2,
		"last_connection_date2" => $last_connection_date2,
		"mode2" => $mode2,
		"contract_signed2" => $contract_signed2,
		"id_securite_sociale2" => $id_securite_sociale2,
		"affiliate_latitude2" => $affiliate_latitude2,
		"affiliate_longitude2" => $affiliate_longitude2,
		"creation_depuis2" => $creation_depuis2,
		"connection_depuis2" => $connection_depuis2,
		"password2" => $password2,
		"code_banque" => $code_banque,
		"code_guichet" => $code_guichet,
		"numero_compte" => $numero_compte,
		"cle_rib" => $cle_rib,
		"IBAN" => $IBAN,
		"iban_creation_date" => $iban_creation_date,
		"nom_banque" => $nom_banque,
		"BIC_CLIENT" => $BIC_CLIENT,
		"list_type_entreprise" => $list_type_entreprise
		
) );


?>