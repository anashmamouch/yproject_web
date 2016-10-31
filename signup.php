<?php
session_start();

$_SESSION['lang'] = "fr_FR";

if (!isset($_GET['lang'])) {
    if (isset($_SESSION['lang'])) {
        $_GET['lang'] = $_SESSION['lang'];
    }
} else {
    $_SESSION['lang'] = $_GET['lang'];
}

$traduction = basename($_SERVER['PHP_SELF'], '.php');
include './traduction/localization.php';

      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
		     include("scripts/01_bandeau_style.php"); 
       ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	     IF (!isset($_POST['gender']))              {$_POST['gender']        = 1;}	
	     IF (!isset($_POST['error_code']))          {$_POST['error_code']    = 0;}	
	     IF (!isset($_POST['nom']))                 {$_POST['nom']           = "";}	
	     IF (!isset($_POST['prenom']))              {$_POST['prenom']        = "";}	
	     IF (!isset($_POST['mobile']))              {$_POST['mobile']        = "";}	
	     IF (!isset($_POST['email']))               {$_POST['email']         = "";}	
	     IF (!isset($_POST['email2']))              {$_POST['email2']        = "";}	
	     IF (!isset($_POST['adresse']))             {$_POST['adresse']       = "";}			 
	     IF (!isset($_POST['cp']))                  {$_POST['cp']            = "";}	
	     IF (!isset($_POST['ville']))               {$_POST['ville']         = "";}	
	     IF (!isset($_POST['jour_n']))              {$_POST['jour_n']        = "";}	
	     IF (!isset($_POST['ville_n']))             {$_POST['ville_n']       = "";}	
	     IF (!isset($_POST['nationalite']))         {$_POST['nationalite']   = "FR";}	
	     IF (!isset($_POST['id_parrain']))          {$_POST['id_parrain']    = "";}	
	     IF (!isset($_POST['name_parrain']))        {$_POST['name_parrain']  = "";}	

		 
	     IF (isset($_GET['id_parrain']))     
   		         { IF (is_numeric($_GET['id_parrain']) == 1  and ($_GET['id_parrain'] > 0) and ($_GET['id_parrain'] < 100000) )      
			       { $_POST['id_parrain'] = $_GET['id_parrain'];}
                 }	

	     IF (isset($_GET['email']))     
   		         {       IF(get_magic_quotes_gpc())     
						         { $_GET['email']         = stripslashes(trim($_GET['email'])); }
						 IF (strlen(trim($_GET['email'])) < 66 )
						         {
			                       $_POST['email']         = trim($_GET['email']);
								   $_POST['email2']        = trim($_GET['email']);
								  }
                 }					 

	     IF (isset($_GET['name_parrain']))     
   		         { 
 		                 IF(get_magic_quotes_gpc())     
						         { $_GET['name_parrain']  = stripslashes(trim($_GET['name_parrain'])); }
			                       $_GET['name_parrain']  = trim($_GET['name_parrain']);	
				 IF (is_numeric($_GET['name_parrain']) == 0  and strlen(trim($_GET['name_parrain'])) < 40  )      
			       { $_POST['name_parrain'] = trim($_GET['name_parrain']);   }
                 }
?>
</head>
<!-- BEGIN BODY -->
<body class="login">
            <div class="col-md-12">
                        <div class="col-md-2 col-md-offset-10">
                            <!--<a href="?lang=fr_FR"> <img alt="" src="assets/global/img/flags/fr.png"> </a>
                            <a href="?lang=pt_PT"> <img alt="" src="assets/global/img/flags/pt.png"> </a> -->

                            <form name='zeform1' method='post' action='?lang=fr_FR'>
                                     <input type='hidden' name='name_parrain'      value="<?php echo trim($_POST['name_parrain'])?> "   >
                                     <input type='hidden' name='id_parrain'        value="<?php echo trim($_POST['id_parrain'])?> "   >
                            <a href="#" onClick="zeform1.submit();"> <img src="assets/global/img/flags/fr.png"> </a>
                            </form>

							
                            <form name='zeform2' method='post' action='?lang=pt_PT'>
                                     <input type='hidden' name='name_parrain'      value="<?php echo trim($_POST['name_parrain'])?> "   >
                                     <input type='hidden' name='id_parrain'        value="<?php echo trim($_POST['id_parrain'])?> "   >
                            <a href="#" onClick="zeform2.submit();"> <img src="assets/global/img/flags/pt.png"> </a>
                            </form>

                           <!-- <a href="?lang=en_US">  <img alt="" src="assets/global/img/flags/us.png"> </a> -->

                        </div>
            </div>
