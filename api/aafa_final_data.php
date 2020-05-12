<?php
    require ('config.php');
    db_connect();
    
  for ($p = 1; $p <= 15; $p++)
   {
		$username="9cfdf02a35f6e477b7a06603fe1ab30b";
       $password=""; 
       
        
        $ch = curl_init();
        if($ch === false) echo "cURL is not supported?";
        // Set some options - we are passing in a useragent too here
         curl_setopt($ch, CURLOPT_URL, 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1' );
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
        $id = array();
        $rank = array();
        $joinDatetime = array();
        $points = array();
        $x = 1;
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
        echo $arr_length;
        echo $id[0];
        echo "<br/>";
      
	//}		
	
       
		 
   
?>