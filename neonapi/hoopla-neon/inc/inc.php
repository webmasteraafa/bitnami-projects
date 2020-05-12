<?php
<?php
function db_connect_api()
{
	//databse connections
define('SQL_HOST','db5000207712.hosting-data.io');
define('SQL_USER','dbu182469');
define('SQL_PASS','Hoopla2019#');
define('SQL_DB','dbs202608');

	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	or die ('Could not select database; ' . mysql_error());
	
}

function member_check_aafa ()
{
	$aafa_member_count = $data["count"];
       
    db_connect_api();
    $sql = "INSERT INTO aafaMemberCount (Id, mcount, DateTaken) VALUES (NULL, '$aafa_member_count', NOW())";
	$result = 
	
	
}
function member_check_kfa ()
{
	$username = get_kfa_user();
	$password = '';
	$$urlh = 'http://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&sort_by=registration_datetime&page=1';
	$data = curl_hoopla($username,$password,$urlh);
	$kfa_member_count = $data["count"];
       
    db_connect_api();
    $sql = "INSERT INTO kfaMemberCount (Id, mcount, DateTaken) VALUES (NULL, '$kfa_member_count', NOW())";
	
	
	
}

function curl_neon ($url)
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

function curl_hoopla ($username, $password, $urlh)
{
	
  
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
?>