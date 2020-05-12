<?php
  $user = 'aafa';
  $url = 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
  require ('/inc/config.php');
  
  class aafamember extends hoopla_member
  {
  	public $asthmaopt1 ='';
  	public $asthmaopt2 ='';
  	public $asthmaopt3 ='';
  	public $asthmaopt4 ='';
  	public $asthmaopt5 ='';
  	public $asthmaopt6 ='';
  	public $asthmaopt7 ='';
  	public $asthmaopt8 ='';
  	public $asthmaopt9 ='';
  	public $asthmaopt10 = '';
  
  }
  $member = new aafamember();
  $pages = $member->get_pagecount($url, $user);
  $pages = intval($pages);
  
  for ($p = 0; $p<=$pages; $p++)
  {
  	$x = 0;
  	$url = 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=' . $p;
  	$json = curl($url, $user);
  	$member->id = array();
  	$member->rank = array();
  	$member->points = array();
  	$member->joindate = array();
  	
  	while ($x < 100)
  	{
  		array_push ($member->id, $json['member'][$x]['user']['id']);
  		array_push ($member->rank, $json['member'][$x]['user']['rank']);
  		array_push ($member->points, $json['member'][$x]['user']['points']);
  		array_push ($member->joindate, $json['member'][$x]['user']['joindate']);
  	    $x = $x + 1;
  	}
  	print_r($member -> id);
  	$arr_length = count($member -> id);
  	
  }
  	
 ?> 	
 