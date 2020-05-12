<?php
$displayname = "";
$gender = "";
$emailaddress ="";
$firstname = "";
   
   function curl ($url)
   {
   	$username='e7513e717b081e346302c2642c35faeb';
    $password = '';

	$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, $url);
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

$url = 'https://community.kidswithfoodallergies.org/api/v1/members/534715558700899264/?m_id=1571083423419120';

$data = curl ($url);

echo $data["user"]["gender"];
echo "<br>";
echo $data["user"]["id"];
echo "<br>";
echo $data["user"]["displayName"];
echo"<br>";

echo  $data["customProfileFields"][0]["value"];
echo '<br/>';
echo  $data["customProfileFields"][1]["value"];
echo '<br/>';
// I AM A //
echo $data["customProfileFields"][2]["selectedOptions"][0]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][3]["selectedOptions"][0]["title"];
echo '<br/>';
// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["selectedOptions"][0]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][5]["selectedOptions"][0]["title"];
echo '<br/>';
// PFAC //
echo $data["customProfileFields"][6]["selectedOptions"][0]["title"];
echo '<br/>';
// Role //
echo $data["customProfileFields"][7]["selectedOptions"][0]["title"];
echo '<br/>';
// Ethinicity //
echo $data["customProfileFields"][8]["selectedOptions"][0]["title"];
echo '<br/>';
// Education //
echo $data["customProfileFields"][9]["selectedOptions"][0]["title"];
echo '<br/>';
// Location Type //
echo $data["customProfileFields"][10]["selectedOptions"][0]["title"];
echo '<br/>';
// income //
echo $data["customProfileFields"][11]["selectedOptions"][0]["title"];
echo '<br/>';
echo $data["postalCode"];
echo "<br>";
echo $data["birthdayDatetime"];
echo "<br>";
echo $data["country"];
echo"<br>";

?>