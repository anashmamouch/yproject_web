<?php  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
		     include("scripts/01_bandeau_style.php"); 
       ////////////////////////////////////////////////////////////////////////////////////////////////////////////
?> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="fichiers/img/logo_yers_admin.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
		
		
             <?php 
		 IF (!isset($_POST['id_affiliate']))  {$_POST['id_affiliate']   = "";} 
		 IF (!isset($_POST['password']))      {$_POST['password']       = "";}
			   
	     IF (isset($_GET['id_affiliate']))     
   		         {       IF (get_magic_quotes_gpc())               { $_GET['id_affiliate']   = stripslashes(trim($_GET['id_affiliate'])); }
						 IF (strlen(trim($_GET['email'])) < 100 )  { $_POST['id_affiliate']  = trim($_GET['id_affiliate']);  }
                 }

	     IF (isset($_GET['token']))     
   		         {       IF (get_magic_quotes_gpc())               { $_GET['token']      = stripslashes(trim($_GET['token'])); }
						 IF (strlen(trim($_GET['email'])) < 100 )  { $_POST['password']  = trim($_GET['token']);  }
                 }
	?>			
				
            <!-- BEGIN LOGIN FORM ----------------------------------------------------------------------------------------------------------------------------------------------->
			<form action="scripts/check_access.php" class="login-form" method="post">
                <h3 class="form-title text-center">Admin Workspace</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                         <i class="fa fa-envelope"></i>
                         </span>
                        <input type="text" class="form-control input-circle-right" placeholder="Identifiant" id="login-username" name="id_affiliate" value="<?php echo $_POST['id_affiliate'] ?>" > </div>
                </div>
                <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                         <i class="fa fa-key"></i>
                         </span>
                        <input type="password" class="form-control input-circle-right" placeholder="Mot de passe" id="login-password" name="password" value="<?php echo $_POST['password'] ?>"> </div>
                </div>
               
                <div class="form-actions">
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Se souvenir de moi
                        <span></span>
                    </label>
                    <button type="submit" class="btn green btn-outline pull-right"> Login </button>
                </div>
                
                <div class="forget-password">
                    <h4>Mot de pase oublié ?</h4>
                    <p> Récupérez-le
                        <a href="javascript:;" id="forget-password"> ici </a>.</p>
                </div>
                
            </form>
            <!-- END LOGIN FORM ----------------------------------------------------------------------------------------------------------------------------------------------->
			
            <!-- BEGIN FORGOT PASSWORD FORM -->
		     <form class="forget-form" action="scripts/check_access_lost.php" method="post">
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
            </form>

            <!-- END FORGOT PASSWORD FORM -->

        </div>
        <!-- END LOGIN -->

        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>