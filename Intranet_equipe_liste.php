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
		     $id_affiliate = $_SESSION['id_affiliate']; 		
		     
             $requete_a_retourner = REQUETE_FILTRE_LISTE_AFFILIATE_LEVEL($connection_database, $id_affiliate, $_POST['affiliate_level'] , 1, "first_name");
 
             $result             = $connection_database->query( $requete_a_retourner );
			 $nb_filleul_niveau  = $result->rowCount();
			 
?>	
				<div class="col-md-12">
					<div class="portlet light col-md-12">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">LISTE DE MES FILLEULS YERS</span>
                                    </div>
                                </div>

						<div class="portlet-body form">											
<?php
				   echo '<form class="form-horizontal" role="form" action="Intranet_equipe_liste.php" name="majform" method="post">';
				   echo '<div class="col-md-2 margin-top-10">'; 
				   echo '<span class="caption-subject font-blue-madison bold uppercase"> '.$nb_filleul_niveau.' '.SING_PLUR('FILLEUL', $nb_filleul_niveau, 1) .' DE </span>';
				   echo '</div>';
				   echo '<div class="col-md-3">';
             	   echo '<select class="select form-control sm" name="affiliate_level" id="affiliate_level" onChange="majform.submit()" >';
                          echo '<option value="1"  ';    if ($_POST['affiliate_level'] == 1)       { echo ' selected="selected"';}echo'> NIVEAU 1 </option>';
                          echo '<option value="2"  ';    if ($_POST['affiliate_level'] == 2)       { echo ' selected="selected"';}echo'> NIVEAU 2 </option>';
                          echo '<option value="3"  ';    if ($_POST['affiliate_level'] == 3)       { echo ' selected="selected"';}echo'> NIVEAU 3 </option>';
		                  echo '<option value="4"  ';    if ($_POST['affiliate_level'] == 4)       { echo ' selected="selected"';}echo'> NIVEAU 4 </option>';
                          echo '<option value="5"  ';    if ($_POST['affiliate_level'] == 5)       { echo ' selected="selected"';}echo'> NIVEAU 5 </option>';
                          echo '<option value="FULL" ';  if ($_POST['affiliate_level'] == "FULL")  { echo ' selected="selected"';}echo'> TOUS LES NIVEAUX </option>';
						  echo '</select>'; 
					echo '</div> </form>';

	
                     ////////////// ENCADREMENT DU TABLEAU POUR POUVOIR LE MANIPULER  ////////////////////////////////////////////////////////////////////
                     echo '<div class="col-md-12 margin-top-20">';
				     echo '<div class="portlet-body" >';
				  	 echo '<div class="table-responsive" >';                  
				     ////////////// PREMIERE LIGNE DU TABLEAU ON AFFICHE UN EN-TETE DIFFERENT  //////////////////////////////////
 				     echo '<table class="table table-striped table-light table-hover">'."\n";
                     echo '<thead>';
				     echo '<tr>';	
      	             echo '<th style="text-align:center; " > <i class="fa fa-user"></i> NOM  </th>';
      	             echo '<th style="text-align:center; " > <i class="fa fa-envelope"></i> CONTACTS  </th>';
					 echo '<th style="text-align:center; " > <i class="fa fa-globe"></i> NIVEAU  </th>';
					 echo '<th style="text-align:center; " > <i class="fa fa-credit-card"></i> BUNDLE  </th>';
      	             echo '<th style="text-align:center; " > <i class="fa fa-calendar"></i> INSCRIPTION  </th>';
      	             echo '<th style="text-align:center; " > <i class="icon-tag"></i> NON CONNECTÉ </th>';
      	             echo '<th style="text-align:center; " > <i class="fa fa-user"></i> PARRAIN  </th>';
					 //echo '<th style="text-align:center; background-color:'.$background_color.'; color:'.$font_color.' " > <i class="icon-tag"></i> FILLEULS </th>';
                     echo '</tr>'."\n";
				     echo '</thead>';
				   
                     //////////////  REMPLISSAGE DU TABLEAU  //////////////////////////////////////	 
                    WHILE ($reponse = $result->fetch(PDO::FETCH_ASSOC)) 
                	{
                     	$creation_depuis    = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime($reponse["creation_date"]))/(60*60*24));
                     	$connection_depuis  = round((strtotime(date('Y-m-d H:i:s',time())) - strtotime($reponse["last_connection_date"]))/(60*60*24));
                     	List($id_upline ,$first_name, $last_name, $first_and_last_name ) = RETURN_INFO_AFFILIATE($connection_database, $reponse["id_upline"] );
						List($is_exist, $id_commande_pack, $id_pack, $prix_pack_ttc, $prix_pack_ht, $date_debut_abonnement, $date_fin_abonnement , $is_subscription, $id_customer, $commission_commercial, $commission_mlm  ) = RETURN_INFO_AFF_BUNDLE($connection_database, $reponse["id_affiliate"], 1);

                     	
                     	echo '<tr>';
                     	echo '<td style="text-align:center;" >  '.$reponse["first_name"].' '.$reponse["last_name"].'</td>';
                     	echo '<td style="text-align:center;" >  '.$reponse["email"] .' <br/> Tél : '.$reponse["phone_number"].'</td>';
                     	echo '<td style="text-align:center;" >  '.$reponse["niveau"] .'</td>';
                     	echo '<td style="text-align:center;" >  '. DISPLAY_INSTEADOF_ZERO($prix_pack_ttc, 1, 1) .' </td>';
						echo '<td style="text-align:center;" >  '.$creation_depuis.' '.SING_PLUR('jour', $creation_depuis, 0).'  <br/> A'.$reponse["id_affiliate"].' </td>';
                     	echo '<td style="text-align:center; "> '; IF ($connection_depuis > 10 ) { echo'<span class="badge badge-warning ">'.$connection_depuis.' jours </span> '; }  ELSE { echo'<span class="badge badge-success ">'.$connection_depuis.' '.SING_PLUR('jour', $connection_depuis, 0).'    </span>'; }  echo '</td>';
                     	echo '<td style="text-align:center;" >  '. $first_and_last_name .'</td>';
                     	echo '</tr>'."\n";
                     }

                   echo"</table>";
			 	echo '</div> ';
				echo '</div> ';
				echo '</div> ';		// DIV 1
		
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