<?php
session_start();


require('/inc/neon_lib.php');
$apikey = $_POST['apikey'];
$orgid = $_POST['orgid'];
$acct_email = $_POST['accountemail'];
$url = 'https://api.neoncrm.com/neonws/services/api/common/login?login.apiKey='.$apikey.'&login.orgid='.$orgid;
$json = curl($url);
$session_id = $json[loginResponse][userSessionId];

echo $session_id;
$_SESSION['session_id'] = $session_id;
?>

<p> <a href="logout.php">Logout</a></p>
<p><a href="listSystemuser.php">List Number of System Users</a></p>
<p><a href="verifyemail.php">Check Email</a></p>
<p><a href="storefront.php">Storfront API</a></p>