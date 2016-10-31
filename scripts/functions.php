<?php  function MATRICE_MLM_YERS($habilitation, $param2, $param3)
{	 		 
	     $mlm_niv1          = 5; // 5% du pack HT
	     $mlm_niv2          = 10; // 10% du pack HT 
	     $mlm_niv3          = 15; // 15% du pack HT 
	     $mlm_niv4          = 20; // 20% du pack HT 
	     $mlm_niv5          = 30; // 30% du pack HT 
	     $mlm_niv6          = 0; // 0% du pack HT 
	     $mlm_niv7          = 0; // 0% du pack HT 
         $mlm_total         = 80; // 9% du pack HT 
		 
	     $mlm_niv1_display  = 4; // 4% du pack HT
	     $mlm_niv2_display  = 1; // 1% du pack HT 
	     $mlm_niv3_display  = 1; // 1% du pack HT 
	     $mlm_niv4_display  = 1; // 1% du pack HT 
	     $mlm_niv5_display  = 2; // 2% du pack HT 
	     $mlm_niv6_display  = 0; // 0% du pack HT 
	     $mlm_niv7_display  = 0; // 0% du pack HT 
         $mlm_total_display = 9; // 9% du pack HT 		 

	 return array($mlm_niv1, $mlm_niv2, $mlm_niv3, $mlm_niv4, $mlm_niv5, $mlm_niv6, $mlm_niv7, $mlm_total,  $mlm_niv1_display ,$mlm_niv2_display ,$mlm_niv3_display, $mlm_niv4_display, $mlm_niv5_display , $mlm_niv6_display, $mlm_niv7_display , $mlm_total_display    );
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_DATA_FROM_QUERY_AS_master_data($connection_database, $requete_to_return_data, $id_affiliate ) 
{
	 $result = $connection_database->prepare( $requete_to_return_data  );
     $result->execute(array(':id_affiliate' => $id_affiliate ));
	 $reponse = $result->fetch(PDO::FETCH_ASSOC);
	 $master_data = $reponse["master_data"];
	 
	 return ($master_data);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php  function REQUETE_AFF_DETAILS_CHAMPS($id_affiliate, $level) 
{    // LISTE DES TOUS LES CHAMPS RELATIFS À L'AFFILIÉ
	 $requete_a_retourner =  " af.id_affiliate, IFNULL(id_upline, 0) as id_upline, af.password, ad.first_name, ad.last_name, CONCAT(ad.first_name, ' ', ad.last_name) as first_and_last_name, ad.address, ad.zip_code, ad.city, ad.phone_number, ad.email, ad.creation_date, ad.birth_place, ad.nationality, ad.birth_date, af.last_connection_date, af.is_activated, ad.contract_signed, af.id_partenaire , mode, habilitation, sous_habilitation, id_securite_sociale, affiliate_latitude, affiliate_longitude, ".$level." as niveau, entreprise_name, kbis_recu, SIRET, TVA_INTRA, kbis_commercial, numero_facture ";		 
	 return ($requete_a_retourner);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php  function VALUE_TO_CHECK_NORRIS( $connection_database, $value_to_check ) 
{    
	 $value_to_check = trim(stripslashes($value_to_check));
	 //$value_to_check = $connection_database->quote($value_to_check);

	 return ($value_to_check);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php  function RETURN_INFO_AFFILIATE($connection_database, $id_affiliate )
{   
    include('config.php'); 
  
    $sql = "SELECT count(*) as is_exist, " . REQUETE_AFF_DETAILS_CHAMPS ( $id_affiliate, 0 ) . "
	        FROM affiliate_details ad, affiliate af   
		    WHERE ad.id_affiliate =  af.id_affiliate 
		    AND ad.id_affiliate   = :id_affiliate";
	 
	 try {
	 	$stmt = $connection_database->prepare ( $sql );
	 	$stmt->execute ( array ( ':id_affiliate' => $id_affiliate ) );
	 	$result = $stmt->fetch ( PDO::FETCH_ASSOC );
	 } catch ( PDOException $e ) {
	 	die ( $e->getMessage () );
	 }
	
		 $id_upline              = $result['id_upline']; 
		 $first_name             = $result['first_name'];
         $last_name              = $result['last_name'];
         $first_and_last_name    = $result['first_and_last_name'];		 IF ( trim($first_and_last_name) == "" ) { $first_and_last_name = $nom_prenom_parrain_siege; }		 
		 $is_activated           = $result['is_activated'];	             
         $address                = $result['address'];	                 IF ( trim($address) == "" )         { $address = $adresse_siege_1;            }
		 $zip_code               = $result['zip_code'];	                 IF ( trim($zip_code) == "" )        { $zip_code = $code_postal_siege;         }
		 $city                   = $result['city'];	                     IF ( trim($city) == "" )            { $city = $ville_siege;                   }
		 $phone_number           = $result['phone_number'];	             IF ( trim($phone_number) == "" )    { $phone_number = $telephone_siege;       } 
		 $email                  = $result['email'];	                 IF ( trim($email) == "" )           { $email = $mail_parrain_siege;           } 
		 $creation_date          = $result['creation_date'];	         IF ( trim($creation_date) == "" )   { $creation_date = "2017-01-01 12:10:30"; }
		 $birth_place            = $result['birth_place'];	
		 $nationality            = $result['nationality'];	
		 $birth_date             = $result['birth_date'];	             IF ( trim($birth_date) == "" )      { $birth_date = "15/07/1979"; }
		 $last_connection_date   = $result['last_connection_date'];	
		 $mode                   = $result['mode'];	
		 $contract_signed        = $result['contract_signed'];
         $id_securite_sociale    = $result['id_securite_sociale'];
		 $affiliate_latitude     = $result['affiliate_latitude'];
		 $affiliate_longitude    = $result['affiliate_longitude']; 
	     $creation_depuis        = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime( $creation_date))/(60*60*24)); 
		 $connection_depuis      = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime( $last_connection_date ))/(60*60*24));
         $password               = $result['password']; 
         $entreprise_name		 = $result['entreprise_name'];
         $kbis_recu		         = $result['kbis_recu'];
		 $SIRET		             = $result['siret'];
		 $TVA_INTRA		 		 = $result['tva_intra'];
		 $kbis_commercial		 = $result['kbis_commercial'];
		 $numero_facture		 = $result['numero_facture'];
		 
     return array( $id_upline ,$first_name, $last_name, $first_and_last_name, $is_activated, $address, $zip_code, $city, $phone_number, $email, $creation_date, $birth_place, $nationality, $birth_date , $last_connection_date, $mode, $contract_signed, $id_securite_sociale, $affiliate_latitude, $affiliate_longitude, $creation_depuis, $connection_depuis, $password, $entreprise_name, $kbis_recu, $SIRET, $TVA_INTRA, $kbis_commercial, $numero_facture );
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_INFO_AFF_IBAN($connection_database, $id_affiliate)
{   

        $sql = "SELECT count(*) as is_exist, code_banque, code_guichet, numero_compte, cle_rib, IBAN, iban_creation_date, nom_banque , BIC_CLIENT 
                FROM   affiliate_iban 
			    WHERE id_affiliate  = :id_affiliate";
        
        try {
        	$stmt = $connection_database->prepare ( $sql );
        	$stmt->execute ( array (':id_affiliate' => $id_affiliate ) );
        	$result = $stmt->fetch ( PDO::FETCH_ASSOC );
        } catch ( PDOException $e ) {
        	die ( $e->getMessage () );
        }

		 $code_banque          = $result['code_banque'];
         $code_guichet         = $result['code_guichet'];		 
		 $numero_compte        = $result['numero_compte'];	
         $cle_rib              = $result['cle_rib'];	
		 $IBAN                 = $result['iban'];	
		 $iban_creation_date   = $result['iban_creation_date'];	
		 $nom_banque           = $result['nom_banque'];	
		 $BIC_CLIENT           = $result['bic_client'];	

     return array( $code_banque, $code_guichet, $numero_compte, $cle_rib, $IBAN, $iban_creation_date , $nom_banque, $BIC_CLIENT  );
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_INFO_AFF_BUNDLE($connection_database, $id_affiliate, $is_activated)
{   
        $sql = "SELECT count(*) as is_exist, id_commande_pack, id_pack, prix_pack_ttc, prix_pack_ht, date_debut_abonnement, date_fin_abonnement, is_subscription , id_customer, commission_commercial , commission_mlm, creation_date, nb_jours_depuis, nb_jours_restant, prix_pack_upgrade_ttc, prix_pack_upgrade_ht
                FROM   02_commande_pack 
			    WHERE id_affiliate  = :id_affiliate
				AND   is_activated = :is_activated  ";
        
        try {
        	$stmt = $connection_database->prepare ( $sql );
        	$stmt->execute ( array ( ':id_affiliate' => $id_affiliate, ':is_activated' => $is_activated) );
        	$result = $stmt->fetch ( PDO::FETCH_ASSOC );
        } catch ( PDOException $e ) {
        	die ( $e->getMessage () );
        }

		 $is_exist              = $result['is_exist'];
		 $id_commande_pack      = $result['id_commande_pack'];
         $id_pack               = $result['id_pack'];		 
		 $prix_pack_ttc         = $result['prix_pack_ttc']*1; // POUR VALIDER LES FORMATS	
         $prix_pack_ht          = $result['prix_pack_ht']*1;  // POUR VALIDER LES FORMATS	
		 $date_debut_abonnement = $result['date_debut_abonnement'];	
		 $date_fin_abonnement   = $result['date_fin_abonnement'];	
		 $is_subscription       = $result['is_subscription'];	
		 $id_customer           = $result['id_customer'];
         $commission_commercial = $result['commission_commercial']*1;	
         $commission_mlm        = $result['commission_mlm']*1;	
         $creation_date         = $result['creation_date'];	
         $nb_jours_depuis       = $result['nb_jours_depuis'];
         $nb_jours_restant      = $result['nb_jours_restant'];	
         $prix_pack_upgrade_ttc = $result['prix_pack_upgrade_ttc']*1;	
         $prix_pack_upgrade_ht  = $result['prix_pack_upgrade_ht']*1;
		 
     return array( $is_exist, $id_commande_pack, $id_pack, $prix_pack_ttc, $prix_pack_ht, $date_debut_abonnement, $date_fin_abonnement , $is_subscription, $id_customer, $commission_commercial, $commission_mlm, $creation_date, $nb_jours_depuis, $nb_jours_restant, $prix_pack_upgrade_ttc, $prix_pack_upgrade_ht  );
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function RETURN_NOM_PARRAINS_UPLINE( $connection_database, $id_affiliate, $nom_prenom_parrain_siege , $telephone_siege  ) 
{ 
     List( $id_parrain_niveau_1 ,$first_name, $last_name, $first_and_last_name ) = RETURN_INFO_AFFILIATE( $connection_database, $id_affiliate         );
     List( $id_parrain_niveau_2 ,$first_name, $last_name, $parrain_niveau_1    ) = RETURN_INFO_AFFILIATE( $connection_database, $id_parrain_niveau_1  );
     List( $id_parrain_niveau_3 ,$first_name, $last_name, $parrain_niveau_2    ) = RETURN_INFO_AFFILIATE( $connection_database, $id_parrain_niveau_2  );
     List( $id_parrain_niveau_4 ,$first_name, $last_name, $parrain_niveau_3    ) = RETURN_INFO_AFFILIATE( $connection_database, $id_parrain_niveau_3  );
     List( $id_parrain_niveau_5 ,$first_name, $last_name, $parrain_niveau_4    ) = RETURN_INFO_AFFILIATE( $connection_database, $id_parrain_niveau_4  );
     List( $id_parrain_niveau_6 ,$first_name, $last_name, $parrain_niveau_5    ) = RETURN_INFO_AFFILIATE( $connection_database, $id_parrain_niveau_5  );
     List( $id_parrain_niveau_7 ,$first_name, $last_name, $parrain_niveau_6    ) = RETURN_INFO_AFFILIATE( $connection_database, $id_parrain_niveau_6  );
	 
     return array ( $id_parrain_niveau_1, $parrain_niveau_1, $id_parrain_niveau_2, $parrain_niveau_2, $id_parrain_niveau_3, $parrain_niveau_3, $id_parrain_niveau_4, $parrain_niveau_4, $id_parrain_niveau_5, $parrain_niveau_5, $id_parrain_niveau_6, $parrain_niveau_6     ) ;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function REQUETE_FILTRE_MLM_LEVEL($connection_database, $id_affiliate, $level) 
{
	      IF ($level == 1 )      { $requete_a_retourner = " in ( SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 ) " ; }
	 ELSE IF ($level == 2 )      { $requete_a_retourner = " in ( SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 ) ) "; }
	 ELSE IF ($level == 3 )      { $requete_a_retourner = " in ( SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 ))   ) "; }
	 ELSE IF ($level == 4 )      { $requete_a_retourner = " in ( SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 )))   ) "; }
	 ELSE IF ($level == 5 )      { $requete_a_retourner = " in ( SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 ))))   ) "; }
	 ELSE IF ($level == "FULL" ) { $requete_a_retourner = " in ( SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 UNION SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 )  UNION SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 )) UNION SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 ))) UNION  SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline in (SELECT id_affiliate FROM affiliate where id_upline=".$id_affiliate." and is_activated = 1 ))))                 )" ; }
	 
	 return ($requete_a_retourner);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php  function UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, $table_to_update, $field_key, $id_key, $id_field, $c_value, $source ) 
{
	// RETOUR < 0 => ERREUR SQL
	// RETOUR > 0 => MODIFICATION EFFECTUEE AVEC SUCCES
	// RETOUR = 0 => AUCUNE MODIFICATION A APPLIQUER
	
	 date_default_timezone_set('Europe/Paris');	
	 $c_value = VALUE_TO_CHECK_NORRIS( $connection_database, $c_value );	
	 
     IF ( $c_value == "NOW" )
     {	
         $sql_to_update = " UPDATE  $table_to_update 
	                        SET     $id_field   =  '".date('Y-m-d H:i:s')."'							 
	                        WHERE   $field_key  = '$id_key'          ";			
	 } 
	 ELSE IF ( $id_key > 0 )
     {		
         $sql_to_update = " UPDATE  $table_to_update 
	                        SET     $id_field   = \"$c_value\"								 
	                        WHERE   $field_key  = '$id_key'          ";
	 }	


	 try{
	 $count =  $connection_database->exec($sql_to_update);
	 // &count == 1 si la modification a été effectuée avec sucès
	 return $count;
	 }catch (PDOException $e){
		//die($e->getMessage());
		return -1;
	}
	 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php function UPDATE_TABLE_MANY_FIELD_QUERY( $connection_database, $table_to_update, $row_field_update_assoc, $row_id_key_assoc )
{
	// RETOUR < 0 => ERREUR SQL
	// RETOUR > 0 => MODIFICATION EFFECTUEE AVEC SUCCES
	// RETOUR = 0 => MODIFICATION NON PRISE EN COMPTE


	if(count($row_field_update_assoc) == 0 || count($row_id_key_assoc) == 0){
		return -2;
	}else{
		
		// Construction de la chaine UPDATE TABLE SET...
		$sql_update = "UPDATE $table_to_update SET ";
		foreach ($row_field_update_assoc as $rowName => $rowValue) {
			$sql_update .= "$rowName = '$rowValue',";
		}
		$sql_update= substr($sql_update, 0, -1);
		$sql_update .= " ";
		
		//Construction de la clause WHERE
		$sql_where = "WHERE ";
		foreach ($row_id_key_assoc as $rowName => $rowValue) {
			$sql_where .= "$rowName = '$rowValue' AND";
		}
		$sql_where = substr($sql_where, 0, -3);
		
		
	    $sql_query = $sql_update.$sql_where;
		
		try{
			$count =  $connection_database->exec($sql_query);
			return $count;
		}catch (PDOException $e){
			//die($e->getMessage());
			return -1;
		}
	}

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function INSERT_TABLE_ONE_FIELD_QUERY( $connection_database, $table_to_insert, $row_field_insert_assoc )
{
	// RETOUR < 0 => ERREUR SQL
	// RETOUR >= 0 => MODIFICATION EFFECTUEE AVEC SUCCES
	
	if(count($row_field_insert_assoc) == 0){
		return -1;
	}else{
		// Construction de la chaine INSERT INTO(...)VALUES(...)
		$sql_insert = "INSERT INTO $table_to_insert (";
		foreach ($row_field_insert_assoc as $rowName => $rowValue) {
			$sql_insert .= "$rowName,";
		}
		$sql_insert= substr($sql_insert, 0, -1);
		$sql_insert .= ") VALUES(";
		foreach ($row_field_insert_assoc as $rowName => $rowValue) {
			$sql_insert .= "'$rowValue',";
		}
		$sql_insert= substr($sql_insert, 0, -1);
		$sql_insert .= ") ";

		try{
			$count =  $connection_database->exec($sql_insert);
			return $count;
		}catch (PDOException $e){
			return -1;
		}
		
	}
	
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_REQUETE_AFFILIATE($connection_database, $id_affiliate, $level, $is_activated, $order_by) 
{
	        $requete_a_retourner =  " SELECT ". REQUETE_AFF_DETAILS_CHAMPS($id_affiliate, $level) ."
	        		                  FROM   affiliate_details ad, affiliate af 
	        					      WHERE  ad.id_affiliate = af.id_affiliate  
	        					      AND    af.id_affiliate  ".REQUETE_FILTRE_MLM_LEVEL($connection_database, $id_affiliate, $level)." 
	        					      AND    af.is_activated = ". $is_activated ."  	      ";	
	 return ( $requete_a_retourner );
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>


<?php  function REQUETE_FILTRE_LISTE_AFFILIATE_LEVEL($connection_database, $id_affiliate, $level, $is_activated, $order_by) 
{
	IF ($level <> "FULL" )
	     {
	        $requete_a_retourner  =  RETURN_REQUETE_AFFILIATE($connection_database, $id_affiliate, $level, $is_activated, $order_by);	
         }
    ELSE IF ($level == "FULL" )  
	     { 
             $requete_a_retourner =  RETURN_REQUETE_AFFILIATE($connection_database, $id_affiliate, 1, $is_activated, "")
			                        ."  UNION  "
									.RETURN_REQUETE_AFFILIATE($connection_database, $id_affiliate, 2, $is_activated, "")
									."  UNION  "
									.RETURN_REQUETE_AFFILIATE($connection_database, $id_affiliate, 3, $is_activated, "")
									."  UNION  "
									.RETURN_REQUETE_AFFILIATE($connection_database, $id_affiliate, 4, $is_activated, "")
									."  UNION  "
									.RETURN_REQUETE_AFFILIATE($connection_database, $id_affiliate, 5, $is_activated, "");		
		 }
	
     $requete_a_retourner =  $requete_a_retourner ." ORDER by  ".$order_by; 	
	 return ( $requete_a_retourner );
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>


<?php  function DISPLAY_PROFILE_PICTURE($id_affiliate, $nb_remonte )
{ 
 	
	 IF ( $nb_remonte == 0) 
	    {
	      $path     = "fichiers/photos/yers/images_resize/affiliate_".$id_affiliate."_profile.png";
		  IF (!file_exists($path)) {  $path     = "fichiers/photos/yers/affiliate_X_profile.png"; }	
		}
	 ELSE IF ( $nb_remonte == 1) 
	    {
	      $path     = "../fichiers/photos/yers/images_resize/affiliate_".$id_affiliate."_profile.png";
		  IF (!file_exists($path)) {  $path     = "../fichiers/photos/yers/affiliate_X_profile.png"; }	
		}
		

			
     return ($path); 
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function SING_PLUR_MOTS_SPECIAUX($mot_a_changer_sing, $mot_a_changer_plur, $nb, $maj_ou_min) 
{ // EXEMPLE : 1 CHEVAL >> 2 CHEVAUX
     IF ($nb > 1)       { $mot_a_changer = $mot_a_changer_plur; }
     ELSE IF ($nb < -1) { $mot_a_changer = $mot_a_changer_plur; }
	 ELSE               { $mot_a_changer = $mot_a_changer_sing; }

	 IF ($maj_ou_min == 1) {$mot_a_changer = strtoupper($mot_a_changer) ;}
	 
     return ($mot_a_changer);							
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function SING_PLUR($mot_a_changer, $nb, $maj_ou_min) 
{ // EXEMPLE : 1 BANANE >> 2 BANANES
     IF ($nb > 1)       { $mot_a_changer = $mot_a_changer."s"; }
     ELSE IF ($nb < -1) { $mot_a_changer = $mot_a_changer."s"; }
	 ELSE               { $mot_a_changer = $mot_a_changer; }

	 IF ($maj_ou_min == 1) {$mot_a_changer = strtoupper($mot_a_changer) ;}
	 
     return ($mot_a_changer);							
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function GESTION_PARAMETRES_SESSION($connection_database, $first_name, $id_affiliate, $id_partenaire, $email, $id_upline, $mode, $triforce_grade, $habilitation, $open_page, $sous_habilitation_code )
{ 
                         List($triforce_grade_long, $triforce_grade_small) = RETURN_TRIFORCE_GRADE($triforce_grade);
						 List($habilitation_texte, $habilitation_texte_court, $sous_habilitation_code_retour, $sous_habilitation_texte ) = GESTION_HABILITATION_YERS( $sous_habilitation_code ) ;

			             $_SESSION['first_name']                = utf8_encode($first_name);       // STOCKAGE DE LA VARIABLE : PRÉNOM  
			             $_SESSION['id_affiliate']              = $id_affiliate ;                 // STOCKAGE DE LA VARIABLE : ID_AFFILIATE  
						 $_SESSION['id_partenaire']             = $id_partenaire ;                // STOCKAGE DE LA VARIABLE : ID_PARTENAIRE  
			             $_SESSION['email_affiliate']           = $email;                         // STOCKAGE DE LA VARIABLE : MAIL AFFILIATE
			             $_SESSION['id_upline']                 = $id_upline;                     // STOCKAGE DE LA VARIABLE : id_upline 
			             $_SESSION['triforce_grade']            = $triforce_grade_small;          // STOCKAGE DE LA VARIABLE : triforce_grade
			             $_SESSION['triforce_grade_long']       = $triforce_grade_long;           // STOCKAGE DE LA VARIABLE : triforce_grade
						 $_SESSION['statut'] 				    = $mode; 						  // COMMERCIAL - BACK-OFFICE - CALL-CENTER - INSTALLATEUR... 

						 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						 $_SESSION['habilitation'] 			    = $habilitation; 				  // 1 - PRODUIT LÉGER / 2 - PRODUIT LOURD
						 $_SESSION['habilitation_texte']        = $habilitation_texte;
						 $_SESSION['habilitation_texte_court']  = $habilitation_texte_court;
						 $_SESSION['sous_habilitation_code']    = $sous_habilitation_code; 		  // "200000000" - "100000000" 						 

						 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				         IF ( $open_page == 1 )
						 {                   
						  	     UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate", "id_affiliate", $id_affiliate, "last_connection_date", "NOW", "login.php" ); // MISE À JOUR DU TIMESTAMP DE CONNECTION
								 
			                             IF ( $mode == "COMMERCIAL")            {  echo '<meta http-equiv="refresh" content="0;URL=../Intranet_profil_parametres.php">';   }			 
			                     ELSE    IF ( $mode == "BACK-OFFICE")           {  echo '<meta http-equiv="refresh" content="0;URL=../Intranet_profil_parametres.php">';   }
			                     ELSE    IF ( $mode == "CALL-CENTER")           {  echo '<meta http-equiv="refresh" content="0;URL=../Intranet_profil_parametres.php">';   }						 
			                     ELSE                                           {  echo '<meta http-equiv="refresh" content="0;URL=../Intranet_profil_parametres.php">';   }
						 }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function RETURN_TRIFORCE_GRADE($yers_grade)
{
	 $yers_grade_long   = "";
	 $yers_grade_small  = "";
	 
          IF ($yers_grade == 0) { $yers_grade_long = "";                      $yers_grade_small = ""; }
     ELSE IF ($yers_grade == 1) { $yers_grade_long = "JUNIOR";                $yers_grade_small = "JUNIOR"; }
     ELSE IF ($yers_grade == 2) { $yers_grade_long = "MANAGER JUNIOR";        $yers_grade_small = "M. JUNIOR"; }
     ELSE IF ($yers_grade == 3) { $yers_grade_long = "MANAGER CONFIRMÉ";      $yers_grade_small = "M. CONFIRMÉ"; }
     ELSE IF ($yers_grade == 4) { $yers_grade_long = "MANAGER SENIOR";        $yers_grade_small = "M. SENIOR"; }
     ELSE IF ($yers_grade == 5) { $yers_grade_long = "MANAGER EXPERT";        $yers_grade_small = "M. EXPERT"; }	 
     ELSE IF ($yers_grade == 6) { $yers_grade_long = "MANAGER ELITE";         $yers_grade_small = "M. ELITE"; }	
	 
	 return array( $yers_grade_long, $yers_grade_small );
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function GESTION_HABILITATION_YERS( $sous_habilitation_code ) 
{ // FORMAT : "1.100000000" - LE PREMIER CHAR RENVOI : 1 - PRODUIT LÉGER / 2 - PRODUIT LOURD
        
        	     IF ( substr(trim($sous_habilitation_code), 2, 9) == "200000000" )   { $habilitation_texte = "SECTION ENR";  $habilitation_texte_court = "ENR";  $sous_habilitation_texte = "ENR";         $sous_habilitation_code = "20000000";  }     
        	ELSE IF ( substr(trim($sous_habilitation_code), 2, 9) == "100000000" )   { $habilitation_texte = "SECTION D2D";  $habilitation_texte_court = "D2D";  $sous_habilitation_texte = "ENI";         $sous_habilitation_code = "10000000";  } 
            ELSE IF ( substr(trim($sous_habilitation_code), 2, 9) == "010000000" )   { $habilitation_texte = "SECTION D2D";  $habilitation_texte_court = "D2D";  $sous_habilitation_texte = "XXX";         $sous_habilitation_code = "01000000";  } 
            ELSE IF ( substr(trim($sous_habilitation_code), 2, 9) == "110000000" )   { $habilitation_texte = "SECTION D2D";  $habilitation_texte_court = "D2D";  $sous_habilitation_texte = "ENI / XXX";   $sous_habilitation_code = "11000000";  } 	
            ELSE                                                                     { $habilitation_texte = "";             $habilitation_texte_court = "";     $sous_habilitation_texte = "";            $sous_habilitation_code = "";          } 
        	
        	return array( $habilitation_texte, $habilitation_texte_court, $sous_habilitation_code, $sous_habilitation_texte );  		  
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_MAX_ID_TABLE( $connection_database, $table_search, $id_key_to_return ) 
{ 
     try{
         $stmt = $connection_database->query ( "SELECT IFNULL(max($id_key_to_return)+1, 1) as max_id_key FROM $table_search   ");                          
         $dn   = $stmt->fetch(PDO::FETCH_ASSOC);
       }catch (PDOException $e){
           die($e->getMessage());
       }                                  
	 $id_key_max = $dn['max_id_key'];	
	 
	 return ($id_key_max);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function COUNT_FILLEUL_LEVEL($connection_database, $id_affiliate, $level) 
{
     $nb_filleul = RETURN_DATA_FROM_QUERY_AS_master_data($connection_database, "SELECT count(id_affiliate) as master_data FROM affiliate WHERE id_affiliate ". REQUETE_FILTRE_MLM_LEVEL($connection_database, $id_affiliate, $level ) , $id_affiliate ); 
	 return ($nb_filleul);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php  function SUM_COMMISSION_MLM_LEVEL($connection_database, $id_affiliate, $level, $habilitation) 
{
	 $commission_mlm = RETURN_DATA_FROM_QUERY_AS_master_data($connection_database, "SELECT sum(commission_mlm) as master_data FROM 02_commande_pack WHERE id_affiliate ". REQUETE_FILTRE_MLM_LEVEL($connection_database, $id_affiliate, $level ) , $id_affiliate ) ;

     List ($mlm_niv1, $mlm_niv2, $mlm_niv3, $mlm_niv4, $mlm_niv5, $mlm_niv6, $mlm_niv7) = MATRICE_MLM_YERS( $habilitation, 0, 0);
	      IF ($level == 1 )    { $commission_mlm = $commission_mlm * $mlm_niv1/100; } 
	 ELSE IF ($level == 2 )    { $commission_mlm = $commission_mlm * $mlm_niv2/100; } 	
	 ELSE IF ($level == 3 )    { $commission_mlm = $commission_mlm * $mlm_niv3/100; } 	
	 ELSE IF ($level == 4 )    { $commission_mlm = $commission_mlm * $mlm_niv4/100; } 
	 ELSE IF ($level == 5 )    { $commission_mlm = $commission_mlm * $mlm_niv5/100; } 
	 ELSE IF ($level == 6 )    { $commission_mlm = $commission_mlm * $mlm_niv6/100; } 
	 ELSE IF ($level == 7 )    { $commission_mlm = $commission_mlm * $mlm_niv7/100; } 
	 
	 return ($commission_mlm);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php  function CONTRATS_COMPTABLE_AX_AMOUNT_HT($connection_database, $id_affiliate, $level) 
{
	 $result = $connection_database->prepare( " SELECT sum(ax_amount_ht) as master_data
	                                                        FROM  04_commande_pack_comptable 
														    WHERE aX_level       = ".$level." 
														    AND   aX_payed in (0) 
														    AND   aX_id_affiliate  = ".$id_affiliate."  "   );
     $result->execute(array(':level' => $level, ':id_affiliate' => $id_affiliate ));
	 $reponse = $result->fetch(PDO::FETCH_ASSOC);
	 $master_data = $reponse["master_data"] * 1; // LE *1 EST IMPORTANT POUR LE FORMATAGE EN FLOAT	
	
	 return ($master_data);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>


<?php  function INSERT_ACTION_LIST($connection_database, $reprise_description, $action_category, $action_id_category, $action_details, $id_commande_pack, $id_commercial, $statut, $description, $description_2, $owner_id, $owner_action, $prochaine_echeance, $source, $reference_facture, $id_installateur) 
{
  // MODULE D'INSERTION DES ACTIONS À TRAITER PAR LE BACKOFFICE - MODULE TRÈS IMPORTANT
  // - $ACTION_MAX_DATE                : DATE À PARTIR DE LAQUELLE LE BACKOFFICE INTERVIENT 
  // - $ACTION_CATEGORY                : ÉTAPE EN COURS SOUS LE FORMAT "ÉTAPE 1"
  // - $ACTION_ID_CATEGORY             : IDENTIFIANT DE L'ÉTAPE EN COURS [11, 12, ...]  
  // - $ACTION_DETAILS                 : STATUT ENVOYÉ À L'AFFILIÉ 
  // - $ACTION_STATUT                  : OUVERT OU FERMÉ 
  // - $DESCRIPTION                    : STATUT SUR L'ACION VISIBLE PAR LE BACK OFFICE POUR UN SUIVI COMPLET ET RAPIDE 
  // - $DESCRIPTION_2                  : VIDE
  // - $OWNER_ACTION                   : BACK-OFFICE, COMMERCIAL
  
     IF ( $reprise_description == 1 ) { 
	                                     IF   ( trim($description) == ""  ) { $description = ACTION_LIST_RETURN_DETAILS($id_commande_pack);    }
										 ELSE                               { $description = ACTION_LIST_RETURN_DETAILS($id_commande_pack).'\n'.$description;  }
	                                   } 

	 $id_max_action = RETURN_MAX_ID_TABLE( $connection_database, "action_list", "id_action");
	 
	 List($action_max_date, $date_a_relancer_automatique, $message) = GESTION_DE_ACTION_MAX_DATE($action_id_category, $id_commande_pack, $prochaine_echeance, 0,  $source, "NON URGENT"); 
	 $sql_insert_al = ' insert into action_list(id_action, action_creation_date, action_max_date, action_category, action_id_category, action_details, id_commande_pack, id_affiliate, id_installateur, action_statut, action_status_int, description, owner_id, owner_action, reference_facture, managed_date ) 
				                             values (
											 "'.$id_max_action.'",
											 "'.date("Y-m-d H:i:s").'",
											 "'.$action_max_date.'",
											 "'.$action_category.'",
											 "'.$action_id_category.'",
											 "'.$action_details.'",
											 "'.$id_commande_pack.'",
											 "'.$id_commercial.'",
											 "'.$id_installateur.'",
											 "'.$statut.'",
											 "'.RETURN_ACTION_STATUS_INT($statut).'",
											 "'.$description.'",
											 "'.$owner_id.'",
											 "'.$owner_action.'",
											 "'.$reference_facture.'",
                                             "'.date("Y-m-d H:i:s").'"	 )';
	 
	 try{
	 	$stmt = $connection_database->query ($sql_insert_al);	 	 
	 	$result = $stmt->execute();
	 }catch (PDOException $e){
	 	die($e->getMessage());
	 }

				
	 return ($id_max_action);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function ACTION_LIST_RETURN_DETAILS($id_commande_pack) 
{		 
	
	$sql = "SELECT description FROM action_list  WHERE id_commande_pack = :id_commande_pack order by id_action desc limit 0,1  ";
	
	try {
		$stmt = $connection_database->prepare ( $sql );
		$stmt->execute ( array (
				':id_commande_pack' => $id_commande_pack
		) );
		$result = $stmt->fetch ( PDO::FETCH_ASSOC );
	} catch ( PDOException $e ) {
		die ( $e->getMessage () );
	}

	IF (!$reponse4['description'])       {  $description  = " - "; }
	ELSE	        		               {  $description  = $dn['description']; }			
	 
   	return ( addslashes($description) );
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_ACTION_STATUS_INT($statut) 
{
    IF ( trim($statut) == "OUVERT" )  { $action_status_int = 1; }
	ELSE                              { $action_status_int = 0; }
	
    return ( $action_status_int );
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function GESTION_DE_ACTION_MAX_DATE($action_id_category, $id_commande_pack, $prochaine_echeance, $compteur_relance, $source, $mode) 
{    // - $DATE_A_RELANCER_AUTOMATIQUE    : DATE À LAQUELLE LE PARTENAIRE EST RELANCÉ AUTOMATIQUEMENT PAR LE CRON AVANT INTERVENTION DU BACKOFFICE 
     // - $ACTION_MAX_DATE                : DATE À PARTIR DE LAQUELLE LE BACKOFFICE INTERVIENT 
     

	$message                     = "";
    $action_max_date             =  date('Y-m-d H:i:s',time()+$prochaine_echeance*24*3600); 
    $date_a_relancer_automatique =  date('Y-m-d H:i:s',time()+$prochaine_echeance*24*3600); 
	
	return array($action_max_date, $date_a_relancer_automatique, $message);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_INFO_SUR_LA_DATE($date) 
{ // FORMAT DE $date = date("Y-m-d H:i:s")
    //echo "La date envoyée est : ".$date."<br/><br/>" ;
    IF ( $date == "" OR $date == null )
	{
	$jour = $mois = $annee = $jour_de_la_semaine = $timestamp = $heure = $minute = $seconde = $mois_a_afficher = $mois_a_afficher2 = ""; 
	}
	ELSE
	{
	IF ( strlen($date) == 10 ) { $date = $date." 00:00:00"; }

            // TABLEAU DES JOURS DE LA SEMAINE
            $joursem = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
			
            // EXTRACTION DES JOUR, MOIS, AN DE LA DATE
            list($annee, $mois, $jour)       = explode('-', substr(trim($date), 0, 10));
            list($heure, $minute, $seconde)  = explode(':', substr(trim($date), 11, 10));
			
            // CALCUL DU TIMESTAMP
            $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
			
            // AFFICHAGE DU JOUR DE LA SEMAINE
            $jour_de_la_semaine =  $joursem[date("w",$timestamp)];
			
                   IF ($mois == 1)  { $mois_a_afficher = "Jan";   $mois_a_afficher2 = "Janvier";      }
              ELSE IF ($mois == 2)  { $mois_a_afficher = "Fév";   $mois_a_afficher2 = "Février";      }			  
              ELSE IF ($mois == 3)  { $mois_a_afficher = "Mars";  $mois_a_afficher2 = "Mars";         }	
              ELSE IF ($mois == 4)  { $mois_a_afficher = "Avr";   $mois_a_afficher2 = "Avril";        }	
              ELSE IF ($mois == 5)  { $mois_a_afficher = "Mai";   $mois_a_afficher2 = "Mai";          }	
              ELSE IF ($mois == 6)  { $mois_a_afficher = "Juin";  $mois_a_afficher2 = "Juin";         }	
              ELSE IF ($mois == 7)  { $mois_a_afficher = "Jui";   $mois_a_afficher2 = "Juillet";      }	
              ELSE IF ($mois == 8)  { $mois_a_afficher = "Aout";  $mois_a_afficher2 = "Aout";         }	
              ELSE IF ($mois == 9)  { $mois_a_afficher = "Sept";  $mois_a_afficher2 = "Septembre";    }	
              ELSE IF ($mois == 10) { $mois_a_afficher = "Oct";   $mois_a_afficher2 = "Octobre";      }	
              ELSE IF ($mois == 11) { $mois_a_afficher = "Nov";   $mois_a_afficher2 = "Novembre";     }	
              ELSE IF ($mois == 12) { $mois_a_afficher = "Déc";   $mois_a_afficher2 = "Décembre";     }	
			
	 //echo "1: ".$jour." - 2: ".$mois." - 3: ".$annee." - 4: ".$jour_de_la_semaine." - 5: ".$timestamp." - 6: ".$heure." - 7: ".$minute." - 8: ".$seconde." - 9: ".$mois_a_afficher." - 10: ".$mois_a_afficher2." <br/><br/> ";
     // 1: 25 - 2: 04 - 3: 2016 - 4: Lundi - 5: 1461535200 - 6: 10 - 7: 02 - 8: 56 - 9: Avr - 10: Avril 
	}
	 return array($jour, $mois, $annee, $jour_de_la_semaine, $timestamp, $heure, $minute, $seconde, $mois_a_afficher, $mois_a_afficher2 ); 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function UPDATE_ACTION_LIST_FROM_CATEGORY($connection_database, $id_affiliate, $action_id_category, $action_statut) 
{ 
			 date_default_timezone_set('Europe/Paris');
             $action_status_int = RETURN_ACTION_STATUS_INT( $action_statut );	
             try{
             		
             	$sql = "UPDATE action_list 
						SET managed_date = CURRENT_TIMESTAMP,
						action_statut  =  :action_statut,
                        action_status_int = :action_status_int								
						WHERE action_id_category = :action_id_category
                        AND   id_affiliate = :id_affiliate";
             	
             	$stmt = $connection_database->prepare ( $sql );
             	$stmt->bindValue(':action_statut', $action_statut, PDO::PARAM_STR);
             	$stmt->bindValue(':action_status_int', $action_status_int, PDO::PARAM_INT);
             	$stmt->bindValue(':action_id_category', $action_id_category, PDO::PARAM_STR);
             	$stmt->bindValue(':id_affiliate', $id_affiliate, PDO::PARAM_INT);
             	$result = $stmt->execute();
             	
             }catch (PDOException $e){
             	die($e->getMessage());
             }
             
	     							
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function ROGNER_IMAGE($urlphoto, $fichier, $urldest) 
///////////////////////////// ROGNER IMAGE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Cette fonction permet de rogner une image de tel sorte qu'on aura comme dimension: largeur = hauteur et la copier dans un dossier donné
// Paramètres :
// $urlphoto : chemin absolu de l'image
// $fichier : nom de l'image
// $urldest : dosssier de ou sera copiée l'image après l'avoir rogner
{
    if (!file_exists($urlphoto))                        { return 0; }
    if (!file_exists($urlphoto . "/" . $fichier))       { return 0; }
    if (!file_exists($urldest))                         { return 0; }
	if ($fichier != "." && $fichier != "..") 
	{

        // RÉCUPÉRER LES DIMENSION DE L'IMAGE 
        $chemin = $urlphoto . "/" . $fichier;
        $size   = getimagesize($chemin);
        $width  = $size[0];
        $height = $size[1];

        //CALCULER LES NOUVELLES DIMENSIONS DE L'IMAGE
        $dest_x = 0; // On colle l'image sur l'autre a 0 en abscisse
        $dest_y = 0; // On colle l'image sur l'autre a 0 en ordonnee

        if ($width > $height) {
            $src_departx = ceil(($width - $height) / 2); // on part de 50 en largeur
            $src_departy = 0;  // on part de 20 en hauteur
            $src_largeur = $height; // on copie de 50 en largeur
            $src_hauteur = $height; // on copie de 20 en hauteur
        } else
        if ($width < $height) {
            $src_departx = 0;
            $src_departy = ceil(($height - $width) / 2);
            $src_largeur = $width;
            $src_hauteur = $width;
        } else {
            $src_departx = 0;
            $src_departy = 0;
            $src_largeur = $width;
            $src_hauteur = $height;
        }


        $destination = imagecreatetruecolor($src_largeur, $src_hauteur); // on creer une image de la taille du cadre à copier
        $sourcejpeg = @imagecreatefromjpeg($urlphoto . '/' . $fichier); // celle qui sera copiée
        $sourcepng = @imagecreatefrompng($urlphoto . '/' . $fichier); // celle qui sera copiée


        if ($sourcejpeg) {
            imagecopy($destination, $sourcejpeg, $dest_x, $dest_y, $src_departx, $src_departy, $src_largeur, $src_hauteur);
            imagepng($destination, $urldest . $fichier);
            return 1;
        } else if ($sourcepng) {
            imagecopy($destination, $sourcepng, $dest_x, $dest_y, $src_departx, $src_departy, $src_largeur, $src_hauteur);
            imagepng($destination, $urldest . $fichier);
            return 1;
        } else {

            return 0;
        }
    } else {
        return 0;
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate )
{
  
 		 date_default_timezone_set('Europe/Paris'); 
 		 
 		 
 		 $sql = "SELECT * FROM affiliate_iban where id_affiliate = :id_affiliate";
 		 
 		 try {
 		 	$stmt = $connection_database->prepare ( $sql );
 		 	$stmt->execute ( array (
 		 			':id_affiliate' => $id_affiliate
 		 	) );
 		 	$result = $stmt->fetch ( PDO::FETCH_ASSOC );
 		 } catch ( PDOException $e ) {
 		 	die ( $e->getMessage () );
 		 }
 		               
 
                IF ($stmt->fetchColumn() == 0) // PAS DE LIGNE DANS LA TABLE : INSERT
                     { 				
				         $sql_iban ='insert into affiliate_iban(id_affiliate, code_banque, code_guichet, numero_compte, cle_rib, IBAN, iban_creation_date, nom_banque, BIC_CLIENT ) 
				                             values (
											 ":id_affiliate",
											 "",
											 "",
											 "",
											 "",
											 "",
											 CURRENT_TIMESTAMP,
											 "",
											 "") ';

				         try{	
				         	$stmt = $connection_database->prepare ( $sql_iban );
				         	$result = $stmt->execute ( array (
				         			':id_affiliate' => $id_affiliate
				         	) );
				         	
				         }catch (PDOException $e){
				         	die($e->getMessage());
				         }
				     }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function CHECK_IF_AFFILIATE_ALREADY_EXIST($connection_database, $type_champs, $value) 
{
	     IF ( $type_champs == "email" )            { $filtre_requete = " AND    email        = \"$value\"   "; }
	ELSE IF ( $type_champs == "phone" )            { $filtre_requete = " AND    phone_number = \"$value\"   "; }
	
	try{
		$stmt = $connection_database->query ( "SELECT count(ad.id_affiliate) as is_exist 
	                                           FROM   affiliate_details ad, affiliate aa
	                                           WHERE  aa.is_activated  = 1  
			                                   AND    ad.id_affiliate  = aa.id_affiliate
                                               $filtre_requete");
	    
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	}catch (PDOException $e){
		die($e->getMessage());
	}	
             
    return ( $result['is_exist'] );
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function CHECK_PARRAIN_EXIST($connection_database, $id_parrain, $nom_parrain_1) 
{
    $nom_parrain     = strtolower($nom_parrain_1);
    $nom_parrain_maj = strtoupper($nom_parrain_1);
	
	IF (empty($id_parrain) or empty($nom_parrain) or ($id_parrain == "ID") or ($nom_parrain == "Nom") )  {return (0);}
	IF (intval($id_parrain)) { $ca_marche = "OK";}                                                  else {return (0);}
    
	$sql = "SELECT count(*) as parrain_exist, 
            lower( trim( ad.last_name ) ) AS last_name, 
            lower( trim( ad.first_name ) ) AS first_name,
			ad.last_name  AS last_name2, 
			ad.first_name AS first_name2, 
            upper( trim( ad.last_name ) ) AS last_name3, 
            upper( trim( ad.first_name ) ) AS first_name3
            FROM   affiliate_details ad, affiliate aa 
			WHERE  aa.id_affiliate = ad.id_affiliate 
			AND   aa.id_affiliate  = :id_parrain";
	
	try {
		$stmt = $connection_database->prepare ( $sql );
		$stmt->execute ( array (
				':id_parrain' => $id_parrain
		) );
		$result = $stmt->fetch ( PDO::FETCH_ASSOC );
	} catch ( PDOException $e ) {
		die ( $e->getMessage () );
	}
	
              IF ($result['last_name']   == $nom_parrain)                          {  return (1);  }
		 ELSE IF ($result['first_name']  == $nom_parrain)                          {  return (1);  }
         ELSE IF ($result['last_name']   == utf8_encode($nom_parrain))             {  return (1);  }
		 ELSE IF ($result['first_name']  == utf8_encode($nom_parrain))             {  return (1);  }
		 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		 ELSE IF ($result['first_name2'] == $nom_parrain)                          {  return (1);  }
		 ELSE IF ($result['last_name2']  == $nom_parrain)                          {  return (1);  }
		 ELSE IF ($result['first_name2'] == utf8_encode($nom_parrain) )            {  return (1);  }
		 ELSE IF ($result['last_name2']  == utf8_encode($nom_parrain) )            {  return (1);  }		 
		 ELSE IF ($result['first_name2'] == $nom_parrain_1)                        {  return (1);  }
		 ELSE IF ($result['last_name2']  == $nom_parrain_1)                        {  return (1);  }
		 ELSE IF ($result['first_name2'] == utf8_encode($nom_parrain_1) )          {  return (1);  }
		 ELSE IF ($result['last_name2']  == utf8_encode($nom_parrain_1) )          {  return (1);  }	
         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		 ELSE IF ($result['first_name3'] == $nom_parrain_maj)                      {  return (1);  }
		 ELSE IF ($result['last_name3']  == $nom_parrain_maj)                      {  return (1);  }
		 ELSE IF ($result['first_name3'] == utf8_encode($nom_parrain_maj))         {  return (1);  }
		 ELSE IF ($result['last_name3']  == utf8_encode($nom_parrain_maj))         {  return (1);  }		 
		 ELSE IF ($result['first_name3'] == $nom_parrain_1)                        {  return (1);  }
		 ELSE IF ($result['last_name3']  == $nom_parrain_1)                        {  return (1);  }
		 ELSE IF ($result['first_name3'] == utf8_encode($nom_parrain_1))           {  return (1);  }
		 ELSE IF ($result['last_name3']  == utf8_encode($nom_parrain_1))           {  return (1);  }

		 
		 ELSE IF ($result['last_name'].' '.$result['first_name'] == $nom_parrain)  {  return (1);  }
		 ELSE IF ($result['last_name'].''.$result['first_name']  == $nom_parrain)  {  return (1);  }
		 ELSE IF ($result['first_name'].' '.$result['last_name'] == $nom_parrain)  {  return (1);  }
         ELSE  {return (0);} // PAS DE CORRESPONDANCE


}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function ID_MAXIMUM_FROM_TABLE($connection_database, $table, $id_key)
{ 
	$sql = "SELECT IFNULL(max( :id_key )+1, 1) as id_key_max FROM :table ";
	
	try {
		$stmt = $connection_database->prepare ( $sql );
		$stmt->execute ( array (
				':table' => $table,
				':id_key' => $id_key
		) );
		$result = $stmt->fetch ( PDO::FETCH_ASSOC );
	} catch ( PDOException $e ) {
		die ( $e->getMessage () );
	}
 	 
     return ( $result['id_key_max'] ); 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function IS_ABLE_TO_PARRAINER( $connection_database, $id_affiliate) 
{        //    NUMERO_DE_PACK = 0;    -  LIMITÉ À 5 FILLEULS PAR MOIS
         //    NUMERO_DE_PACK = 1;    -  ASSOCIATION - ILLIMITÉ EN NOMBRE DE FILLEULS
         //    NUMERO_DE_PACK = 2;    -  COMPTE PRO  - ILLIMITÉ EN NOMBRE DE FILLEULS	
         
	     $max_filleul         = 5;
	     $multiple_filleul    = 2; // 2 FOIS PLUS DE SOUS FILLEULS QUE DE FILLEUL
	     $nb_place_disponible = 0;
	     $is_able_to_invit    = 0; 
		 $grade_nosrezo       = "AFFILIÉ";
         $is_protected        = 0;		 
         
	     // 1. ON COMPTE LE NOMBRE DE FILLEUL DE $ID_AFFILIATE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		 
		 
         try{
         	$stmt_1 = $connection_database->query ( REQUETE_FILTRE_LISTE_AFFILIATE_LEVEL($connection_database, $id_affiliate, 1, 1, "ad.first_name")); 
         	$result_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);        	
         	$nb_filleul_L1   =  $stmt_1->fetchColumn() ; // ON COMPTE LES FILLEULS DE NIVEAU 1
         	
         }catch (PDOException $e){
         	die($e->getMessage());
         }
         
         try{
         	$stmt_2 = $connection_database->query ( REQUETE_FILTRE_LISTE_AFFILIATE_LEVEL($connection_database, $id_affiliate, 1, 2, "ad.first_name"));
         	$result_2 = $stmt_2->fetch(PDO::FETCH_ASSOC);
         	$nb_filleul_L2   =  $stmt_2->fetchColumn() ; // ON COMPTE LES FILLEULS DE NIVEAU 1
         
         }catch (PDOException $e){
         	die($e->getMessage());
         }
         
		 
	     $multiple_de_5_L1             = (int)($nb_filleul_L1 / $max_filleul);
	     $multiple_de_5_L2             = (int)($nb_filleul_L2 / $max_filleul);
		 
	     $multiple_de_calcul           = round( $multiple_de_5_L2/2 + 1, 0, PHP_ROUND_HALF_DOWN);
		   
	     // 2. ON REMONTE LES INFORMATIONS DE $ID_AFFILIATE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    
	     
	     try{
	     	$sql = "SELECT count(*) as if_exist, first_name, phone_number, email, numero_de_pack, is_protected
  	                FROM   affiliate_details ad 
	     			WHERE  ad.id_affiliate = :id_affiliate";

	     	$stmt_3 = $connection_database->prepare ( $sql );
	     	$stmt_3->execute ( array (
	     			':id_affiliate' => $id_affiliate
	     	) );
	     	$result3 = $stmt_3->fetch(PDO::FETCH_ASSOC);
	     }catch (PDOException $e){
	     	die($e->getMessage());
	     }
	     
	   
         $numero_de_pack = $result3['numero_de_pack'];	
		 $is_protected   = $result3['is_protected'];
	     
	     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         
	     IF ( $numero_de_pack <> 0)
	     {
	     	  $is_able_to_invit     = 1;
			  $grade_nosrezo        = "";
			  $nb_place_disponible  = 100;
	     }
	     ELSE
	     { 
              $nb_place_disponible = $multiple_de_calcul * $max_filleul  - $nb_filleul_L1 ;
			  IF ( $nb_filleul_L1 == 0  )                { $nb_filleul_L1     = 1;  }
              IF ( $nb_place_disponible > 0 )            { $is_able_to_invit  = 1;  }	
	     	  IF ( $nb_filleul_L2 >= 10 )    
	                     {     
                              $grade_nosrezo       = "ASSOCIÉ ÉCHELON #".$multiple_de_5_L1;							   
	                     }  
         }   
      
	  $is_able_to_invit = 1;
	  $nb_place_disponible = 10;
	  return array($nb_filleul_L1, $nb_filleul_L2, $is_able_to_invit, $result3['first_name'], $result3['email'], $result3['phone_number'], $nb_place_disponible, $numero_de_pack, $grade_nosrezo, $is_protected );
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function GEO_LOCALISATION_ADRESSE( $connection_database, $cp, $ville, $adresse, $source, $country) 
{		
         $latitude_secteur        = 0;
		 $longitude_secteur       = 0;
		 $la_ville_existe_en_base = 0;
		 
		 $cp       = trim($cp);
		 $ville    = trim($ville);
		 $adresse  = trim($adresse);
		 
		 IF (trim($cp) <> "" )        
		     {	 
		     	try{
		     		$stmt = $connection_database->query ("SELECT count(VILLE) as row_exist, VILLE, CP, LATITUDE, LONGITUDE 
			                                              FROM cp_autocomplete 
									                      WHERE trim(CP)    = ".$cp." 
									                      AND trim(VILLE)  like  \"$ville\" 
									                      Limit 0,1     ");
		     		$result_cp = $stmt->fetch(PDO::FETCH_ASSOC);
		     	
		     	}catch (PDOException $e){
		     		die($e->getMessage());
		     	} 
		     	 
				 
				 IF ($result_cp['row_exist'] == 0) // PAS DE MATCHING ALORS ON LANCE GOOGLE API        
				        {			           						   
						   $address   = $cp." ".$ville." ".$country." ";
					       IF ($source == "CRON") // PAS D'APPEL API EXTERNE CAR ERREUR
						     { 

							 }
							ELSE
							 {
						         List ($latitude_secteur, $longitude_secteur) = getXmlCoordsFromAdress($address);	// APPEL LIMITÉ À L'API POUR PERFORMANCE ET LIMITATION GOOGLE	
                                 					
                             }
						}
				 ELSE   {  
				           $latitude_secteur        = $result_cp['LATITUDE'];	
                           $longitude_secteur       = $result_cp['LONGITUDE'];
						   $la_ville_existe_en_base = 1; //LA LIGNE EXISTE DEJA
						}				 
             }
                settype($latitude_secteur,  "float");  
		        settype($longitude_secteur, "float"); 
				
	 return array($latitude_secteur, $longitude_secteur, $la_ville_existe_en_base );
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

 <?php function getXmlCoordsFromAdress($address)
{
          $coords=array();
          $base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
          // ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
          $request_url = $base_url . "address=" . urlencode($address).'&sensor=false';
          $xml = simplexml_load_file($request_url) or die("url not loading");
          //print_r($xml);
          $coords['lat']= $coords['lon'] = '';
          $coords['status'] = $xml->status ;
          if($coords['status']=='OK')
          {
             $coords['lat'] = $xml->result->geometry->location->lat ;
             $coords['lon'] = $xml->result->geometry->location->lng ;
          }
		  return array($coords['lat'] , $coords['lon']);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function INSERT_INTO_AFFILIATE_DETAILS($connection_database, $id_upline, $id_affiliate, $id_partenaire, $gender, $first_name, $last_name, $address, $zip_code, $city, $phone_number, $email, $creation_date, $pseudo, $birth_date, $birth_place, $nationality, $contract_signed, $is_able_to_develop, $affiliate_latitude, $affiliate_longitude)  
{

				$is_protected  = 1; 	 
				$sql_to_insert = 'insert into affiliate_details(id_affiliate, gender, first_name, last_name, address, zip_code, city, phone_number, email, creation_date, pseudo, birth_date, birth_place, nationality, contract_signed, is_able_to_develop, affiliate_latitude, affiliate_longitude, is_protected) 
				                             values (
											 "'.$id_affiliate.'",
											 "'.$gender.'",
											 "'.$first_name.'",
											 "'.$last_name.'",
											 "'.$address.'",
											 "'.$zip_code.'",
											 "'.$city.'",
											 "'.$phone_number.'",
											 "'.$email.'",
											 "'.date("Y-m-d H:i:s").'",
											 " ",
											 "'.$birth_date.'",
											 "'.$birth_place.'",
											 "'.$nationality.'",
											 "0",
											 "0",
											 "'.$affiliate_latitude.'",
											 "'.$affiliate_longitude.'",
											 "'.$is_protected.'"  ) ';

				 
	             try{	
	           	    $result = $connection_database->exec($sql_to_insert);
	             }catch (PDOException $e){
	           	    die($e->getMessage());
	             }
                 INSERT_INTO_AFFILIATE($connection_database, $id_affiliate, $first_name, $last_name, $id_upline, $id_partenaire);

   			     return (1);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function INSERT_INTO_AFFILIATE($connection_database, $id_affiliate, $first_name, $last_name, $id_upline, $id_partenaire) 
{
				$sql_to_insert ='insert into affiliate(id_affiliate, is_activated, first_name, last_name, id_upline, password, last_connection_date, id_partenaire) 
				                             values (
											 "'.$id_affiliate.'",
											 "1",
											 "'.$first_name.'",
											 "'.$last_name.'",
											 "'.$id_upline.'",
											 "'.randomPassword().'",
											 CURRENT_TIMESTAMP,
											 "'.$id_partenaire.'")
											 ';
				try{
					$result = $connection_database->exec($sql_to_insert);
				}catch (PDOException $e){
					die($e->getMessage());
				}
				
				
   			    return (1);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function randomPassword()
{
     $numAlpha=6;
     $numNonAlpha=0;
     $listAlpha = 'abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ123456789';
     $listNonAlpha = ',;:!?.$/*-+&@_+;./*&?$-!,';
     return str_shuffle(
         substr(str_shuffle($listAlpha),0,$numAlpha) .
         substr(str_shuffle($listNonAlpha),0,$numNonAlpha)
    );
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php 
////////////////////////////////////////////////////////////////////////////////// LOGIN //////////////////////////////////////////////////////////////////////////////
function LOGIN($connection_database,$id_affiliate,$password_aff,$version_application){
	
	// RETURN 1 : ERROR DE FORMAT
	// RETURN 2 : MEMBRE NON RECONNU OU INACTIF - FAIRE DEMANDE DE MDP OU CONTACTER Y_PROJECT :
	// RETURN 100 : OK ON ENTRE DANS L'APPLICATION
	
	$ERROR_FORMAT = 1; // /// PAR DEFAUT LE FORMAT EST MAUVAIS
	
	// ///////////// 1ER CONTROLE DES FORMATS /////////////////////////////////////
	IF (($id_affiliate == "") or ($password_aff == "") or (strlen ( $id_affiliate ) < 1) or (strlen ( $password_aff ) < 2) or strstr ( strtolower ( $id_affiliate ), "script" ) or strstr ( strtolower ( $id_affiliate ), "alert" ) or strstr ( strtolower ( $password_aff ), "alert" ) or strstr ( $password_aff, "=" )) {
		return 3;
	}  // /////////////////////////////////////////////////////////////////////////////
	else IF (is_numeric ( $id_affiliate ) == 1) {
		
		$sql = "SELECT ad.id_affiliate, aa.password, ad.first_name, ad.last_name, ad.email, aa.id_partenaire, aa.id_upline, mode, triforce_grade, habilitation , sous_habilitation
	  	      	FROM affiliate_details ad, affiliate aa
				WHERE ad.id_affiliate = aa.id_affiliate
				AND aa.is_activated = 1
				AND ad.id_affiliate = :id_affiliate ";
		
		try {
			$stmt = $connection_database->prepare ( $sql );
			$stmt->bindValue(':id_affiliate', $id_affiliate, PDO::PARAM_INT);
			$stmt->execute();
			$dn = $stmt->fetch ( PDO::FETCH_ASSOC );
		} catch ( PDOException $e ) {
			die ( $e->getMessage () );
		}

		$ERROR_FORMAT = 0;
	}
	// /////////////////////////////////////////////////////////////////////////////
	
	// /////////////////////////////////////////////////////////////////////////////
	IF ($ERROR_FORMAT == 0) // LE FORMAT EST OK - COMMENCONS LES VERIFICATIONS
	{
		$sql = "SELECT ad.id_affiliate, aa.password, ad.first_name, ad.last_name, ad.email, aa.id_partenaire, aa.id_upline, mode, triforce_grade, habilitation  , sous_habilitation
	  	      	FROM affiliate_details ad, affiliate aa
				WHERE ad.id_affiliate = aa.id_affiliate
				AND aa.is_activated = 1
				AND ad.id_affiliate = :id_affiliate ";
		try {
			$stmt = $connection_database->prepare ( $sql );
			$stmt->bindValue(':id_affiliate', $id_affiliate, PDO::PARAM_INT);
			$stmt->execute ();
			$result = $stmt->fetch ( PDO::FETCH_ASSOC );
		} catch ( PDOException $e ) {
			die ( $e->getMessage () );
		}	
			
		IF ($dn ['password'] == $password_aff and  count($result) > 0) {
			return 100;
		} else // /////////////////////////////////////////////////////////////////////
		{
			return 2;
		}
	} else { // / MAUVAIS FORMAT
		return 1;
	}

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function QUERY_SELECT_ROW_FROM_TABLE($connection_database, $table, $fieldArraySelect, $fieldArrayAssoc, $fetchAllRows)
{
	// Construction de la chaine SELECT
	if($fetchAllRows == true){

		$sql_select = "SELECT * FROM $table";
	}
	else{
		$sql_select= "SELECT ";

		foreach ($fieldArraySelect as $rowName) {
			$sql_select .= "$rowName,";
		}

		$sql_select= substr($sql_select, 0, -1);
		$sql_select .= ' ';
		$sql_select .= "FROM $table";
	}



	//Construction de la clause WHERE
	if(count($fieldArrayAssoc) !=0){

		$where = 'WHERE ';

		foreach ($fieldArrayAssoc as $rowName => $rowValue) {
			$where .= "$rowName = $rowValue AND ";
		}

		$where = substr($where, 0, -4);
	}else{
		$where = '';
	}

	$sql_query = $sql_select." ".$where;

	return $sql_query; 

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>


<?php function SELECT_ROW_FROM_TABLE($connection_database, $sql_query, $fetchAllRows)
{
	$retour = false;
	try{

		$stmt = $connection_database->query($sql_query);

		if($fetchAllRows){
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		$retour = $results;
	}catch (Exception $e){
		die($e->getMessage());

	}

	return $retour;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_INFOS_PACKS($connection_database, $id_affiliate)
{
	$sql_query  = QUERY_SELECT_ROW_FROM_TABLE($connection_database, '01_pack_bundle', array('id_pack', 'nom_pack', 'description_pack', 'prix_pack_ttc' , 'prix_pack_ht', 'tva_percent_to_pay' ), array(), true);
	$result_query = SELECT_ROW_FROM_TABLE($connection_database, $sql_query, true);
	
	$list_packs = array();
	foreach ($result_query as $pack)
	{
		$pack['is_subscribe'] = VERIF_COMMANDE_PACKS($connection_database, $pack['id_pack'], $id_affiliate);	
		$commande_pack        = RETURN_INFOS_COMMANDE($connection_database, $id_affiliate);
		$pack['id_customer']  = $commande_pack['id_customer'];
		
		array_push($list_packs, $pack);
	}
	return $list_packs;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function VERIF_COMMANDE_PACKS($connection_database, $id_pack, $id_affiliate)
{
	//RETOUR = -1 ERREUR SQL
	//RETOUR = 0 NON ABONNE
	//RETOUR = 1 DEJA ABONNE
	
	$sql = "SELECT count(*) as deja_inscrit FROM 02_commande_pack WHERE id_affiliate = :id_affiliate AND id_pack = :id_pack";
	
	try {
		$stmt = $connection_database->prepare ( $sql );
		$stmt->execute ( array (
				':id_affiliate' => $id_affiliate,
				':id_pack' => $id_pack
		) );
		$result = $stmt->fetch ( PDO::FETCH_ASSOC );
		return $result['deja_inscrit'];
	} catch ( PDOException $e ) {
		//die ( $e->getMessage () );
		return -1;
	}	
	
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function RETURN_INFO_PACK_BY_ID($connection_database, $id_pack)
{
	$sql_query    = QUERY_SELECT_ROW_FROM_TABLE($connection_database, '01_pack_bundle', array('id_pack', 'nom_pack', 'description_pack', 'prix_pack_ttc'), array('id_pack' => $id_pack), true);
	$result_query = SELECT_ROW_FROM_TABLE($connection_database, $sql_query, false);

	return $result_query;

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function PASS_ORDER_PACK($connection_database, $id_affiliate, $id_pack, $prix_pack_ttc, $prix_pack_ht, $tva_percent_to_pay, $mode_paiement, $id_customer, $prix_pack_upgrade_ttc, $prix_pack_upgrade_ht )
{   // FUNCTION CENTRALE DE COMMANDE ET DE GESTION DES PACKS POUR UN MÊME AFFILIÉ

	      IF($mode_paiement == 'checkout')         {  $subscription = 0;     }
	 ELSE IF($mode_paiement == 'subscription')     {  $subscription = 1;     }
	 ELSE                                          {  $subscription = null;  }
	 
	 List ($mlm_niv1, $mlm_niv2, $mlm_niv3, $mlm_niv4, $mlm_niv5, $mlm_niv6, $mlm_niv7, $mlm_total) = MATRICE_MLM_YERS( 0, 0, 0);
	 List ($id_parrain_niveau_1, $parrain_niveau_1, $id_parrain_niveau_2, $parrain_niveau_2, $id_parrain_niveau_3, $parrain_niveau_3, $id_parrain_niveau_4, $parrain_niveau_4, $id_parrain_niveau_5, $parrain_niveau_5, $id_parrain_niveau_6, $parrain_niveau_6 ) = RETURN_NOM_PARRAINS_UPLINE( $connection_database, $id_affiliate, "" , ""  );	
	 
	 $commission_mlm = round($prix_pack_ht * $mlm_total/100 , 4, PHP_ROUND_HALF_DOWN)*1;
	
	// VÉRIFIER SI L'AFFILIÉ A DÉJÀ COMMANDÉ UN PACK
     $stmt   = $connection_database->query (" SELECT id_commande_pack, id_affiliate, id_pack, date_debut_abonnement, nb_jours_depuis, nb_jours_restant, prix_pack_upgrade_ttc, prix_pack_upgrade_ht
	                                          FROM   02_commande_pack 
	                                          WHERE  id_affiliate = $id_affiliate
				                              AND    is_activated = 1  ");	
	 $result = $stmt->fetch();	
	 $date_debut_abonnement = date('Y-m-d H:i:s');
	 $nb_jours_depuis       = 0;
	 $nb_jours_restant      = 30;
	 $prix_pack_upgrade_ttc = 0;
	 $prix_pack_upgrade_ht  = 0;

   	 // 1. TRAITEMENT SPÉCIFIQUE SI L'AFFILIÉ À DÉJÀ COMMANDÉ UN PACK
     IF($result)
	 {       // 1.1 ON ARCHIVE LE PACK ANCIEN
   			 ARCHIVE_PASS_ORDER_PACK($connection_database, $id_affiliate);
        	     
   			 // 1.2 LA DATE DE DÉBUT D'ABONNEMENT NE DOIT PAS CHANGER SI LE PACK EXISTE DÉJÀ
   		     $date_debut_abonnement = $result["date_debut_abonnement"];
	         $nb_jours_depuis       = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime($result["date_debut_abonnement"]))/(60*60*24));;
	         $nb_jours_restant      = 30 - $nb_jours_depuis;
     }            
   
   	 // 2. INSÉRTION D'UNE NOUVELLE COMMANDE DE PACK
   	 $id_commande_pack  = RETURN_MAX_ID_TABLE( $connection_database, "02_commande_pack", "id_commande_pack");
   	 $sql_to_insert     = "INSERT INTO 02_commande_pack(id_commande_pack, is_activated, id_affiliate, id_pack, prix_pack_ttc, prix_pack_ht, date_debut_abonnement, date_fin_abonnement, is_subscription, commission_commercial, commission_mlm, id_customer, creation_date, nb_jours_depuis, nb_jours_restant, prix_pack_upgrade_ttc, prix_pack_upgrade_ht )
   	                       VALUES('$id_commande_pack', 1, '$id_affiliate', '$id_pack' , '$prix_pack_ttc', '$prix_pack_ht', '".$date_debut_abonnement."', '', '$subscription', '0', '".$commission_mlm."' , '".$id_customer."' , '".date('Y-m-d H:i:s')."', '$nb_jours_depuis', '$nb_jours_restant', '$prix_pack_upgrade_ttc', '$prix_pack_upgrade_ht' )";
   	 $result = $connection_database-> exec($sql_to_insert);	
	 
   	 
   	 // 3. ON INSÈRE LES TABLES DE MLM PAIEMENTS 
   	 INSERT_COMMANDE_PACK_COMPTABLE($connection_database, $id_commande_pack, 0, $prix_pack_ttc, $prix_pack_ht, $tva_percent_to_pay, $id_affiliate, $id_parrain_niveau_1, $id_parrain_niveau_2, $id_parrain_niveau_3, $id_parrain_niveau_4, $id_parrain_niveau_5 ); 

	 
	 return 1; // COMMANDE PASSÉE AVEC SUCCÈS
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php function ARCHIVE_PASS_ORDER_PACK($connection_database, $id_affiliate)
{   // RÉCUPÉRER LA COMMANDE À ARCHIVER SI ELLE EXISTE
	try{
		$stmt = $connection_database->prepare ( "SELECT COUNT(*) nbr_commande, id_commande_pack, id_affiliate,id_pack, prix_pack_ttc, prix_pack_ht, date_debut_abonnement, date_fin_abonnement, is_subscription, commission_commercial, commission_mlm, id_customer, nb_jours_depuis, nb_jours_restant 
	                                             FROM  02_commande_pack 
				                                 WHERE id_affiliate = :id_affiliate 
												 AND   is_activated = 1 " );
		$stmt->execute ( array ( ':id_affiliate' => $id_affiliate ) );
		$result = $stmt->fetch();
		IF($result['nbr_commande'] < 1)
		{
			return 2; // COMMANDE INÉXISTANTE
		}
		ELSE
		{
            // 1. ON MET À JOUR LA TABLE DES ANCIENNES COMMANDES
			UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "02_commande_pack", "id_affiliate", $id_affiliate, "is_activated", 0, "REMOVE_PASS_ORDER_PACK" );	        
			UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "02_commande_pack", "id_commande_pack", $result['id_commande_pack'], "date_fin_abonnement", "NOW", "REMOVE_PASS_ORDER_PACK" );
			
			// 2. ON INSÈRE DANS LA TABLE D'HISTORIQUE
			$sql_to_insert =" INSERT INTO 03_commande_pack_historique(id_commande_pack_historique, id_commande_pack, id_affiliate, id_pack, prix_pack_ttc, prix_pack_ht, date_debut_abonnement, date_fin_abonnement, is_subscription, commission_commercial, commission_mlm, id_customer, creation_date, nb_jours_depuis, nb_jours_restant )
			                  VALUES('', '".$result['id_commande_pack']."', '".$result['id_affiliate']."','".$result['id_pack']."', ".$result['prix_pack_ttc'].", ".$result['prix_pack_ht'].", '".$result['date_debut_abonnement']."','".date('Y-m-d H:i:s')."' ,'".$result['is_subscription']."' ,'".$result['commission_commercial']."' ,'".$result['commission_mlm']."','".$result['id_customer']."', '".date('Y-m-d H:i:s')."' ,'".$result['nb_jours_depuis']."' ,'".$result['nb_jours_restant']."' )";	
			$result2 = $connection_database->exec($sql_to_insert); // $result2 = 1

		}
	}catch (PDOException $e){  
	     return 0; // Erreur SQL
	}
	
	return 1; // ARCHIVAGE PASSÉ AVEC SUCCÈS
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php 
function REMOVE_PASS_ORDER_PACK($connection_database, $id_affiliate){
	
	//On supprimer la commande de la table 02_commande_pack
	//$sql_to_remove ="DELETE FROM 02_commande_pack WHERE id_affiliate = :id_affiliate";
	//$stmt = $connection_database->prepare ( $sql_to_remove );
	//$stmt->bindParam(':id_affiliate', $id_affiliate, PDO::PARAM_INT);	
	//$stmt->execute();
	
	UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "02_commande_pack", "id_affiliate", $id_affiliate, "is_activated", 0, "REMOVE_PASS_ORDER_PACK" );
	UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "02_commande_pack", "id_affiliate", $id_affiliate, "date_fin_abonnement", "NOW", "REMOVE_PASS_ORDER_PACK" );
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_TYPE_ENTREPRISE_BY_COUNTRY($connection_database, $pays)
{
	
	$sql = "SELECT nom_type_entreprise, abreviation_nom_type_entreprise
		    FROM type_entreprise_by_country 
		    WHERE pays_type_entreprise = :pays";
	
	try {
		$stmt = $connection_database->prepare ( $sql );
		$stmt->bindValue(':pays', $pays, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
	} catch ( PDOException $e ) {
		die ( $e->getMessage () );
	}
	
	return $result;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php 
function isValidIban($iban)
{
	/*Régles de validation par pays*/
	static $rules = array(
			'AL'=>'[0-9]{8}[0-9A-Z]{16}',
			'AD'=>'[0-9]{8}[0-9A-Z]{12}',
			'AT'=>'[0-9]{16}',
			'BE'=>'[0-9]{12}',
			'BA'=>'[0-9]{16}',
			'BG'=>'[A-Z]{4}[0-9]{6}[0-9A-Z]{8}',
			'HR'=>'[0-9]{17}',
			'CY'=>'[0-9]{8}[0-9A-Z]{16}',
			'CZ'=>'[0-9]{20}',
			'DK'=>'[0-9]{14}',
			'EE'=>'[0-9]{16}',
			'FO'=>'[0-9]{14}',
			'FI'=>'[0-9]{14}',
			'FR'=>'[0-9]{10}[0-9A-Z]{11}[0-9]{2}',
			'GE'=>'[0-9A-Z]{2}[0-9]{16}',
			'DE'=>'[0-9]{18}',
			'GI'=>'[A-Z]{4}[0-9A-Z]{15}',
			'GR'=>'[0-9]{7}[0-9A-Z]{16}',
			'GL'=>'[0-9]{14}',
			'HU'=>'[0-9]{24}',
			'IS'=>'[0-9]{22}',
			'IE'=>'[0-9A-Z]{4}[0-9]{14}',
			'IL'=>'[0-9]{19}',
			'IT'=>'[A-Z][0-9]{10}[0-9A-Z]{12}',
			'KZ'=>'[0-9]{3}[0-9A-Z]{3}[0-9]{10}',
			'KW'=>'[A-Z]{4}[0-9]{22}',
			'LV'=>'[A-Z]{4}[0-9A-Z]{13}',
			'LB'=>'[0-9]{4}[0-9A-Z]{20}',
			'LI'=>'[0-9]{5}[0-9A-Z]{12}',
			'LT'=>'[0-9]{16}',
			'LU'=>'[0-9]{3}[0-9A-Z]{13}',
			'MK'=>'[0-9]{3}[0-9A-Z]{10}[0-9]{2}',
			'MT'=>'[A-Z]{4}[0-9]{5}[0-9A-Z]{18}',
			'MR'=>'[0-9]{23}',
			'MU'=>'[A-Z]{4}[0-9]{19}[A-Z]{3}',
			'MC'=>'[0-9]{10}[0-9A-Z]{11}[0-9]{2}',
			'ME'=>'[0-9]{18}',
			'NL'=>'[A-Z]{4}[0-9]{10}',
			'NO'=>'[0-9]{11}',
			'PL'=>'[0-9]{24}',
			'PT'=>'[0-9]{21}',
			'RO'=>'[A-Z]{4}[0-9A-Z]{16}',
			'SM'=>'[A-Z][0-9]{10}[0-9A-Z]{12}',
			'SA'=>'[0-9]{2}[0-9A-Z]{18}',
			'RS'=>'[0-9]{18}',
			'SK'=>'[0-9]{20}',
			'SI'=>'[0-9]{15}',
			'ES'=>'[0-9]{20}',
			'SE'=>'[0-9]{20}',
			'CH'=>'[0-9]{5}[0-9A-Z]{12}',
			'TN'=>'[0-9]{20}',
			'TR'=>'[0-9]{5}[0-9A-Z]{17}',
			'AE'=>'[0-9]{19}',
			'GB'=>'[A-Z]{4}[0-9]{14}'
	);
	/*On vérifie la longueur minimale*/
	if(mb_strlen($iban) < 18)
	{
		return false;
	}
	/*On récupère le code ISO du pays*/
	$ctr = substr($iban,0,2);
	if(isset($rules[$ctr]) === false)
	{
		return false;
	}
	/*On récupère la règle de validation en fonction du pays*/
	$check = substr($iban,4);
	/*Si la règle n'est pas bonne l'IBAN n'est pas valide*/
	if(preg_match('~'.$rules[$ctr].'~',$check) !== 1)
	{
		return false;
	}
	/*On récupère la chaine qui permet de calculer la validation*/
	$check = $check.substr($iban,0,4);
	/*On remplace les caractères alpha par leurs valeurs décimales*/
	$check = str_replace(
			array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T','U', 'V', 'W', 'X', 'Y', 'Z'),
			array('10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35'),
			$check
			);
	/*On effectue la vérification finale*/
	return bcmod($check,97) === '1';
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php 
// FONCTION QUI RETOURNE LA LISTE DES CUSTOMER INSCRIS AVEC @ PASSEE EN PARAMETRE
function getCustomerByEmail($emailAddress) {
	$customersResults = \Stripe\Customer::all();
	$customers = $customersResults->data;
	$filteredResults = [];
	foreach ($customers as $customer) {
		if ($emailAddress === $customer->email) {
			$filteredResults[] = $customer;
		}
	}
	return $filteredResults;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>


<?php  function INSERT_COMMANDE_PACK_COMPTABLE($connection_database, $id_commande_pack, $category_code, $prix_pack_ttc, $prix_pack_ht, $tva_percent_to_pay, $id_affiliate, $id_parrain_niveau_1, $id_parrain_niveau_2, $id_parrain_niveau_3, $id_parrain_niveau_4, $id_parrain_niveau_5 ) 
{    // $CATEGORY_CODE = 1      = PRODUITS LÉGERS
     // $CATEGORY_CODE = 2      = PRODUITS LOURDS
	 // $AX_PAYED      = 0      = CONTRAT QUI DEVRA ÊTRE PAYÉ MAIS LA DEMANDE N'EST PAS FAITE
	
	 date_default_timezone_set('Europe/Paris');
	 $aX_payed         = 0;
	 $aX_payed_date    = "";
	 $aX_ref           = "Ref";
	 $aX_note          = "Note";
	 
	 $amount_ttc       = $prix_pack_ttc;	
	 $amount_only_tva  = str_replace(array('.', ','), array('', '.'), round($prix_pack_ttc - $prix_pack_ht,  3, PHP_ROUND_HALF_DOWN) );
	 
	 List ($mlm_niv1, $mlm_niv2, $mlm_niv3, $mlm_niv4, $mlm_niv5, $mlm_niv6, $mlm_niv7) = MATRICE_MLM_YERS( $category_code, 0, 0);

	 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 //////////////////////////////////////////////   LEVEL 1      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 $level_en_cours   = 1; 
	 $aX_id_affiliate  = $id_parrain_niveau_1;
	 $mlm_niveau       = $mlm_niv1;

	 $sql_insert_al = 'insert into 04_commande_pack_comptable(id_comptable, id_commande_pack, amount_payed_ttc, amount_tva_percent, amount_payed_ht, amount_to_pay_ht, aX_level, matrice_mlm, aX_amount_ht, aX_only_tva, aX_id_affiliate, aX_payed, aX_payed_date, aX_ref , aX_note, creation_date  ) 
	                   values ( "",
					         "'.$id_commande_pack.'",
					         "'.$amount_ttc.'",
							 "'.$tva_percent_to_pay.'",
					         "'.$prix_pack_ht.'",
							 "'.$amount_only_tva .'",
					         "'.$level_en_cours.'", 
							 "'.$mlm_niveau.'",
					         "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 , 2, PHP_ROUND_HALF_DOWN)  )   .'",
							 "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 * $tva_percent_to_pay/100 , 2, PHP_ROUND_HALF_DOWN)  ) .'",
					         "'.$aX_id_affiliate.'",
					         "'.$aX_payed.'",
					         "",
					         "'.$aX_ref.'",
					         "'.$aX_note.'",
							 CURRENT_TIMESTAMP)													 
					         ';
	 
	 try{
	 	$stmt = $connection_database->prepare ($sql_insert_al);	 	 
	 	$result = $stmt->execute();
	 }catch (PDOException $e){
	 	die($e->getMessage());
	 }		 
							 							 
	 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 //////////////////////////////////////////////   LEVEL 2      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 $level_en_cours   = 2; 
	 $aX_id_affiliate  = $id_parrain_niveau_2;
	 $mlm_niveau       = $mlm_niv2;

	 $sql_insert_al = 'insert into 04_commande_pack_comptable(id_comptable, id_commande_pack, amount_payed_ttc, amount_tva_percent, amount_payed_ht, amount_to_pay_ht, aX_level, matrice_mlm, aX_amount_ht, aX_only_tva, aX_id_affiliate, aX_payed, aX_payed_date, aX_ref , aX_note, creation_date  ) 
	                   values ( "",
					         "'.$id_commande_pack.'",
					         "'.$amount_ttc.'",
							 "'.$tva_percent_to_pay.'",
							 0,
					         0,
					         "'.$level_en_cours.'", 
							 "'.$mlm_niveau.'",
					         "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 , 2, PHP_ROUND_HALF_DOWN)  )   .'",
							 "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 * $tva_percent_to_pay/100 , 2, PHP_ROUND_HALF_DOWN)  ) .'",
					         "'.$aX_id_affiliate.'",
					         "'.$aX_payed.'",
					         "",
					         "'.$aX_ref.'",
					         "'.$aX_note.'",
							 CURRENT_TIMESTAMP)													 
					         ';
	 
	 try{
	 	$stmt = $connection_database->prepare ($sql_insert_al);	 	 
	 	$result = $stmt->execute();
	 }catch (PDOException $e){
	 	die($e->getMessage());
	 }	
	 				 
	 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 //////////////////////////////////////////////   LEVEL 3      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 $level_en_cours   = 3; 
	 $aX_id_affiliate  = $id_parrain_niveau_3;
	 $mlm_niveau       = $mlm_niv3;

	 $sql_insert_al = 'insert into 04_commande_pack_comptable(id_comptable, id_commande_pack, amount_payed_ttc, amount_tva_percent, amount_payed_ht, amount_to_pay_ht, aX_level, matrice_mlm, aX_amount_ht, aX_only_tva, aX_id_affiliate, aX_payed, aX_payed_date, aX_ref , aX_note, creation_date  ) 
	                   values ( "",
					         "'.$id_commande_pack.'",
					         "'.$amount_ttc.'",
							 "'.$tva_percent_to_pay.'",
							 0,
					         0,
					         "'.$level_en_cours.'", 
							 "'.$mlm_niveau.'",
					         "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 , 2, PHP_ROUND_HALF_DOWN)  )   .'",
							 "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 * $tva_percent_to_pay/100 , 2, PHP_ROUND_HALF_DOWN)  ) .'",
					         "'.$aX_id_affiliate.'",
					         "'.$aX_payed.'",
					         "",
					         "'.$aX_ref.'",
					         "'.$aX_note.'",
							 CURRENT_TIMESTAMP)													 
					         ';
	 
	 try{
	 	$stmt = $connection_database->prepare ($sql_insert_al);	 	 
	 	$result = $stmt->execute();
	 }catch (PDOException $e){
	 	die($e->getMessage());
	 }	
							 
	 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 //////////////////////////////////////////////   LEVEL 4      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 $level_en_cours   = 4; 
	 $aX_id_affiliate  = $id_parrain_niveau_4;
	 $mlm_niveau       = $mlm_niv4;

	 $sql_insert_al = 'insert into 04_commande_pack_comptable(id_comptable, id_commande_pack, amount_payed_ttc, amount_tva_percent, amount_payed_ht, amount_to_pay_ht, aX_level, matrice_mlm, aX_amount_ht, aX_only_tva, aX_id_affiliate, aX_payed, aX_payed_date, aX_ref , aX_note, creation_date  ) 
	                   values ( "",
					         "'.$id_commande_pack.'",
					         "'.$amount_ttc.'",
							 "'.$tva_percent_to_pay.'",
							 0,
					         0,
					         "'.$level_en_cours.'", 
							 "'.$mlm_niveau.'",
					         "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 , 2, PHP_ROUND_HALF_DOWN)  )   .'",
							 "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 * $tva_percent_to_pay/100 , 2, PHP_ROUND_HALF_DOWN)  ) .'",
					         "'.$aX_id_affiliate.'",
					         "'.$aX_payed.'",
					         "",
					         "'.$aX_ref.'",
					         "'.$aX_note.'",
							 CURRENT_TIMESTAMP)													 
					         ';
	 
	 try{
	 	$stmt = $connection_database->prepare ($sql_insert_al);	 	 
	 	$result = $stmt->execute();
	 }catch (PDOException $e){
	 	die($e->getMessage());
	 }	
							 
	 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 //////////////////////////////////////////////   LEVEL 5      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 $level_en_cours   = 5; 
	 $aX_id_affiliate  = $id_parrain_niveau_5;
	 $mlm_niveau       = $mlm_niv5;

	 $sql_insert_al = 'insert into 04_commande_pack_comptable(id_comptable, id_commande_pack, amount_payed_ttc, amount_tva_percent, amount_payed_ht, amount_to_pay_ht, aX_level, matrice_mlm, aX_amount_ht, aX_only_tva, aX_id_affiliate, aX_payed, aX_payed_date, aX_ref , aX_note, creation_date  ) 
	                   values ( "",
					         "'.$id_commande_pack.'",
					         "'.$amount_ttc.'",
							 "'.$tva_percent_to_pay.'",
							 0,
					         0,
					         "'.$level_en_cours.'", 
							 "'.$mlm_niveau.'",
					         "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 , 2, PHP_ROUND_HALF_DOWN)  )   .'",
							 "'. str_replace(array('.', ','), array('', '.'), round($prix_pack_ht * $mlm_niveau/100 * $tva_percent_to_pay/100 , 2, PHP_ROUND_HALF_DOWN)  ) .'",
					         "'.$aX_id_affiliate.'",
					         "'.$aX_payed.'",
					         "",
					         "'.$aX_ref.'",
					         "'.$aX_note.'",
							 CURRENT_TIMESTAMP)													 
					         ';
	 
	 try{
	 	$stmt = $connection_database->prepare ($sql_insert_al);	 	 
	 	$result = $stmt->execute();
	 }catch (PDOException $e){
	 	die($e->getMessage());
	 }						 
							 
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function ASK_FOR_BEING_PAYED($connection_database, $id_affiliate, $aX_payed, $reference, $peut_toucher_recurrence) 
{ // AFFILIE SOUHAITE ETRE PAYÉ !  ATTENTION IL PEUT ENCAISSER PLUSIEURS RECOMMANDATIONS EN UNE SEULE FOIS
         IF    ( $aX_payed      == 0)       /// DEMANDE DE PAIEMENT DES LIGNES A 0
	           { $next_aX_payed = 5; }      /// LIGNES PASSENT DE 0 A EN COURS DE PAIEMENT
		 ELSE  { $next_aX_payed = 1; }      /// LIGNES PASSENT EN COURS DE PAIEMENT A PAYE
		  
				 $num    = 1;
				 $ref2   = "C";
				 $somme_a_payer_brut = 0;

                 $result = mysql_query(" SELECT id_comptable, id_contrat, aX_id_affiliate, aX_amount_ht 
				                         FROM contrats_comptable 
									     WHERE aX_id_affiliate = ".$id_affiliate." 
										 AND   aX_payed        = ".$aX_payed."     ") or die("Requete pas comprise : ASK FOR BEING PAYED 1 ");
 
				 IF ( $peut_toucher_recurrence == 0 ) { 
                 $result = mysql_query(" SELECT cc.id_comptable, cc.id_contrat, cc.aX_id_affiliate, cc.aX_amount_ht 
			                             FROM contrats_details cd, contrats_comptable cc 
			  	  	                     WHERE  cc.aX_id_affiliate   = ".$id_affiliate." 
			  	  	                     AND    cc.id_contrat        = cd.id_contrat
						                 AND    aX_level             = 0
						                 AND    aX_payed             = ".$aX_payed." 						  
				                         ORDER  by id_contrat desc   ") or die("Requete pas comprise : ASK FOR BEING PAYED 2 ");
				 }

										 
   			     WHILE ($reponse = mysql_fetch_array($result))
                        {  				
                             IF ($num == 1 ) {$ref2  =  $ref2.'-'.$reponse["id_comptable"]; }
						     $num  =  $num +1;
							 $somme_a_payer_brut =  $somme_a_payer_brut + $reponse["aX_amount_ht"];                           	
				             $id_comptable = $reponse["id_comptable"];

				             mysql_query(" UPDATE contrats_comptable 
							               SET aX_payed = '$next_aX_payed', 
										   aX_ref  = '$reference'  , 
										   aX_note = '$ref2' , 
										   facture_entreprise = 1 , 
										   aX_asked_payed_date   = CURRENT_TIMESTAMP 
										   WHERE aX_id_affiliate = '$id_affiliate' 
										   AND  id_comptable = '$id_comptable'          ");
										   
   			            }

				return ("OK");
				
}///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php 
// FONCTION QUI RETOURNE LA LISTE DES CUSTOMER INSCRIS AVEC ID_CUSTOMER PASSEE EN PARAMETRE
function getCustomerByID($id_customer) {
	$customersResults = \Stripe\Customer::all();
	$customers = $customersResults->data;
	$my_customer = '';
	foreach ($customers as $customer) {
		if ($id_customer === $customer->id) {
			$my_customer = $customer;
		}
	}
	return $my_customer;
}///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php 
// RETURN COMMANDE LIVE BY ID_AFFILIATE
function RETURN_INFOS_COMMANDE($connection_database,$id_affiliate){
	$sql_query  = QUERY_SELECT_ROW_FROM_TABLE($connection_database, '02_commande_pack', array('id_pack','prix_pack_ttc','date_debut_abonnement','is_subscription','id_customer',), array('id_affiliate' => $id_affiliate), false);
	
	$my_commande = SELECT_ROW_FROM_TABLE($connection_database, $sql_query, true);
    if($my_commande){
    	return $my_commande[0];
    }else{
    	return null;
    }

}///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function DISPLAY_INSTEADOF_ZERO($valeur, $affiche_euro, $nb_decimal)
{ 
	 IF    ($valeur == 0)   { return (" - ");     } 
	 ELSE     {
            $valeur = str_replace(array('.', ','), array('', '.'), $valeur); 		 
	        IF ( $affiche_euro == 1) { $valeur_a_afficher = number_format( trim($valeur) , $nb_decimal , ',', ' ') ." €"; }  
	        ELSE                     { $valeur_a_afficher = number_format( trim($valeur) , $nb_decimal , ',', ' ') ;   }
		      }
 
        return ($valeur_a_afficher);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php  function RETURN_REQUETE_COMMANDE_PACK_HISTORIQUE($connection_database, $id_affiliate, $categorie) 
{   // $categorie = 0 >> NOUVEAU PACK HISTORIQUE
    // $categorie = 1 >> MONTHLY PRELEVEMENTS
	
	 $requete_a_retourner = "SELECT id_commande_pack_historique, id_commande_pack, id_pack, prix_pack_ttc, prix_pack_ht, date_debut_abonnement, date_fin_abonnement, is_subscription , id_customer, commission_commercial , commission_mlm, categorie
                                    FROM   03_commande_pack_historique 
			                        WHERE id_affiliate  = $id_affiliate 
									AND   categorie     = $categorie   ";
	 return ( $requete_a_retourner );
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<?php  function DIFF_EN_MOIS_ENTRE_DEUX_DATE($start,$end) 
{  // ON AJOUTE +1 CAR C'EST LE NOMBRE DE MOIS DE PRELEVEMENTS
	//$date_format = YYYY-m-d
	sscanf($start, "%4s-%2s-%2s", $annee, $mois, $jour);
	$a1 = $annee;
	$m1 = $mois;
	sscanf($end, "%4s-%2s-%2s", $annee, $mois, $jour);
	$a2 = $annee;
	$m2 = $mois + 1;
 
	$dif_en_mois = ($m2-$m1)+12*($a2-$a1);
	return $dif_en_mois ;
}
?>



