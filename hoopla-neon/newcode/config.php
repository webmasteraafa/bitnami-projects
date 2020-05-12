<?php

function db_connect ()
{
$serverName = "AAFA-SQL01\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"app_studio", "UID"=>"umbraco_images", "PWD"=>"@sthm@mbmc1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false){
     die( print_r( sqlsrv_errors(), true));
}
return $conn;

}
function curl ($username, $urlh){

	
    $password=""; 

    $ch = curl_init();
    if($ch === false) echo "cURL is not supported?";
     // Set some options - we are passing in a useragent too here
     curl_setopt($ch, CURLOPT_URL, $urlh);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     // Send the request & save response to $resp
     $resp = curl_exec($ch);
     
     curl_close($ch);
    $json = json_decode($resp, true);
	
	return $json;
	
}
 function neon_login () {
	


$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, "https://api.neoncrm.com/neonws/services/api/common/login?login.apiKey=ad3ab57e489b4364206494d8d274a591&login.orgid=aafa");
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
 
function GetCountryId ($country) {
	$cdata = "";
	switch ($country)
	{
		case "United States" :
		$country = "United States of America";
		$countrycode = 1;
		$cdata = $countrycode.','.$country;
		
		return $cdata;
		break;
		case "Canada" :
		$country = "Canada";
		$countrycode = 2;
		$cdata = $countrycode.','.$country;
		return $cdata;
		break;
		case "China" :
		$country = "China";
		$countrycode = 44;
		$cdata = $countrycode.','.$country;
		return $cdata;
		break;
		case "France" :
		$country = "France";
		$countrycode = 71;
		$cdata = $countrycode.','.$country;
		return $cdata;
		break;
	}
	
} 
?>