<?php
    require ('inc/api_lib.php');
    db_connect_api();
    $username = get_aafa_user();
       $password=""; 
   
    $url = 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
   
    $count = curl ($username, $password, $url);
         
    echo $count;
    $pages = intval($count/100) + 1;
    echo $pages;
    for ($p = 1; $p <= $pages; $p++) 
    {
       $x = 0; 
       echo $p;
       
       $url = 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=' . $p;
   
        $json = curl_json($username, $password, $url);
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
        $url = 	'https://community.aafa.org/api/v1/members/' . $id[$i] . '?m_id=457293735035228056';
         $json = curl_json($username, $password, $url); 	
        
            $joinDate =  date('Y-m-d', $joinDatetime[$i]/1000);
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
            $emailAddress = $json['user']['emailAddress'];
            $x= 0;
            $firstname='';
            $lastname= '';
            $research = '';
        while ($x <= 5)
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
			    case 'I am a':
				$custprofilename2 =  $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
			    echo '<br>';
				break;
				case 'I manage':
				include ('inc/asthmamanage.php');   
			   break;
				case 'Would you like to find out more about research opportunities or clinical trials that will help shape the future for those living with asthma and allergies?':
				$research =  $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
				$research = mysql_real_escape_string($research);
				break;
				case 'default':
				break;
				}
          
            $x = $x + 1;
		}
            $birthday = $json['birthdayDatetime']; 
            $postalcode = $json['postalCode'];
            $postalcode = mysql_real_escape_string($postalcode);
            $lastlogin = $json['lastLoginDatetime'];
            $location = $json['location'];
            $country = $json['country'];
         
           
            $sql = "INSERT INTO `member_aafa_2018`(`member_id`, `pendingModerationApproval`, `gender`, `title`, `avatar_url`, `avatar_width`, `avatar_height`, `avatar_object`, `emailAddess`, `pendingParentalApproval`, `pendingPlanUpgrade`, `banned`, `pendingEmailVerification`, `canCurrentUserSendDialog`, `id`, `displayName`, `rank`, `First Name`, `Last Name`,`joinDateTime`, `joindate`, `points`, `CustProfileName`, `CustProfileOption`, `CustProfileName2`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`,`researchoption`, `birthdayDatetime`, `postCode`, `lastLoginDatetime`, `countrty`, `location`) VALUES(NULL,'$moderation','$gender','$title','$avatar_url','$avatar_width','$avatar_height','$avatar_object','$emailAddress','$parental','$planupgrade','$banned','$emailverification','$sendfdialog','$id[$i]','$displayName','$rank[$i]', '$firstname','$lastname', '$joinDatetime[$i]','$joinDate','$points[$i]','$custprofilename','$custprofileoption','$custprofilename2','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$research', '$birthday','$postalcode','$lastlogin','$country','$location')";
            $result = mysql_query($sql) or die (mysql_error());
            
            echo 'inserted';
            echo "<br/>";
        }  
	}       
            
 
?>