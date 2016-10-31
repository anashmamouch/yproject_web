<?php
header ( "Content-Type: application/json; charset=UTF-8" );
header ( 'Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description' );
header ( 'Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header ( 'Access-Control-Allow-Origin: *' );

// API API_INSCRIPTION_MOBILE.PHP - CALLED BY APPS MOBILE ONLY
// RETURN < 0 => ERREUR SQL
// RETURN <20 : ERROR FORMAT
// 2 : PB FORMAT AU NIVEAU DU NOM
// 3 : PB FORMAT AU NIVEAU DU PRENOM
// 4 : PB PHONE NUMBER
// 5 : PB EMAIL2
// 6 : PB ZIP CODE
// 7 : PB CITY
// 8 : PB BIRTH DATE
// 12 : PB CGI 
// 14 : DEJA INSCRIT
// X : ...
// RETURN 20  : ERROR PLUS DE PLACES DISPONIBLES
// RETURN 100 : OK    -  INSCRIPTION OK

require ('../functions.php');
include ('../config.php');
include ('../config_master.php');

List ( $connection_database, $connection_ok, $message_erreur ) = PDO_CONNECT ( "", "", "" );

IF (!isset($_GET['c_g_i']))                      { $_GET['c_g_i']                    = 0;   }
IF (!isset($_GET['plus_de_18_ans']))             { $_GET['plus_de_18_ans']           = 0;   }
IF (!isset($_GET['pas_de_parrain_nosrezo']))     { $_GET['pas_de_parrain_nosrezo']   = 0;   }
IF (!isset($_GET['ville_n']))                    { $_GET['ville_n']                  = "";  }
IF (!isset($_GET['adresse']))                    { $_GET['adresse']                  = "";  }
IF (!isset($_GET['nationalite']))                { $_GET['nationalite']              = "FR";}
IF (!isset($_GET['lange_parlee']))               { $_GET['lange_parlee']             = "fr_FR";    $_GET['nationalite']  = "FR";       }
IF (trim($_GET['lange_parlee']) == "pt_PT")      {                                                  $_GET['nationalite']  = "PORTUGAL"; }

$ERROR_FORMULAIRE      = 0;
$_GET['email']        = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['email']  );
$_GET['phone_number']       = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['phone_number']  );
$_GET['id_parrain']   = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['id_parrain']  );
$_GET['name_parrain'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['name_parrain']  );

IF (empty($_GET['last_name']))                                                                        { $ERROR_FORMULAIRE = 2;   }
ELSE IF (trim($_GET['last_name']) =='')                                                                    { $ERROR_FORMULAIRE = 2;   }
ELSE IF (empty($_GET['first_name']))                                                                     { $ERROR_FORMULAIRE = 3;   }
ELSE IF (trim($_GET['first_name']) =='')                                                                 { $ERROR_FORMULAIRE = 3;   }
ELSE IF (empty($_GET['phone_number']))                                                                     { $ERROR_FORMULAIRE = 3;   }
ELSE IF (is_numeric($_GET['phone_number']) == 0)                                                           { $ERROR_FORMULAIRE = 4;   }
ELSE IF (strlen($_GET['phone_number']) < 6)                                                                { $ERROR_FORMULAIRE = 4;   }
ELSE IF (substr($_GET['phone_number'], 0, 2) == "08")                                                      { $ERROR_FORMULAIRE = 4;   }
ELSE IF (trim($_GET['email']) <> trim($_GET['email2']))                                             { $ERROR_FORMULAIRE = 5;   }
ELSE IF (empty($_GET['zip_code']))                                                                         { $ERROR_FORMULAIRE = 6;   }
ELSE IF (strlen($_GET['zip_code']) < 4)                                                                    { $ERROR_FORMULAIRE = 6;   }
ELSE IF (empty($_GET['city']))                                                                      { $ERROR_FORMULAIRE = 7;   }
ELSE IF (trim($_GET['city']) =='')                                                                  { $ERROR_FORMULAIRE = 7;   }
ELSE IF (trim($_GET['birth_date']) =='')                                                                 { $ERROR_FORMULAIRE = 8;   }
ELSE IF ($_GET['c_g_i'] == 0)                                                                        { $ERROR_FORMULAIRE = 12;  }
ELSE IF (CHECK_IF_AFFILIATE_ALREADY_EXIST($connection_database, "email", $_GET['email'])  >= 1 )     { $ERROR_FORMULAIRE = 14;  }
ELSE IF (CHECK_IF_AFFILIATE_ALREADY_EXIST($connection_database, "phone", $_GET['phone_number']) >= 1 )     { $ERROR_FORMULAIRE = 14;  }


