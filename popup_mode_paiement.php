<!-- BEGIN STYLE MENU -->         <?php     include("scripts/01_bandeau_style.php");        ?>     <!-- END STYLE MENU -->
<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/02_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="page-fixed-main-content">     <!-- #3  --> 
                
                                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Mode de paiement</span>
                                    </div>
                                  
                                </div>
                                <div class='portlet-body form'>
                                    <form class='form-horizontal' role='form'>
                                        <div class='form-body'>
                                        
                                        <div class='form-group'>
                                                <label class='col-md-12'>Prix du pack 5$ par mois</label>
                                                <br><br>
                                                <div class='col-md-12'>
                                                    <div class='mt-radio-list'>
                                                        <label class='mt-radio mt-radio-line'>
                                                            <input type='radio' name='optionsRadios' id='optionsRadios22' value='option1' > Direct
                                                            <span></span>
                                                        </label>
                                                        <label class='mt-radio mt-radio-line'>
                                                            <input type='radio' name='optionsRadios' id='optionsRadios23' value='option2' > Abonnement mensuel
                                                            <span></span>
                                                        </label>
                                                       
                                                    </div>
                                                </div>
                                            </div>
             
                                        </div>
                                        <div class='form-actions'>
                                            <div class='row'>
                                                <div class='col-md-12'>
                                                    <button type='submit' class='btn green'>Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->


                <!-- BEGIN FOOTER -->          <?php  include("scripts/10_bandeau_footer.php");  ?>    <!-- END FOOTER -->	
                </div> <!-- #3  --> 
            </div> <!-- #2  --> 
        </div> <!-- #1 --> 
<!-- BEGIN FOOTER -->          <?php  include("scripts/11_bandeau_footer_scripts.php");  ?>    <!-- END FOOTER -->		
</body>

</html>