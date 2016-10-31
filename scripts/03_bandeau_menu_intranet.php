<?php    if(!isset($_SESSION)){session_start();}         ?>
<?php    $pageName = basename($_SERVER['SCRIPT_NAME']);  ?>

<!------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------->

<?php  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
     IF ( 1 == 1)
	 { ?>
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
							<li  <?php     IF ( $pageName == "AD_dashboard_module_1.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php"	) { echo "class=\"nav-item start active open\"; ";} ?> >
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
							        <span  <?php     IF ( $pageName == "AD_dashboard_module_1.php" ) { echo "class=\"selected\"; ";} ?> ></span>
                                    <span  <?php     IF ( $pageName == "AD_dashboard_module_1.php" ) { echo "class=\"arrow open\"; ";} ELSE { echo "class=\"arrow\"; ";} ?> ></span>
                                </a>
                                <ul class="sub-menu">
							        <li  <?php     IF ( $pageName == "AD_dashboard_module_1.php" ) { echo "class=\"nav-item start active open\"; ";} ?> >
                                        <a href="AD_dashboard_module_1.php" class="nav-link ">
                                            <i class="icon-bar-chart"></i>
                                            <span class="title">Dashboard 1</span>
                                            <span  <?php     IF ( $pageName == "AD_dashboard_module_1.php" ) { echo "class=\"selected\"; ";} ?> ></span>
                                        </a>
                                    </li>

									
                                </ul>
                            </li>
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="heading">
                                <h3 class="uppercase">Utilisateur</h3>
                            </li>
							
							
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->


							     <li  <?php     IF ( $pageName == "signup.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php"	) { echo "class=\"nav-item active\"; ";} ?> >
                                     <a href="signup.php" class="nav-link ">
                                         <i class="icon-bulb"></i>
                                         <span class="title">Inscription</span>
                                     </a>
                                 </li>								
							
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
							
							
                                <li  <?php     IF ( $pageName == "Intranet_profil_parametres.php" or $pageName == "Intranet_equipe_bundles_details.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php"	) { echo "class=\"nav-item start active open\"; ";} ?> >
                                     <a href="javascript:;" class="nav-link nav-toggle">
                                         <i class="icon-user"></i>
                                         <span class="title">Mon Compte</span>
							        <span  <?php     IF (  $pageName == "Intranet_profil_parametres.php" 
									                    OR $pageName == "Intranet_equipe_bundles_details.php"
                                                        OR $pageName == "XXXXXXXXXXXXXXXXX.php"	)      { echo "class=\"selected\"; ";} ?> ></span>
                                    <span  <?php     IF (  $pageName == "Intranet_profil_parametres.php"
									                    OR $pageName == "Intranet_equipe_bundles_details.php"
                                                        OR $pageName == "XXXXXXXXXXXXXXXXX.php"			) { echo "class=\"arrow open\"; ";} ELSE { echo "class=\"arrow\"; ";} ?> ></span>
                                     </a>
									 
                                     <ul class="sub-menu">
									 
                                         <li  <?php     IF ( $pageName == "Intranet_profil_parametres.php" ) { echo "class=\"nav-item start active open\"; ";} ?> >
                                             <a href="Intranet_profil_parametres.php" class="nav-link ">
                                                 <i class="icon-user"></i>
												 <span class="title">Mon Profil</span>
												 <span  <?php     IF ( $pageName == "Intranet_profil_parametres.php" ) { echo "class=\"selected\"; ";} ?> ></span>
                                             </a>
                                         </li>
                                 
                                         <li  <?php     IF ( $pageName == "Intranet_equipe_bundles_details.php" ) { echo "class=\"nav-item start active open\"; ";} ?> >
                                             <a href="Intranet_equipe_bundles_details.php" class="nav-link ">
                                                 <i class="fa fa-credit-card" ></i>
												 <span class="title">Mon bundle</span>
												 <span  <?php     IF ( $pageName == "Intranet_equipe_bundles_details.php" ) { echo "class=\"selected\"; ";} ?> ></span>
                                             </a>
                                         </li>                                 
                                 
							     		
                                     </ul>
                                 </li>
								 								 
							
														

				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->

                                <li  <?php     IF ( $pageName == "Intranet_equipe_liste.php" or $pageName == "Intranet_equipe_globale.php" or $pageName == "Intranet_equipe_arborescence.php" or $pageName == "XXXXXXXXXX.php"	) { echo "class=\"nav-item start active open\"; ";} ?> >
                                     <a href="javascript:;" class="nav-link nav-toggle">
                                         <i class="icon-globe"></i>
                                         <span class="title">Mon Équipe</span>
							        <span  <?php     IF (  $pageName == "Intranet_equipe_liste.php" 
									                    OR $pageName == "Intranet_equipe_globale.php"
                                                        OR $pageName == "Intranet_equipe_arborescence.php"	)      { echo "class=\"selected\"; ";} ?> ></span>
                                    <span  <?php     IF (  $pageName == "Intranet_equipe_liste.php"
									                    OR $pageName == "Intranet_equipe_globale.php"
                                                        OR $pageName == "Intranet_equipe_arborescence.php"			) { echo "class=\"arrow open\"; ";} ELSE { echo "class=\"arrow\"; ";} ?> ></span>
                                     </a>
									 
                                     <ul class="sub-menu">
									 
                                         <li  <?php     IF ( $pageName == "Intranet_equipe_liste.php" ) { echo "class=\"nav-item start active open\"; ";} ?> >
                                             <a href="Intranet_equipe_liste.php" class="nav-link ">
                                                 <i class="icon-users"></i>
												 <span class="title">Mes filleuls</span>
												 <span  <?php     IF ( $pageName == "Intranet_equipe_liste.php" ) { echo "class=\"selected\"; ";} ?> ></span>
                                             </a>
                                         </li>
                                 
                                         <li  <?php     IF ( $pageName == "Intranet_equipe_globale.php" ) { echo "class=\"nav-item start active open\"; ";} ?> >
                                             <a href="Intranet_equipe_globale.php" class="nav-link ">
                                                 <i class="icon-users"></i>
												 <span class="title">Va Vision Globale</span>
												 <span  <?php     IF ( $pageName == "Intranet_equipe_globale.php" ) { echo "class=\"selected\"; ";} ?> ></span>
                                             </a>
                                         </li>       

                                         <li  <?php     IF ( $pageName == "Intranet_equipe_arborescence.php" ) { echo "class=\"nav-item start active open\"; ";} ?> >
                                             <a href="Intranet_equipe_arborescence.php" class="nav-link ">
                                                 <i class="icon-users"></i>
												 <span class="title">Arborescence</span>
												 <span  <?php     IF ( $pageName == "Intranet_equipe_arborescence.php" ) { echo "class=\"selected\"; ";} ?> ></span>
                                             </a>
                                         </li>   										 

								 
                                 
							     		
                                     </ul>
                                 </li>
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
				            
				            
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
								 							

							     <li  <?php     IF ( $pageName == "Intranet_order_bundles.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php"	) { echo "class=\"nav-item active\"; ";} ?> >
                                     <a href="Intranet_order_bundles.php" class="nav-link ">
                                         <i class="fa fa-credit-card" ></i>
                                         <span class="title"> &nbsp Pack / Bundle</span>
                                     </a>
                                 </li>									 
							
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
														
				            
				            
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                            <li class="heading">
                                <h3 class="uppercase">Administrateur</h3>
                            </li>
 				                         <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                                        
							                  <li  <?php     IF ( $pageName == "AD_search_affiliate.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php"	) { echo "class=\"nav-item active\"; ";} ?> >
                                                  <a href="AD_search_affiliate.php" class="nav-link ">
                                                      <i class="fa fa-search"></i>
                                                      <span class="title">Recherche Affiliés</span>
                                                  </a>
                                              </li>								
							
 				                         <!----------------------------------------------------------------------------------------------------------------------------------------------------->

							                  <li  <?php     IF ( $pageName == "AD_parametrages.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php" or $pageName == "XXXXXXXXXX.php"	) { echo "class=\"nav-item active\"; ";} ?> >
                                                  <a href="AD_parametrages.php" class="nav-link ">
                                                      <i class="icon-settings"></i>
                                                      <span class="title">Contrôle</span>
                                                  </a>
                                              </li>	

				            <!----------------------------------------------------------------------------------------------------------------------------------------------------->


						</ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
				 


<?php 		 
	 }
      ELSE
     {
	  echo '<meta http-equiv="refresh" content="0;URL=login.php">'; 	
     }
?>
