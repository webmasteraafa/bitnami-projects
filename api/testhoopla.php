<?php
require ('/inc/config.php');
$url="http://community.kidswithfoodallergies.org/api/v1/members/1571083423419120?m_id=1571083423419120";
$user ="kfa";
$json = curl($url, $user);
echo $json[user][emailAddress];
$email = $json[user][emailAddress];
/*Neon Login*/
$url =$url = neonlogin;
$json = neon_curl($url);
$session_id = $json[loginResponse][userSessionId];
$_SESSION['session_id'] = $session_id;
echo $session_id;
$url = 'https://api.neoncrm.com/neonws/services/api/account/listCountries?usersessionid='.$session_id;
/*Check email*/
$url = 'https://api.neoncrm.com/neonws/services/api/account/listAccountsBySearchCriteria?userSessionId=' .$session_id .'&accountSearchCriteria.userType=Individual&accountSearchCriteria.Email='.$email;
	$json = neon_curl($url);
echo '<pre>';
var_export($json);
echo '</pre>';

?> 