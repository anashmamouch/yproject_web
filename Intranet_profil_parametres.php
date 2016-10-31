<!-- BEGIN STYLE MENU -->         <?php     include("scripts/01_bandeau_style.php");        ?>     <!-- END STYLE MENU -->
<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/02_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="page-fixed-main-content">     <!-- #3  --> 
				
				<div class="col-md-12">
					
<?php

IF( $_SESSION['id_affiliate'] > 0)
     { 

	 $id_affiliate = $_SESSION['id_affiliate'];
     
     $dossier       =  'fichiers/commerciaux/kbis/';
	 IF (!isset( $_POST['chargement_kbis'] ))            { $_POST['chargement_kbis']           = 0;  }
	 IF (!isset($_POST['load_file']))                    {$_POST['load_file']         = 0;}	
	 IF (!isset($_POST['error_code']))                   {$_POST['error_code']        = 0;}
	 IF (!isset($_POST['tab_active']))                   {$_POST['tab_active']        = "tab_1_1";}
	 
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 ////////////////     UNE ACTION EST À RÉALISER                                   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 IF (isset($_POST['maj_siret'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  	 		 
			 $_POST['p_numero_siret'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['p_numero_siret'] ); 
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "SIRET", $_POST['p_numero_siret'], "Intranet_profil_parametres.php 1" );

			 echo '<div class="note note-success">';
	 		 echo 'VOTRE NUMÉRO DE SIRET EST À JOUR : '.$_POST['p_numero_siret'];
	 		 echo '</div>';
			 
	  }	
	 ELSE IF (isset($_POST['maj_numero_telephone'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			$_POST['phone_number'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['phone_number'] ); 
		    UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "phone_number", $_POST['phone_number'], "Intranet_profil_parametres.php 2" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE NUMÉRO DE TÉLÉPHONE EST À JOUR : '.$_POST['phone_number'];
	 		 echo '</div>';

	  }
	 ELSE IF (isset($_POST['maj_email_commercial'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['email'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['email'] );	
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "email", $_POST['email'], "Intranet_profil_parametres.php 3" );
			 
	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE EMAIL EST À JOUR : '.$_POST['email'];
	 		 echo '</div>';	
			 
	  }
	 ELSE IF (isset($_POST['maj_adresse'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['new_adresse'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['new_adresse'] );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "address", $_POST['new_adresse'], "Intranet_profil_parametres.php 4" );
			 
	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE ADRESSE EST À JOUR : '.$_POST['new_adresse'];
	 		 echo '</div>';

	  }
	 ELSE IF (isset($_POST['maj_code_postal'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['new_code_postal'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['new_code_postal'] );	
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "zip_code", $_POST['new_code_postal'], "Intranet_profil_parametres.php 5" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE CODE POSTAL EST À JOUR : '.$_POST['new_code_postal'];
	 		 echo '</div>';

	  }
	 ELSE IF (isset($_POST['maj_ville'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['new_ville'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['new_ville'] );	
		     UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "city", $_POST['new_ville'], "Intranet_profil_parametres.php 6" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE VILLE EST À JOUR : '.$_POST['new_ville'];
	 		 echo '</div>';

	  }
	 ELSE IF (isset($_POST['maj_code_pays'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['new_pays'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['new_pays'] );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "nationality", $_POST['new_pays'], "Intranet_profil_parametres.php 6" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE PAYS EST À JOUR : '.$_POST['new_pays'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_nom_entreprise'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['p_nom_entreprise'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['p_nom_entreprise'] );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "entreprise_name", $_POST['p_nom_entreprise'], "Intranet_profil_parametres.php 7" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE NOM D\'ENTREPRISE EST À JOUR : '.$_POST['p_nom_entreprise'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_id_securite_sociale'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['p_id_securite_sociale'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['p_id_securite_sociale'] );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "id_securite_sociale", $_POST['p_id_securite_sociale'], "Intranet_profil_parametres.php 8" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE NUMÉRO DE SÉCURITÉ SOCIALE EST À JOUR : '.$_POST['p_id_securite_sociale'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_tva_intra'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['p_numero_de_tva'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['p_numero_de_tva'] );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "TVA_INTRA", $_POST['p_numero_de_tva'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE NUMÉRO DE TVA INTRA-COMMUNAUTAIRE EST À JOUR : '.$_POST['p_numero_de_tva'];
	 		 echo '</div>';
		 
	  }
	 ELSE IF (isset($_POST['maj_code_banque'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['code_banque'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['code_banque'] );
             UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_iban", "id_affiliate", $id_affiliate, "code_banque", $_POST['code_banque'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE CODE BANQUE EST À JOUR : '.$_POST['code_banque'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_numero_compte'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['numero_compte'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['numero_compte'] );
             UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_iban", "id_affiliate", $id_affiliate, "numero_compte", $_POST['numero_compte'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE NUMÉRO DE COMPTE EST À JOUR : '.$_POST['numero_compte'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_nom_banque'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['nom_banque'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['nom_banque'] );
             UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_iban", "id_affiliate", $id_affiliate, "nom_banque", $_POST['nom_banque'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE BANQUE EST À JOUR : '.$_POST['nom_banque'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_BIC_CLIENT'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['BIC_CLIENT'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['BIC_CLIENT'] );
             UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_iban", "id_affiliate", $id_affiliate, "BIC_CLIENT", $_POST['BIC_CLIENT'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE BIC BANQUE EST À JOUR : '.$_POST['BIC_CLIENT'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_code_guichet'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['code_guichet'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['code_guichet'] );
             UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_iban", "id_affiliate", $id_affiliate, "code_guichet", $_POST['code_guichet'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE CODE GUICHET DE VOTRE BANQUE EST À JOUR : '.$_POST['code_guichet'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_cle_rib'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['cle_rib'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['cle_rib'] );
             UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_iban", "id_affiliate", $id_affiliate, "cle_rib", $_POST['cle_rib'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE CODE GUICHET DE VOTRE BANQUE EST À JOUR : '.$_POST['cle_rib'];
	 		 echo '</div>';
			 
	  }
	 ELSE IF (isset($_POST['maj_IBAN'])  )  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     {  
			 $_POST['IBAN'] = VALUE_TO_CHECK_NORRIS( $connection_database, $_POST['IBAN'] );
             UPDATE_RIB_BANQUE( $connection_database,  $id_affiliate );
			 UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_iban", "id_affiliate", $id_affiliate, "IBAN", $_POST['IBAN'], "Intranet_profil_parametres.php 9" );

	 		 echo '<div class="note note-success">';
	 		 echo 'VOTRE CODE IBAN DE VOTRE BANQUE EST À JOUR : '.$_POST['IBAN'];
	 		 echo '</div>';
			 
	  }
	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     ELSE IF ($_POST['chargement_kbis'] > 0 )
         {
                    $taille_maxi      = 5000000;
                    $taille           = filesize($_FILES['annonce_file']['tmp_name']);
                    $extensions       = array('.png', '.PNG', '.jpg', '.JPG', '.jpeg', '.pdf', '.PDF', '.doc', '.docx');
                    $extension        = strrchr($_FILES['annonce_file']['name'], '.'); 
            		            								 
                    IF(!in_array($extension, $extensions))   {  $erreur = "Vous devez uploader un fichier de type .png ou .jpg ou .pdf ou .doc ";     }
                    IF($taille>$taille_maxi)                 {  $erreur = 'Le fichier est trop gros : Maximum 5M';    }
            	    echo '<div class="col-md-12 note note-info">';
					
                          //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            	          IF (isset($_POST['submit_kbis'])) 
                             {
                                             $fichier     = "KBIS_".$id_affiliate.$extension;
											 IF(!isset($erreur)) //S'IL N'Y A PAS D'ERREUR, ON UPLOAD
                                             {
                                                          IF ( move_uploaded_file($_FILES['annonce_file']['tmp_name'], $dossier . $fichier) ) 
                                                                {    
															         echo '&nbsp &nbsp VOTRE KBIS EST CHARGÉ.  '; 

					                                                 // 1. ON MET À JOUR
                                                                     UPDATE_TABLE_ONE_FIELD_QUERY( $connection_database, "affiliate_details", "id_affiliate", $id_affiliate, "kbis_commercial", $fichier, "Intranet_profil_parametres.php #526" );
                                                                     UPDATE_ACTION_LIST_FROM_CATEGORY($connection_database, $id_affiliate, 2, "FERME"); 																	 

																 }
                                                          ELSE  { echo '&nbsp ÉCHEC DU CHARGEMENT. ';                            }
                                             }	
			                                 ELSE       { echo '&nbsp ÉCHEC DU KBIS : '.$erreur.'  ';   }				 
				             }
			        echo '</div>';

         }
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     ELSE IF ($_POST["load_file"] > 0) ////////////// MODULE DE CHARGEMENT DE PHOTO DE PROFIL   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		  			         
		 {
				    echo '<div class="col-md-12 note note-info">';

								 $dossier = "fichiers/photos/yers/";
                                 $fichier = basename($_FILES['annonce_file']['name']);
                                 $taille_maxi = 3000000;
                                 $taille = filesize($_FILES['annonce_file']['tmp_name']);
                                 $extensions = array('.png', '.PNG', '.jpg', '.JPG', '.jpeg');
                                 $extension = strrchr($_FILES['annonce_file']['name'], '.'); 
                                 //DÉBUT DES VÉRIFICATIONS DE SÉCURITÉ...
                                 IF(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                                 {
                                      $erreur = 'Vous devez uploader un fichier de type .png ou .jpg !';
                                 }
                                 IF($taille>$taille_maxi)
                                 {
                                      $erreur = 'Le fichier est trop gros : Maximum 3M';
                                 }
                                 IF(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                                 {
                                      //ON FORMATE LE NOM DU FICHIER ICI...
                                      $fichier = strtr($fichier, 
                                           'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                                           'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                                      $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
									  $fichier = "affiliate_".$_SESSION['id_affiliate']."_profile.png";
                                      if(move_uploaded_file($_FILES['annonce_file']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                                      {
                                           echo '<h5> &nbsp CHARGEMENT EFFECTUÉ AVEC SUCCÈS ! </h5>';
										   
                                              // On rogne l'image
                                              $urlphoto = "fichiers/photos/yers/";
                                              $urldest  = "fichiers/photos/yers/images_resize/";
											  
                                              if(rogner_image($urlphoto, $fichier, $urldest)) {
                                                  
                                              }
                                      }
                                      else //Sinon (la fonction renvoie FALSE).
                                      {
                                           echo '<h5> &nbsp Echec de l\'upload ! </h5>';
                                      }
                                 }
                                 else
                                 {
                                      echo '<h5> &nbsp '.$erreur.' </h5>';
                                 }					

	                echo '</div>';					 
				 } 		 
	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
	 // RAFRAICHISSEMENT DES DONNEES POUR AFFICHAGE DANS LA PAGE 
	 List( $id_parrain ,$first_name, $last_name, $first_and_last_name, $is_activated, $address, $zip_code, $city, $phone_number, $email, $creation_date, $birth_place, $nationality, $birth_date , $last_connection_date, $mode, $contract_signed, $id_securite_sociale, $affiliate_latitude, $affiliate_longitude, $creation_depuis, $connection_depuis, $password, $entreprise_name, $kbis_recu, $SIRET, $TVA_INTRA , $kbis_commercial, $numero_facture )= RETURN_INFO_AFFILIATE( $connection_database, $id_affiliate   ); 
	 List( $id_parrain2 ,$first_name_p2, $last_name_p2, $first_and_last_name_p2, $is_activated_p2, $address_p2, $zip_code_p2, $city_p2, $phone_number_p2, $email_p2, $creation_date2, $birth_place2, $nationality2, $birth_date2 , $last_connection_date2, $mode2, $contract_signed2, $id_securite_sociale2, $affiliate_latitude2, $affiliate_longitude2, $creation_depuis2, $connection_depuis2, $password2  )= RETURN_INFO_AFFILIATE( $connection_database, $id_parrain  ); 	  
	 List( $code_banque, $code_guichet, $numero_compte, $cle_rib, $IBAN, $iban_creation_date , $nom_banque, $BIC_CLIENT ) = RETURN_INFO_AFF_IBAN($connection_database, $id_affiliate);
	  


				 

					
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	 				 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	 
?>	

                 <?php if ($_POST['error_code'] == 100)  {echo ' <div class="note note-success"><h5> LA MODIFICATION DU MOT DE PASSE A ÉTÉ PRISE EN COMPTE </h5></div> ';}?>				 
	             <?php if ($_POST['error_code'] == 200)  {echo ' <a> MODIFICATION DU MOT DE PASSE NON PRISE EN COMPTE </a> ';}?>	
	
					<!-- BEGIN PROFILE CONTENT -->
								<div class="portlet light bordered col-md-12">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Mon Profil</span>
										</div>
										<ul class="nav nav-tabs">
											<li <?php	 IF ($_POST["tab_active"] == "tab_1_1") { echo 'class="active" '; } ?>  >
												<a href="#tab_1_1" data-toggle="tab">PERSONNEL</a>
											</li>

											<li <?php	 IF ($_POST["tab_active"] == "tab_1_5") { echo 'class="active" '; } ?>  >
												<a href="#tab_1_5" data-toggle="tab">MON PARRAIN</a>
											</li>
											
											<!--<li  <?php	 IF ($_POST["tab_active"] == "tab_1_7") { echo 'class="active" '; } ?> >
												<a href="#tab_1_7" data-toggle="tab">MON GRADE</a>
											</li> -->
											
											<li  <?php	 IF ($_POST["tab_active"] == "tab_1_6") { echo 'class="active" '; } ?> >
												<a href="#tab_1_6" data-toggle="tab">MES VIREMENTS</a>
											</li>
											

											<li  <?php	 IF ($_POST["tab_active"] == "tab_1_3") { echo 'class="active" '; } ?> >
												<a href="#tab_1_3" data-toggle="tab">MOT DE PASSE</a>
											</li>
											
											<!--<li>
												<a href="#tab_1_4" data-toggle="tab">PARAMÈTRES</a>
											</li> -->
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div <?php	 IF ($_POST["tab_active"] == "tab_1_1") { echo 'class=" tab-pane active" '; } else { echo 'class=" tab-pane" '; } ?>  id="tab_1_1">
                                                
                                                <div class="form-body"> 
                                                   <form class="form-horizontal" role="form">
                                                   
												   <div class="col-md-12">
                                                   <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                       
                                                   <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->    
                                                   <div class="col-md-5">
                                                       
                                                         <div class="profile-sidebar">
                                                         <div class="">
                                                            <!-- SIDEBAR USERPIC -->

                                                             <center>
															 <div class="profile margin-top-20">
                                                               <img src= "<?php echo DISPLAY_PROFILE_PICTURE( $id_affiliate, 0) ?>" class="img-circle img-responsive" alt="">
                                                             </div>
															 </center>
                                                                
												                            </form>
																			<form id="Action_script" action="Intranet_profil_parametres.php" method="post" role="form" enctype="multipart/form-data" class="form-horizontal">
												                            	<div class="col-md-12 margin-top-20 text-center">
												                            	<div class="form-group btn-group ">
                                                                                      <input type="hidden"     name="load_file"         value = 1  />
												                            		  <input type="hidden"     name="MAX_FILE_SIZE"     value="5000000" />
                                                                                                     <div class="col-md-6">
                                                                                                      <div class="fileinput fileinput-new">
                                                                                                         <div>
                                                                                                             <span class="btn btn-sm btn-link btn-file">
                                                                                                                 <span class="fileinput-new"> Chargez photo </span>
												                            									 <input type="file" name="annonce_file" /> 
                                                                                                             </span>
                                                                                                         </div>
                                                                                                     </div>
                                                                                                     </div>
												                            						 
												                            	          <div class="col-md-6">
												                            	               <button class="btn btn-sm btn-outline btn green" name="submit" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
												                                          </div>
												                            	
												                            	</div>
												                            	<br/>
                                                                            
												                            	</div>
												                            </form>
                                                       

                                                            <!-- SIDEBAR USER TITLE ---------------------------------------------------------------------------------->
                                                             
                                                            <div class="profile-usertitle">
                                                                 <div class="col-md-12 margin-top-20 margin-bottom-20">
                                                                  <h4 class="text-center"><?php echo $first_and_last_name." - Y".$id_affiliate ?></h4>        
															     </div>
                                                            </div>
                                                                   
                                                            <ul class="list-inline margin-top-20 font-grey-salsa text-center">
                                                                   <?php
                                                                    List($jour, $mois, $annee, $jour_de_la_semaine, $timestamp, $heure, $minute, $seconde, $mois_a_afficher, $mois_a_afficher2)=RETURN_INFO_SUR_LA_DATE($creation_date);
                                                                    $date_installation         = $jour_de_la_semaine." ".$jour." ".$mois_a_afficher2." ".$annee;
                                                                    ?>

                                                                <li>  <i class="fa fa-birthday-cake margin-top-20"></i> <?php echo "".$birth_date ?> </li> 
                                                                <li>  <i class="fa fa-calendar-check-o margin-top-20"></i> <?php echo $date_installation  ?> </li>
                                                            </ul>
                                                             
                                                        </div>
                                                       </div>
													   
													   
													<?php echo '<div class="col-md-12 text-center input-icon margin-top-20">';	
                                                                $adresse_client = $address." ".$zip_code." ".$city ;
                                                                echo '<a class="btn green btn-outline btn-sm" href="http://www.google.fr/maps?um=1&tab=pl&ie=UTF-8&hl=fr&q='.$adresse_client.'" target="_blank" type="button" > OUVRIR GOOGLE MAP <i class="fa fa-search"></i> </a> ';
                                                                echo '</div>';	?>													   
													   

                                                   </div> 
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->                                                       
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->    
                                                   <div class="col-md-7">
                                                       
                                                         <h5 class="margin-top-20 margin-bottom-20">Modifier vos informations personnelles</h5>
														
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >PRÉNOM / NOM</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-user"></i>
                                                                      <input name="phone_number" class="form-control" readonly  type="text"  value= "<?php echo $first_and_last_name ?>" /> 

                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>														
														

														 
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" > N° TÉLÉPHONE</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="phone_number" class="form-control " maxlength="10" type="text" placeholder = "Votre numéro de Sécurité Sociale" value= "<?php echo $phone_number ?>" /> 
                                                                      <input type="hidden" name="maj_numero_telephone" value = 1 /> 
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                       <div class="form-group">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >ADRESSE EMAIL</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-envelope"></i>
                                                                      <input name="email" class="form-control " maxlength="60" type="text" placeholder = "Votre numéro de Sécurité Sociale"   value= "<?php echo $email ?>" /> 
                                                                      <input type="hidden" name="maj_email_commercial" value = 1 />
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                        <div class="form-group">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >ADRESSE</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-location-arrow"></i>
                                                                      <input name="new_adresse" class="form-control " maxlength="60" type="text" placeholder = "Votre adresse"   value= "<?php echo $address ?>" /> 
                                                                      <input type="hidden" name="maj_adresse" value = 1 />
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                          <div class="form-group">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >CODE POSTAL</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-location-arrow"></i>
                                                                      <input name="new_code_postal" class="form-control " maxlength="60" type="text" placeholder = "Votre code postal"   value= "<?php echo $zip_code ?>" /> 
                                                                      <input type="hidden" name="maj_code_postal" value = 1 />
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                          <div class="form-group">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >VILLE</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-location-arrow"></i>
                                                                      <input name="new_ville" class="form-control " maxlength="60" type="text" placeholder = "Votre ville"   value= "<?php echo $city ?>" /> 
                                                                      <input type="hidden" name="maj_ville" value = 1 />
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                      <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>
														
														
                                                         <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                          <div class="form-group">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >VOTRE PAYS</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-location-arrow"></i>
                                                                      <input name="new_pays" class="form-control " maxlength="60" type="text" placeholder = "Votre pays"   value= "<?php echo $nationality ?>" /> 
                                                                      <input type="hidden" name="maj_code_pays" value = 1 />
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>
														
                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                       <br/> <br/>
                                                       <h5 class="margin-top-20 margin-bottom-20">Votre entreprise</h5>
                                               
                                                       
                                                        <div class="form-group">
                                                               <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                                 <label class="col-md-4 control-label" >ID SÉCURITÉ SOCIAL</label>
                                                                    <div class="col-md-8">
                                                                       <div class="input-group input-group-sm">
                                                                          <div class="input-icon">
                                                                          <i class="fa fa-credit-card"></i>
                                                                          <input name="p_id_securite_sociale" class="form-control " maxlength="40" type="text" placeholder = "Votre numéro de Sécurité Sociale"  value= "<?php echo $id_securite_sociale ?>" /> 
                                                                          <input type="hidden" name="maj_id_securite_sociale" value = 1 />
                                                                           </div>
                                                                          <span class="input-group-btn">
                                                                          <div class="form-actions right">          
                                                                          <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                           </div>
                                                                           </span>
                                                                        </div>
                                                                    </div>
                                                               </form>
                                                            </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                       <div class="form-group">
                                                               <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                                 <label class="col-md-4 control-label" >VOTRE ENTREPRISE</label>
                                                                    <div class="col-md-8">
                                                                       <div class="input-group input-group-sm">
                                                                          <div class="input-icon">
                                                                          <i class="fa fa-building"></i>
                                                                          <input name="p_nom_entreprise" class="form-control " maxlength="40" type="text" placeholder = "Nom de votre entreprise"   value= "<?php echo $entreprise_name ?>" /> 
                                                                          <input type="hidden" name="maj_nom_entreprise" value = 1 />
                                                                           </div>
                                                                          <span class="input-group-btn">
                                                                          <div class="form-actions right">          
                                                                          <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                           </div>
                                                                           </span>
                                                                        </div>
                                                                    </div>
                                                               </form>
                                                            </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                          
                                                       <div class="form-group">
                                                               <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                                 <label class="col-md-4 control-label" >N° SIRET</label>
                                                                    <div class="col-md-8">
                                                                       <div class="input-group input-group-sm">
                                                                          <div class="input-icon">
                                                                          <i class="fa fa-building"></i>
                                                                          <input name="p_numero_siret" class="form-control" maxlength="20" type="text" placeholder = "Numéro de SIRET de votre entreprise"   value= "<?php echo $SIRET ?>" /> 
                                                                          <input type="hidden" name="maj_siret" value = 1 />
                                                                           </div>
                                                                          <span class="input-group-btn">
                                                                          <div class="form-actions right">          
                                                                          <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                           </div>
                                                                           </span>
                                                                        </div>
                                                                    </div>
                                                               </form>
                                                            </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                        <div class="form-group">
                                                               <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                                 <label class="col-md-4 control-label" >N° TVA</label>
                                                                    <div class="col-md-8">
                                                                       <div class="input-group input-group-sm">
                                                                          <div class="input-icon">
                                                                          <i class="fa fa-building"></i>
                                                                          <input name="p_numero_de_tva" class="form-control " maxlength="40" type="text" placeholder = "TVA intra-communautaire"   value= "<?php echo $TVA_INTRA ?>" /> 
                                                                          <input type="hidden" name="maj_tva_intra" value = 1 />
                                                                           </div>
                                                                          <span class="input-group-btn">
                                                                          <div class="form-actions right">          
                                                                          <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                           </div>
                                                                           </span>
                                                                        </div>
                                                                    </div>
                                                               </form>
                                                            </div>

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 
                                                       <?php													
                                                         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
				                                         ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
                                                         ////////////// ENCADREMENT DU TABLEAU POUR POUVOIR LE MANIPULER  ////////////////////////////////////////////////////////////////////

				                                          echo '<div class="portlet-body" >';
				  	                                      echo '<div class="table-responsive" >';                  
				                                         ////////////// PREMIERE LIGNE DU TABLEAU ON AFFICHE UN EN-TETE DIFFERENT  //////////////////////////////////
 				                                          echo '<table class="table table-striped table-light table-hover">'."\n";

														  
                                                                 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   		   
                                                                 // FACTURE INSTALLATEUR 
					                                     		 echo '<tr>';					    
                                                                  IF (trim($kbis_commercial) == "")      { echo '<td style="text-align:center;" >            '.$fabolt.' &nbsp KBIS À CHARGER  </td>'; }
					                                     		 ELSE                                    { echo '<td style="text-align:center;" > <a style="color:#3175AF;" href="'.$dossier.$kbis_commercial.'" target="_blank" > '.$fafile.' &nbsp  OUVRIR     </a> </td>';       }                          							                                                                                                                                                                           							   
                                                         
					                                     		 echo '<form id="id_dp_load" action="Intranet_profil_parametres.php" method="post" role="form" enctype="multipart/form-data" class="form-horizontal">';
					                                     		 echo '<td style="text-align:center;">   '; 
					                                     		 echo '       <input type="file"   name="annonce_file"                                                  /> ';
																 echo '       <input type="hidden" name="MAX_FILE_SIZE"               value = "5000000"                  />    ';
					                                     		 echo '       <input type="hidden" name="chargement_kbis"  value = "1"                        />    </td> ';
                                                         
                                                                  echo '<td style="text-align:center;" >  ';
					                                     		 IF (trim($kbis_commercial) == "")         { echo '<button class="btn btn green btn-sm "   name="submit_kbis" type="submit"><i class="fa fa-check"></i> </button> </td> </form> '; }
					                                     		 ELSE                                      { echo '<button class="btn  btn-sm " name="submit_kbis" type="submit"> &nbsp MODIFIER LE FICHIER &nbsp <i class="fa fa-pencil"></i> </button> </td> </form> '; }
					                                     		 
					                                     	     echo '</tr>'."\n";
					                                     		 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                         

                                                          echo"</table>";
			 	                                          echo '</div> ';
				                                          echo '</div> ';
													
													
?>



 
                                                       
                                                   </div>
                                                																								
                                                       </div>
                                                    </form>
                                                </div>
											
											</div>
                                            
                                            
                                            
                                            
											<!-- END PERSONAL INFO TAB -->
											<!-- PERSONAL INFO TAB -------------------------------------------------------------------------------------------------------------------------------->
											<div class="tab-pane" id="tab_1_5">
                                                <div class="form-body">
												<form class="form-horizontal" role="form">
												
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->                                                       
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->    
                                                   <div class="col-md-5">
                                                       
                                                         <div class="profile-sidebar">
                                                            <!-- SIDEBAR USERPIC -->

                                                             <center>
															 <div class="profile margin-top-20">
                                                               <img src= "<?php echo DISPLAY_PROFILE_PICTURE( $id_parrain, 0) ?>" class="img-circle img-responsive" alt="">
                                                             </div>
															 </center>
                                                                 
                                                            <!-- SIDEBAR USER TITLE -->
                                                             
                                                            <div class="profile-usertitle">
                                                                 <div class="col-md-12 margin-top-20 margin-bottom-20">
                                                                  <h4 class="text-center"><?php echo $first_and_last_name_p2." - Y".$id_parrain ?></h4>        
															     </div>
                                                            </div>
                                                                   
                                                            <ul class="list-inline margin-top-20 font-grey-salsa text-center">
                                                                   <?php
                                                                    List($jour, $mois, $annee, $jour_de_la_semaine, $timestamp, $heure, $minute, $seconde, $mois_a_afficher, $mois_a_afficher2)=RETURN_INFO_SUR_LA_DATE($creation_date2);
                                                                    $date_installation         = $jour_de_la_semaine." ".$jour." ".$mois_a_afficher2." ".$annee;
                                                                    ?>

                                                                <li>  <i class="fa fa-birthday-cake"></i> <?php echo "".$birth_date2 ?> </li> <br/> <br/>
                                                                <li>  <i class="fa fa-calendar-check-o"></i> <?php echo $date_installation  ?> </li><br/>
                                                            </ul>

                                                       </div>
                                                   </div> 
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->                                                       
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->    
												
												

                                                    <div class="col-md-7">
                                                        
														 <h5 class="margin-top-20 margin-bottom-20">Les informations concernant votre parrain </h5>
                                                    
						                                 <div class="form-group">
                                                               <label class="col-md-4 control-label" >VOTRE PARRAIN</label>
                                                               <div class="col-md-8">	
                                                                   <div class="input-icon input-icon-sm">
                                                                   <i class="fa fa-user"></i>		
													      		 <input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo $first_and_last_name_p2 ?>"   >	
                                                                   </div>
													           </div>
                                                          </div>	
		                                                 <!---------------------------------------------------------------------------------------------------------------->
                                                              
 						                                 <div class="form-group">
                                                               <label class="col-md-4 control-label" >IDENTIFIANT</label>
                                                               <div class="col-md-8">	
                                                                   <div class="input-icon input-icon-sm">
                                                                   <i class="fa fa-user"></i>		
													      		 <input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo " L'identifiant de votre parain est Y".$id_parrain  ?>"   >	
                                                                   </div>
													           </div>
                                                          </div>	
		                                                 <!---------------------------------------------------------------------------------------------------------------->
                                                            
                                                         <div class="form-group">
                                                               <label class="col-md-4 control-label" >ADRESSE</label>
                                                               <div class="col-md-8">	
                                                                   <div class="input-icon input-icon-sm">
                                                                   <i class="fa fa-location-arrow"></i>		
													      		 <input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo  $zip_code_p2." ".$city_p2  ?>"   >	
                                                                   </div>
													           </div>
                                                          </div>	
		                                                 <!---------------------------------------------------------------------------------------------------------------->
                                                              
                                                              
                                                               <div class="form-group">
                                                               <label class="col-md-4 control-label" >N° TÉLÉPHONE</label>
                                                               <div class="col-md-8">	
                                                                   <div class="input-icon input-icon-sm">
                                                                   <i class="fa fa-phone"></i>		
													      		 <input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo  $phone_number_p2   ?>"   >	
                                                                   </div>
													           </div>
                                                          </div>	
		                                                 <!---------------------------------------------------------------------------------------------------------------->
                                                               
                                                               <div class="form-group">
                                                               <label class="col-md-4 control-label" >EMAIL</label>
                                                               <div class="col-md-8">	
                                                                   <div class="input-icon input-icon-sm">
                                                                   <i class="fa fa-envelope"></i>		
													      		<input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo  $email_p2   ?>"   >	
                                                                   </div>
													           </div>
                                                          </div>	

		                                                 <!---------------------------------------------------------------------------------------------------------------->
                                                        
                                                                <div class="form-group">
                                                               <label class="col-md-4 control-label" >SON ANNIVERSAIRE</label>
                                                               <div class="col-md-8">	
                                                                   <div class="input-icon input-icon-sm">
                                                                   <i class="fa fa-calendar"></i>		
													      		<input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo $birth_date2  ?>"   >	
                                                                   </div>
													           </div>
                                                          </div>	
		                                                 <!---------------------------------------------------------------------------------------------------------------->
                                                        						                         
                                                                <div class="form-group">
                                                               <label class="col-md-4 control-label" >DATE D'INSCRIPTION</label>
                                                               <div class="col-md-8">	
                                                                   <div class="input-icon input-icon-sm">
                                                                   <i class="fa fa-calendar"></i>		
													      		<input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo $date_installation  ?>"   >	
                                                                   </div>
													           </div>
 
                                                         </div>														
													
		                                                 <!---------------------------------------------------------------------------------------------------------------->
													
													
											     </div>
												</form>
                                                </div>
											</div>
											<!-- END PERSONAL INFO TAB ----------------------------------------------------------------------------------------------------------------------------->

                                            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

											<!-- PERSONAL INFO TAB -------------------------------------------------------------------------------------------------------------------------------->
											<div class="tab-pane" id="tab_1_7">


                                             <div class="col-md-12" style="text-align:center">
                                                <p> <img style="width:100%;" src='fichiers/photos/TF_grade.png' ></p>	    
                                             </div>

											
		                                           <!---------------------------------------------------------------------------------------------------------------->
						                           <div class="form-group">
                                                         <label class="col-md-3 control-label margin-top-10" >Mon Grade</label>
                                                         <div class="col-md-9 margin-top-10 input-icon">	
                                                             <i class="fa fa-font"></i>		
															 <input type="text" name="nom" class="form-control" maxlength="40" pattern="^.+$" required="" readonly value = "<?php echo $_SESSION['triforce_grade_long']  ?>"   >	
													     </div>
                                                    </div>													
		                                            <!---------------------------------------------------------------------------------------------------------------->
						                            <div class="form-group">
                                                         <label class="col-md-3 control-label margin-top-10" >Comprendre Mon Grade</label>
                                                              
															  <div class="col-md-9 margin-top-10">
                                                                  <textarea class="form-control" rows="10" maxlength="1500" readonly  name="c_commentary" ><?php echo $desc_grade; ?></textarea>
                                                              </div>
                                                    </div>	
		                                            <!---------------------------------------------------------------------------------------------------------------->

                                                     <div class="form-group ">
                                                           <div class="col-md-12 ">     <hr>	 </div>
                                                     </div>

                                                     <div class="form-group margin-top-20">
                                                           <label >Les grades sont mis à jour tous les jours à 3h </label>
                                                     </div>
												     
                                                     <div class="form-group ">
                                                           <label class="">Pour toute question : <u> <?php echo $mail_support ?> </u> </label>
                                                     </div>
												
											</div>
											<!-- END PERSONAL INFO TAB ----------------------------------------------------------------------------------------------------------------------------->
											

											
											<!-- PERSONAL INFO TAB -------------------------------------------------------------------------------------------------------------------------------->
											<div <?php	 IF ($_POST["tab_active"] == "tab_1_6") { echo 'class=" tab-pane active" '; } else { echo 'class=" tab-pane" '; } ?>  id="tab_1_6">
											
											
	                                                <div class="form-body"> 
                                                   <form class="form-horizontal" role="form">
                                                   
												   <div class="col-md-12">
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->                                                       
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->    
                                                         <div class="col-md-12 text-center">
                                                         <h5> L'entreprise procédera aux virements sur un compte bancaire : </h5>
                                                         <h6>  - à votre Nom et Prénom</h6>
                                                         <h6>  - sur envoi d'un RIB systématiquement</h6> <br/> 
                                                         </div>
                                                   <div class="col-md-2 ">
												   </div>
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->                                                       
                                                   <!----------------------------------------------------------------------------------------------------------------------------------------->    
                                                   <div class="col-md-7 center">
                                                       
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >PRÉNOM / NOM</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-user"></i>
                                                                      <input name="phone_number" class="form-control" readonly  type="text"  value= "<?php echo $first_and_last_name ?>" /> 

                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>														
														
                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 														

                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >CODE BANQUE</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="code_banque" class="form-control " maxlength="10" type="text" placeholder = "Le code de votre banque" value= "<?php echo htmlentities($code_banque) ?>" /> 
                                                                      <input type="hidden" name="maj_code_banque"        value = 1 />
                                                                      <input type="hidden" name="tab_active"             value = 'tab_1_6'     > 																	  
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>													 

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >N° COMPTE</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="numero_compte" class="form-control " maxlength="20" type="text" placeholder = "Votre numéro de compte Bancaire" value= "<?php echo htmlentities($numero_compte) ?>" /> 
                                                                      <input type="hidden" name="maj_numero_compte"        value = 1 />
                                                                      <input type="hidden" name="tab_active"               value = 'tab_1_6'     > 																	  
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>													 

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >NOM BANQUE</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="nom_banque" class="form-control " maxlength="20" type="text" placeholder = "Le nom de votre banque" value= "<?php echo htmlentities($nom_banque) ?>" /> 
                                                                      <input type="hidden" name="maj_nom_banque"        value = 1 />
                                                                      <input type="hidden" name="tab_active"               value = 'tab_1_6'     > 																	  
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>													 

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                                                                            
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >BIC - SWIFT</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="BIC_CLIENT" class="form-control " maxlength="20" type="text" placeholder = "Le code BIC SWIFT de votre banque" value= "<?php echo htmlentities($BIC_CLIENT) ?>" /> 
                                                                      <input type="hidden" name="maj_BIC_CLIENT"        value = 1 />
                                                                      <input type="hidden" name="tab_active"               value = 'tab_1_6'     > 																	  
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>													 

                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >CODE GUICHET</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="code_guichet" class="form-control " maxlength="20" type="text" placeholder = "Le code Guichet de votre banque" value= "<?php echo htmlentities($code_guichet) ?>" /> 
                                                                      <input type="hidden" name="maj_code_guichet"        value = 1 />
                                                                      <input type="hidden" name="tab_active"               value = 'tab_1_6'     > 																	  
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>													 
  


                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >CLÉ RIB</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="cle_rib" class="form-control " maxlength="20" type="text" placeholder = "La clé RIB de votre banque" value= "<?php echo htmlentities($cle_rib) ?>" /> 
                                                                      <input type="hidden" name="maj_cle_rib"        value = 1 />
                                                                      <input type="hidden" name="tab_active"               value = 'tab_1_6'     > 																	  
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>	


                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 
                                                        <div class="form-group margin-top-10">
                                                           <form action="Intranet_profil_parametres.php" id="form_sample_33"  method="post"> 
                                                             <label class="col-md-4 control-label" >IBAN</label>
                                                                <div class="col-md-8">
                                                                   <div class="input-group input-group-sm">
                                                                      <div class="input-icon">
                                                                      <i class="fa fa-phone"></i>
                                                                      <input name="IBAN" class="form-control " maxlength="20" type="text" placeholder = "Le code IBAN de votre compte en banque" value= "<?php echo htmlentities($IBAN) ?>" /> 
                                                                      <input type="hidden" name="maj_IBAN"        value = 1 />
                                                                      <input type="hidden" name="tab_active"               value = 'tab_1_6'     > 																	  
                                                                       </div>
                                                                      <span class="input-group-btn">
                                                                      <div class="form-actions right">          
                                                                      <button class="btn btn green" type="submit" >
                                                                          <i class="fa fa-check" aria-hidden="true"></i> </button>
                                                                       </div>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                           </form>
                                                        </div>	
														
                                                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                                       
                                                   </div>
                                                																								
                                                       </div>
                                                    </form>
                                                </div>
																					

											</div>

											<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
											<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
											<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
											<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
											<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
											<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->											
											<!-- CHANGE PASSWORD TAB -->
											<div <?php IF ($_POST["tab_active"] == "tab_1_3") { echo 'class=" tab-pane active" '; } else { echo 'class=" tab-pane" '; } ?> id="tab_1_3">
                                                
                                                  <div class="form-body"> 
                                                   <form class="form-horizontal" role="form">
                                                   <div class="col-md-12">
                                                
                                                  <div class="col-md-12 text-center margin-bottom-20">
                                                          <h5> Votre nouveau mot de passe doit comporter obligatoirement :</h5>
                                                          <h6>  - Entre 6 et 20 caractères</h6>
                                                          <h6>  - Au moins une lettre et un chiffre</h6>
                                                  </div>
												     
                                                  <div class="col-md-2 ">
												  </div>
   
                                                  <div class="col-md-7 ">
												   
                                            
												<form action="scripts/update_mdp_affiliate.php" method="post">
                                               
                                                       <div class="form-group">
                                                         <label class="col-md-4 control-label" >MOT DE PASSE ACTUEL</label>
                                                         <div class="col-md-8">	
                                                             <div class="input-icon input-icon-sm">
                                                             <i class="fa fa-unlock"></i>		
															 <input type="text" name="mdp" class="form-control" maxlength="20" required=''  />
                                                             <?php if ($_POST['error_code'] == 1)   {echo ' <a> * Obligatoire </a> ';}?>
											                 <?php if ($_POST['error_code'] == 4)   {echo ' <a> * min 6 char </a> ';}?>				 
                                                             <?php if ($_POST['error_code'] == 11)  {echo ' <a> * Non conforme </a> ';}?>	   
                                                             </div>
													     </div>
                                                    </div>	
		                                           <!---------------------------------------------------------------------------------------------------------------->
                                                    
                                                    
                                                    
                                                       <div class="form-group">
                                                         <label class="col-md-4 control-label" >NOUVEAU MOT DE PASSE</label>
                                                         <div class="col-md-8">	
                                                             <div class="input-icon input-icon-sm">
                                                             <i class="fa fa-lock"></i>		
															 <input type="text" name="n_mdp" class="form-control" maxlength="20" required='' />
                                                             <?php if ($_POST['error_code'] == 2)  {echo ' <a> * Obligatoire </a> ';}?>				 
											                 <?php if ($_POST['error_code'] == 5)  {echo ' <a> * min 6 char </a> ';}?>				 
                                                             <?php if ($_POST['error_code'] == 7)  {echo ' <a> * Non identique </a> ';}?>				 
                                                             <?php if ($_POST['error_code'] == 10) {echo ' <a> * Non Valide </a> ';}?>	
                                                             </div>
													     </div>
                                                    </div>	
		                                           <!---------------------------------------------------------------------------------------------------------------->
                                                    
                                                  
						                          
                                                       <div class="form-group">
                                                         <label class="col-md-4 control-label" >CONFIRMER MOT DE PASSE</label>
                                                         <div class="col-md-8">	
                                                             <div class="input-icon input-icon-sm">
                                                             <i class="fa fa-lock"></i>		
															 <input type="text" name="n_mdp_conf" class="form-control" maxlength="20" required=''   />
                                                             <?php if ($_POST['error_code'] == 3)  {echo ' <a>* Obligatoire </a> ';}?>				 
					 						                 <?php if ($_POST['error_code'] == 6)  {echo ' <a>* min 6 caractères </a> ';}?>	
											                 <?php if ($_POST['error_code'] == 7)  {echo ' <a>* Non identique </a> ';}?>
                                                             </div>
													     </div>
                                                    </div>	
		                                           <!---------------------------------------------------------------------------------------------------------------->
                                                    

                                                        <input type="hidden" name="id_affiliate" value = "<?php echo $_SESSION['id_affiliate']  ?>"     >														
													<center class="margin-top-20">
													<button class="btn btn-outline btn-sm btn green" name="submit" type="submit">CHANGER VOTRE MOT DE PASSE  <i class="fa fa-plus"></i> </button>
												    </center>
												</form>
                                                
												
												</div>
                                                
                                                
                                                       </div>
                                                      </form>
                                                      </div>
											</div>
											
											<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
											<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

											<!-- PRIVACY SETTINGS TAB -->
											<div class="tab-pane" id="tab_1_4">
												<form action="#">
													<table class="table table-light table-hover">
													<tr>
														<td>
															 Recevoir notre Newsletter mensuelle par mail
														</td>
														<td>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option1"/>
															Yes </label>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option2" checked/>
															No </label>
														</td>
													</tr>
													<tr>
														<td>
															 Activer les rapports quotidien d'activité par mail
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													</table>
													<!--end profile-settings-->
													<div class="margin-top-10">
														<a href="javascript:;" class="btn green-haze">
														Save Changes </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END PRIVACY SETTINGS TAB -->
                                            
                                            
                                            
                                            
                                            
                                            
										</div>
									</div>
								</div>

<?php 								
}
        ELSE 
		{
    	         echo '<form name="p_action"  action="login.php" method="post"> ';
	             echo '<script language="JavaScript">document.p_action.submit();</script></form> ';
        }	
		
?>		

				</div>



                <!-- BEGIN FOOTER -->          <?php  include("scripts/10_bandeau_footer.php");  ?>    <!-- END FOOTER -->	
                </div> <!-- #3  --> 
            </div> <!-- #2  --> 
        </div> <!-- #1 --> 
<!-- BEGIN FOOTER -->          <?php  include("scripts/11_bandeau_footer_scripts.php");  ?>    <!-- END FOOTER -->		
</body>
</html>