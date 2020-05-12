<?php
  require ('inc/neon_curl_login.php');
  
  $json = neon_login();
  
  $session_id = $json[loginResponse][userSessionId];
  
  require ('inc/aafa_community_memberlist.php');
  
  $json = aafa_member();
  
  $membercount = $json[count];
  echo $membercount;
  
  
  echo $json[members][1][user][displayName];
  echo $json[members][1][user][emailAddress];
?>