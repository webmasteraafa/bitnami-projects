<?php
require('/config/lib.php');
$access= '';
if (isset($_POST['account']))
{
	
	$access = $_POST['account'];
	
}

echo $access;
    $url = 'https://api.neoncrm.com/neonws/services/api/common/login?login.apiKey=e2cd484a4bfd86eef9b407d53f230fab&login.orgid=aafa';
    $json = curl_neon($url);
    $session_id = $json['loginResponse']['userSessionId'];
    
    $url = 'https://api.neoncrm.com/neonws/services/api/account/retrieveIndividualAccount?userSessionId='.$session_id .'&accountId='.$access;
    $json = curl_neon($url);
    $resp = json_decode($json);
?>
<div style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px; padding:5px">
<form action="update-account.php" method="post">
   Url <textarea id="url" name="url" cols="100" rows="5"><?php echo $resp; ?></textarea>
   
   <div style="text-align:center; display:block"><input type="submit" value="Update"/></div>
</form></div>