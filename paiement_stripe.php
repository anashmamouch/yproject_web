<!-- BEGIN STYLE MENU -->         <?php     include("scripts/01_bandeau_style.php");        ?>     <!-- END STYLE MENU -->
<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/02_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     //include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="">     <!-- #3  --> 
   
<?php
IF( $_SESSION['id_affiliate'] > 0   )
   {   	

   	?>
   	 <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class='portlet light bordered'>
                                <div class='portlet-title'>
                                    <div class='caption'>
                                        <i class='fa fa-credit-card' aria-hidden='true'></i>
                                        <span class='caption-subject font-dark sbold uppercase'>Mode de paiement</span>
                                    </div>
                                  
                                </div>
                                <div class='portlet-body form'>
                                    <form class='form-horizontal' class="js-ajax-php-json" role='form' action='scripts/API/api_stripe.php' method='POST'>
                                        <input type='hidden' name='amount'                   value='<?php echo $_POST['prix_pack_ttc']*100; ?>' />  
                                        <input type='hidden' name='plan'                     value='<?php echo strtolower($_POST['nom_pack']); ?>' /> 
                                        <input type='hidden' name='id_affiliate'             value='<?php echo $_POST['id_affiliate']; ?>' />  
                                        <input type='hidden' name='id_pack'                  value='<?php echo strtolower($_POST['id_pack']); ?>' />  
                                        <input type='hidden' name='prix_pack_ttc'            value='<?php echo $_POST['prix_pack_ttc']; ?>' /> 
                                        <input type='hidden' name='prix_pack_ht'             value='<?php echo $_POST['prix_pack_ht']; ?>' /> 										
                                        <input type='hidden' name='tva_percent_to_pay'       value='<?php echo $_POST['tva_percent_to_pay']; ?>' />
                                        <input type='hidden' name='id_customer'              value='<?php echo $_POST['id_customer']; ?>' /> 
										
                                        <div class='form-body'>
                                        
                                        <div class='form-group'>
                                                <label class='col-md-12'>Prix du pack <?php echo $_POST['prix_pack_ttc']; ?>€ par mois</label>
                                                <br><br>
                                                <div class='col-md-12'>
                                                    <div class='mt-radio-list'>
                                                        <label class='mt-radio mt-radio-line'>
                                                            <input type='radio' name='mode' id='checkout' value='checkout' checked="checked" > Direct
                                                            <span></span>
                                                        </label>
                                                        <label class='mt-radio mt-radio-line'>
                                                            <input type='radio' name='mode' id='subscription' value='subscription' > Abonnement mensuel
                                                            <span></span>
                                                        </label>
                                                       
                                                    </div>
                                                </div>
                                            </div>
             
                                        </div>
                                        <div class='form-actions'>
                                            <div class='row'>
                                                <div class='col-md-2'>
                                                    <a href='Intranet_order_bundles.php' class='btn grey'>Retour</a>
                                                </div>
                                                <div class='col-md-2'>
                                               
                                                    <script
													    src='https://checkout.stripe.com/checkout.js' class='stripe-button'
													    data-key='pk_test_bTUUNC56PLB1L6AUZYAdEuMx'
													    data-amount='<?php echo $_POST['prix_pack_ttc']*100; ?>'
													    data-name='Y_PROJECT.com'
													    data-description='Description'
													    data-image='https://stripe.com/img/documentation/checkout/marketplace.png'
													    data-locale='auto',
													    data-currency='eur',
													    data-label='Passer la commande',
													    data-allowRememberMe = 'false',
													    data-zip-code='false'>
													  </script>
													  
													  <script src="https://checkout.stripe.com/checkout.js"></script>


                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            
                            
   	<?php
   	
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
       
<!--

//-->
</script>
</html>