<?php
require ('inc/lib.php');
db_connect_api();
$all_users = "";
$unique_users = "";
//All users //
$counter2 = 0;
$sql = "SELECT * FROM `chatbotdata`";
$result = mysql_query($sql)or die (mysql_error());
 while  ($row = mysql_fetch_array($result))
    {
    	$all_users = $counter2++;
}
echo "<b>All Sessions</b>: ",$all_users;
$counter = 0;
//All unique users //
$sql2 = "SELECT `SessionId`, COUNT(*) FROM `chatbotdata` GROUP BY `SessionId`";
$result = mysql_query($sql2)or die (mysql_error());
while  ($row = mysql_fetch_array($result))
    {
    	$unique_users = $counter++;
    }
    echo '<br>';
    echo "<b>Unique Sessions</b>: ", $unique_users;
?>