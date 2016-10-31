<!-- BEGIN STYLE MENU -->         <?php     include("scripts/01_bandeau_style.php");        ?>     <!-- END STYLE MENU -->

<script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
 
        <script type="text/javascript">
                $(document).ready(function(){
                    $("#name_affiliate").autocomplete({
                        source:'scripts/autocomplete/affiliate_getautocomplete.php',
                        minLength:3,
						select: function(event, ui) {
					    event.preventDefault();
					    $(this).val(ui.item.label);
					    $("#name_affiliate-value").val(ui.item.value);
					    $("#name_affiliate-zip_code").val(ui.item.zip_code);
						$("#name_affiliate-city").val(ui.item.city);
				        }
                    });
                });
        </script>
        


<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/02_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="page-fixed-main-content">     <!-- #3  --> 						
<?php

IF ( $_SESSION['id_affiliate'] > 0  ) 
{        
		     IF (!isset($_POST['action_a_realiser']))             { $_POST['action_a_realiser']        = 0;  }
		     IF (!isset($_POST['maj_mail_affilie']))              { $_POST['maj_mail_affilie']         = ""; }
		     IF (!isset($_POST['envoyer_code_partenaire']))       { $_POST['envoyer_code_partenaire']  = 0;  }
			 IF (!isset($_POST['desinscription_affilie']))        { $_POST['desinscription_affilie']   = ""; }
             IF (!isset($_POST['name_affiliate']))                { $_POST['name_affiliate']           = ""; }
             IF (!isset($_POST['name_affiliate-value']))          { $_POST['name_affiliate-value']     = 0;  }
             IF (!isset($_POST['name_affiliate-zip_code']))       { $_POST['name_affiliate-zip_code']  = ""; }
             IF (!isset($_POST['name_affiliate-city']))           { $_POST['name_affiliate-city']      = ""; }
			 IF (!isset($_POST['contrat_affilie_recu']))          { $_POST['contrat_affilie_recu']     = 0;  }
			 IF (!isset( $_POST['tab_active'] ))                  { $_POST['tab_active']               = "tab_2_1";  }
             $id_affiliate = $_POST['name_affiliate-value'];        // UTILE POUR LES ACTIONS RÉALISÉES PAR CE SCRIPT

			 
	         ///////////////////////////////////////////////////////////////// MODULE DE RÉALISATION DES ACTIONS DU MÊME SCRIPT ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  
?>      
                                            
                        <div class="col-md-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light">
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">RECHERCHE YERS</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                            <form id="maj_affiliate" class="form-horizontal" action="AD_search_affiliate.php" method="post" >
											     <div class="form-body">
											     <div class="form-group">
                                                     <div class="col-md-12">
                                                     <div class="input-icon right">	
                                                         <i class="icon-bar-chart"></i>
                                                         <input type="text"   id="name_affiliate"           name="name_affiliate" class="form-control input-circle" value= "<?php echo $_POST['name_affiliate']; ?>" maxlength="30" Placeholder="Nom, prénom, mail, téléphone, ville de l'affilié ou du partenaire" onKeyPress='if (event.keyCode == 13) {document.getElementById("maj_affiliate").submit();}' />
                                                         <input type="hidden" id="name_affiliate-value"     name="name_affiliate-value"                value= "<?php echo $_POST['name_affiliate-value']; ?>" />
                                                         <input type="hidden" id="name_affiliate-zip_code"  name="name_affiliate-zip_code"             value= "<?php echo $_POST['name_affiliate-zip_code']; ?>" />
                                                         <input type="hidden" id="name_affiliate-city"      name="name_affiliate-city"                 value= "<?php echo $_POST['name_affiliate-city']; ?>" />
                                                     </div>
                                                     </div>
                                                 </div> 
                                                 </div>  																						
                                            </form>	
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>	

	
<?php	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

IF ($id_affiliate > 0 ) 
{	  

	?>
	

                                <div class="col-md-12">
                                    <div class="portlet light col-md-12">

<?php
        List( $id_upline, $first_name, $last_name, $first_and_last_name, $is_activated, $address, $zip_code, $city, $phone_number, $email, $creation_date, $birth_place, $nationality, $birth_date , $last_connection_date, $mode, $contract_signed, $id_securite_sociale, $affiliate_latitude, $affiliate_longitude, $creation_depuis, $connection_depuis, $password ) = RETURN_INFO_AFFILIATE( $connection_database, $id_affiliate, $nom_prenom_parrain_siege , ""  );				 					 
        List( $code_banque, $code_guichet, $numero_compte, $cle_rib, $IBAN, $iban_creation_date , $nom_banque ) = RETURN_INFO_AFF_IBAN( $connection_database, $id_affiliate );

 		echo '<div class="portlet-title tabbable-line">';
		
				echo '<div class="caption caption-md"> ';

					echo '<span class="caption-subject font-blue-madison bold uppercase"> Fiche du Yers </span> ';
				echo '</div> ';

						   echo '<ul class="nav nav-tabs">';
						
						   	     echo '<li '; IF ( $_POST['tab_active']  == 'tab_2_1') { echo ' class="active";'; } echo '>';
						   	     	echo '<a href="#tab_2_1" data-toggle="tab"> CATÉGORIE </a>';
						   	     echo '</li>';
						
						   	     echo '<li '; IF ( $_POST['tab_active']  == 'tab_2_2') { echo ' class="active";'; } echo '>';
						   	     	echo '<a href="#tab_2_2" data-toggle="tab">  ARBORESCENCE YERS </a>';
						   	     echo '</li>';

						   echo '</ul>';
	   echo '</div>	';

?> 	 <!------------------------------------------------------------------------------------------------------------------------------------------------------------>	 

	   <div class="portlet-body">
       <div class="tab-content">

			 <div id="tab_2_1" class="tab-pane fade active in col-md-12 margin-top-20" >

			 <div class="portlet-body">
                       
			 <div class="table-responsive">
		 			 	 
                   <div class="form-body"> 
                   <form class="form-horizontal" role="form">
                   <div class="col-md-12">
                       
                    <div class="col-md-12">
                     <div class="col-md-6">
                     <div class="form-group">
                       <div class="col-md-5">
                         <div class="profile-userpic">
                          <img src= "<?php echo DISPLAY_PROFILE_PICTURE( $id_affiliate, 0) ?>" class="img-circle img-responsive text-center" alt="">
                         </div>
                       </div>

                      <div class="col-md-7">
                        <h4><?php echo $mode ?> </h4> 
                        <h5 class="font-green">#ID : <?php echo $id_affiliate ?></h5>
                      </div>
                     </div>           
                    			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
                    </div>
                    </div>
                       
                    
                       
                     <div class="col-md-6">

                      
                         
				       <div class="form-group">
                        <label class="col-md-4 control-label" for="nom">NOM</label>
                          <div class="col-md-8">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>			 
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $last_name ?>" readonly />
                           </div>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="nom">ADRESSE</label>
                          <div class="col-md-8">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-location-arrow"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $address ?>" readonly /> 
                           </div>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="nom">LIEU DE NAISSANCE</label>
                          <div class="col-md-8">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-globe"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $birth_place.' Nationalité : '.$nationality.' '  ?>" readonly /> 
                           </div>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                       <div class="form-group">
                           <form action="AD_search_affiliate.php" id="form_sample_3"  method="post">
                             <label class="col-md-4 control-label">ADRESSE EMAIL</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                      <div class="input-icon">
                                      <i class="fa fa-envelope"></i>
                                      <input class="form-control input-sm" type="text" name="mail_affilie"  value="<?php echo $email ?>"  />  
                                       </div>
                                      <span class="input-group-btn">
                                      <div class="form-actions right">
                                                <input type="hidden" name="action_a_realiser"       value = 1 />
                                                <input type="hidden" name="maj_mail_affilie"        value = 1 />
                                                <input type="hidden" name="name_partenaire"         value = "<?php echo $first_name.' '.$last_name ?>" />
            			  	              	    <input type="hidden" name="name_affiliate-value"    value = "<?php echo $id_affiliate ?>" />
                                                <input type="hidden" name="name_affiliate"          value = "<?php echo $first_name.' '.$last_name ?>" />
                                         
            	                                <button type="submit" class="btn btn-success">MAJ
                                                </button>
                                       </div>
                                       </span>
                                    </div>
                                </div>
                           </form>
                        </div>
     
                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                      <div class="form-group">
                         <label class="col-md-4 control-label" for="nom">TÉLÉPHONE</label>
                          <div class="col-md-8">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-phone"></i>			 
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $phone_number?>" readonly />
                           </div>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="nom">AFFILIÉ ACTIF DEPUIS LE</label>
                          <div class="col-md-8">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-calendar"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $creation_date; if ($creation_depuis <= 1) {echo ' - Moins d\'un jour';} else {echo " - ".$creation_depuis.' jours';}  ?>" readonly /> 
                           </div>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nom">DERNIÈRE CONNEXION</label>
                              <div class="col-md-8">
                               <div class="input-icon input-icon-sm">
                                 <i class="fa fa-calendar"></i>
                                 <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $last_connection_date." - "; if ($connection_depuis <= 1) {echo 'Moins d\'un jour';} else {echo $connection_depuis.' jours';}  ?>" readonly /> 
                               </div>
                              </div>
                           </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    
                     </div>   
                       

                     <div class="col-md-6">
                        
                         
                       <div class="form-group">
                        <label class="col-md-4 control-label" for="nom">PRÉNOM</label>
                          <div class="col-md-8">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>			 
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $first_name ?>" readonly />
                           </div>
                          </div>
                       </div> 
                         
                                <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nom">CODE POSTAL / VILLE</label>
                              <div class="col-md-8">
                               <div class="input-icon input-icon-sm">
                                 <i class="fa fa-globe"></i>
                                 <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $zip_code.' '.$city  ?>" readonly /> 
                               </div>
                              </div>
                           </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nom">DATE DE NAISSANCE</label>
                              <div class="col-md-8">
                               <div class="input-icon input-icon-sm">
                                 <i class="fa fa-heart"></i>
                                 <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $birth_date  ?>" readonly />
                               </div>
                              </div>
                           </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                         <div class="form-group">
                               <form action="AD_search_affiliate.php" id="form_sample_3"  method="post"> 
                                 <label class="col-md-4 control-label">RENVOYER EMAIL</label>
                                    <div class="col-md-8">
                                       <div class="input-group">
                                          <div class="input-icon">
                                          <i class="fa fa-envelope"></i>
                                           <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $last_name.' '.$first_name ?>" readonly />   
                                           </div>
                                          <span class="input-group-btn">
                                          <div class="form-actions right">
                                                    <input type="hidden" name="action_a_realiser"       value = 1 />
                                                    <input type="hidden" name="envoyer_code_partenaire" value = 1 />
            			         	              	<input type="hidden" name="name_affiliate-value"    value = "<?php echo $id_affiliate ?>" />
                                                    <input type="hidden" name="name_affiliate"          value = "<?php echo $first_name.' '.$last_name ?>" />

                                                    <button type="submit" class="btn btn-success">RENVOYER
                                                    </button>
                                           </div>
                                           </span>
                                        </div>
                                    </div>
                               </form>
                            </div>

                                        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                            <div class="form-group">
                               <form action="AD_search_affiliate.php" id="form_sample_3"  method="post"> 
                                 <label class="col-md-4 control-label">STATUT CONTRAT</label>
                                    <div class="col-md-8">
                                       <div class="input-group">
                                          <div class="input-icon">
                                          <i class="fa fa-envelope"></i>
                                           <?php IF ( $contract_signed == 1 ) { $statut_actuel = "REÇU AU SIÈGE"; } ELSE { $statut_actuel = "EN ATTENTE"; } ?>						 
                                           <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $statut_actuel ?>" readonly />    
                                           </div>
                                          <span class="input-group-btn">
                                          <div class="form-actions right">
                                                    <input type="hidden" name="action_a_realiser"       value = 1 />
                                                    <input type="hidden" name="contrat_affilie_recu"    value = 1 />
                                                    <input type="hidden" name="name_affiliate-value"    value = "<?php echo $id_affiliate ?>" />
                                                    <input type="hidden" name="id_affiliate_master_1"   value = "<?php echo $id_affiliate ?>" />
                                                    <input type="hidden" name="name_affiliate"          value = "<?php echo $first_name.' '.$last_name ?>" />

                                                    <button type="submit" class="btn btn-success"> REÇU
                                                    </button>
                                           </div>
                                           </span>
                                        </div>
                                    </div>
                               </form>
                             </div>

                                        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                         
                      <div class="form-group">
                           <form action="AD_search_affiliate.php" id="form_sample_3"  method="post">
                             <label class="col-md-4 control-label">FERMETURE COMPTE</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                      <div class="input-icon">
                                      <i class="fa fa-times"></i>
                                      <?php IF ( $is_activated == 1 ) { $statut_actuel = "ACUELLEMENT OUVERT"; } ELSE { $statut_actuel = "DÉJÀ FERMÉ"; } ?> <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $statut_actuel ?>" readonly />  
                                       </div>
                                      <span class="input-group-btn">
                                      <div class="form-actions right">
                                                <input type="hidden" name="action_a_realiser"       value = 1 />
                                                <input type="hidden" name="desinscription_affilie"  value = 1 />
                                                <input type="hidden" name="name_affiliate-value"    value = "<?php echo $id_affiliate ?>" />
                                         
            	                                <button type="submit" class="btn btn-success">FERMER
                                                </button>
                                       </div>
                                       </span>
                                    </div>
                                </div>
                           </form>
                         </div>
     
                                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                         
                     
                         
                         
                              <a class="btn green-sharp btn-outline btn-block sbold uppercase margin-top-20" href='http://www.tri-force.fr/login.php?id_affiliate=<?php echo $id_affiliate ?>&amp;token=<?php echo $password ?>' target="_blank" > CONNEXION COMPTE AFFILIÉ
                              </a>

                     </div> 
                       
                       
                       
                    </div> 
                    </form>
                    </div>    
   

			 </div> 
			 </div> 
			 

			 </div> 
			 
			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 
			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 
			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 			 
			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	 
			 <div id="tab_2_2" class="tab-pane fade in col-md-12 margin-top-20" >

			 <div class="portlet-body " >
			 <div class="table-responsive" >
            
            <div class="table-responsive" >	


             <?php  
			 List ($id_parrain_niveau_1, $parrain_niveau_1, $id_parrain_niveau_2, $parrain_niveau_2, $id_parrain_niveau_3, $parrain_niveau_3, $id_parrain_niveau_4, $parrain_niveau_4, $id_parrain_niveau_5, $parrain_niveau_5, $id_parrain_niveau_6, $parrain_niveau_6 ) = RETURN_NOM_PARRAINS_UPLINE( $connection_database, $id_affiliate, $nom_prenom_parrain_siege, "" );
             ?>	


			 <div class="form-body"> 
             <form class="form-horizontal" role="form">			 
			 <div class="col-md-12 margin-right-10">

                      <div class="form-group">
                          <label class="col-md-2 control-label" for="nom">Parrain Niveau 6</label>
                          <div class="col-md-9">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $parrain_niveau_6; ?>" readonly /> 
                           </div>
                          </div>
                          <div class="col-md-1">
                          <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                          </div>
                       </div> 
                         
                                 <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------> 
                 
                       <div class="form-group">
                          <label class="col-md-2 control-label" for="nom">Parrain Niveau 5</label>
                          <div class="col-md-9">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $parrain_niveau_5; ?>" readonly /> 
                           </div>
                          </div>
                          <div class="col-md-1">
                          <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                         
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="nom">Parrain Niveau 4</label>
                          <div class="col-md-9">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $parrain_niveau_4; ?>" readonly /> 
                           </div>
                          </div>
                          <div class="col-md-1">
                          <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="nom">Parrain Niveau 3</label>
                          <div class="col-md-9">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $parrain_niveau_3; ?>" readonly /> 
                           </div>
                          </div>
                          <div class="col-md-1">
                          <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                             
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="nom">Parrain Niveau 2</label>
                          <div class="col-md-9">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $parrain_niveau_2; ?>" readonly /> 
                           </div>
                          </div>
                          <div class="col-md-1">
                          <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->        
                       
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="nom">Parrain Niveau 1</label>
                          <div class="col-md-9">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $parrain_niveau_1; ?>" readonly /> 
                           </div>
                          </div>
                          <div class="col-md-1">
                          <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                          </div>
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                
                        <div class="form-group has-success">
                          <label class="col-md-2 control-label" for="nom"><?php echo $mode ?> Yers </label>
                          <div class="col-md-9">
                           <div class="input-icon input-icon-sm">
                             <i class="fa fa-user"></i>
                             <input class="form-control input-sm" type="text" name="affilie"  value="<?php echo $first_name.' '.$last_name.' [ID : '. $id_affiliate.']' ?>" readonly /> 
                           </div>
                          </div>
                        
                       </div> 
                         
                                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                
			 </div>
                </form>
                 </div>
			 
			 
             <div class="col-md-12 margin-top-20" >
                 
             <h4 class="text-center">Filleuls Niveau 1</h4>
            
	 
			
			 <?php
   
IF ( 1 == 1) 
{
	            $result  = mysqli_query($connection_database, REQUETE_FILTRE_LISTE_AFFILIATE_LEVEL($id_affiliate, 1, 1, "ad.first_name") ) or die("Requete pas comprise - #AD_search_affiliate.php #11!");

                    ////////////// ENCADREMENT DU TABLEAU POUR POUVOIR LE MANIPULER  ////////////////////////////////////////////////////////////////////
                    echo '<div class="col-md-12 margin-top-20">';
				    echo '<div class="portlet-body" >';
				  	echo '<div class="table-responsive" >';                  
				    ////////////// PREMIERE LIGNE DU TABLEAU ON AFFICHE UN EN-TETE DIFFERENT  //////////////////////////////////
 				     echo '<table class="table table-striped table-light table-hover">'."\n";
                     echo '<thead>';
				     echo '<tr>';	
      	             echo '<th style="text-align:center; " > NOM  </th>';
      	             echo '<th style="text-align:center; " > CONTACT  </th>';
					 //echo '<th style="text-align:center; " > NIVEAU  </th>';
      	             echo '<th style="text-align:center; " > INSCRIPTION  </th>';
      	             echo '<th style="text-align:center; " > DERNIÈRE CONNEXION </th>';
                     echo '</tr>'."\n";
				     echo '</thead>';
					 $num_contrat = 1;
				   
                   //////////////  REMPLISSAGE DU TABLEAU  //////////////////////////////////////	   		   
                   WHILE ($reponse = mysqli_fetch_array($result, MYSQL_ASSOC))
                        {      
    					     $creation_depuis    = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime($reponse["creation_date"]))/(60*60*24)); 
					         $connection_depuis  = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime($reponse["last_connection_date"]))/(60*60*24));
							 
                             echo '<tr>'; 					    
                             echo '<td style="text-align:center;" >  '.$reponse["first_and_last_name"].' </td>'; 						 
							 echo '<td style="text-align:center;" >  '.$reponse["email"] .' <br/> Tél : '.$reponse["phone_number"].'</td>'; 
                             //echo '<td style="text-align:center;" >  '.$reponse["niveau"] .'</td>'; 	
							 echo '<td style="text-align:center;" >  '.$creation_depuis.' '.SING_PLUR('jour', $creation_depuis, 0).'  <br/> A'.$reponse["id_affiliate"].' </td>';
                    	     echo '<td style="text-align:center; "> '; IF ($connection_depuis > 10 ) { echo'<span class="badge badge-warning ">'.$connection_depuis.' jours </span> '; }  ELSE { echo'<span class="badge badge-success ">'.$connection_depuis.' '.SING_PLUR('jour', $connection_depuis, 0).'    </span>'; }  echo '</td>'; 							 
						     echo '</tr>'."\n";
							 $num_contrat = $num_contrat + 1;

           				}
                   echo"</table>";
			 	echo '</div> ';
				echo '</div> ';
				echo '</div> ';		// DIV 1


				 
				 			  
}

             ?>	
             </div>				 
			 </div>	

					
			</div>
			</div>
			</div>
			
			 <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 
			 <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 
			 <!---------------------------- ARBORESCENCE ---------------------------------------------------------------------------------------------------------------------------------------->			 
		

			
			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 
			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 
			 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->			 
			 </div>			 
			 
			
			 </div> 
			 
			 

                                    </div>	
                                </div>

  <?php
}

   } // FIN DE CHECK SI SESSION EXISTE
    ELSE 
	{
         echo '<form name="p_action"  action="login.php" method="post"> ';
	     echo '<script language="JavaScript">document.p_action.submit();</script></form> ';
    }
?>
							

                <!-- BEGIN FOOTER -->          <?php  include("scripts/10_bandeau_footer.php");  ?>    <!-- END FOOTER -->	
                </div> <!-- #3  --> 
            </div> <!-- #2  --> 
        </div> <!-- #1 --> 
<!-- BEGIN FOOTER -->          <?php  //include("scripts/11_bandeau_footer_scripts.php");  ?>    <!-- END FOOTER -->		
</body>
</html>