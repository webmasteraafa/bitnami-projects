<?php
require ('inc/lib.php');
db_connect_api();
$all_users = "";
$unique_users = "";
//All users //
$sql = "SELECT COUNT(*) FROM `chatbotdata`";
$result = $result = mysql_query($sql)or die (mysql_error());
 while  ($row = mysql_fetch_array($result))
    {
    	$all_users = $row[count];
}
echo $all_users;
$counter = 0;
//All unique users //
$sql2 = "SELECT `SessionId`, COUNT(*) FROM `chatbotdata` GROUP BY `SessionId`";
while  ($row = mysql_fetch_array($result))
    {
    	$unique_users = $counter++;
    }
    echo $unique_users;
?>
