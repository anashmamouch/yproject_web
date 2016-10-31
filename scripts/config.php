<?php

ini_set('error_reporting', -1);
ini_set('display_errors', 1);
ini_set('html_errors', 1);

// FICHIER DE CONFIGURATION - TOUS LES SCRIPTS FONT APPEL A CE MODULE

	     $minimum_facture_a_encaisser =  200;
		 $nom_facture				  =  'SAS Y';
         $mail_communication          =  'contact@yersproject.com';
         $mail_parrain_siege          =  'contact@yersproject.com';
	     $nom_prenom_parrain_siege    =  'Y - Siège';
	     $telephone_siege             =  '0686495254';
	     $tel_responsable_tech        =  '0627306280';
	     $nom_responsable_tech        =  'Mathieu GUIBERT';
		 $mail_partenaire             =  'contact@yersproject.com'; 
		 $mail_responsable_tech       =  'contact@yersproject.com';
	     $mail_support                =  'contact@yersproject.com'; 
         $adresse_siege_1             =  'Immeuble Le Redline';
         $adresse_siege               =  '85, avenue Georges Frêche';
		 $code_postal_siege           =  '34170';
		 $ville_siege                 =  'CASTELNAU-LE-LEZ';
         $immat_rcs                   =  '814 267 480 RCS';
         $tva_intracommunautaire      =  'FR 42814267480';		 
         $ville_bon_de_commande       =  'CASTELNAU-LE-LEZ';	

	     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	     // ÉSTHÉTIQUE
		 $fabolt       = '<div class="label label-sm label-danger">  <i class="fa fa-bolt"> </i> </div> ';
         $faplus       = '<div class="label label-sm label-info">    <i class="fa fa-plus"> </i> </div> ';
         $fabell       = '<div class="label label-sm label-info">    <i class="fa fa-bell"> </i> </div> ';		 
         $fafile       = '<div class="label label-sm label-info">    <i class="fa fa-file"> </i> </div> ';
         $favalide     = '<h3> <span class="label label-success">  VALIDÉ </span> </h3>';
         $faprogress   = '<h3> <span class="label label-warning">  EN COURS </span> </h3>';
         $faprogress2  = '<h3> <span class="label label-success">  EN COURS </span> </h3>';
		 $faclose      = '<div class="label label-sm label-danger">  <i class="fa fa-times"> </i> </div> ';		 
		 $facheck      = '<div class="label label-sm label-success"> <i class="fa fa-check"> </i> </div> ';		 
		 

		 $faEquipe   = '<form action="Intranet_equipe_liste.php" id="form_sample_3"  method="post"> 
                                    <input type="hidden" name="affiliate_level"       value = "FULL" />
	                                <button type="submit" class="btn btn-circle blue btn-sm"> &nbsp TOTAL ÉQUIPE YERS &nbsp </button>
			            </form>';		 

		$fauser1     = '<form action="Intranet_equipe_liste.php" id="form_sample_3"  method="post"> 
                                    <input type="hidden" name="affiliate_level"       value = 1 />
	                                <button type="submit" class="btn btn-circle btn-sm">  <i class="fa fa-user"></i> </button>
			            </form>';

		$fauser2     = '<form action="Intranet_equipe_liste.php" id="form_sample_3"  method="post"> 
                                    <input type="hidden" name="affiliate_level"       value = 2 />
	                                <button type="submit" class="btn btn-circle btn-sm"> <i class="fa fa-user"></i> <i class="fa fa-user"></i> </button>
			            </form>';
						
		$fauser3     = '<form action="Intranet_equipe_liste.php" id="form_sample_3"  method="post"> 
                                    <input type="hidden" name="affiliate_level"       value = 3 />
	                                <button type="submit" class="btn btn-circle btn-sm"> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i>  </button>
			            </form>';

		$fauser4     = '<form action="Intranet_equipe_liste.php" id="form_sample_3"  method="post"> 
                                    <input type="hidden" name="affiliate_level"       value = 4 />
	                                <button type="submit" class="btn btn-circle btn-sm"> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i>  </button>
			            </form>';

		$fauser5     = '<form action="Intranet_equipe_liste.php" id="form_sample_3"  method="post"> 
                                    <input type="hidden" name="affiliate_level"       value = 5 />
	                                <button type="submit" class="btn btn-circle btn-sm"> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i>  <i class="fa fa-user"></i>  </button>
			            </form>';		 
		 

?>


