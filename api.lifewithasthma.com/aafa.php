<?php
require('inc/config.php');
$user = 'aafa';
$url = newmemberurla;
$json = curl ($url,$user);
$memberaafa = new aafamember();
$memberaafa -> id = array();
$y = 0;
while ($y < 10 )
{
	array_push ($memberaafa -> id ,$json['members'][$y]['user']['id']);
	$y =  $y + 1;
}
$arr_length = count($memberaafa -> id);


echo '<table width="100%" cellpadding="5">';
$idaafa = '';
for ($i = 0; $i = $arr_length; $i++)
{
	$idkfa =  $memberaafa->id[$i];
	$url = 'http://community.aafa.org/api/v1/members/' . $idkfa. '?m_id=457293735035228056';
	$json = curl ($url,$user);
  $memberaafa->emailaddress =  $json['user']['emailAddress'];
  $memberaafa->firstname = $json['customProfileFields'][0]['value'];
  $memberaafa->lastname = $json['customProfileFields'][1]['value'];
  include ('search.php');
  if ($result > 0)
  {
  	echo '<tr>';
echo '<td>'. $idaafa . '</td><td>' .$memberaafa->firstname .'</td><td>'. $memberaafa->lastname .'</td><td>';
echo 'Listed in Neon';
echo '</td><td>';
echo '<a href="nodb.php?id='. $idaafa . '">Send Data</a></td>';
echo '</tr>';
  }
  else {
  	echo '<tr>';
echo '<td>'. $idkfa . '</td><td>' .$memberaafa->firstname .'</td><td>'. $memberaafa->lastname .'</td><td>';
echo 'Not Listed';
echo '</td><td>';
echo '<a href="nodb2.php?id='. $idaafa . '">Send Data</a></td>';
echo '</tr>';
  }

}
echo '</table>';
