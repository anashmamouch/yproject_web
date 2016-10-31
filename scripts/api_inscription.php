<?php  // API API_INSCRIPTION.PHP - CALLED BY SIGNUP.PHP
       // RETURN <20 : ERROR FORMAT
               // 2 : PB FORMAT AU NIVEAU DU NOM
               // 3 : PB FORMAT AU NIVEAU DU PRENOM	
               // X : ...			   
       // RETURN 20  : ERROR PLUS DE PLACES DISPONIBLES  
       // RETURN 100 : OK    -  INSCRIPTION OK	
	   
             session_start ();                 // ON OUVRE LA SESSION EN COURS        
             require('functions.php');         // ON DÉFINI LES FUNCTIONS             
             include('config.php');            // ON SE CONNECTE A LA BASE DE DONNÉES 
		     include('config_master.php');
			 
	         List ($connection_database, $connection_ok , $message_erreur )= PDO_CONNECT("", "", "");
	
        	 IF (!isset($_POST['c_g_i']))                      { $_POST['c_g_i']                    = 0;   }
        	 IF (!isset($_POST['plus_de_18_ans']))             { $_POST['plus_de_18_ans']           = 0;   }
        	 IF (!isset($_POST['pas_de_parrain_nosrezo']))     { $_POST['pas_de_parrain_nosrezo']   = 0;   }			 
        	 IF (!isset($_POST['ville_n']))                    { $_POST['ville_n']                  = "";  }
        	 IF (!isset($_POST['adresse']))                    { $_POST['adresse']                  = "";  }
        	 IF (!isset($_POST['nationalite']))                { $_POST['nationalite']              = "FR";}
        	 IF (!isset($_POST['lange_parlee']))               { $_POST['lange_parlee']             = "fr_FR";    $_POST['nationalite']  = "FR";       }
        	 IF (trim($_POST['lange_parlee']) == "pt_PT")      {                                                  $_POST['nationalite']  = "PORTUGAL"; }

             $ERROR_FORMULAIRE      = 0;
             $_POST['email']        = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['email']  ); 			 
             $_POST['mobile']       = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['mobile']  ); 
             $_POST['id_parrain']   = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['id_parrain']  ); 
             $_POST['name_parrain'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['name_parrain']  ); 
			 
                  IF (empty($_POST['nom']))                                                                        { $ERROR_FORMULAIRE = 2;   }
             ELSE IF (trim($_POST['nom']) =='')                                                                    { $ERROR_FORMULAIRE = 2;   }
             ELSE IF (empty($_POST['prenom']))                                                                     { $ERROR_FORMULAIRE = 3;   }
             ELSE IF (trim($_POST['prenom']) =='')                                                                 { $ERROR_FORMULAIRE = 3;   }
             ELSE IF (empty($_POST['mobile']))                                                                     { $ERROR_FORMULAIRE = 3;   }
             ELSE IF (is_numeric($_POST['mobile']) == 0)                                                           { $ERROR_FORMULAIRE = 4;   }
             ELSE IF (strlen($_POST['mobile']) < 6)                                                                { $ERROR_FORMULAIRE = 4;   }	 
             ELSE IF (substr($_POST['mobile'], 0, 2) == "08")                                                      { $ERROR_FORMULAIRE = 4;   }	 
             ELSE IF (trim($_POST['email']) <> trim($_POST['email2']))                                             { $ERROR_FORMULAIRE = 5;   }
             ELSE IF (empty($_POST['cp']))                                                                         { $ERROR_FORMULAIRE = 6;   }
             ELSE IF (strlen($_POST['cp']) < 4)                                                                    { $ERROR_FORMULAIRE = 6;   }	
             ELSE IF (empty($_POST['ville']))                                                                      { $ERROR_FORMULAIRE = 7;   }	
             ELSE IF (trim($_POST['ville']) =='')                                                                  { $ERROR_FORMULAIRE = 7;   }
             ELSE IF (trim($_POST['jour_n']) =='')                                                                 { $ERROR_FORMULAIRE = 8;   }
        	 ELSE IF ($_POST['c_g_i'] == 0)                                                                        { $ERROR_FORMULAIRE = 12;  }			 
             ELSE IF (CHECK_IF_AFFILIATE_ALREADY_EXIST($connection_database, "email", $_POST['email'])  >= 1 )     { $ERROR_FORMULAIRE = 14;  }
             ELSE IF (CHECK_IF_AFFILIATE_ALREADY_EXIST($connection_database, "phone", $_POST['mobile']) >= 1 )     { $ERROR_FORMULAIRE = 14;  }
		 			 
					 
			 IF ( $ERROR_FORMULAIRE == 0 AND $_POST['pas_de_parrain_nosrezo'] == 0 )                 // UN PARRAIN EST DÉCLARÉ CHEZ YWORLD
			     { 
			         IF (is_numeric($_POST['id_parrain']) == 0)                                                                       { $ERROR_FORMULAIRE = 11;  }
                     ELSE IF (CHECK_PARRAIN_EXIST($connection_database,  $_POST['id_parrain'], $_POST['name_parrain'] ) == 0 )        { $ERROR_FORMULAIRE = 13;  }					 
				 }
			 ELSE IF( trim($_POST['id_parrain']) == "" AND $_POST['pas_de_parrain_nosrezo'] == 1 )   // PAS DE PARRAIN DÉCLARÉ CHEZ YWORLD
			     {
			         $_POST['id_parrain']   = 37286;
					 $_POST['name_parrain'] = "TEMPORAIRE";
				 
				 }
			 
			 
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 
                    IF ($ERROR_FORMULAIRE > 0 ) 
                       {
     		                  echo $ERROR_FORMULAIRE ; // PB FORMAT 
                       }	
                    ELSE     //LES DONNÉES NE SONT PAS VIDE 
                       {
                    			    $_POST['nom']            = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['email']  ); 
                    			    $_POST['prenom']         = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['prenom']  ); 
                    			    $_POST['name_parrain']   = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['name_parrain']  ); 
                    			    $_POST['mobile']         = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['mobile']  ); 
                    			    $_POST['email']          = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['email']  ); 
                    			    $_POST['adresse']        = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['adresse']  ); 
                    			    $_POST['cp']             = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['cp']  ); 
                    			    $_POST['ville']          = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['ville']  ); 
                    			    $_POST['ville_n']        = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['ville_n']  ); 
                    			    $_POST['nationalite']    = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['nationalite']  ); 

                                    $date_n                 = $_POST['jour_n'];
                    				$first_name             = ucfirst(strtolower($_POST['prenom']));
                    				$last_name              = strtoupper($_POST['nom']);
                    				$name_parrain           = ucfirst($_POST['name_parrain']);	
                    				$mobile                 = $_POST['mobile'];	
                    				$email                  = $_POST['email'];	
                    				$adresse                = $_POST['adresse'];
                    				$cp                     = $_POST['cp'];	
                    				$ville                  = ucfirst(strtolower($_POST['ville']));
                    				$ville_n                = ucfirst($_POST['ville_n']);	
                    				$nationalite            = ucfirst($_POST['nationalite']);
                    				$nationalite            = 'FR';
                    				$id_affiliate_max       = ID_MAXIMUM_FROM_TABLE( $connection_database, "affiliate_details", "id_affiliate" ); 
                    
                    		/////// CHECK IF AFFILIATE IS ABLE TO INVIT NEW NOSREZO MEMBERS 
                            List ($nb_filleul_L1, $nb_filleul_L2, $is_able_to_invit, $first_name_parrain, $email_parrain, $phone_parrain, $nb_place_disponible, $numero_de_pack, $grade_nosrezo, $is_protected  ) = IS_ABLE_TO_PARRAINER( $connection_database, $_POST['id_parrain'] ); 							

                            IF ( $is_able_to_invit == 0) // PAS DE PLACE POUR DE NOUVEAUX FILLEULS
                    		{
                    				  //include('email/max_filleul_atteint_parrain.php');
                    				  //SEND_EMAIL_MAX_FILLEUL($_POST['id_parrain'], $first_name." ".$last_name , $cp." ".$ville , $mobile , $serveur);
                    				  echo 20 ; 		  
                    		}
                    		ELSE
                    		{
                    		        $country           = "";
									List ($latitude, $longitude) = GEO_LOCALISATION_ADRESSE($connection_database, $cp, $ville , $adresse, "INSERT AFFILIE", $country);        				
                    		        IF (INSERT_INTO_AFFILIATE_DETAILS($connection_database, $_POST['id_parrain'], $id_affiliate_max, 0, $_POST['gender'], $first_name, $last_name, $adresse, $cp, $ville, $mobile, $email, "", "", $date_n, $ville_n, $nationalite, 0, 1, $latitude, $longitude) == 1)
                    		        {
										
											 IF ( trim($_POST['lange_parlee']) == "fr_FR" )
											 {
 
											 }
											 ELSE IF ( trim($_POST['lange_parlee']) == "pt_PT"  )
											 {

											 }										
										
                    		        			 echo 100 ;										
                    		        }
                    		        ELSE         ///////// SI ÇA NE FONCTIONNE PAS : LA CRÉATION DE L'AFFILIÉ A ECHOUÉ POUR UN PROBLÉME TECHNIQUE
                    		        {
                    	                    	 echo 0 ; 
                    		        }
                    		}		
                    				
                       }

?> 
