<!-- BEGIN STYLE MENU -->         <?php     include("scripts/01_bandeau_style.php");        ?>     <!-- END STYLE MENU -->
<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/02_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="page-fixed-main-content">     <!-- #3  --> 
<?php
IF( $_SESSION['id_affiliate'] > 0   )
    { 
             IF (!isset($_POST['affiliate_level']) )             { $_POST['affiliate_level']      = 1; }
             IF (!isset($_POST['id_affiliate']) )                { $_POST['id_affiliate']      = $_SESSION['id_affiliate']; }
		     $id_affiliate = $_POST['id_affiliate']; 		
			 
?>	
				<div class="col-md-12">
					<div class="portlet light col-md-12">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">MON BUNDLE EN COURS</span>
                                    </div>
                                </div>

						<div class="portlet-body form">											
<?php	
                     List($id_upline ,$first_name, $last_name, $first_and_last_name )     = RETURN_INFO_AFFILIATE($connection_database, $id_affiliate );
					 List($is_exist, $id_commande_pack, $id_pack, $prix_pack_ttc, $prix_pack_ht, $date_debut_abonnement, $date_fin_abonnement , $is_subscription, $id_customer, $commission_commercial, $commission_mlm  ) = RETURN_INFO_AFF_BUNDLE($connection_database, $id_affiliate, 1);

					 IF ( $is_exist == 0 )
					 {
			                  echo '<div class="note note-success">';
	 		                  echo "Aucune commande en cours pour $first_name $last_name ";
	 		                  echo '</div>';						 
						 
					 }
					 ELSE
					 {					 
					 List($id_upline2 ,$first_name2, $last_name2, $first_and_last_name2 ) = RETURN_INFO_AFFILIATE($connection_database, $id_upline );
					 List($jour, $mois, $annee, $jour_de_la_semaine, $timestamp, $heure, $minute, $seconde, $mois_a_afficher, $mois_a_afficher2 ) = RETURN_INFO_SUR_LA_DATE($date_debut_abonnement);
                    ////////////// ENCADREMENT DU TABLEAU POUR POUVOIR LE MANIPULER  ////////////////////////////////////////////////////////////////////
                     echo '<div class="col-md-12 margin-top-20">';
				     echo '<div class="portlet-body" >';
				  	 echo '<div class="table-responsive" >';                  
				     ////////////// PREMIERE LIGNE DU TABLEAU ON AFFICHE UN EN-TETE DIFFERENT  //////////////////////////////////
 				     echo '<table class="table table-striped table-light table-hover">'."\n";
                     echo '<thead>';
				     echo '<tr>';	
      	             echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" >  PRÉNOM / NOM  </th>';
      	             echo '<th ROWSPAN=1 COLSPAN=2  style="vertical-align: middle; text-align:center;" >  <i class="fa fa-credit-card"></i> BUNDLE  </th>';
      	             echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" >  </th>';
      	             echo '<th ROWSPAN=1 COLSPAN=2  style="vertical-align: middle; text-align:center;" >  <i class="fa fa-calendar"></i> ABONNEMENT  </th>';
      	             echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" " >  PARRAIN  </th>';
					 echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" " >  RÉFÉRENCE  </th>';
                     echo '</tr>'."\n";
					 
				     echo '<tr>';	
      	             echo '<th style="text-align:center; " >   TTC  </th>';
					 echo '<th style="text-align:center; " >  HT  </th>';
					 
      	             echo '<th style="text-align:center; " >  DÉBUT  </th>';
      	             echo '<th style="text-align:center; " >  PRÉLÉVEMENT  </th>';
					 
                     echo '</tr>'."\n";					 
					 
					 
				     echo '</thead>';
				   
                     //////////////  REMPLISSAGE DU TABLEAU  //////////////////////////////////////	 
                        $creation_depuis     = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime($date_debut_abonnement))/(60*60*24));
						$nb_prelevement_fait = DIFF_EN_MOIS_ENTRE_DEUX_DATE($date_debut_abonnement, date('Y-m-d H:i:s') );
                     	echo '<tr>';
                     	echo '<td style="text-align:center;" >  '.$first_name.' '.$last_name.'</td>';
                     	echo '<td style="text-align:center;" >  '. DISPLAY_INSTEADOF_ZERO($prix_pack_ttc, 1, 1) .' </td>';
                     	echo '<td style="text-align:center;" >  '. DISPLAY_INSTEADOF_ZERO($prix_pack_ht, 1, 1) .' </td>';
                     	echo '<td style="text-align:center;" >   </td>';
                     	echo '<td style="text-align:center;" >  '. $jour .' '. $mois_a_afficher2 .' '. $annee .'  <br/> '.$creation_depuis.' '.SING_PLUR('jour', $creation_depuis, 0).' </td>'; // DEBUT
                     	echo '<td style="text-align:center;" >  '.$nb_prelevement_fait.' '.SING_PLUR('prélevement', $creation_depuis, 0).'   <br/> Le '. $jour .' de chaque mois </td>'; // DEBUT
						echo '<td style="text-align:center;" >  '. $first_and_last_name2 .'</td>';
						echo '<td style="text-align:center;" >  B'. $id_commande_pack .'</td>';
                     	echo '</tr>'."\n";

                     echo"</table>";
			 	     echo '</div> ';
				     echo '</div> ';
				     echo '</div> ';		// DIV 1
					 }
		
