<?php
 
 function Check_aafa_db()
 {
 	$sql = "SELECT * FROM `member_aafa`";
    $result = mysql_query($sql) or die (mysql_error());
    $rows = mysql_num_rows($result);
    return $rows;
 }
 
 function Check_aafa_hoopla()
 {
 	 $username="9cfdf02a35f6e477b7a06603fe1ab30b";
     $password=""; 
     $ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
         curl_setopt($ch, CURLOPT_URL, 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
         curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Send the request & save response to $resp
        $resp = curl_exec($ch);
        // Close request to clear up some resources
        curl_close($ch);
        $json = json_decode($resp, true);
        $count = $json['count'];
        return $count;
 	
 }
 function Check_kwfa_db()
 {
 	$sql = "SELECT * FROM `kfa_members`";
    $result = mysql_query($sql) or die (mysql_error());
    $rows = mysql_num_rows($result);
    return $rows;
 }
 
 function Check_kwfa_hoopla()
 {
 	   $username="e7513e717b081e346302c2642c35faeb";
       $password=""; 

        $ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
         curl_setopt($ch, CURLOPT_URL, 'http://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=' . $p);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
         curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Send the request & save response to $resp
        $resp = curl_exec($ch);
        // Close request to clear up some resources
        curl_close($ch);
        $json = json_decode($resp, true);
        $count = $json['count'];
      return $count;
}
 
?>