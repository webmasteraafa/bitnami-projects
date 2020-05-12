<?php
$id = "";
require ('inc/curl.php');

$url = 'http://community.kidswithfoodallergies.org/api/v1/members/' . $id. '?m_id=1571083423419120';
$username = "e7513e717b081e346302c2642c35faeb";

$data = curl($url,$username);

?>