IF ( $ERROR_FORMULAIRE == 0 AND $_GET['pas_de_parrain_nosrezo'] == 0 )                 // UN PARRAIN EST DÉCLARÉ CHEZ YWORLD
{
	IF (is_numeric($_GET['id_parrain']) == 0)                                                                       { $ERROR_FORMULAIRE = 11;  }
	ELSE IF (CHECK_PARRAIN_EXIST($connection_database,  $_GET['id_parrain'], $_GET['name_parrain'] ) == 0 )        { $ERROR_FORMULAIRE = 13;  }
}
ELSE IF( trim($_GET['id_parrain']) == "" AND $_GET['pas_de_parrain_nosrezo'] == 1 )   // PAS DE PARRAIN DÉCLARÉ CHEZ YWORLD
{
	$_GET['id_parrain']   = 37286;
	$_GET['name_parrain'] = "TEMPORAIRE";

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

IF ($ERROR_FORMULAIRE > 0 )
{
	$data = $ERROR_FORMULAIRE ; // PB FORMAT
}
ELSE     //LES DONNÉES NE SONT PAS VIDE
{
	$_GET['nom']            = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['email']  );
	$_GET['first_name']         = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['first_name']  );
	$_GET['name_parrain']   = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['name_parrain']  );
	$_GET['phone_number']         = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['phone_number']  );
	$_GET['email']          = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['email']  );
	$_GET['adresse']        = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['adresse']  );
	$_GET['zip_code']             = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['zip_code']  );
	$_GET['city']          = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['city']  );
	$_GET['city_n']        = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['city_n']  );
	$_GET['nationalite']    = VALUE_TO_CHECK_NORRIS( $connection_database, $_GET['nationalite']  );

	$date_n                 = $_GET['birth_date'];
	$first_last_name             = ucfirst(strtolower($_GET['first_name']));
	$last_last_name              = strtoupper($_GET['nom']);
	$name_parrain           = ucfirst($_GET['name_parrain']);
	$phone_number                 = $_GET['phone_number'];
	$email                  = $_GET['email'];
	$adresse                = $_GET['adresse'];
	$cp                     = $_GET['zip_code'];
	$city                  = ucfirst(strtolower($_GET['city']));
	$city_n                = ucfirst($_GET['city_n']);
	$nationalite            = ucfirst($_GET['nationalite']);
	$nationalite            = 'FR';
	$id_affiliate_max       = ID_MAXIMUM_FROM_TABLE( $connection_database, "affiliate_details", "id_affiliate" );

	/////// CHECK IF AFFILIATE IS ABLE TO INVIT NEW NOSREZO MEMBERS
	List ($nb_filleul_L1, $nb_filleul_L2, $is_able_to_invit, $first_last_name_parrain, $email_parrain, $phone_parrain, $nb_place_disponible, $numero_de_pack, $grade_nosrezo, $is_protected  ) = IS_ABLE_TO_PARRAINER( $connection_database, $_GET['id_parrain'] );

	IF ( $is_able_to_invit == 0) // PAS DE PLACE POUR DE NOUVEAUX FILLEULS
	{
		//include('email/max_filleul_atteint_parrain.php');
		//SEND_EMAIL_MAX_FILLEUL($_GET['id_parrain'], $first_last_name." ".$last_last_name , $cp." ".$city , $phone_number , $serveur);
		$data = 20 ;
	}
	ELSE
	{
		$country           = "";
		List ($latitude, $longitude) = GEO_LOCALISATION_ADRESSE($connection_database, $cp, $city , $adresse, "INSERT AFFILIE", $country);
		IF (INSERT_INTO_AFFILIATE_DETAILS($connection_database, $_GET['id_parrain'], $id_affiliate_max, 0, $_GET['gender'], $first_last_name, $last_last_name, $adresse, $cp, $city, $phone_number, $email, "", "", $date_n, $city_n, $nationalite, 0, 1, $latitude, $longitude) == 1)
		{

			IF ( trim($_GET['lange_parlee']) == "fr_FR" )
			{

			}
			ELSE IF ( trim($_GET['lange_parlee']) == "pt_PT"  )
			{

			}

			$data = 100 ;
		}
		ELSE         ///////// SI ÇA NE FONCTIONNE PAS : LA CRÉATION DE L'AFFILIÉ A ECHOUÉ POUR UN PROBLÉME TECHNIQUE
		{
			$data = 0 ;
		}
	}

}

 echo json_encode ( array ("data" => $data) );



?>