<!-- BEGIN LOGO -->
    <div class="logo">
    	<a href="index.php">
    		<img src="fichiers/img/logo_yers_admin.png" alt="logo"/>
    	</a>
    </div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">


      <!-- RETOUR DE LA REPONSE API --> 
        <div id="ErrorDiv" class="alert alert-danger display-hide"><?php echo T_("Merci de saisir tous les champs ci-dessous");?> </div>
        <div id="SuccessDiv" class="alert alert-success display-hide"><?php echo T_("Bienvenue chez les Yers");?> ! <br/> <br/> <?php echo T_("Vous venez de recevoir vos codes par mail : Pensez à regarder dans les spams.");?> <br/> <br/> <?php echo T_("N'oubliez pas que n'avez que 5 invitations");?> ! </div>

		<h3 class="form-title">
             <span class="form-title"><?php echo T_("Inscription.");?></span>
		     <span class="form-subtitle"><?php echo T_("Uniquement sur invitation.");?></span>
        </h3>
        
		<hr>
		
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------> 	
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------> 
    
	<FORM class="form-horizontal" id="RecoForm" method="post" role="form" novalidate="novalidate">        
        <div class="form-group"> 
             <div class="check">
             <label class="radio-inline" for="1">
                      <div class="radio-list">  				   
                            <input type="radio" name="gender" value="1" id="1" checked />
                      </div>
                      <span class="loginblue-font">&nbsp;  <?php echo T_("Monsieur");?> </span>
             </label>
             
             <label class="radio-inline" for="2">
                      <div class="radio-list">
                            <input type="radio" name="gender" value="2" id="2"  />
                      </div>
                      <span class="loginblue-font">&nbsp;  <?php echo T_("Madame");?></span>
             </label>
             </div>
        </div> 		
		<!---------------------------------------------------------------------------------------------------------------->
        <div id="ErrorDiv_affiliate_exist" class="alert alert-danger display-hide"><?php echo T_("Oups ! Vous êtes déjà chez nous.");?><br/> <?php echo T_("Faites une demande de mot de passe!");?></div>
        <div id="ErrorDiv_plus_de_place"   class="alert alert-danger display-hide"><?php echo T_("Oups ! Votre parrain n'a plus de place disponible.");?><br/> <?php echo T_("Pas de panique, appelez-le et tout va rentrer dans l'ordre!");?> </div>		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Nom");?></label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
                    <input type="text"         name="nom"         class="form-control placeholder-no-fix" maxlength="40"   pattern="^.+$" required="" placeholder="<?php echo T_("Votre nom");?>"  >							
			</div>
		</div>

        <?php  echo '<input type="hidden" name="lange_parlee"                         value = "'.trim($_SESSION['lang']).'"           /> '; 
		       //echo "Langue parlée  : ".$_SESSION['lang'] ;?>
		<!---------------------------------------------------------------------------------------------------------------->		
       <div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Prénom");?></label>
			<div class="input-icon"> <i class="fa fa-font"></i>
                    <input type="text"         name="prenom"       class="form-control placeholder-no-fix" maxlength="40"  pattern="^.+$" required="" placeholder="<?php echo T_("Votre prénom");?>" >
			</div>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->

        <div id="ErrorDiv_telephone" class="alert alert-danger display-hide"><?php echo T_("Merci de saisir un numéro de téléphone correct.");?> <br/> <i><?php echo T_("Exemple: 0608508812");?></i> </div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Numéro");?></label>
			<div class="input-icon"> <i class="fa fa-phone"></i>
                    <input type="tel"  name="mobile"   class="form-control placeholder-no-fix" maxlength="10"  pattern="^.+$" required="" placeholder="<?php echo T_("Votre N° de téléphone");?>" > 				 
			</div>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->

        <div id="ErrorDiv_mail_different" class="alert alert-danger display-hide"><?php echo T_("Merci de saisir 2 mails identiques!");?> </div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Email");?></label>
			<div class="input-icon"> <i class="fa fa-envelope"></i>
				<input  class="form-control placeholder-no-fix" type="email"  name="email"  placeholder="<?php echo T_("Votre email");?>"  maxlength="85" pattern="^[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required="" value="<?php echo $_POST['email'] ?>" >
			</div>
		</div>		
	    <!---------------------------------------------------------------------------------------------------------------->
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Email");?></label>
			<div class="input-icon"> <i class="fa fa-envelope"></i>
				<input  class="form-control placeholder-no-fix" type="email"  name="email2"  placeholder="<?php echo T_("Confirmer votre email");?>"  maxlength="85" pattern="^[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required="" value="<?php echo $_POST['email2'] ?>"  >
			</div>
		</div>	
	    <!---------------------------------------------------------------------------------------------------------------->

        <div id="ErrorDiv_cp" class="alert alert-danger display-hide"><?php echo T_("Merci de saisir un Code Postal correct.");?> <br/> <i><?php echo T_("Exemples");?></i> : 38000, 91210, ...</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Code Postal");?></label>
			<div class="input-icon"> <i class="fa fa-location-arrow"></i>
                <input  class="form-control placeholder-no-fix"    type="text" name="cp"     maxlength="12"    pattern="^.+$" required="" placeholder="<?php echo T_("Code postal");?>" >			 
			</div>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Ville");?></label>
			<div class="input-icon"> <i class="fa fa-globe"></i>
                <input class="form-control placeholder-no-fix"  type="text" name="ville" maxlength="40"  pattern="^.+$" required="" placeholder="<?php echo T_("Votre ville");?>" >				
			</div>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->

        <div id="ErrorDiv_age" class="alert alert-danger display-hide"><?php echo T_("Merci de saisir une date de naissance qui nous parle!");?>  <br/> <i><?php echo T_("Exemples: 15/07/1979, ...");?></i> </div>
        <div id="ErrorDiv_age2" class="alert alert-danger display-hide"><?php echo T_("Désolé mais tu dois avoir plus de 18 ans.");?> <br/>  <?php echo T_("Attention : nous allons vérifier!");?> </div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Date de naissance");?></label>
			<div class="input-icon"> <i class="fa fa-calendar"></i>
                <input class="form-control placeholder-no-fix" type="text" name="jour_n" placeholder="<?php echo T_("Date de naissance JJ/MM/AAAA");?> " maxlength="10"   pattern="^.+$" required="" >  			 				 
			</div>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->
		<hr>
        <div id="ErrorDiv_id_parrain" class="alert alert-danger display-hide"><?php echo T_("Merci de saisir un ID parrain valide");?> <br/> <i><?php echo T_("Exemples: 6512, 47, ...");?></i> </div>
        <div id="ErrorDiv_parrain_not_exist" class="alert alert-danger display-hide"><?php echo T_("Oups ! Aucun Affilié ne correspond à votre parrain");?> <br/> <i><?php echo T_("Exemples de nom: DURAND, Marc, Sophie, ...");?></i>  <br/><br/> <?php echo T_("N'hésitez pas à appeler votre parrain!");?> </div>		
		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Identifiant du parrain");?></label>
			<div class="input-icon"> <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text"   name="id_parrain"  maxlength="10"  pattern="^.+$"  placeholder="<?php echo T_("ID de votre parrain");?>" value="<?php echo trim($_POST['id_parrain']) ?>" >				
			</div>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9"><?php echo T_("Nom du parrain");?></label>
			<div class="input-icon"> <i class="fa fa-font"></i>
                    <input class="form-control placeholder-no-fix"  type="text" name="name_parrain" maxlength="50" float:right   pattern="^.+$"  placeholder="<?php echo T_("Nom ou prénom de votre parrain");?>"  value="<?php echo trim($_POST['name_parrain']) ?>"  title="<?php echo T_("Pas besoin de respecter les majuscules ou minuscules");?>">
			</div>
		</div>
		
	    <!----------------------------------------------------------------------------------------------------------
		<div class="form-group">
			<label class="check">
                <input type="checkbox" name="pas_de_parrain_nosrezo" value="1" ><span class="loginblue-font"> <?php echo T_("Vous n'avez pas de parrain NosRezo");?></span></a>				 					 
			</label>
		</div>
		
		<hr>
	    <!---------------------------------------------------------------------------------------------------------------->

        <div id="ErrorDiv_cond_checked" class="alert alert-danger display-hide"><?php echo T_("Merci d'accepter les conditions suivantes si vous souhaitez nous rejoindre");?></div>
		<div class="form-group">
			<label class="check">
			<input type="checkbox" name="c_g_i" value="1" ><span class="loginblue-font"> <?php echo T_("Vous acceptez les");?> <a href="fichiers/Documents/NosRezo - Conditions d'Inscriptions V0.1.pdf" target="_blank"><u><?php echo T_("Conditions générales d'inscription");?></u></span></a>
			</label>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->
		<div class="form-group">
			<label class="check">
                <input type="checkbox" name="plus_de_18_ans" value="1" ><span class="loginblue-font"> <?php echo T_("Vous certifiez avoir plus de 18 ans");?></span></a>				 					 
			</label>
		</div>
	    <!---------------------------------------------------------------------------------------------------------------->
		
		<div class="form-actions">
        	<a href="index.php" target="_blank" class="btn btn-default"><?php echo T_("Retour");?></a>
			<button type="submit" id="register-submit-btn" class="btn btn-primary uppercase pull-right"><?php echo T_("Devenir membre");?></button>
		</div>
		
	</FORM>
        
		<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
	    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
	    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
	    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->

