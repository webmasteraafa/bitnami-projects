<?php
  require ('/inc/config.php');
  $url = newmemberurla;
  $user = 'aafa';
  $json = curl($url, $user);
  print_r($json);