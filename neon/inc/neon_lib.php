<?php
function curl ($url)
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
function Check_email($acct_email, $session_id)
{
	$url = 'https://api.neoncrm.com/neonws/services/api/account/listAccountsBySearchCriteria?userSessionId=' .$session_id .'&accountSearchCriteria.userType=Individual&accountSearchCriteria.Email=mbe_68@yahoo.com';
	$json = curl($url);
echo '<pre>';
var_export($json);
echo '</pre>';
	return $json[listAccountsBySearchCriteriaResponse][page][totalResults];
	
   
 }   
function get_counter ($json)
{



}
	
function get_catalog_id ($session_id){
	
	$url = 'https://api.neoncrm.com/neonws/services/api/store/listCatalogs?userSessionId=' .$session_id;
	$json = curl($url);
	
	return $json;
	
	
}
function get_category_id ($session_id){
	
	$url = 'https://api.neoncrm.com/neonws/services/api/store/listCategories?userSessionId=' .$session_id;
	$json = curl($url);
	
	return $json;
	
	
}

function get_product_listing ($session_id, $categoryid)
{
	$url = 'https://api.neoncrm.com/neonws/services/api/store/listProducts?userSessionId='.$session_id .'&searchCriteria.categoryId=' .$categoryid;
	$json = curl($url);
	
	return $json;
	
	
}