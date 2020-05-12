<?php
//Get the contents of the JSON file 
require ('inc/lib.php');
db_connect_api();

$user_input = "";
$timestamp = "";
$Uid = "";

$chatbot = "";
// Convert to array 
for ($d = 1; $d < 32; $d++)
{
	$strJsonFileContents = file_get_contents('json/done/aafa-insurance_2019-11-'.$d.'.json');
	
	$date = '2019-11-'.$d;
	$array = json_decode($strJsonFileContents, true);
    $array_length = count($array);


for ($x = 0; $x < $array_length; $x++)
{

    
	
	$chatbot = $array[$x]["intent"];
	$chatbot = mysql_real_escape_string($chatbot);
	$timestamp = $array[$x]["timestamp"]["_seconds"];
	$session = $array[$x]["sessionId"];
	$user_input = $array[$x]["userInput"];
	$user_input = mysql_real_escape_string($user_input);
	
	$Uid = $array[$x]["UID"];

	$sql = "INSERT INTO `chatbotdata_nov`(`id`, `SessionId`, `UserInput`, `ChatbotIntent`, `UID`, `Timestamp`, `DateTaken`) VALUES (Null,'$session','$user_input','$chatbot','$Uid','$timestamp','$date')";
	$result = mysql_query($sql)or die (mysql_error());
}

}

?>