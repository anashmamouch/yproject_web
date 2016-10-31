<!-- BEGIN STYLE MENU -->         <?php     include("scripts/1_bandeau_style.php");        ?>     <!-- END STYLE MENU -->
<body class="page-md">
<!-- BEGIN HEADER TOP -->         <?php     include("scripts/2_bandeau_header.php");         ?>   <!-- END HEADER TOP -->
        <div class="container-fluid">                     <!-- #1  --> 
            <div class="page-content page-content-popup"> <!-- #2  --> 
            <!-- BEGIN HEADER MENU -->   <?php     include("scripts/03_bandeau_menu_intranet.php");  ?>   <!-- END HEADER MENU -->				
                <div class="page-fixed-main-content">     <!-- #3  --> 
<?php
IF( $_SESSION['id_affiliate'] > 0   )
    { ?>	
				<div class="col-md-12">
					<div class="portlet light col-md-12">
					

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