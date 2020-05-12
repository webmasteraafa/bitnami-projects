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

// I AM A //
echo $data["customProfileFields"][4]["options"][0]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][1]["title"];
echo '<br/>';
// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][2]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][3]["title"];
echo '<br/>';
// I AM A //
echo $data["customProfileFields"][4]["options"][4]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][5]["title"];
echo '<br/>';

// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][6]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][7]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][8]["title"];
echo '<br/>';

// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][9]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][10]["title"];
echo '<br/>';
// I AM A //
echo $data["customProfileFields"][4]["options"][11]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][12]["title"];
echo '<br/>';
// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][13]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][14]["title"];
// I  MANAGE AS A CAREGIVER //
echo"<br>";
echo $data["customProfileFields"][4]["options"][15]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][16]["title"];
echo '<br/>';
// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][17]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][18]["title"];
echo '<br/>';
// I AM A //
echo $data["customProfileFields"][4]["options"][19]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][20]["title"];
echo '<br/>';

// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][21]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][22]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][23]["title"];
echo '<br/>';

// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][24]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][25]["title"];
echo '<br/>';
// I AM A //
echo $data["customProfileFields"][4]["options"][26]["title"];
echo '<br/>';
// i MANAGE MYSELF //
echo $data["customProfileFields"][4]["options"][27]["title"];
echo '<br/>';
// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][28]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][29]["title"];
echo '<br/>';
// I  MANAGE AS A CAREGIVER //
echo $data["customProfileFields"][4]["options"][30]["title"];
echo '<br/>';
// Research //
echo $data["customProfileFields"][4]["options"][31]["title"];

?>