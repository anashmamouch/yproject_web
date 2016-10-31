<!-- BEGIN STYLE MENU -->         <?php     include("scripts/01_bandeau_style.php");        ?>     <!-- END STYLE MENU -->
<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/02_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="page-fixed-main-content">     <!-- #3  --> 

<?php
IF( $_SESSION['id_affiliate'] > 0   )
{

	$listPacks = RETURN_INFOS_PACKS($connection_database,$_SESSION['id_affiliate']);

	echo "<div class='col-md-12 margin-bottom-40'>";
	echo "<h2 class='text-center'>Votre formule Yers</h2>";
	echo "<div class='pricing-table margin-top-40'>";

	foreach ($listPacks as $pack){
		 
		echo "<div class='pricing-option'>";
		echo "<h1>".$pack['nom_pack']."</h1>";
		echo "<hr />";
		echo "<h6>Accès à la conciergerie des startups</h6>";
		echo "<hr />";
		echo "<h5>Avantages :</h5>";
		echo "<img src='fichiers/img/partenaires/fnac.jpg'>";
		echo "<img src='fichiers/img/partenaires/hertz.jpg'>";
		echo "<img src='fichiers/img/partenaires/apple.jpg'>";
		echo "<img src='fichiers/img/partenaires/karavel.jpg'>";
		echo "<img src='fichiers/img/partenaires/triforce.jpg'>";
		echo "<img src='fichiers/img/partenaires/jarvis_conseils.jpg'>";
		echo "<hr />";
		echo "<h6>Revente des datas</h6>";
		echo "<hr />";
		echo "<h6>Accès aux tableaux de bord</h6>";
		echo "<hr />";
		echo "<h6>développement de son organisation</h6>";
		echo "<hr />";
		echo "<h6>Coefficient de rémunération :</h6>";
		echo "<h4 class='bold'>0,1</h4>";
		echo "<hr />";
		echo "<div class='price'>";
		 
		if($pack['prix_pack_ttc'] == 0){
			echo "<div class='front'>";
			echo "<span class='price'>Gratuit</span>";
			echo "</div>";
			echo "<div class='back'>";

			if ($pack['is_subscribe'] == 1){
				echo "Déjà inscrit";
			}else{
				echo "<form action='scripts/API/api_pass_order_pack.php' method='POST'>";
				echo "<input type='submit'  value='Choisir'>";
				echo "<input type='hidden' value='".$pack['id_pack']."' name='id_pack'>";
				echo "<input type='hidden' value='".$pack['prix_pack_ttc']."' name='prix_pack_ttc'>";
				echo "<input type='hidden' value='".$pack['prix_pack_ht']."' name='prix_pack_ht'>";
				echo "<input type='hidden' value='".$pack['tva_percent_to_pay']."' name='tva_percent_to_pay'>";
				echo "<input type='hidden' value='".$_SESSION['id_affiliate']."' name='id_affiliate'>";
				echo "<input type='hidden' value='".$pack['nom_pack']."' name='nom_pack'>";
				echo "<input type='hidden' value='".$pack['id_customer']."' name='id_customer'>";
				echo "<input type='hidden' value='' name='mode_paiement'>";
				echo "</form>";
			}

			echo "</div>";
		}else{
			echo "<div class='front'>";
			echo "<span class='price'>".$pack['prix_pack_ttc']."<b>€</b>&nbsp; /mois</span>";
			echo "</div>";
			echo "<div class='back'>";

			if ($pack['is_subscribe'] == 1){
				echo "Déjà inscrit";
			}else{
				echo "<form action='paiement_stripe.php' method='POST'>";
				echo "<input type='submit'  value='Choisir'>";
				echo "<input type='hidden' value='".$pack['id_pack']."' name='id_pack'>";
				echo "<input type='hidden' value='".$pack['prix_pack_ttc']."' name='prix_pack_ttc'>";
				echo "<input type='hidden' value='".$pack['prix_pack_ht']."' name='prix_pack_ht'>";
				echo "<input type='hidden' value='".$pack['tva_percent_to_pay']."' name='tva_percent_to_pay'>";
				echo "<input type='hidden' value='".$pack['nom_pack']."' name='nom_pack'>";
				echo "<input type='hidden' value='".$pack['id_customer']."' name='id_customer'>";
				echo "<input type='hidden' value='".$_SESSION['id_affiliate']."' name='id_affiliate'>";
				echo "</form>";
			}

			echo "</div>";
		}
		 

		echo "</div>";
		echo "</div>";
	}

	echo "</div>";
	echo "</div>";
	echo "</div>";

	 
}
ELSE
{
	echo '<form name="p_action"  action="login.php" method="post"> ';
	echo '<script language="JavaScript">document.p_action.submit();</script></form> ';
}
?>	

              
</div>

                <!-- BEGIN FOOTER -->          <?php  include("scripts/10_bandeau_footer.php");  ?>    <!-- END FOOTER -->	
                </div> <!-- #3  --> 
            </div> <!-- #2  --> 
        </div> <!-- #1 --> 
<!-- BEGIN FOOTER -->          <?php  include("scripts/11_bandeau_footer_scripts.php");  ?>    <!-- END FOOTER -->		
</body>

 <!-- BEGIN CORE PLUGINS -->
       
<!--

//-->
</script>
</html>