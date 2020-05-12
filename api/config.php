<?php
  function  db_connect(){
  	define('SQL_HOST','localhost:3307');
	define('SQL_USER','root');
	define('SQL_PASS','baby2013');
	define('SQL_DB','hoopla');
	
	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	  or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	  or die ('Could not select database; ' . mysql_error());
	  echo "connected";
  }
  
  function curl_aafa ($username, $password, $url){
  	$username="9cfdf02a35f6e477b7a06603fe1ab30b";
    $password=""; 
     
    $ch = curl_init();
    if($ch === false) echo "cURL is not supported?";
    // Set some options - we are passing in a useragent too here
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Send the request & save response to $resp
    $resp_aafa = curl_exec($ch);
    // Close request to clear up some resources
    curl_close($ch);

    return $resp_aafa;
  }
  
  function curl_kfa($url){
  	$username="e7513e717b081e346302c2642c35faeb";
    $password=""; 

    $ch = curl_init();
    if($ch === false) echo "cURL is not supported?";
     // Set some options - we are passing in a useragent too here
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     // Send the request & save response to $resp
     $resp_kfa = curl_exec($ch);
     curl_close($ch);
     return $resp_kfa;
  }
  
  function get_options ($option){
  	switch ($option){
		case 'Peanut Allergy':
		$peanut = "yes";
		return $peanut;
		break;
		case 'Milk Allergy':
		$milk = "yes";
		return $milk;
		break;
		case 'Egg Allergy':
		$egg = "yes";
		return $egg;
		break;
		case 'Soy Allergy':
		$soy = "yes";
		return $soy;
		break;
		case 'Tree Nut Allergy':
		$treenut = "yes";
		return $treenut;
		break;
		case 'Wheat Allergy':
		$wheat = "yes";
		return $wheat;
		break;
		case 'Shellfish Allergy':
		$shellfish = "yes";
		return $shellfish;
		break;
		case 'Sesame Allergy':
		$sesame = "yes";
		return $sesame;
		break;
		case 'Not Applicable':
		$na = "n/a";
		return $na;
		break;
		case 'Unknown/Undiagnosed':
		$unknown = "yes";
		return $unknown;
		break;
		case 'Lactose Intolerance':
		$lactose = "yes";
		return $lactose;
		break;
		case 'Fish Allergy':
		$fish = "yes";
		return $fish;
		break;
		case 'Food Protein Induced Enterocolitis Syndrome':
		$fpies = "yes";
		return $fpies;
		break;
		case 'Eosinophilic Gastrointestinal Disorder':
		$eos = "yes";
		return $eos;
		break;
		case 'Other Food Allergy or Intolerance':
		$otherfood = "yes";
		return $otherfood;
		break;
		case 'Celiac Disase':
		$celiac ='yes';
		return $celiac;
		break;
  	    case '':
		$none ='no';
		return $none;
		break;
	  }
  	
  }
  function get_options_kfa ($option){
  	switch ($option){
		case 'Peanut Allergy':
		$peanut = 'yes';
		break;
		case 'Milk Allergy':
		$milk= 'yes';
		break;
		case 'Egg Allergy':
		$egg = 'yes';
		break;
		case 'Soy Allergy':
		$soy = 'yes';
		break;
		case 'Tree Nut Allergy':
		$treenut = 'yes';
		break;
		case 'Wheat Allergy':
		$wheat = 'yes';
		break;
		case 'Shellfish Allergy':
		$shellfish = 'yes';
		break;
		case 'Sesame Allergy':
		$sesame = 'yes';
		break;
		case 'Not Applicable':
		$na = 'yes';
		break;
		case 'Unknown/Undiagnosed':
		$unknown = 'yes';
		break;
		case 'Lactose Intolerance':
		$lactose = 'yes';
		break;
		case 'Fish Allergy':
		$fish = 'yes';
		break;
		case 'Food Protein Induced Enterocolitis Syndrome':
		$fpies = 'yes';
		break;
		case 'Eosinophilic Gastrointestinal Disorder':
		$eos = 'yes';
		break;
		case 'Other Food Allergy or Intolerance':
		$otherfood = 'yes';
		break;
		case 'Celiac Disase':
		$celiac ='yes';
		break;
  	    case '':
		$none ='no';
		break;
	  }
  	
  }
  
  
   function clean_email($emailAddress){
   	$emailAddress = mysql_real_escape_string($emailAddress);
   	return $emailAddress;
   }
   function clean_display_names($displayName){

    $displayName = mysql_real_escape_string($displayName);
    return $displayName;
   }
   function get_aafa_options($option){
     switch ($options)
	 {
		 case "Asthma" :
		 $asthma ='yes';
		 return $asthma;
		 break;
		 case "Food Allergies":
		 $food = "yes";
		 return $food;
		 break;
		 case "Eczema":
		 $eczema="yes";
		 return $eczema;
		 break;
		 case "Pollen Allergies":
		 $pollen = "yes";
		 return $pollen;
		 break;
		 case "Drug Allergies":
		 $drug = "yes";
		 return $drug;
		 break;
		 case "Insect Allergies":
		 $insect = "yes";
		 return $insect;
         break;
		 case "Latex Allergies":
		 $latex = "yes";
		 return $latex;
		 break;
		 case "Mold Allergies":
		 $mold = "yes";
		 return $mold;
         break;
		 case "Other":
		 $other = "yes";
		 return $other;
		 break;
		 case "Not Applicable":
		 $na = "N/A";
		 return $na;
         break;
		 case "":
		 $none = "no";
		 return $none;
         break;
	 }





   }
?>