<?php
	 
    $p = 300;
       for ($t = $p; $t <= 497; $t++)
       {
	   	echo $t;
	  
	   $username="e7513e717b081e346302c2642c35faeb";
       $password=""; 

        $ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
         curl_setopt($ch, CURLOPT_URL, 'http://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=' .$t . '&sort_by=registration_datetime');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
         curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Send the request & save response to $resp
        $resp = curl_exec($ch);
        // Close request to clear up some resources
        curl_close($ch);
        $json = json_decode($resp, true);
	    $id = array();
        $rank = array();
        $joinDatetime = array();
        $points = array();
        $x = 0;
        while ($x <= $n)
        {
        array_push($id ,$json['members'][$x]['user']['id']);
        array_push($rank , $json['members'][$x]['rank']);
        array_push($joinDatetime ,$json['members'][$x]['joinDatetime']);
        array_push($points , $json['members'][$x]['points']);
        $x = $x + 1;
       
        }
        //print_r($id);
        $arr_length = count($id);
        
		for ($i = 0; $i < $arr_length; $i++)	 
		{
	    $idno = $id[$i];		
		$sql4 = "SELECt `id` FROM `kfa_members` WHERE `id` = '$idno'";
		$result = mysql_query($sql4) or die (mysql_error());
		if (mysql_num_rows($result) == 1)
        {
		}
		else
		{
			
		$ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
         curl_setopt($ch, CURLOPT_URL, 'http://community.kidswithfoodallergies.org/api/v1/members/' . $idno . '?m_id=1571083423419120');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
         curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Send the request & save response to $resp
        $resp = curl_exec($ch);
        // Close request to clear up some resources
        curl_close($ch);
        $json = json_decode($resp, true);
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
        $postalcodeobj = $json['customProfileFields']['0']['name'];
         
        $postalcode = $json['customProfileFields']['0']['value'];
        $postalcode = mysql_real_escape_string($postalcode);
        $subscribeobj = $json['customProfileFields']['1']['name'];
         
        $subscribe = $json['customProfileFields']['1']['selectedOptions']['0']['title'];
         
        $countryobj = $json['customProfileFields']['2']['name'];
         
        $country = $json['customProfileFields']['2']['selectedOptions']['0']['title'];
         
        $custprofileoption = $json['customProfileFields']['3']['name'];
         
        $custprofilename = $json['customProfileFields']['3']['selectedOptions']['0']['title'];
         
        $referenceObj = $json['customProfileFields']['4']['name'];
         
        $reference = $json['customProfileFields']['4']['selectedOptions']['0']['title'];
         
        $manage = $json['customProfileFields']['5']['name'];
         
        $option1 = $json['customProfileFields']['5']['selectedOptions']['0']['title'];
         
        $option2 = $json['customProfileFields']['5']['selectedOptions']['1']['title'];
         
        $option3 = $json['customProfileFields']['5']['selectedOptions']['2']['title'];
         
        $option4 = $json['customProfileFields']['5']['selectedOptions']['3']['title'];
         
        $option5 = $json['customProfileFields']['5']['selectedOptions']['4']['title'];
         
        $option6 = $json['customProfileFields']['5']['selectedOptions']['5']['title'];
         
        $option7 = $json['customProfileFields']['5']['selectedOptions']['6']['title'];
         
        $option8 = $json['customProfileFields']['5']['selectedOptions']['7']['title'];
         
        $option9 = $json['customProfileFields']['5']['selectedOptions']['8']['title'];
         
        $option10 = $json['customProfileFields']['5']['selectedOptions']['9']['title'];
         
        $option11 = $json['customProfileFields']['5']['selectedOptions']['10']['title'];
         
        $option12 = $json['customProfileFields']['5']['selectedOptions']['11']['title'];
         
        $option13 = $json['customProfileFields']['5']['selectedOptions']['12']['title'];
         
        $option14 = $json['customProfileFields']['5']['selectedOptions']['13']['title'];
         
        $option15 = $json['customProfileFields']['5']['selectedOptions']['14']['title'];
         
        $option16 = $json['customProfileFields']['5']['selectedOptions']['15']['title'];
         
        $newlydiagnosedObj = $json['customProfileFields']['6']['name'];
         
        $newlydiagnosed = $json['customProfileFields']['6']['selectedOptions']['0']['title'];
         
        $playgroupsObj = $json['customProfileFields']['7']['name'];
         
        $playgroups1 = $json['customProfileFields']['7']['selectedOptions']['0']['title'];
         
        $playgroups2 = $json['customProfileFields']['7']['selectedOptions']['1']['title'];
         
        $birthday = $json['birthdayDatetime']; 
 
        // echo $json['lastLoginDatetime'];
        $lastlogin = $json['lastLoginDatetime'];
        if (isset($lastlogin)):
                else:
                $lastlogin = intval($lastlogin);
                endif;
        
         
        $location = $json['location'];
        $location = mysql_real_escape_string($location); 


        $sql = "INSERT INTO `kfa_members`(`member_id`, `pendingModerationApproval`, `gender`, `title`, `avatar_url`, `avatar_width`, `avatar_height`, `avatar_object`, `emailAddess`, `pendingParentalApproval`, `pendingPlanUpgrade`, `banned`, `pendingEmailVerification`, `canCurrentUserSendDialog`, `id`, `displayName`, `PostalCodeZip`, `PostalCodeObj`, `Subscribe`, `SubscribeObj`, `CountryName`, `CountryObj`, `CustomFieldName`, `CustomFieldObj`, `ReferredBy`, `ReferredByObj`, `Manage`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `option11`, `option12`, `option13`, `option14`, `option15`, `option16`, `NewlkyDiagnosed`, `NewDiagnosedObj1`, `Playgroups`, `PlaygroupsObj1`, `PlaygroupsObj2`, `birthdayDatettime`, `rank`, `joinDateTime`, `points`, `lastLoginDatetime`, `location`) VALUES (NULL,'$moderation','$gender','$title','$avatar_url','$avatar_width','$avatar_height','$avatar_object','$emailAddress','$parental','$planupgrade','$banned','$emailverification','$sendfdialog','$idno','$displayName','$postalcodeobj','$postalcode','$subscribeobj','$subscribe','$countryobj','$country','$custprofileoption','$custprofilename','$reference','$referenceObj','$manage','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$option11','$option12','$option13','$option14','$option15','$option16','$newlydiagnosedObj','$newlydiagnosed','$playgroupsObj','$playgroups1','$playgroups2','$birthday','$rank','$joinDatetime','$points','$lastlogin','$location')";
        $result = mysql_query($sql) or die (mysql_error());
            
            echo 'inserted';
            echo "<br/>";
		}// for loop
		
		}// else loop
		}  
?>