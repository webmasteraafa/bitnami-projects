<?php
function hoopla_curl ($url2, $username){
	$password = '';
	
	$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, $url2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Send the request & save response to $resp
	$resp = curl_exec($ch);
	// Close request to clear up some resources
	curl_close($ch);
	$json2 = json_decode($resp, true);
	return $json2;
}
function neon_curl ($url)
{
	$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Send the request & save response to $resp
	$resp = curl_exec($ch);
	// Close request to clear up some resources
	curl_close($ch);
	$json = json_decode($resp, true);
	return $json;
	
	
}

$url = 'https://api.neoncrm.com/neonws/services/api/common/login?login.apiKey=ad3ab57e489b4364206494d8d274a591&login.orgid=aafa';
$url2 = 'https://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=1&sort_by=registration_datetime&count=10';
$username = 'e7513e717b081e346302c2642c35faeb';

$json2 = hoopla_curl($url2, $username);
$count = $json2['count'];


$count2 = $count . ", ";
$json = neon_curl($url);
$session_id = $json[loginResponse][userSessionId];
$session = $session_id . ", ";
$myfile = fopen("neonsession.txt", "a") or die("Unable to open file!");
$txt = $session;
fwrite($myfile, $txt);
$txt = $count2;
fwrite($myfile, $txt);
fclose($myfile);




?>