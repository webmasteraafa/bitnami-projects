<?php
$url ='https://api.neoncrm.com/neonws/services/api/account/listAccountsByDefault?userSessionId='.$_SESSION['session_id'].'&accountSearchCriteria.lastName='.$memberkfa->lastname.'&accountSearchCriteria.firstName=' .$memberkfa->firstname.'&accountsearchcriteria.email='.$memberkfa->emailaddress;
$json = neon_curl($url);

$result = $json[listAccountsByDefaultResponse][page][totalResults];
?>