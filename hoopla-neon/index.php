<?php
require ('/inc/config.php');
require ('/inc/globalvariables.php');

$user = 'kfa';
$url = newmemberurlk;
$json = curl ($url,$user);
$memberkfa = new kfamember();

$memberkfa -> id = array();

$x = 0;
while (x <= 10)
{
	array_push ($memberkfa -> id ,$json['members'][$x]['user']['id']);
}
$arr_length = count($member -> id);
echo '<table width="100%" cellpadding="5">';
for ($i = 0; $i <= $arr_length; $i++)
{
	$url = 'http://community.kidswithfoodallergies.org/api/v1/members/' . $memberkfa -> id[$i]. '?m_id=1571083423419120';
	$json = curl ($url,$user);

echo '<tr>';
echo '<td>'. $memberkfa->$id . '</td><td>' .$memberkfa->firstname .'</td><td>'. $memberkfa->lastname .'</td><td>';
echo '<a href="nodb.php?id='. $memberkfa->$id . '">Send Data</a></td>';
echo '</tr>';
}
echo '</table>';
?>