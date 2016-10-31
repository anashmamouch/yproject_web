<?php
     /// MODULE DE CONTRÔLE DES ACCÈS AU SITE ET À LA BASE DE DONNÉES
     /// $ID_AFFILIATE EST SOIT UN ID, SOIT UN EMAIL
 
     session_start();
	 require('functions.php');
	 include('config.php'); 
	 include('config_master.php');
     List ($connection_database, $connection_ok , $message_erreur )= PDO_CONNECT("", "", "");
     $id_affiliate = VALUE_TO_CHECK_NORRIS($connection_database, $_POST['id_affiliate']);
     $password_aff    = VALUE_TO_CHECK_NORRIS($connection_database, $_POST['password']);
	 $ERROR_FORMAT    =  1; ///// PAR DEFAUT LE FORMAT EST MAUVAIS 

             /////////////// 1ER CONTROLE DES FORMATS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             IF (($id_affiliate == "")  OR ($password_aff  == "") OR (strlen($id_affiliate) < 1)  OR (strlen($password_aff) < 2) OR strstr(strtolower($id_affiliate), "script") OR strstr(strtolower($id_affiliate), "alert") OR strstr(strtolower($password_aff), "alert") OR strstr($password_aff, "="))
                {              
      	            echo '<body onLoad="alert(\'Saisie incorrecte de vos identifiants. \')">'; 
                    echo '<meta http-equiv="refresh" content="0;URL=../login.php">'; 	
                    
                }    
	         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             ELSE 
	  	         {				
					 $req = " SELECT ad.id_affiliate, aa.password, ad.first_name, ad.last_name, ad.email, aa.id_partenaire, aa.id_upline, mode, triforce_grade, habilitation  , sous_habilitation
	  	      		                                             FROM affiliate_details ad, affiliate aa 
											                     WHERE ad.id_affiliate = aa.id_affiliate 
											                     AND aa.is_activated = 1 
											                     AND ad.id_affiliate = $id_affiliate ";
					 
					 $stmt = $connection_database->query($req);
					 
					 $dn = $stmt->fetch(PDO::FETCH_ASSOC);

	  	      	     $ERROR_FORMAT = 0;	
	  	      	     
	  	      	 }		
             ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	         ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	         IF ($ERROR_FORMAT == 0)        // LE FORMAT EST OK - COMMENCONS LES VERIFICATIONS
	             {      
                   IF($dn['password'] == $password_aff and $stmt->rowCount()>0)
	  	             { 
                            GESTION_PARAMETRES_SESSION($connection_database, $dn['first_name'], $dn['id_affiliate'], $dn['id_partenaire'], $dn['email'], $dn['id_upline'], trim(strtoupper($dn['mode'])), $dn['triforce_grade'], $dn['habilitation'], 1, $dn['sous_habilitation'] );
	  	             }
	  	           ELSE //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  	             {
      	      	         echo '<body onLoad="alert(\'Membre non reconnu ou inactif - Contactez : '.$mail_support.'\')">'; 
                         echo '<meta http-equiv="refresh" content="0;URL=../login.php">'; 	
                        

	  	             }
	  	       }
	  	       ELSE
	  	       {    /// MAUVAIS FORMAT 
      	              echo '<body onLoad="alert(\'Saisie incorrecte de vos identifiants \')">'; 
                      echo '<meta http-equiv="refresh" content="0;URL=../login.php">'; 	
	  	       	
                      

                 }
                 
	
                   
     
?>

