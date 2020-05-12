<?php
require('/inc/api_lib.php');
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
$rank = array();
$joinDatetime = array();
$points = array();

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
	 
	$option1 = $json['customProfileFields']['5']['selectedOptions']['0']['title'];
	 
	$option2 = $json['customProfileFields']['5']['selectedOptions']['1']['title'];
	 
	$option3 = $json['customProfileFields']['5']['selectedOptions']['2']['title'];
	 
	$option4 = $json['customProfileFields']['5']['selectedOptions']['3']['title'];
	 
	$option5 = $json['customProfileFields']['5']['selectedOptions']['4']['title'];
	 
	$option6 = $json['customProfileFields']['5']['selectedOptions']['5']['title'];
	 
	$option7 = $json['customProfileFields']['5']['selectedOptions']['6']['title'];
	 
	$option8 = $json['customProfileFields']['5']['selectedOptions']['7']['title'];
	 
	$option9 = $json['customProfileFields']['5']['selectedOptions']['8']['title'];
	 
	$option10 = $json['customProfileFields']['5']['selectedOptions']['9']['title'];
	 
	$option11 = $json['customProfileFields']['5']['selectedOptions']['10']['title'];
	 
	$option12 = $json['customProfileFields']['5']['selectedOptions']['11']['title'];
	 
	$option13 = $json['customProfileFields']['5']['selectedOptions']['12']['title'];
	 
	$option14 = $json['customProfileFields']['5']['selectedOptions']['13']['title'];
	 
	$option15 = $json['customProfileFields']['5']['selectedOptions']['14']['title'];
	 
	$option16 = $json['customProfileFields']['5']['selectedOptions']['15']['title'];
	 
	$newlydiagnosed = $json['customProfileFields']['6']['selectedOptions']['0']['title'];
	$data = $newlydiagnosed;
	$newlydiagnosed = check_diagnosed_data($data);
	 
	$playgroups1 = $json['customProfileFields']['7']['selectedOptions']['0']['title'];
	$data = $playgroups1;
	$playgroups1 = check_playgroup_data($data);
	
 
	$location = $json['location'];
	//$location = mysql_real_escape_string($location);
	$sql = "INSERT INTO `kfa_members_2`(`member_id`, `pendingModerationApproval`, `gender`, `title`, `avatar_url`, `avatar_width`, `avatar_height`, `avatar_object`, `emailAddess`, `pendingParentalApproval`, `pendingPlanUpgrade`, `banned`, `pendingEmailVerification`, `canCurrentUserSendDialog`, `id`, `displayName`, `PostalCodeZip`, `PostalCodeObj`, `Subscribe`, `SubscribeObj`, `CountryName`, `CountryObj`, `CustomFieldName`, `CustomFieldObj`, `ReferredBy`, `ReferredByObj`, `Manage`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `option11`, `option12`, `option13`, `option14`, `option15`, `option16`, `NewlkyDiagnosed`, `NewDiagnosedObj1`, `Playgroups`, `PlaygroupsObj1`, `PlaygroupsObj2`, `birthdayDatettime`, `rank`, `joinDateTime`, `points`, `lastLoginDatetime`, `location`) VALUES (NULL,'$moderation','$gender','$title','$avatar_url','$avatar_width','$avatar_height','$avatar_object','$emailAddress','$parental','$planupgrade','$banned','$emailverification','$sendfdialog','$id[$i]','$displayName','$postalcodeobj','$postalcode','$subscribeobj','$subscribe','$countryobj','$country','$custprofileoption','$custprofilename','$reference','$referenceObj','$manage','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$option11','$option12','$option13','$option14','$option15','$option16','$newlydiagnosedObj','$newlydiagnosed','$playgroupsObj','$playgroups1','$playgroups2','$birthday','$rank[$i]','$joinDatetime[$i]','$points[$i]','$lastlogin','$location')";
	$result = mysql_query($sql) or die (mysql_error());
INSERT INTO `neon_2`(`member_id`, `title`, `emailAddess`, `id`, `displayName`, `PostalCodeObj`, `SubscribeObj`, `CountryObj`, `FoodAllergyMemberRelationship`, `ReferredByObj`, `PeanutAllergy`, `MikAllergy`, `EggAllergy`, `SoyAllergy`, `TreeNutAllergy`, `WheatAllergy`, `FishAllergy`, `ShellfishAllergy`, `SesameAllergy`, `OtherFoodAllergy`, `CeliacDisease`, `Eos`, `Fpies`, `LactoseIntolerance`, `Unknown`, `NotApplicatableKWFA`, `NewDiagnosedObj`, `Playgroups1`, `Playgroups2`, `joinDateTime`, `location`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25],[value-26],[value-27],[value-28],[value-29],[value-30],[value-31])
	echo 'inserted';


	echo "<br/>";
}

?>
