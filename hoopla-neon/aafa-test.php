<?php
  function curl ($url)
   {
   	$username='9cfdf02a35f6e477b7a06603fe1ab30b';
    $password = '';


	$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Send the request & save response to $resp
	$resp = curl_exec($ch);
	// Close request to clear up some resources
	curl_close($ch);
	
	$json = json_decode($resp, true);
	return $json;
	
}
$url = 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&count=1';
$data = curl($url);
echo $data["members"][0]["user"]["id"];



?>