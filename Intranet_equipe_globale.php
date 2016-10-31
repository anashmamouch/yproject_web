<!-- BEGIN STYLE MENU -->         <?php     include("scripts/01_bandeau_style.php");        ?>     <!-- END STYLE MENU -->
<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/02_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="page-fixed-main-content">     <!-- #3  --> 
<?php
IF( $_SESSION['id_affiliate']  > 0   )
    { 
             IF (!isset($_POST['affiliate_level']) )             { $_POST['affiliate_level']      = 1; }
		     $id_affiliate = $_SESSION['id_affiliate'];
             $habilitation = $_SESSION['habilitation'];			 
		     

			 
?>	
				<div class="col-md-12">
					<div class="portlet light col-md-12">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">MON ACTIVITÉ EN COURS</span>
                                    </div>
                                </div>

						<div class="portlet-body form">											
<?php

	List ($mlm_niv1, $mlm_niv2, $mlm_niv3, $mlm_niv4, $mlm_niv5, $mlm_niv6, $mlm_niv7) = MATRICE_MLM_YERS( $habilitation, 0, 0);
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$nb_mon_niveau         = 1;
	$nb_niveau_1           = COUNT_FILLEUL_LEVEL($connection_database, $id_affiliate, 1);
    $nb_niveau_2           = COUNT_FILLEUL_LEVEL($connection_database, $id_affiliate, 2);
    $nb_niveau_3           = COUNT_FILLEUL_LEVEL($connection_database, $id_affiliate, 3);
    $nb_niveau_4           = COUNT_FILLEUL_LEVEL($connection_database, $id_affiliate, 4);
    $nb_niveau_5           = COUNT_FILLEUL_LEVEL($connection_database, $id_affiliate, 5);
	$nb_niveau_total       = $nb_niveau_1 + $nb_niveau_2 + $nb_niveau_3 + $nb_niveau_4 + $nb_niveau_5;
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $commission_mlm_0     =  0;
    $commission_mlm_1     =  SUM_COMMISSION_MLM_LEVEL($connection_database, $id_affiliate, 1, $habilitation);
	$commission_mlm_2     =  SUM_COMMISSION_MLM_LEVEL($connection_database, $id_affiliate, 2, $habilitation); 
	$commission_mlm_3     =  SUM_COMMISSION_MLM_LEVEL($connection_database, $id_affiliate, 3, $habilitation); 
	$commission_mlm_4     =  SUM_COMMISSION_MLM_LEVEL($connection_database, $id_affiliate, 4, $habilitation); 
	$commission_mlm_5     =  SUM_COMMISSION_MLM_LEVEL($connection_database, $id_affiliate, 5, $habilitation); 
	$sum_commission_mlm   =  $commission_mlm_0 + $commission_mlm_1 + $commission_mlm_2 + $commission_mlm_3 + $commission_mlm_4 + $commission_mlm_5 ;
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $ax_amount_ht_0       =  0;
    $ax_amount_ht_1       =  CONTRATS_COMPTABLE_AX_AMOUNT_HT($connection_database, $id_affiliate, 1);
    $ax_amount_ht_2       =  CONTRATS_COMPTABLE_AX_AMOUNT_HT($connection_database, $id_affiliate, 2);
    $ax_amount_ht_3       =  CONTRATS_COMPTABLE_AX_AMOUNT_HT($connection_database, $id_affiliate, 3);
    $ax_amount_ht_4       =  CONTRATS_COMPTABLE_AX_AMOUNT_HT($connection_database, $id_affiliate, 4);
    $ax_amount_ht_5       =  CONTRATS_COMPTABLE_AX_AMOUNT_HT($connection_database, $id_affiliate, 5);					   
    $sum_a_encaisser      =  $ax_amount_ht_0 + $ax_amount_ht_1+ $ax_amount_ht_2 + $ax_amount_ht_3 + $ax_amount_ht_4 + $ax_amount_ht_5;
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
				 echo '<div class="col-md-12" > ';  					 			 					 					 
				     echo '<div class="portlet-body" >';
				     echo '<div class="table-scrollable table-scrollable-borderless">';
                     echo '<table class="table table-hover table-light">';
					 
					 echo '<thead>';
                     echo '<tr class="uppercase">';
					 echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center; "" > MES NIVEAUX <br/> D\'ÉQUIPE </th>';
				     echo '<th ROWSPAN=2 style="vertical-align: middle; text-align:center; " " >  NOMBRE <br/> FILLEULS </th>';
				     echo '<th ROWSPAN=1 COLSPAN=2 style="vertical-align: middle; text-align:center; " " > <i class="fa fa-credit-card">   </i>  RÉMUNÉRATION TOTALE </th>';
					 
					 
                     echo '</tr>'."\n";
					 
					 //////////////////////////////////				 
                     echo '<tr>';
					 
				     echo '<th ROWSPAN=1  style="vertical-align: middle; text-align:center; " " >     &nbsp MOIS EN COURS </th>';
				     echo '<th ROWSPAN=1  style="vertical-align: middle; text-align:center; " " >     &nbsp À ENCAISSER </th>';					 
					 
					 echo '</tr>'."\n";
					 echo '</thead>';
                     $background_color = "#fafafa";
         
				     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                     // LIGNE 2 - NIVEAU 1
					 echo '<td style="text-align:center;"                          > '.$fauser1.' </td>';
                     echo '<td style="text-align:center;"                          > '.$nb_niveau_1.'</td>';
                     echo '<td style="text-align:center;"                          > '.DISPLAY_INSTEADOF_ZERO($commission_mlm_1, 1, 1).' </td>';
					 
                     IF ($ax_amount_ht_1 == 0 ) 
					 {echo '<td style="text-align:center; background-color:'.$background_color.'" > - </td>';}
				     ELSE
				     {
				     echo '<form id="Suivi_production_all" action="Intranet_Contrat_facture.php" method="post">';
				     echo '<td style="text-align:center;  background-color:'.$background_color.'"> <a  class="link_label btn btn-circle blue btn-sm" href="#" onclick=\'document.getElementById("Suivi_production_all").submit()\'><i class="fa fa-search"></i>  '.DISPLAY_INSTEADOF_ZERO($ax_amount_ht_1, 1, 1).' </a></td></form>';
                     }

	                 echo '</tr>'."\n";	
                     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                     echo '<td style="text-align:center;"                          > '.$fauser2.' </td>';
                     echo '<td style="text-align:center;"                          > '.($nb_niveau_2).'</td>';
                     echo '<td style="text-align:center;"                          > '.DISPLAY_INSTEADOF_ZERO($commission_mlm_2, 1, 1).' </td>';
					 
                     IF ($ax_amount_ht_2 == 0 ) 
					 {echo '<td style="text-align:center; background-color:'.$background_color.'" > - </td>';}
				     ELSE
				     {
				     echo '<form id="Suivi_production_all" action="Intranet_Contrat_facture.php" method="post">';
				     echo '<td style="text-align:center;  background-color:'.$background_color.'"> <a  class="link_label btn btn-circle blue btn-sm" href="#" onclick=\'document.getElementById("Suivi_production_all").submit()\'><i class="fa fa-search"></i>  '.DISPLAY_INSTEADOF_ZERO($ax_amount_ht_2, 1, 1).' </a></td></form>';
                     }					 
					 
	                 echo '</tr>'."\n";	
                     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                     echo '<td style="text-align:center;"                          > '.$fauser3.'  </td>';
                     echo '<td style="text-align:center;"                          > '.($nb_niveau_3).'</td>';
                     echo '<td style="text-align:center;"                          > '.DISPLAY_INSTEADOF_ZERO($commission_mlm_3, 1, 1).' </td>';
					 
                     IF ($ax_amount_ht_3 == 0 ) 
					 {echo '<td style="text-align:center; background-color:'.$background_color.'" > - </td>';}
				     ELSE
				     {
				     echo '<form id="Suivi_production_all" action="Intranet_Contrat_facture.php" method="post">';
				     echo '<td style="text-align:center;  background-color:'.$background_color.'"> <a  class="link_label btn btn-circle blue btn-sm" href="#" onclick=\'document.getElementById("Suivi_production_all").submit()\'><i class="fa fa-search"></i>  '.DISPLAY_INSTEADOF_ZERO($ax_amount_ht_3, 1, 1).' </a></td></form>';
                     }		
					 
	                 echo '</tr>'."\n";	
                     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                     echo '<td style="text-align:center;"                          > '.$fauser4.'  </td>';
                     echo '<td style="text-align:center;"                          > '.($nb_niveau_4).'</td>';
                     echo '<td style="text-align:center;"                          > '.DISPLAY_INSTEADOF_ZERO($commission_mlm_4, 1, 1).' </td>';
					 
                     IF ($ax_amount_ht_4 == 0 ) 
					 {echo '<td style="text-align:center; background-color:'.$background_color.'" > - </td>';}
				     ELSE
				     {
				     echo '<form id="Suivi_production_all" action="Intranet_Contrat_facture.php" method="post">';
				     echo '<td style="text-align:center;  background-color:'.$background_color.'"> <a  class="link_label btn btn-circle blue btn-sm" href="#" onclick=\'document.getElementById("Suivi_production_all").submit()\'><i class="fa fa-search"></i>  '.DISPLAY_INSTEADOF_ZERO($ax_amount_ht_4, 1, 1).' </a></td></form>';
                     }		

	                 echo '</tr>'."\n";	
                     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                     echo '<td style="text-align:center;"                          > '.$fauser5.' </td>';
                     echo '<td style="text-align:center;"                          > '.($nb_niveau_5).'</td>';
                     echo '<td style="text-align:center;"                          > '.DISPLAY_INSTEADOF_ZERO($commission_mlm_5, 1, 1).' </td>';
					 
                     IF ($ax_amount_ht_5 == 0 ) 
					 {echo '<td style="text-align:center; background-color:'.$background_color.'" > - </td>';}
				     ELSE
				     {
				     echo '<form id="Suivi_production_all" action="Intranet_Contrat_facture.php" method="post">';
				     echo '<td style="text-align:center;  background-color:'.$background_color.'"> <a  class="link_label btn btn-circle blue btn-sm" href="#" onclick=\'document.getElementById("Suivi_production_all").submit()\'><i class="fa fa-search"></i>  '.DISPLAY_INSTEADOF_ZERO($ax_amount_ht_5, 1, 1).' </a></td></form>';
                     }	
					 
					 
	                 echo '</tr>'."\n";	
                     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                     echo '<td style="text-align:center; background-color:'.$background_color.'" > <b> '.$faEquipe.' </b> </td>';
                     echo '<td style="text-align:center; background-color:'.$background_color.'" > <b>'.$nb_niveau_total.' </b> </td>';
                     echo '<td style="text-align:center; background-color:'.$background_color.'" > <b>'.DISPLAY_INSTEADOF_ZERO($sum_commission_mlm, 1, 1).' </b> </td>';
					 
				   IF ($sum_a_encaisser < $minimum_facture_a_encaisser)
				     {
                     echo '<td style="text-align:center; background-color:'.$background_color.'"><b> '.DISPLAY_INSTEADOF_ZERO($sum_a_encaisser, 1, 1).' </b></td>'; 					 
					 }
                   ELSE
	                 {
				     echo '<form id="Suivi_production_all" action="Intranet_Contrat_facture.php" method="post">';
				     echo '<td style="text-align:center;  background-color:'.$background_color.'"> <a  class="link_label btn btn-circle blue btn-sm" href="#" onclick=\'document.getElementById("Suivi_production_all").submit()\'><i class="fa fa-search"></i>  ENCAISSER :  '.$sum_a_encaisser.' € </a></td></form>';
                     }
					 
	                 echo '</tr>'."\n";	
                     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


					 
                   echo"</table>";
				   echo ' </div> ';
				   echo ' </div> ';
				   echo ' </div> ';

				 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
				 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 


		
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