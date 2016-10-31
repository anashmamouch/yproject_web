<?php    
         if(!isset($_SESSION)){session_start();}               
         require_once('scripts/config.php');                    
         require_once("scripts/functions.php");                
         $pageName = basename($_SERVER['SCRIPT_NAME']); 
		 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
     IF ( 1 == 1 )
{	?>

        <header class="page-header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="havbar-header">
                        <!-- BEGIN LOGO -->
                        <a id="index" class="navbar-brand" href="start.html">
                            <img src="assets/layouts/layout6/img/logo.png" alt="Logo"> </a>
                        <!-- END LOGO -->
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">

                            <div class="btn-group-img btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								    <img src= "<?php echo DISPLAY_PROFILE_PICTURE( $_SESSION['id_affiliate'],0 ) ?>" class="img-circle img-responsive" alt="">
								</button>
                                <ul class="dropdown-menu-v2" role="menu">
                                    <li>
                                        <a href="Intranet_profil_parametres.php">
                                            <i class="icon-user"></i> Mon Profile
                                            <span class="badge badge-danger">1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> Mon Calendrier </a>
                                    </li>

                                    <li class="divider"> </li>

                                    <li>
                                        <a href="scripts/deconnection.php">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END USER PROFILE -->
                        </div>
                        <!-- END TOPBAR ACTIONS -->
                    </div>
                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
	
<?php
}
        ELSE 
		{
    	         echo '<form name="p_action"  action="login.php" method="post"> ';
	             echo '<script language="JavaScript">document.p_action.submit();</script></form> ';
        }	
?> 

