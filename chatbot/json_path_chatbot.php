<?php
$response = "";
$quickreply = "";
$title="";
$postback="";
$imageurl="";
//Get the contents of the JSON file 
$strJsonFileContents = file_get_contents('json/done/aafa-insurance_2019-10-12.json');

// Convert to array 
$array = json_decode($strJsonFileContents, true);

$array_length = count($array);
for ($x = 0; $x < 4; $x++)
{
	$array_length2 = count($array[$x]["chatbotResponse"]);
	echo $array_length2;
	for ($y = 0; $y < $array_length2; $y++)
	{
		if ($array[$x]["chatbotResponse"][0]["payload"]["fields"]["text"]["structValue"]["fields"]["text"]["structValue"]["fields"]["response"]["stringValue"] != NULL )
		{
			$response =$array[$x]["chatbotResponse"][$y]["payload"]["fields"]["text"]["structValue"]["fields"]["text"]["structValue"]["fields"]["response"]["stringValue"];
		
		}
		
		
		//
		
		//$imageurl = [$x]["chatbotResponse"][$y]["payload"]["fields"]["card"]["structValue"]["fields"]["imageUrl"]["stringValue"]
//$title = [$x]["chatbotResponse"][$y]["payload"]["fields"]["card"]["structValue"]["fields"]["title"]["stringValue"];
//$postback = [$x]["chatbotResponse"][$y]["payload"]["fields"]["card"]["structValue"]["fields"]["buttons"]["listValue"]["values"][0]["structValue"]["fields"]["postback"]["stringValue"];
	}
	
echo $response;
echo $quickreply;
echo $title;
echo $postback;
echo $imageurl; 
echo "<br>";
//$intent = [$x]["chatbotResonse"]["intent"];
		
		
		
//$seconds =[$x]["timestamp"]["_seconds"];
//$nanoseconds = [$x]["timestamp"]["_nanoseconds"];
//$userinput = [$x]["userInput"];
//$sessionid = [$x]["sessionId"];
//$uid = [$x]["UID"];

	
}
	



?>