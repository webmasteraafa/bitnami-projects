<?php
//Get the contents of the JSON file 
require ('inc/lib-sql.php');
$conn = db_connect_ins();

$user_input = "";
$timestamp = "";
$Uid = "";

$chatbot = "";
// Convert to array 
for ($d = 1; $d < 10; $d++)
{
	$strJsonFileContents = file_get_contents('json/aafa-insurance_2020-01-'.$d.'.json');
	
	$date = '2020-01-'.$d;
	$array = json_decode($strJsonFileContents, true);
    $array_length = count($array);


for ($x = 0; $x < $array_length; $x++)
{

    
	
	$chatbot = $array[$x]["intent"];
	// $chatbot = mysql_real_escape_string($chatbot);
	$timestamp = $array[$x]["timestamp"]["_seconds"];
	$session = $array[$x]["sessionId"];
	$user_input = $array[$x]["userInput"];
	// $user_input = mysql_real_escape_string($user_input);
	
	$Uid = $array[$x]["UID"];

	$sql = "INSERT INTO [dbo].[chatbotdata]([SessionId], [UserInput], [ChatbotIntent], [UID], [Timestamp], [DateTaken]) VALUES ('$session','$user_input','$chatbot','$Uid','$timestamp','$date')";
	
	$result = sqlsrv_query($conn, $sql) or die( print_r( sqlsrv_errors(), true));

sqlsrv_close( $conn );
}

}

?>