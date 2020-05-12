<?php
require('inc/db.php');
require('inc/asthma.php');
db_connect_hoopla();

$sql = "SELECT `CustFieldValue`, `id` FROM `member_aafa_neon` WHERE `neon_db`= 'yes'";
$result = mysql_query($sql) or die (mysql_error());
while ($row = mysql_fetch_array($result))
{
    $id = $row['id'];
	$custprofileoption = $row['CustFieldValue'];
    include('inc/asthmamanagement.php');
	update_profile($neondatafield, $id);
	
}

$sql2 = "SELECT `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `id` FROM `member_aafa_neon` WHERE `neon_db`= 'yes'";
$result = mysql_query($sql) or die (mysql_error());
while ($row = mysql_fetch_array($result))
{
	$option1 = $row['option1'];
	$data = $option1;
	$custvalueopt1 = get_asthmamanage($data);
	
	$option2 = $row['option2'];
	$data = $option2;
	$custvalueopt2 = get_asthmamanage($data);
	
	$option3 = $row['option3'];
	$data = $option3;
	$custvalueopt3 = get_asthmamanage($data);
	
	$option4 = $row['option4'];
	$data = $option4;
	$custvalueopt4 = get_asthmamanage($data);
	
	$option5 = $row['option5'];
	$data = $option5;
	$custvalueopt5 = get_asthmamanage($data);
	
	$option6 = $row['option6'];
	$data = $option6;
	$custvalueopt6 = get_asthmamanage($data);
	
	$option7 = $row['option7'];
	$data = $option7;
	$custvalueopt7 = get_asthmamanage($data);
	$option8 = $row['option8'];
	$data = $option8;
	$custvalueopt8 = get_asthmamanage($data);
	$option1 = $row['option9'];
	$data = $option9;
	$custvalueopt9 = get_asthmamanage($data);
	$option10 = $row['option10'];
	$data = $option10;
	$custvalueopt10 = get_asthmamanage($data);
}