?>									
						</div>	
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
	


				<div class="col-md-12">
					<div class="portlet light col-md-12">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">HISTORIQUE DE MES ANCIENS BUNDLES</span>
                                    </div>
                                </div>
								
						<div class="portlet-body form">											
<?php	
                     $requete_a_retourner = RETURN_REQUETE_COMMANDE_PACK_HISTORIQUE($connection_database, $id_affiliate, 0);
                     $result              = $connection_database->query( $requete_a_retourner );
					 $nb_row_historique   = $result->rowCount();
					 
					 IF ( $nb_row_historique == 0 )
					 {
			                  echo '<div class="note note-success">';
	 		                  echo "Aucun historique de commande pour $first_name $last_name ";
	 		                  echo '</div>';						 
						 
					 }
					 ELSE
					 {
                     ////////////// ENCADREMENT DU TABLEAU POUR POUVOIR LE MANIPULER  ////////////////////////////////////////////////////////////////////
                     echo '<div class="col-md-12 margin-top-20">';
				     echo '<div class="portlet-body" >';
				  	 echo '<div class="table-responsive" >';                  
				     ////////////// PREMIERE LIGNE DU TABLEAU ON AFFICHE UN EN-TETE DIFFERENT  //////////////////////////////////
 				     echo '<table class="table table-striped table-light table-hover">'."\n";
                     echo '<thead>';
				     echo '<tr>';	
      	             echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" >  PRÉNOM / NOM  </th>';
      	             echo '<th ROWSPAN=1 COLSPAN=2  style="vertical-align: middle; text-align:center;" >  <i class="fa fa-credit-card"></i> BUNDLE  </th>';
					 echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" >  </th>';
      	             echo '<th ROWSPAN=1 COLSPAN=2  style="vertical-align: middle; text-align:center;" >  <i class="fa fa-calendar"></i> ABONNEMENT  </th>';
      	             echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" " >  PARRAIN  </th>';
					 echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center;" " >  RÉFÉRENCE  </th>';
                     echo '</tr>'."\n";
					 
				     echo '<tr>';	
      	             echo '<th style="text-align:center; " >   TTC  </th>';
					 echo '<th style="text-align:center; " >  HT  </th>';

      	             echo '<th style="text-align:center; " >  DÉBUT  </th>';
      	             echo '<th style="text-align:center; " >  PRÉLÉVEMENT  </th>';
					 
                     echo '</tr>'."\n";					 
					 
					 
				     echo '</thead>';
				   
                     //////////////  REMPLISSAGE DU TABLEAU  //////////////////////////////////////	 
                     WHILE ($reponse = $result->fetch(PDO::FETCH_ASSOC)) 
                	 {
                        $creation_depuis    = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime( $reponse["date_debut_abonnement"] ))/(60*60*24));
					    List($jour, $mois, $annee, $jour_de_la_semaine, $timestamp, $heure, $minute, $seconde, $mois_a_afficher, $mois_a_afficher2 ) = RETURN_INFO_SUR_LA_DATE( $reponse["date_debut_abonnement"] );

                     	echo '<tr>';
                     	echo '<td style="text-align:center;" >  '.$first_name.' '.$last_name.'</td>';
                     	echo '<td style="text-align:center;" >  '. DISPLAY_INSTEADOF_ZERO( $reponse["prix_pack_ttc"]*1 , 1, 1) .' </td>';
                     	echo '<td style="text-align:center;" >  '. DISPLAY_INSTEADOF_ZERO( $reponse["prix_pack_ht"]*1 , 1, 1) .' </td>';
						echo '<td style="text-align:center;" >   </td>';
                     	echo '<td style="text-align:center;" >  '. $jour .' '. $mois_a_afficher2 .' '. $annee .'  <br/> '.$creation_depuis.' '.SING_PLUR('jour', $creation_depuis, 0).' </td>'; // DEBUT
                     	echo '<td style="text-align:center;" >  Le '. $jour .' de chaque mois </td>'; // DEBUT
						echo '<td style="text-align:center;" >  '. $first_and_last_name2 .'</td>';
						echo '<td style="text-align:center;" >  B'. $reponse["id_commande_pack"] .'</td>'; 
                     	echo '</tr>'."\n";
                     }

                     echo"</table>";
			 	     echo '</div> ';
				     echo '</div> ';
				     echo '</div> ';		// DIV 1
					 }
		
?>									
						</div>	
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
		
	
	
	
<?php 	
    }
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
<!-- BEGIN FOOTER -->          <?php  include("scripts/11_bandeau_footer_scripts.php");  ?>    <!-- END FOOTER -->		
</body>
</html>