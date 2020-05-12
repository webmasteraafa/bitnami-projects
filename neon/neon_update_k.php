<?php
require('inc/db.php');
db_connect_hoopla();
require ('inc/neon_lib.php');
$time_start = microtime(true); 
//Neon Login //
$url = 'https://api.neoncrm.com/neonws/services/api/common/login?login.apiKey=ad3ab57e489b4364206494d8d274a591&login.orgid=aafa';
$json = curl($url);
//Grab Session Id
$session_id = $json[loginResponse][userSessionId]; 

// Pull id and email
$sql  = 'SELECT `member_id`,`id`, `emailAddess` FROM `kfa_members_neon` WHERE `member_id` BETWEEN 3001 AND 5000';
$result = mysql_query($sql) or die (mysql_error());
while ($row = mysql_fetch_array($result))
{
    $id = $row['id'];
	$email = $row['emailAddess'];

//Check for existing email //
	$url = 'https://api.neoncrm.com/neonws/services/api/account/listAccountsBySearchCriteria?userSessionId=' .$session_id .'&accountSearchCriteria.userType=Individual&accountSearchCriteria.Email=' .$email;
	$json = curl($url);
	$totalresults = $json[listAccountsBySearchCriteriaResponse][page][totalResults];
  
	if ($totalresults == '1')
	{
		
	    update_neon_dbk($id);
	    
	}
	
	
}
$time_end = microtime(true);
	//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';