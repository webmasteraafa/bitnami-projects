<?php

define ('aafauser', '9cfdf02a35f6e477b7a06603fe1ab30b');
define ('kfauser','e7513e717b081e346302c2642c35faeb');
//define ('neonorig', 'aafa');
//define ('apikey', 'ad3ab57e489b4364206494d8d274a591');

function curl ($url, $user)
{
	$password = '';
	if ($user = 'aafa')
	{
		$username = aafauser;
	}
	if ($user = 'kfa')
	{
		$username = kfauser;
	}
	$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Send the request & save response to $resp
	$resp = curl_exec($ch);
	// Close request to clear up some resources
	curl_close($ch);
	$json = json_decode($resp, true);
	return $json;
	
}

class hoopla_memeber 
{
	// Constructor
	public function __construct(){
		echo 'The class "' . __CLASS__ . '" was initiated!<br>';
	}
	
	// Destructor
	public function __destruct(){
		echo 'The class "' . __CLASS__ . '" was destroyed.<br>';
	}
	public $page_count ='';
	public $firstname = '';
	public $lastname = '';
	public $id = '';
	public $displayname = '';
	public $rank = '';
	public $points = '';
	public $joindate = '';
	public $gender= '';
	public $title='';
	public $emailaddress ='';
	public $parental ='';
	public $banned = '';
	public $moderation = '';
	public $planupgrade ='';
	public $emailverification ='';
	public $sendfdialog ='';
	public $location = '';
	public $lastlogin = '';
	public $research = '';
	public $postalcode ='';
	public $birthday = '';
	public $country = '';
	

    public  function get_pagecount ($url, $user)
    {
    	$counter ='';
    	$counter = curl($url,$user);
    	$this->page_count = $counter['count'];
    	return $this->page_count;
    }
}


class kfamember extends hoopla_member
{
	public $referece = '';
	public $subscribe = '';
	public $playgroups = '';
	public $playgroups2 = '';
	public $newlydiagnosed = '';
	public $foodopt1 = '';
	public $foodopt2 = '';
	public $foodopt3 = '';
	public $foodopt4 = '';
	public $foodopt5 = '';
	public $foodopt6 = '';
	public $foodopt7 = '';
	public $foodopt8 = '';
	public $foodopt9 = '';
	public $foodopt10 = '';
	public $foodopt11 = '';
	public $foodopt12 = '';
	public $foodopt13 = '';
	public $foodopt14 = '';
	public $foodopt15 = '';
	public $foodopt16 = '';
	
	
}