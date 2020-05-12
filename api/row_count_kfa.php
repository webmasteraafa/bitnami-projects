<?php
    require ('config.php');
    db_connect();
    $sql= "SELECT * FROM `kfa_ids`";
    $result = mysql_query($sql) or die (mysql_error());
    $total = mysql_num_rows($result);
    echo $total;
    $x= 7761;
    do {
         $username="e7513e717b081e346302c2642c35faeb";
         $password="";
        $sql2 = "SELECT `id` FROM `kfa_ids` WHERE `member_id` = '$x'";
         $result = mysql_query($sql2) or die (mysql_error());
         while ($row = mysql_fetch_array($result))
         {
		 	$id = $row['id'];
		 	
		 }
        	$ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
        curl_setopt($ch, CURLOPT_URL, 'http://community.kidswithfoodallergies.org/api/v1/members/' . $id . '?m_id=1571083423419120');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Send the request & save response to $resp
        $resp = curl_exec($ch);
        // Close request to clear up some resources
        curl_close($ch);
        $json = json_decode($resp, true);
        
    
        $gender= $json['user']['gender'];
        echo $gender;
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
        $location = $json['location'];
        $location = mysql_real_escape_string($location); 


        $sql = "INSERT INTO `kfa_profile`(`idno`, `gender`, `id`, `displayName`, `PostalCodeZip`, `PostalCodeObj`, `Subscribe`, `SubscribeObj`, `CountryName`, `CountryObj`, `CustomFieldName`, `CustomFieldObj`, `ReferredBy`, `ReferredByObj`, `Manage`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `option11`, `option12`, `option13`, `option14`, `option15`, `option16`, `NewlkyDiagnosed`, `NewDiagnosedObj1`, `Playgroups`, `PlaygroupsObj1`, `PlaygroupsObj2`, `birthdayDatettime`, `location`) VALUES  ('$x','$gender','$id','$displayName','$postalcodeobj','$postalcode','$subscribeobj','$subscribe','$countryobj','$country','$custprofileoption','$custprofilename','$reference','$referenceObj','$manage','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$option11','$option12','$option13','$option14','$option15','$option16','$newlydiagnosedObj','$newlydiagnosed','$playgroupsObj','$playgroups1','$playgroups2','$birthday','$location')";
        $result = mysql_query($sql) or die (mysql_error());
    	echo 'inserted';
    	echo '<br/>';
    	$x = $x + 1;
    	
    	
    	
    	
    	
    	
    }while ($x <= $total)
?>