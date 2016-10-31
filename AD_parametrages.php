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
		
			 IF (!isset($_POST['boutton_temporaire_value']))           { $_POST['boutton_temporaire_value']        = 0;}
             IF (!isset($_POST['tab_active'] ))                        { $_POST['tab_active']                      = "tab_2_1";  }
			 IF (!isset($_POST['effacer_la_base_de_donnee']))          { $_POST['effacer_la_base_de_donnee']       = 0;}
			  
		     $Y_project_racine           = dirname(__FILE__);
			 
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 /////////////// MODULE DE RÉALISATION DES ACTIONS DU MÊME SCRIPT /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 
			 IF ($_POST["boutton_temporaire_value"] > 0) 
                 {
				    echo '<div class="col-md-12">'; 
   				         echo '<div class="col-md-12 note note-info">';
	                         echo '<h6>LANCEMENT DU MODULE : <br/> </h6>';
					         	

                             echo '<h6> <br/> ÉXECUTION RÉUSSIE  </h6>';						
	                     echo '</div>';					 
	                echo '</div>';	
				 }
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 
			 ELSE IF ($_POST["effacer_la_base_de_donnee"] > 0) 
                 {
				    echo '<div class="col-md-12">'; 
   				    echo '<div class="col-md-12 note note-info">';
	                echo '<h5>LANCEMENT DU MODULE </h5>';
                    
					      IF ( $serveur  == 'TEST' AND 1 == 1 ) 
					      {
                	            $result = $connection_database->prepare( " DELETE FROM action_list " );                           $result->execute();
                	            $result = $connection_database->prepare( " DELETE FROM action_notification " );                   $result->execute();
                	            $result = $connection_database->prepare( " DELETE FROM 02_commande_pack " );                 $result->execute();
                	            $result = $connection_database->prepare( " DELETE FROM 03_commande_pack_historique " );           $result->execute();
                	            $result = $connection_database->prepare( " DELETE FROM 04_commande_pack_comptable " );            $result->execute();

							  
							  echo '<h5> >> LA BASE DE DONNÉES EST ÉFFACÉE </h5>';
                              echo '<h5> <br/> ÉXECUTION RÉUSSIE  </h5>';	
					      
					      }
					      ELSE
					      {
	                         echo '<h5>WHAOU TU ES FOU OU QUOI ? ON NE LANCE PAS CE MODULE EN PRODUCTION </h5>';						
					      }
					
				
	               echo '</div>';					 
	               echo '</div>';	
				 }
		
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>		
				<div class="col-md-12">
					<div class="portlet light bordered col-md-12">
					


