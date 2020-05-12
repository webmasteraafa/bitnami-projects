<?php
   require ('inc/api_lib.php');
   db_connect_api();
   $username = get_aafa_user();
   $password ='';
   $url = 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
   
   $members = curl($username,$password,$url);
   
   $pages = round($members/100);
   
   // Member loop
   $pages = 1;
   $x = 0;
   $joindate = array();
   $id = array();
   $rank = array();
   $points = array();
   
   for ($i = 0; $i <= $pages; $i++;)
   {
   	  $url = 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&page='.$pages;
   	  curl_json ($username, $password, $url)
      while ($x <= 100)
      {
	  	array_push($id ,$json['members'][$x]['user']['id']);
		array_push($joinDatetime ,$json['members'][$x]['joinDatetime']);
		array_push($points ,$json['members'][$x]['points']);
		array_push($rank ,$json['members'][$x]['rank']);
		$x = $x + 1;
	  }
      
      
}?>