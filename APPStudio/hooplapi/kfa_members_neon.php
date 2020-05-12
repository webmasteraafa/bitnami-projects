<?php
require('/inc/api_lib.php');
require('/inc/neon_coding.php')
db_connect_api();
$kwfa = pull_member_count_db();
$username = get_kfa_user();
$password='';
$url = 'https://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=1';
$kwfa_hoopla = curl($username, $password, $url);
$n = $kwfa_hoopla - $kwfa;
echo "New Entries: $n";

$url = 'http://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=1&sort_by=registration_datetime';
$data = curl_json($username, $password, $url);
$json = $data;
$id = array();
$joinDatetime = array();


while ($x <= $n)
{
	array_push($id ,$json['members'][$x]['user']['id']);
	array_push($joinDatetime ,$json['members'][$x]['joinDatetime']);
	$x = $x + 1;

}
print_r($id);
 
$arr_length = count($id);

for ($i = 1; $i <= $arr_length; $i++)
{
	$url = 'http://community.kidswithfoodallergies.org/api/v1/members/' . $id[$i] . '?m_id=1571083423419120';
	$data = curl_json($username, $password, $url);
	$json = $data;
	$title= $json['user']['title'];
	 
	$emailAddress =  $json['user']['emailAddress'];
	$emailAddress = mysql_real_escape_string($emailAddress);
	$displayName = $json['user']['displayName'];
	$displayName = mysql_real_escape_string($displayName);
	 
	$postalcode = $json['customProfileFields']['0']['value'];
	$postalcode = mysql_real_escape_string($postalcode);
    $subscribe = $json['customProfileFields']['1']['selectedOptions']['0']['title']; 
    $data = $subscribe;
    $subscribe = check_subscribe_data($data);
	$country = $json['customProfileFields']['2']['selectedOptions']['0']['title']; 
	$custprofilename = $json['customProfileFields']['3']['selectedOptions']['0']['title'];
	$reference = $json['customProfileFields']['4']['selectedOptions']['0']['title']; 
	$date = $reference;
	$reference = check_references_kwfa($data); 
	$option1 = $json['customProfileFields']['5']['selectedOptions']['0']['title'];
	$option1 = $data;
	$option1 = check_food_allergies($data); 
	if ($option1 = '180')
	{
		$option1 = '180';
	}
	else 
	{
		$option1 = '0';
	}
	$option2 = $json['customProfileFields']['5']['selectedOptions']['1']['title'];
	$option2 = $data;
	$option2 = check_food_allergies($data); 
	if ($option2 = '181')
	{
		$option2 = '181';
	}
	else 
	{
		$option2 = '0';
	}
	$option3 = $json['customProfileFields']['5']['selectedOptions']['2']['title'];
	 $option3 = $data;
	$option3 = check_food_allergies($data); 
	if ($option3 = '179')
	{
		$option3 = '179';
	}
	else 
	{
		$option3 = '0';
	}
	$option4 = $json['customProfileFields']['5']['selectedOptions']['3']['title'];
	 $option4 = $data;
	$option4 = check_food_allergies($data); 
	if ($option4 = '178')
	{
		$option4 = '178';
	}
	else 
	{
		$option2 = '0';
	}
	$option5 = $json['customProfileFields']['5']['selectedOptions']['4']['title'];
	 $option5 = $data;
	$option5 = check_food_allergies($data); 
	if ($option5 = '177')
	{
		$option5 = '177';
	}
	else 
	{
		$option5 = '0';
	}
	$option6 = $json['customProfileFields']['5']['selectedOptions']['5']['title'];
	$option6 = $data;
	$option6 = check_food_allergies($data); 
	if ($option6 = '182')
	{
		$option6 = '182';
	}
	else 
	{
		$option2 = '0';
	} 
	$option7 = $json['customProfileFields']['5']['selectedOptions']['6']['title'];
	$option7 = $data;
	$option7 = check_food_allergies($data); 
	if ($option7 = '186')
	{
		$option7 = '186';
	}
	else 
	{
		$option2 = '0';
	} 
	$option8 = $json['customProfileFields']['5']['selectedOptions']['7']['title'];
	$option8 = $data;
	$option8 = check_food_allergies($data); 
	if ($option8 = '186')
	{
		$option8 = '186';
	}
	else 
	{
		$option8 = '0';
	} 
	$option9 = $json['customProfileFields']['5']['selectedOptions']['8']['title'];
	$option9 = $data;
	$option9 = check_food_allergies($data); 
	if ($option9 = '185')
	{
		$option9 = '185';
	}
	else 
	{
		$option9 = '0';
	}  
	$option10 = $json['customProfileFields']['5']['selectedOptions']['9']['title'];
	$option10 = $data;
	$option10 = check_food_allergies($data); 
	if ($option10 = '186')
	{
		$option10 = '186';
	}
	else 
	{
		$option10 = '0';
	}   
	$option11 = $json['customProfileFields']['5']['selectedOptions']['10']['title'];
	$option11 = $data;
	$option11 = check_food_allergies($data); 
	if ($option11 = '187')
	{
		$option11 = '187';
	}
	else 
	{
		$option11 = '0';
	}    
	$option12 = $json['customProfileFields']['5']['selectedOptions']['11']['title'];
	$option12 = $data;
	$option12 = check_food_allergies($data); 
	if ($option12 = '188')
	{
		$option12 = '188';
	}
	else 
	{
		$option12 = '0';
	}   
	$option13 = $json['customProfileFields']['5']['selectedOptions']['12']['title'];
	$option13 = $data;
	$option13 = check_food_allergies($data); 
	if ($option13 = '189')
	{
		$option13 = '189';
	}
	else 
	{
		$option13 = '0';
	}    
	$option14 = $json['customProfileFields']['5']['selectedOptions']['13']['title'];
	$option14 = $data;
	$option14 = check_food_allergies($data); 
	if ($option14 = '190')
	{
		$option14 = '190';
	}
	else 
	{
		$option14 = '0';
	}    
	$option15 = $json['customProfileFields']['5']['selectedOptions']['14']['title'];
	$option15 = $data;
	$option15 = check_food_allergies($data); 
	if ($option15 = '191')
	{
		$option15 = '191';
	}
	else 
	{
		$option15 = '0';
	}    
	$option16 = $json['customProfileFields']['5']['selectedOptions']['15']['title'];
	$option16 = $data;
	$option16 = check_food_allergies($data); 
	if ($option16 = '192')
	{
		$option16 = '192';
	}
	else 
	{
		$option10 = '0';
	}    
	$newlydiagnosed = $json['customProfileFields']['6']['selectedOptions']['0']['title'];
	$data = $newlydiagnosed;
	$newlydiagnosed = check_diagnosed_data($data);
	 
	$playgroups1 = $json['customProfileFields']['7']['selectedOptions']['0']['title'];
	$data = $playgroups1;
	$playgroups1 = check_playgroup_data($data);
	
 
	$location = $json['location'];
	//$location = mysql_real_escape_string($location);
	$sql = "INSERT INTO `neon_2`(`member_id`, `title`, `emailAddess`, `id`, `displayName`, `PostalCodeObj`, `SubscribeObj`, `CountryObj`, `FoodAllergyMemberRelationship`, `ReferredByObj`, `PeanutAllergy`, `MikAllergy`, `EggAllergy`, `SoyAllergy`, `TreeNutAllergy`, `WheatAllergy`, `FishAllergy`, `ShellfishAllergy`, `SesameAllergy`, `OtherFoodAllergy`, `CeliacDisease`, `Eos`, `Fpies`, `LactoseIntolerance`, `Unknown`, `NotApplicatableKWFA`, `NewDiagnosedObj`, `Playgroups1`, `Playgroups2`, `joinDateTime`, `location`) VALUES (NULL,'$title','$emailAddress','$displayName','$postalcode','$subscribe','$country','$custprofilename','$reference','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$option11','$option12','$option13','$option14','$option15','$option16','$newlydiagnosed','$playgroups1','$playgroups2','$joinDatetime','$location')";
$result = mysql_query($sql) or die (mysql_error());
echo 'inserted';


	echo "<br/>";


?>
