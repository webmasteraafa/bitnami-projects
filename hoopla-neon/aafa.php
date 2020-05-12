<?php
$id = "";
require ('inc/curl.php');

$url = 'http://community.aafa.org/api/v1/members/' . $id. '?m_id=457293735035228056';
$username = "9cfdf02a35f6e477b7a06603fe1ab30b";

$data = curl($url,$username);
?>