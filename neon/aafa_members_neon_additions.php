<?php
require('/inc/api_lib.php');
db_connect_api();
require ('/inc/neon_lib.php');

//Neon Login //
$url = 'https://api.neoncrm.com/neonws/services/api/common/login?login.apiKey=ad3ab57e489b4364206494d8d274a591&login.orgid=aafa';
$json = curl($url);
//Grab Session Id
$session_id = $json[loginResponse][userSessionId];
//Hoopla Login Credentials//
$username = get_aafa_user();
$password = '';
$p = 6;
do{
//Grab Member Data
$url = 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&page='. $p;
$data = curl_json($username, $password, $url);
$json = $data;

$id = array();
$joinDate = array();


while ($x < 99)
{
	array_push($id ,$json['members'][$x]['user']['id']);
	array_push($joinDate ,$json['members'][$x]['joinDatetime']);
	$x = $x + 1;

}

$arr_length = count($id);
for ($i = 1; $i <= $arr_length; $i++)
{
	$url = 'https://community.aafa.org/api/v1/members/' . $id[$i] . '?m_id=457293735035228056';
	$data = curl_json($username, $password, $url);
	$json = $data;
	$displayName = $json['user']['displayName'];
	$displayName = mysql_real_escape_string($displayName);
	$joinDateTime =  date('Y-m-d', $joinDate[$i]/1000);
	$emailAddress =  $json['user']['emailAddress'];
	//Check for existing email //
	$url = 'https://api.neoncrm.com/neonws/services/api/account/listAccountsBySearchCriteria?userSessionId=' .$session_id .'&accountSearchCriteria.userType=Individual&accountSearchCriteria.Email=' .$emailAddress;
	$json = curl($url);
	$totalresults = $json[listAccountsBySearchCriteriaResponse][page][totalResults];
    
	if ($totalresults == '0')
	{
		$sql="INSERT INTO `newneon`(`id`,`hooplaid`, `emailaddress`, `displayName`, `joindate`, `joindatetime`) VALUES ('NULL', '$id[$i]','$emailAddress','$displayName','$joinDate[$i]','$joinDateTime')";
	 
	 
	$result = mysql_query($sql) or die (mysql_error());

	echo 'inserted';
	
	}
	else
	{
		echo 'no insert';
		
		
	}
	
	
	
	
  }// for loop
$p = $p + 1;
}while ($p < 20);//do loop
	?>
	

