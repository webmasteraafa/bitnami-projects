<?php
		require ('inc/api_lib.php');
		$username = get_kfa_user();
        $password="";
         $url = 	'http://community.kidswithfoodallergies.org/api/v1/members/5090535480302550?m_id=1571083423419120';
            $json = curl_json($username, $password, $url); 	
        
			$x= 0;
            $firstname='';
            $lastname= '';
            $research = '';
            $postalcode='';
            $newlydiagnosed='';
            $subscribe ='';
            $country='';
            $playgroups1='';
            $playgroups2='';
            $subscribe ='';
            
        while ($x <= 11)
        {   
        	$field = $json['customProfileFields'][$x]['name'];
            switch ($field){
            
            case 'First Name (Private)':
			$firstname = $json['customProfileFields'][$x]['value'];
			//$firstname = mysql_real_escape_string($firstname);
			echo $firstname;
			break;
			case 'Last Name (Private)':
			$lastname = $json['customProfileFields'][$x]['value'];
			//$lastname = mysql_real_escape_string($lastname);
			echo $lastname;
			break; 
			case 'Postal/Zip code (Archive)':
			$postalcode = $json['customProfileFields'][$x]['value'];
			//$postalcode = mysql_real_escape_string($postalcode);
			echo $postalcode;
			break;
			case 'Country (Archive)':
			$country = $json['customProfileFields'][$x]['value'];
			echo $country;
			break; 
			case 'I am a':
			$custprofilename2 =  $custprofilename = $json['customProfileFields']['$x']['selectedOptions']['0']['title'];         
			echo $custprofilename2;
			break;
			case 'Referred from:':
			$reference = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            //$reference = mysql_real_escape_string($reference);
            echo $reference;
            break;
            
			case 'I manage':
			include ('inc/foodallergymanage.php');   
			break;
			
			case 'Newly diagnosed?':			
			$newlydiagnosed = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            
            echo $newlydiagnosed;
            break;
			case 'Would you like to find out more about research opportunities or clinical trials that will help shape the future for those living with asthma and allergies?':
			$research =  $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
			//$research = mysql_real_escape_string($research);
			echo $research;
			break;
		    case 'Playgroups':
		    $playgroups1 = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            $playgroups2 = $json['customProfileFields'][$x]['selectedOptions']['1']['title'];
      		
      		echo $playgroups1;
      		echo $playgroups2;
      		break;
            case 'Subscribe to enews (Archive)':
         	$subscribe = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            echo $subscribe;
            break;
            
       		}
       		$x = $x +1;
         }
         
        
?>