<?php

require ('/inc/user_lib.php');
include ('/../main_files/inc/lib.php');
db_connect();
 $SA = $_POST['SA'];
 $CG = $_POST['CG'];
 $DG = $_POST['DG'];
 $AG = $_POST['AG'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $fullname = $_POST['fullname'];
 $email = $_POST['email'];
 
 switch ($SA)
 {
 	case '':
 		$SA = 'no';
 		break;
 	case 'SA' :
 		$SA = 'yes';
 		break;
 }
 
 switch ($CG)
 {
 	case '':
 		$CG = 'no';
 		break;
 	case 'CG' :
 		$CG = 'yes';
 		break;
 }
 
 switch ($DG)
 {
 	case '':
 		$DG = 'no';
 		break;
 	case 'DG' :
 		$DG = 'yes';
 		break;
 }
 
 switch ($AG)
 {
 	case '':
 		$AG = 'no';
 		break;
 	case 'AG' :
 		$AG = 'yes';
 		break;
 }
 
 switch ($_POST['action']){
 	
 	case 'add_user':
    insert_user ($username, $password, $fullname, $email, $SA, $CG, $DG, $AG);
    break;
 	case 'update_user':
 	update_user();
 	break;
 	case 'update_permissions':		
 	update_permissions($SA, $CG, $DG, $AG, $username);
 	break;
 	case 'update_password':
 	update_password($username, $password, $email);
 	break;
 }
 		