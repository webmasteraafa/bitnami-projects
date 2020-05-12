<?php
   require ('inc/api_lib.php');
   db_connect_api();
   $username = get_aafa_user();
   $password ='';
   $url = 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
   
   $members = curl($username,$password,$url);
   echo $members;
   $pages = round($members/100);
   echo $pages;
   // Member loop
   $p = 1;
   $x = 0;
   
?>