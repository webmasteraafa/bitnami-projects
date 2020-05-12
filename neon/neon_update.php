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
$sql  = 'SELECT `id`, `emailAddess` FROM `member_aafa_neon`';
$result = mysql_query($sql) or die (mysql_error());
while ($row = mysql_fetch_array($result))
{
    $id = $row['id'];
	$email = $row['emailAddess'];
	echo $id;
	echo '<br/>';
	echo $email;
//Check for existing email //
	$url = 'https://api.neoncrm.com/neonws/services/api/account/listAccountsBySearchCriteria?userSessionId=' .$session_id .'&accountSearchCriteria.userType=Individual&accountSearchCriteria.Email=' .$email;
	$json = curl($url);
	$totalresults = $json[listAccountsBySearchCriteriaResponse][page][totalResults];
    echo $totalresults;
	if ($totalresults == '1')
	{
		
	    update_neon_db($id);
	
	}
	
}