<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/admin/pages/scripts/table-managed.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/admin/pages/scripts/form-wizard.js"></script>
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/moment.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="assets/admin/pages/scripts/components-pickers.js"></script>	 
<script src="assets/global/plugins/icheck/icheck.min.js"></script>
<script src="assets/global/plugins/retina.min.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/timeline.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS --><!-- END PAGE LEVEL SCRIPTS -->
<script>
var FormValidation = function () {
	// basic validation
	// for more info visit the official plugin documentation: 
	// http://docs.jquery.com/Plugins/Validation
	var handleValidation1 = function () {
		var RecoForm = $('#RecoForm');
		var error1 = $('#ErrorDiv');
		var error_telephone = $('#ErrorDiv_telephone');	
		var error_mail_different = $('#ErrorDiv_mail_different');
		var error_cp = $('#ErrorDiv_cp');
		var error_age = $('#ErrorDiv_age');	
        var error_age2 = $('#ErrorDiv_age2');
        var error_id_parrain = $('#ErrorDiv_id_parrain');
        var error_cond_checked = $('#ErrorDiv_cond_checked');
        var error_parrain_not_exist = $('#ErrorDiv_parrain_not_exist');
        var error_affiliate_exist = $('#ErrorDiv_affiliate_exist');	
        var error_affiliate_plus_de_place = $('#ErrorDiv_plus_de_place');				

		var success1 = $('#SuccessDiv');
	
		RecoForm.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "", // validate all fields including form hidden input
			messages: {
				select_multi: {
					maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
					minlength: jQuery.validator.format("At least {0} items must be selected")
				}
			},
			rules: {
				nom: {
					minlength: 2,
					required: true
				},
				prenom: {
					minlength: 2,
					required: true
				},
				mobile: {
					required: true,
					minlength: 8
				},
				email: {
					required: true,
					email: true
				},
				email2: {
					required: true,
					email: true
				},
				cp: {
					required: true,
					minlength: 4
				},
				ville: {
					required: true,
					minlength: 3
				},
				jour_n: {
					required: true,
					minlength: 8
				},
				//   id_parrain: {
				//   	required: true,
				//   	minlength: 2
				//   },
				//   name_parrain: {
				//   	required: true,
				//   	minlength: 2
				//   },

			},
	
			invalidHandler: function (event, validator) { //display error alert on form submit              
				success1.hide();
				error1.show();
				Metronic.scrollTo(error1, -200);
			},
	
			highlight: function (element) { // hightlight error inputs
				$(element)
					.closest('.form-group').addClass('has-error'); // set error class to the control group
			},
	
			unhighlight: function (element) { // revert the change done by hightlight
				$(element)
					.closest('.form-group').removeClass('has-error'); // set error class to the control group
			},
	
			success: function (label) {
				label
					.closest('.form-group').removeClass('has-error'); // set success class to the control group
			},
			// FUNCTION SI TOUT EST OK
			submitHandler: function (form) {
				
				// APPEL AJAX
				$.post('scripts/api_inscription.php', $(form).serialize(), function(data) {
	
	            error1.hide();
				error_telephone.hide();
				error_mail_different.hide();
				error_cp.hide();
				error_age.hide();
				error_age2.hide();
				error_id_parrain.hide();
				error_cond_checked.hide();
				error_parrain_not_exist.hide();
				error_affiliate_exist.hide();
				error_affiliate_plus_de_place.hide();
				
				error1.hide();
	
				if(data == 100) { 
					success1.show(); 
					$('html,body').find('input, button, textarea, select').prop('disabled', true);
					$('html,body').animate({scrollTop: 0}, 'slow');
				} else {				
                          if(data == 4)   { 
					                        error_telephone.show(); 
					                        $('html,body').animate({scrollTop: 0}, 'slow');	
										  }
                    else  if(data == 5)   { 
					                        error_mail_different.show(); 
					                        $('html,body').animate({scrollTop: 0}, 'slow');
										  }
                    else  if(data == 6)   { 
					                        error_cp.show(); 
					                        $('html,body').animate({scrollTop: 0}, 'slow');
										  }
                    else  if(data == 9)   { 
					                        error_age.show(); 
										  }
                    else  if(data == 10)  { 
					                        error_age2.show(); 
										  }
                    else  if(data == 11)  { 
					                        error_id_parrain.show(); 
										  }
                    else  if(data == 12)  { 
					                        error_cond_checked.show(); 
										  }
                    else  if(data == 13)  { 
					                        error_parrain_not_exist.show(); 
										  }
                    else  if(data == 14)   { 
					                        error_affiliate_exist.show(); 
					                        $('html,body').animate({scrollTop: 0}, 'slow');
										  }
                    else  if(data == 20)  { 
					                        error_affiliate_plus_de_place.show(); 
					                        $('html,body').animate({scrollTop: 0}, 'slow');
										  }
                    else  if(data == 0)  { 
					                        error1.show();
					                        $('html,body').animate({scrollTop: 0}, 'slow');	
						                    error1.text('<?php echo T_("Inscription non disponible merci de contacter le support à contact@nosrezo.com"); ?>');  
										  }
				} 
				
				return false;
	
	})
				
			}
			
		});
	}();

	return {
		//main function to initiate the module
		init: function () {
			handleValidation1();
		}

	};

}();
</script> 
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
          Metronic.init(); // init metronic core components
          Layout.init(); // init current layout
          Demo.init();
	      FormValidation.init(); // ALEX: INIT FORM VALIDATION
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>