<?php
require('/inc/db.php');
db_connect_hoopla();
require ('/inc/neon_lib.php');

//Neon Login //
$url = 'https://api.neoncrm.com/neonws/services/api/common/login?login.apiKey=ad3ab57e489b4364206494d8d274a591&login.orgid=aafa';
$json = curl($url);
//Grab Session Id
$session_id = $json[loginResponse][userSessionId]; 

// Pull id and email
$sql = "SELECT `id`, `emailAddress` FROM `member_aafa_neon`";
$result = mysql_query($sql) or die (mysql_error());
while ($row = mysql_fetch_array($result))
{
    $id = $row['id'];
	$email = $row['emailAddress'];
//Check for existing email //
	$url = 'https://api.neoncrm.com/neonws/services/api/account/listAccountsBySearchCriteria?userSessionId=' .$session_id .'&accountSearchCriteria.userType=Individual&accountSearchCriteria.Email=' .$email;
	$json = curl($url);
	$totalresults = $json[listAccountsBySearchCriteriaResponse][page][totalResults];
    
	if ($totalresults == '0')
	{
		$neon_db = 'yes';
		$results = update_neon_db ($neon_db, $id);
	
	}
	else
	{
		$neon_db = 'no';
		$results = update_neon_db ($neon_db, $id);
		
		
	}
}