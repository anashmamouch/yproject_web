<?php
    // POUR TESTER : http://localhost/YWORLD/scripts/autocomplete/affiliate_getautocomplete.php?term=A11

     include('../functions.php'); 
	 include('../config_master.php');
     List ($connection_database, $connection_ok , $message_erreur )= PDO_CONNECT("", "", "");	  
	 
     $term         = trim(stripslashes($_GET["term"]));
     $term         = addslashes($term);
	 $id_affiliate = trim(substr($term, 1, 8));
	 
	 IF ( substr($term,0,1) == "A"  AND is_numeric($id_affiliate) == 1 )
	 {
     $sql          = " SELECT ad.last_name, ad.first_name, ad.id_affiliate, ad.zip_code, ad.city, ad.email, aa.id_partenaire, ad.phone_number
	                       FROM affiliate_details  ad , affiliate aa
						   WHERE     ad.id_affiliate = aa.id_affiliate 
						   AND       ad.id_affiliate LIKE '".$id_affiliate."%'							 
						   ORDER  by ad.id_affiliate ";	 
	 }
	 ELSE
	 {
     $sql          = " SELECT ad.last_name, ad.first_name, ad.id_affiliate, ad.zip_code, ad.city, ad.email, aa.id_partenaire , ad.phone_number
	                       FROM affiliate_details  ad , affiliate aa
						   WHERE     ad.id_affiliate = aa.id_affiliate
						   AND (     trim(CONCAT( trim(ad.last_name),  ' ', trim(ad.first_name) )) LIKE '%".$term."%' 
						         OR  trim(CONCAT( trim(ad.first_name), ' ', trim(ad.last_name) ))  LIKE '%".$term."%'
                                 OR  trim(ad.city)       LIKE  '%".$term."%'
                                 OR  trim(ad.email)      LIKE  '%".$term."%'
								 OR  trim(ad.zip_code)   LIKE  '%".$term."%'
								 OR  ad.id_affiliate     LIKE  '%".$term."%'
								 OR  aa.id_partenaire    LIKE  '%".$term."%'
								 OR  ad.phone_number     LIKE  '%".$term."%'
								 )							 
						   ORDER  by ad.last_name ";
    }
	

    $stmt = $connection_database->query($sql);
     				   
    $json   = array();
 
    WHILE( $student = $stmt->fetch(PDO::FETCH_ASSOC) )
	{		 
		 $json[]=array(
                         'value'=>$student["id_affiliate"],
                         'label'=>$student["last_name"].'  '.$student["first_name"].' - '.$student["zip_code"].'  '.$student["city"].' - '.$student["email"].' - A'.$student["id_affiliate"].' - '.$student["phone_number"],
                         'zip_code'=>$student["zip_code"],
					     'city'=>$student["city"]
                      );
    }
 
 echo json_encode($json);
 
?>