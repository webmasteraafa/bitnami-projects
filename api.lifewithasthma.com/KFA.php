<?php
$user = 'kfa';
$url = newmemberurlk;
$json = curl ($url,$user);
$memberkfa = new kfamember();
$memberkfa -> id = array();
$y = 0;
while ($y < 10 )
{
	array_push ($memberkfa -> id ,$json['members'][$y]['user']['id']);
	$y =  $y + 1;
}
$arr_length = count($memberkfa -> id);


echo '<table width="100%" cellpadding="5">';
$idkfa = '';
for ($i = 0; $i < $arr_length; $i++)
{
	$idkfa =  $memberkfa->id[$i];
	$url = 'http://community.kidswithfoodallergies.org/api/v1/members/' . $idkfa. '?m_id=1571083423419120';
	$json = curl ($url,$user);
  $memberkfa->emailaddress =  $json['user']['emailAddress'];
  $memberkfa->firstname = $json['customProfileFields'][0]['value'];
  $memberkfa->lastname = $json['customProfileFields'][1]['value'];
  include ('search.php');
  if ($result > 0)
  {
  	echo '<tr>';
echo '<td>'. $idkfa . '</td><td>' .$memberkfa->firstname .'</td><td>'. $memberkfa->lastname .'</td><td>';
echo 'Listed in Neon';
echo '</td>';
echo '</tr>';
  }
  else {
  	echo '<tr>';
echo '<td>'. $idkfa . '</td><td>' .$memberkfa->firstname .'</td><td>'. $memberkfa->lastname .'</td><td>';
echo '<a href="nodb.php?id='. $idkfa . '">Send Data</a></td>';
echo '</tr>';
  }

}
echo '</table>';
