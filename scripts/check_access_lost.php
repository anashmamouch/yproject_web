<?php  
     /// MODULE D'ENVOI DU MOT DE PASSE OUBLIÉ
     /// $ID_AFFILIATE EST SOIT UN ID, SOIT UN EMAIL
 
     session_start();
	 require('functions.php');
	 include('config.php'); 
     List ($connection_database, $connection_ok , $message_erreur )= PDO_CONNECT("", "", "");
	 $email    =  trim(mysqli_real_escape_string($connection_database, $_POST['email'] )); 
	 $email    =  strtolower($email);
		
	IF ( $email <> "" )
	{		
					 
					 $sql = "SELECT count(*) as is_exist, ad.id_affiliate, aa.password, ad.first_name, ad.last_name, ad.email, aa.id_partenaire, aa.id_upline, mode, triforce_grade, habilitation  , sous_habilitation
  	      		                                             FROM affiliate_details ad, affiliate aa 
										                     WHERE ad.id_affiliate = aa.id_affiliate 
										                     AND   aa.is_activated = 1 
										                     AND   email = :email   limit 0, 1";
					 
					 try {
					 	$stmt = $connection_database->prepare ( $sql );
					 	$stmt->execute ( array (
					 			':email' => $email
					 	) );
					 	$dn = $stmt->fetch ( PDO::FETCH_ASSOC );
					 } catch ( PDOException $e ) {
					 	die ( $e->getMessage () );
					 }
		
		//ON LE COMPARE A CELUI QU IL A ENTRÉ ET ON VERIFIE SI LE MEMBRE EXISTE
				
		IF( trim($dn['email'])== $email and count($dn) > 0 )
		     { 
             INSERT_ACTION_LIST($connection_database, 0, "Send MDP oublié", 6, $email, 0,0,$dn['id_affiliate'], "FERME", " Email : [ ".$email." ]" ,"", "Service Admin", 0, "", "", 0);
			 //SEND_PASSWORD($dn['email'], "OUBLIE");
    		 echo '<body onLoad="alert(\'Votre email est reconnu, vous allez recevoir votre nouveau mot de passe : Pensez aux spams !.\')">'; 	
             echo '<meta http-equiv="refresh" content="0; URL=../login.php ">'; 			
			 }
		ELSE
		    {

                      echo '<meta http-equiv="refresh" content="0; URL=../login.php ">'; 
 		  	          echo '<body onLoad="alert(\'Votre email est inconnu ou inactif ! Merci de contacter : '.$mail_support.'\')">'; 
            }				   
    }
	 ELSE
		     {
            echo '<meta http-equiv="refresh" content="0; URL=../login.php ">'; 
 			echo '<body onLoad="alert(\'Votre email est vide !\')">'; 
		     }	 
?>

