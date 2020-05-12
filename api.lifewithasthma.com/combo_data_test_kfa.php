<?php
   require ('inc/api_lib.php');
    
    db_connect_api();
    $username = get_kfa_user();
    $password=""; 
   
    $url = 'https://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=1';
   
    $count = curl ($username, $password, $url);
         
    echo $count;
    $pages = intval($count/100) + 1;
    echo $pages;
    for ($p = 1; $p <= 2; $p++) 
    {
        $x = 0; 
       
        echo $p;
        $url = 'https://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=' . $p;
        $json = curl_json($username,$password,$url);
        
    	$id = array();
        $rank = array();
        $joinDatetime = array();
        $points = array();
        
        while ($x < 100)
        {
        array_push($id ,$json['members'][$x]['user']['id']);
        array_push($rank , $json['members'][$x]['rank']);
        array_push($joinDatetime ,$json['members'][$x]['joinDatetime']);
        array_push($points , $json['members'][$x]['points']);
        $x = $x + 1;
        
        }
        print_r($id);
        $arr_length = count($id);
        for ($i = 0; $i < $arr_length; $i++)
        {
        	
        	$url = 	'http://community.kidswithfoodallergies.org/api/v1/members/' . $id[$i] . '?m_id=1571083423419120';
            $json = curl_json($username, $password, $url); 	
        
        $joinDate =  date('Y-m-d', $joinDatetime[$i]/1000);
            if ($json['user']['pendingModerationApproval'] === false):
                $moderation =  'False';
                else:
                $moderation =  'True';
                endif;
        if ($json['user']['pendingModerationApproval'] === false):
		$moderation =  'False';
	else:
		$moderation =  'True';
	endif;
        $gender= $json['user']['gender'];
         
        $title= $json['user']['title'];
         
        $avatar_url = $json['user']['avatar']['url'];
        $avatar_width = $json['user']['avatar']['width'];
        $avatar_height= $json['user']['avatar']['height'];
        $avatar_object= $json['user']['avatar']['objectType'];
        $emailAddress =  $json['user']['emailAddress'];
        $emailAddress = mysql_real_escape_string($emailAddress);
        if ($json['user']['pendingParentalApproval'] === false):
                    $parental = 'False';
            else:
                    $parental ='True';
            endif;	
        if ($json['user']['pendingPlanUpgrade'] === false):
                    $planupgrade ='False';
            else:
                    $planupgrade ='True';
            endif;
        if ($json['user']['banned'] === false):
                    $banned= 'False';
            else:
                    $banned='True';
            endif;
        if ($json['user']['pendingEmailVerification'] === false):
                    $emailverification= 'False';
            else:
                    $emailverification='True';
            endif;
        if ($json['user']['canCurrentUserSendDialog'] === false):
                    $sendfdialog ='False';
            else:
                    $sendfdialog ='True';
            endif;
        $displayName = $json['user']['displayName'];
        $displayName = mysql_real_escape_string($displayName);
        
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
            $reference -'';
            
        while ($x <= 11)
        {   
        	$field = $json['customProfileFields'][$x]['name'];
            switch ($field){
            
            case 'First Name (Private)':
			$firstname = $json['customProfileFields'][$x]['value'];
			$firstname = mysql_real_escape_string($firstname);
			break;
			case 'Last Name (Private)':
			$lastname = $json['customProfileFields'][$x]['value'];
			$lastname = mysql_real_escape_string($lastname);
			break; 
			case 'Postal/Zip code (Archive)':
			$postalcode = $json['customProfileFields'][$x]['value'];
			$postalcode = mysql_real_escape_string($postalcode);
			break;
			case 'Country (Archive)':
			$country = $json['customProfileFields'][$x]['value'];
			break; 
			case 'I am a':
			$custprofilename2 =  $custprofilename = $json['customProfileFields']['$x']['selectedOptions']['0']['title'];
			break;
			case 'Referred from:':
			$reference = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            $reference = mysql_real_escape_string($reference);
			break;
			case 'I manage':
			include ('inc/foodallergymanage.php');   
			break;
			case 'Newly diagnosed?':			
			$newlydiagnosed = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            break;
			case 'Would you like to find out more about research opportunities or clinical trials that will help shape the future for those living with asthma and allergies?':
			$research =  $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
			$research = mysql_real_escape_string($research);
			break;
		    case 'Playgroups':
		    $playgroups1 = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            $playgroups2 = $json['customProfileFields'][$x]['selectedOptions']['1']['title'];
      		break;
            case 'Subscribe to enews (Archive)':
         	$subscribe = $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
            break;
            
       		}
       		$x = $x +1;
         }
         
        $birthday = $json['birthdayDatetime']; 
 
        // echo $json['lastLoginDatetime'];
        $lastlogin = $json['lastLoginDatetime'];
        if (isset($lastlogin)):
                else:
                $lastlogin = intval($lastlogin);
                endif;
        
         
        $location = $json['location'];
        $location = mysql_real_escape_string($location); 


        $sql = "INSERT INTO `kfa_members_2018`(`member_id`, `pendingModerationApproval`, `gender`, `title`, `avatar_url`, `avatar_width`, `avatar_height`, `avatar_object`, `emailAddess`, `pendingParentalApproval`, `pendingPlanUpgrade`, `banned`, `pendingEmailVerification`, `canCurrentUserSendDialog`, `id`, `displayName`, `PostalCodeZip`, `PostalCodeObj`, `Subscribe`, `SubscribeObj`, `CountryName`, `CountryObj`, `CustomFieldName`, `CustomFieldObj`, `ReferredBy`, `ReferredByObj`, `Manage`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `option11`, `option12`, `option13`, `option14`, `option15`, `option16`, `NewlkyDiagnosed`, `NewDiagnosedObj1`, `Playgroups`, `PlaygroupsObj1`, `PlaygroupsObj2`, `birthdayDatettime`, `rank`, `joinDateTime`, `points`, `lastLoginDatetime`, `location`) VALUES (NULL,'$moderation','$gender','$title','$avatar_url','$avatar_width','$avatar_height','$avatar_object','$emailAddress','$parental','$planupgrade','$banned','$emailverification','$sendfdialog','$id[$i]','$displayName','$postalcodeobj','$postalcode','$subscribeobj','$subscribe','$countryobj','$country','$custprofileoption','$custprofilename','$reference','$referenceObj','$manage','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$option11','$option12','$option13','$option14','$option15','$option16','$newlydiagnosedObj','$newlydiagnosed','$playgroupsObj','$playgroups1','$playgroups2','$birthday','$rank','$joinDatetime','$points','$lastlogin','$location')";
        $result = mysql_query($sql) or die (mysql_error());
            
            echo 'inserted';
            echo "<br/>";
        }  
		 
		$p = $p + 1;
    }  while ($p <= $pages);     
            
 
?>