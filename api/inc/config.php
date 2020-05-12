<?php
require ('globalvariables.php');

function db_connect_api()
{
	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB2, $conn)
	or die ('Could not select database; ' . mysql_error());
	
}


function curl ($url, $user)
{
	
	$password = '';
	
	switch ($user)
	{
	case  'aafa':
	 $username = aafauser;
     break;
	case 'kfa':
	$username = kfauser;
	break;
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
function neon_curl ($url)
{
	$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Send the request & save response to $resp
	$resp = curl_exec($ch);
	// Close request to clear up some resources
	curl_close($ch);
	$json = json_decode($resp, true);
	return $json;
	
	
}

class hoopla_member 
{

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
	public $oldpost ='';
	public $oldcountry='';
	public $birthday = '';
	public $country = '';
	public $manage = '';

    public  function get_pagecount ($url, $user)
    {
    	$counter ='';
    	$counter = curl($url,$user);
    	$this->page_count = $counter['count'];
    	return $this->page_count;
    }
}
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

class kfamember extends hoopla_member
{
	public $reference = '';
	public $subscribe = '';
	public $playgroups = '';
	public $playgroups2 = '';
	public $newlydiagnosed = '';
	public $foodmanage ='';
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
// Neon conversions 
function get_food_allergy_manage ($data)
{
	switch ($data)
	{
		case 'Parent of a child with food allergy':
			$neondatafield = '171';
			return $neondatafield;
			break;
		case 'Person with food allergy':
			$neondatafield = '173';
			return $neondatafield;
			break;
		case 'Friend or Caregiver of someone with food allergy':
			$neondatafield = '172';
			return $neondatafield;
			break;
		case 'Health professionalr':
			$neondatafield = '174';
			return $neondatafield;
			break;
		case 'School Nurse':
			$neondatafield = '534';
			return $neondatafield;
			break;
		case 'Educator':
			$neondatafield = '175';
			break;
		case 'Support Group Leader':
			$neondatafield = '535';
			return $neondatafield;
			break;
		case 'Other':
			$neondatafield = '176';
			return $neondatafield;
			break;
		}
}
function get_newlydiagnosed($data)
{
	switch ($data)
	{
		case 'Yes':
			$data = '193';
			return $data;
			break;
		case 'No':
			$data = '194';
			return $data;
			break;
		case '':
			$data ='0';
			return $data;
			break;
			
	}
}
function get_playgroup_data($data)
{
	switch ($data)
	{
		case 'Yes, I want to know about playgroups in my area':
			$data = '204';
			return $data;
			break;
		case 'No':
			$data = '205';
			return $data;
			break;
		case '':
			$data ='0';
			return $data;
			break;
			
	}
}
function get_subscribe_data($data)
{
	switch ($data)
	{
		case 'Yes':
			$data = '156';
			return $data;
			break;
		case 'No':
			$data = '157';
			return $data;
			break;
		case '':
			$data ='0';
			return $data;
			break;
			
	}
}
function get_references ($data)
{
	switch ($data)
	{
		case 'Allergist or physician':
			$neondatafield = '168';
			return $neondatafield;
			break;
		case 'Recommendation from friend or family':
			$neondatafield = '170';
			return $neondatafield;
			break;
		case 'School nurse':
			$neaondatafield = '160';
			return $neondatafield;
			break;
		case 'Registered dietitian':
			$neondatafield ='159';
			return $neondatafield;
			break;
		case 'Search engine (Google, Bing, Yahoo, etc.)':
			$neondatafield = '169';
			return $neondatafield;
			break;
		case 'News story, radio, or TV':
			$neondatafield = '167';
			return $neondatafield;
			break;
		case 'Another website':
			$neondatafield = '161';
			return $neondatafield;
			break;
		case 'Blog':
			$neondatafield = '163';
			return $neondatafield;
			break;
		case 'Local event':
			$neondatafiels = '158';
			return $neondatafield;
			break;
		case 'Facebook':
			$neondatafield = '165';
			return $neondatafield;
			break;
		case 'Twitter':
			$neondatafield = '164';
			return $neondatafield;
			break;
		case 'You Tube':
			$neondatafield = '166';
			return $neondatafield;
			break;
		case 'Pinterest':
			$neondatafield = '167';
			return $neondatafield;
			break;
		case 'iTunes':
			$neondatafiels = '206';
			return $neondatafield;
			break;
		case 'Other':
			$neondatafield = '205';
			return $neondatafield;
			break;
	}
	
}
function get_foodallergy ($data)
{
	switch ($data)
	{
		case 'Peanut Allergy':
			$neondatafield = '180';
			return $neondatafield;
			break;
		case 'Milk Allergy':
			$neondatafield = '181';
			return $neondatafield;
			break;
		case 'Egg Allergy':
			$neondatafield = '179';
			return $neondatafield;
			break;
		case 'Soy Allergy':
			$neondatafield = '178';
			return $neondatafield;
			break;
		case 'Tree Nut Allergy':
			$neondatafield = '177';
			return $neondatafield;
			break;
		case 'Wheat Allergy':
			$neondatafield = '182';
			return $neondatafield;
			break;
		case 'Fish Allergy':
			$neondatafield = '186';
			return $neondatafield;
			break;
		case 'Shellfish Allergy':
			$neondatafield = '186';
			return $neondatafield;
			break;
		case 'Sesame Allergy':
			$neondatafield = '185';
			return $neondatafield;
			break;
		case 'Other Food Allergy or Intolerance':
			$neondatafield = '186';
			return $neondatafield;
			break;
		case 'Celiac Disease':
			$neondatafield = '187';
			return $neondatafield;
			break;
		case 'Eosinophilic Gastrointestinal Disorder':
			$neondatafield = '188';
			return $neondatafield;
			break;
		case 'Food Protein Induced Enterocolitis Syndrome':
			$neondatafield = '189';
			return $neondatafield;
			break;
		case 'Lactose Intolerance':
			$neondatafield = '190';
			return $neondatafield;
			break;
		case 'Unknown/Undiagnosed':
			$neondatafield = '191';
			return $neondatafield;
			break;
		case 'Not Apllicable':
			$neondatafield = '192';
			return $neondatafield;
			break;
		
	}
	
}
function get_asthma_manage ($data)
{
	switch ($data)
	{
			case 'Person with asthma or allergies':
				$neondatafield = '559';
				return $neondatafield;
				break;
			case 'Parent, caregiver or friend of someone with asthma or allergies':
				$neondatafield = '560';
				return $neondatafield;
				break;
			case 'Health professionalr':
				$neondatafield = '561';
				return $neondatafield;
				break;
			case 'School nurse':
				$neondatafield = '562';
				return $neondatafield;
				break;
			case 'Educator':
				$neondatafield = '563';
				return $neondatafield;
				break;
			case 'Support Group Leader':
				$neondatafield = '564';
				return $neondatafield;
				break;
				case 'Asthma coalition leader':
			$neondatafield = '955';
				return $neondatafield;
				break;
			case 'Asthma educator':
			$neondatafield = '956';
				return $neondatafield;
				break;
			case 'Health fair, expo or event director':
			$neondatafield = '957';
			return $neondatafield;
			break;
			case 'Other':
				$neondatafield = '565';
				return $neondatafield;
				break;
			case '':
				$neondatafield = '';
				return $neondatafield;
				break;
		}
	}
function get_asthmamanage($data){
		
		switch ($data)
		{
			case 'Asthma':
				$neondatafield = '566';
				return $neondatafield;
				break;
			case 'Eczema':
				$neondatafield = '567';
				return $neondatafield;
				break;
			case 'Food Allergies':
				$neondatafield = '568';
				return $neondatafield;
				break;
			case 'Drug Allergies':
				$neondatafield ='569';
				return $neondatafield;
				break;
			case 'Insect Allergies':
				$neondatafield = '570';
				return $neondatafield;
				break;
			case 'Latex Allergies':
				$neondatafield = '571';
				return $neondatafield;
				break;
			case 'Mold Allergies':
				$neondatafield = '572';
				return $neondatafield;
				break;
			case 'Pollen Allergies':
				$neondatafield = '573';
				return $neondatafield;
				break;
			case 'Other':
				$neondatafield = '574';
				return $neondatafield;
				break;
			case 'Pet Allergies':
				$neondatafield = '883';
				return $neondatafield;
				break;
			case 'Not Applicable':
				$neondatafield = '575';
				return $neondatafield;
				break;
			case '':
				$neondatafield = '';
				return $neondatafield;
				break;
		}
	}
?>