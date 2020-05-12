<?php
    require('config.php');
    db_connect();
    $p = 1;
    $x = 0;
    do {
		
	
    $username="e7513e717b081e346302c2642c35faeb";
    $password=""; 

    $ch = curl_init();
    if($ch === false) echo "cURL is not supported?";
     // Set some options - we are passing in a useragent too here
     curl_setopt($ch, CURLOPT_URL, 'http://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=' .$p. '&sort_by=registration_datetime');
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     // Send the request & save response to $resp
     $resp = curl_exec($ch);
     curl_close($ch);
    
    echo $p;
    echo "<br/>";
    $json = json_decode($resp, true);
    
     	while ($x < 100)
    	{
    		$id = $json['members'][$x]['user']['id'];
            $emailAddress =  $json['members'][$x]['user']['emailAddress'];
    		$emailAddress = mysql_real_escape_string($emailAddress);
   
    		$sql = "INSERT INTO `KFA_ids`(`member_id`, `id`, `email`) VALUES ('NULL','$id','$emailAddress')";
    		$result = mysql_query($sql) or die (mysql_error());
            echo $x;
            echo "|";
    		$x = $x + 1;
     	}
     	$x = 0;
     $p = $p +1;
   } while ($p <= 650); 
   
?>