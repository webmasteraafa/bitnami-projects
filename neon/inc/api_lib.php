<?php
function db_connect_api()
{
	define('SQL_HOST','localhost:3306');
	define('SQL_USER','neonApi');
	define('SQL_PASS','Pdmm321@');
	define('SQL_DB','admin_neonapi');

	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	or die ('Could not select database; ' . mysql_error());

}

function curl_json ($username, $password, $url)
{
	
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
function get_aafa_user()
{
	$username = '9cfdf02a35f6e477b7a06603fe1ab30b';
	return $username;

}
function get_kfa_user()
{
	$username = 'e7513e717b081e346302c2642c35faeb';
	return $username;
}



?>