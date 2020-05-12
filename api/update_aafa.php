<?php
$username="9cfdf02a35f6e477b7a06603fe1ab30b";
     $password="";
 $ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
         curl_setopt($ch, CURLOPT_URL, 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1&sort_by=registration_datetime');
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
        
        while ($x <= $n)
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
        $ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, 'https://community.aafa.org/api/v1/members/' . $id[$i] . '?m_id=457293735035228056');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Send the request & save response to $resp
        $resp = curl_exec($ch);
        // Close request to clear up some resources
        curl_close($ch);
        $json = json_decode($resp, true);
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
   
            $custprofilename = $json['customProfileFields']['0']['name'];
            $custprofileoption =  $json['customProfileFields']['0']['selectedOptions']['0']['title'];
            $custprofilename2 = $json['customProfileFields']['1']['name'];
            $option1 = $json['customProfileFields']['1']['selectedOptions']['0']['title'];
            $option2 = $json['customProfileFields']['1']['selectedOptions']['1']['title'];
            $option3 = $json['customProfileFields']['1']['selectedOptions']['2']['title'];
            $option4 = $json['customProfileFields']['1']['selectedOptions']['3']['title'];
            $option5 = $json['customProfileFields']['1']['selectedOptions']['4']['title'];
            $option6 = $json['customProfileFields']['1']['selectedOptions']['5']['title'];
            $option7 = $json['customProfileFields']['1']['selectedOptions']['6']['title'];
            $option8 = $json['customProfileFields']['1']['selectedOptions']['7']['title'];
            $option9 = $json['customProfileFields']['1']['selectedOptions']['8']['title'];
            $option10 = $json['customProfileFields']['1']['selectedOptions']['9']['title'];
            $birthday = $json['birthdayDatetime']; 
            $postalcode = $json['postalCode'];
            $postalcode = mysql_real_escape_string($postalcode);
            $lastlogin = $json['lastLoginDatetime'];
            $location = $json['location'];
            $country = $json['country'];
         
           
            $sql = "INSERT INTO `member_aafa_final`(`member_id`, `pendingModerationApproval`, `gender`, `title`, `avatar_url`, `avatar_width`, `avatar_height`, `avatar_object`, `emailAddess`, `pendingParentalApproval`, `pendingPlanUpgrade`, `banned`, `pendingEmailVerification`, `canCurrentUserSendDialog`, `id`, `displayName`, `rank`, `joinDateTime`, `joindate`, `points`, `CustProfileName`, `CustProfileOption`, `CustProfileName2`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `birthdayDatetime`, `postCode`, `lastLoginDatetime`, `countrty`, `loacation`) VALUES(NULL,'$moderation','$gender','$title','$avatar_url','$avatar_width','$avatar_height','$avatar_object','$emailAddress','$parental','$planupgrade','$banned','$emailverification','$sendfdialog','$id[$i]','$displayName','$rank[$i]','$joinDatetime[$i]','$joinDate','$points[$i]','$custprofilename','$custprofileoption','$custprofilename2','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$birthday','$postalcode','$lastlogin','$country','$location')";
            $result = mysql_query($sql) or die (mysql_error());
            
            echo 'inserted';
            echo "<br/>";
        }  
?>