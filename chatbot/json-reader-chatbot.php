<?php
//Get the contents of the JSON file 
$strJsonFileContents = file_get_contents('json/aafa-insurance_2019-10-29.json');

// Convert to array 
$array = json_decode($strJsonFileContents, true);

$array_length = count($array);

echo "<table>";
for ($x = 0; $x < $array_length; $x++)
{
	$array_length2 = count($array[$x]["chatbotResponse"]);
	for ($y = 0; $y < $array_length; $y++)
	{
		
			$response = $array[$x]["chatbotResponse"][$y]["payload"]["fields"]["text"]["structValue"]["fields"]["text"]["structValue"]["fields"]["response"]["stringValue"];
	        
		
	}
    
	
	$C_intent = $array[$x]["intent"];
	$timestamp = $array[$x]["timestamp"]["_seconds"];
	$sessionid = $array[$x]["sessionId"];
	$intent = $array[$x]["userInput"];
	$UID = $array[$x]["UID"];
	echo "<tr><td><strong>Session ID</strong>";
	echo $sessionid;
	echo $x;
	echo "</td><td><strong>Time Stamp (seconds)";
	echo $timestamp;
	echo "</td></tr><tr><td><strong>Chat Bot Response</strong><br>";
	echo $response;
	echo "</td><td><strong>Chat Bot Intent</strong><br>";
	echo $C_intent;
	echo "</td></tr><td><strong>User Input</strong><br>";
	echo $intent;
	echo "</td><td><strong>UID</strong>";
	echo $UID;
	echo "</td></tr>";
	
	echo "<tr><td></td></tr><tr><td></td></tr>";
	
	
}
echo "</table>";


?>