<?php

 		echo '<div class="portlet-title tabbable-line">';
									
				echo '<div class="caption caption-md"> ';
					echo '<i class="icon-globe theme-font hide"></i> ';
					echo '<span class="caption-subject font-blue-madison bold uppercase"> Admin  </span> ';
				echo '</div> ';
										
									            echo '<ul class="nav nav-tabs">';
												
									            	echo '<li '; IF ( $_POST['tab_active']  == 'tab_2_1') { echo ' class="active";'; } echo '>';
									            		echo '<a href="#tab_2_1" data-toggle="tab"> CHECK </a>';
									            	echo '</li>';

									            	echo '<li '; IF ( $_POST['tab_active']  == 'tab_2_2') { echo ' class="active";'; } echo '>';
									            		echo '<a href="#tab_2_2" data-toggle="tab">  ADMINISTRATEUR </a>';
									            	echo '</li>';

									            	echo '<li '; IF ( $_POST['tab_active']  == 'tab_2_3') { echo ' class="active";'; } echo '>';
									            		echo '<a href="#tab_2_3" data-toggle="tab">  EN COURS </a>';
									            	echo '</li>';
													
									            	echo '<li '; IF ( $_POST['tab_active']  == 'tab_2_4') { echo ' class="active";'; } echo '>';
									            		echo '<a href="#tab_2_4" data-toggle="tab">  DOUBLONS </a>';
									            	echo '</li>';
													

													

													
													
													
									            echo '</ul>';
									
		 echo '</div>	';

		 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		 
		 echo '<div class="portlet-body">';	
         echo '<div class="tab-content">';	
				 
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             
		     IF ( $_POST['tab_active']  == 'tab_2_1')    { echo '<div id="tab_2_1" class="tab-pane fade active in col-md-12 margin-top-20" > '; }	
             ELSE										 { echo '<div id="tab_2_1" class="tab-pane fade        in col-md-12 margin-top-20" > '; }			 
		  	      echo '<div class="portlet-body" >';
		  	      echo '<div class="table-responsive" >';
		  	      
		  	      
			              echo '<div class="portlet-body" >';
			              echo '<div class="table-responsive" >';
			  	           
			  	                                                                            ///// BOUTON TEMPORAIRE DE TEST
	                              echo '<div class="col-md-12">'; 
	                                  echo '<h6>BOUTON TEMPORAIRE DE TEST</h6>';
	                                  echo '<form id="Action_script_partenaire" action="AD_parametrages.php" method="post" role="form" class="form-horizontal">';
	                                  echo '<input type="hidden" name="boutton_temporaire_value"          value = 1 />'; 
                          
	                              echo '<button class="btn blue btn-sm btn-circle" name="submit" type="submit"><i class="fa fa-refresh fa-spin"></i>  TEST  </button></form>'; 
                                  echo '</div>';						 
			  	           	 
			  	            
			              echo '</div>'; 
			              echo '</div>';	
		  	      
		  	      echo '</div>'; 
		  	      echo '</div>'; 		     
		     echo '</div>';	
			 
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             
		     IF ( $_POST['tab_active']  == 'tab_2_2')    { echo '<div id="tab_2_2" class="tab-pane fade active in col-md-12 margin-top-20" > '; }	
             ELSE										 { echo '<div id="tab_2_2" class="tab-pane fade        in col-md-12 margin-top-20" > '; }			 
		  	      echo '<div class="portlet-body" >';
		  	      echo '<div class="table-responsive" >';
		  	      
		  	      
				     /////////////////////  BOUTTON EFFACER LA BASE DE DONNÉES
	                 echo '<div class="col-md-2 note note-info margin-top-20">'; 
					     echo '<h5>Delete Tables : '.$serveur.' </h5>';
	                     echo '<form id="Action_script_partenaire" action="AD_parametrages.php" method="post" role="form" class="form-horizontal">';
	                     echo '<input type="hidden" name="effacer_la_base_de_donnee"            value = 1 />'; 
                     
					 IF ( $serveur == 'TEST' ) {
	                 echo '<button class="btn red btn-sm btn-circle" name="submit" type="submit"><i class="fa fa-trash"></i>   </button>'; }
					 
                     echo '</form></div> ';
					 
		  	      
		  	      echo '</div>'; 
		  	      echo '</div>'; 		     
		     echo '</div>';	

		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             
		     IF ( $_POST['tab_active']  == 'tab_2_3')    { echo '<div id="tab_2_3" class="tab-pane fade active in col-md-12 margin-top-20" > '; }	
             ELSE										 { echo '<div id="tab_2_3" class="tab-pane fade        in col-md-12 margin-top-20" > '; }			 
		  	      echo '<div class="portlet-body" >';
		  	      echo '<div class="table-responsive" >';
		  	      
		  	      
		  	      echo "tab_2_3"; 
		  	      
		  	      echo '</div>'; 
		  	      echo '</div>'; 		     
		     echo '</div>';	

		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             
		     IF ( $_POST['tab_active']  == 'tab_2_4')    { echo '<div id="tab_2_4" class="tab-pane fade active in col-md-12 margin-top-20" > '; }	
             ELSE										 { echo '<div id="tab_2_4" class="tab-pane fade        in col-md-12 margin-top-20" > '; }			 
		  	      echo '<div class="portlet-body" >';
		  	      echo '<div class="table-responsive" >';
		  	      
		  	      
		  	      echo "tab_2_4"; 
		  	      
		  	      echo '</div>'; 
		  	      echo '</div>'; 		     
		     echo '</div>';	
			 

             
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			 
             //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			 echo '</div>'; 
			 echo '</div>';	
			 echo '</div>';	    
				
?>									
																				
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