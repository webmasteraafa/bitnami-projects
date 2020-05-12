<?php
require('/inc/db.php');

db_connect_hoopla();

$sql = 'SELECT `CustFieldValue`, `id` FROM `member_aafa_neon`';
$result = mysql_query($sql) or die (mysql_error());
while ($row = mysql_fetch_array($result))
{
    $id = $row['id'];
	$custprofileoption = $row['CustFieldValue'];
    include('/inc/asthmamanagement.php');
	update_profile($neondatafield);
	
}