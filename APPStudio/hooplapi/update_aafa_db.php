<?php
require('/inc/api_lib.php');
db_connect_api();
 
$aafa = pull_member_count_aafa();
$username = get_aafa_user();
$password = '';
$url = 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
$aafa_hoopla = curl($username, $password, $url);

$n = $aafa_hoopla - $aafa;
echo "New Entries: $n";

$url = 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
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
	$url = 'https://community.aafa.org/api/v1/members/' . $id[$i] . '?m_id=457293735035228056';
	$data = curl_json($username, $password, $url);
	$json = $data;
	
	$joinDate =  date('Y-m-d', $joinDatetime[$i]/1000);
	
	$title= $json['user']['title'];
	$emailAddress =  $json['user']['emailAddress'];
	$displayName = $json['user']['displayName'];
	$displayName = mysql_real_escape_string($displayName);
	$emailAddress = $json['user']['emailAddress'];
	 
	
	$custprofileoption =  $json['customProfileFields']['0']['selectedOptions']['0']['title'];
	
	$option1 = $json['customProfileFields']['1']['selectedOptions']['0']['title'];
	$data = $option1;
	$option1 = check_selections_aafa($data);
	$option2 = $json['customProfileFields']['1']['selectedOptions']['1']['title'];
	$option3 = $json['customProfileFields']['1']['selectedOptions']['2']['title'];
	$option4 = $json['customProfileFields']['1']['selectedOptions']['3']['title'];
	$option5 = $json['customProfileFields']['1']['selectedOptions']['4']['title'];
	$option6 = $json['customProfileFields']['1']['selectedOptions']['5']['title'];
	$option7 = $json['customProfileFields']['1']['selectedOptions']['6']['title'];
	$option8 = $json['customProfileFields']['1']['selectedOptions']['7']['title'];
	$option9 = $json['customProfileFields']['1']['selectedOptions']['8']['title'];
	$option10 = $json['customProfileFields']['1']['selectedOptions']['9']['title'];
	$postalcode = $json['postalCode'];
	$postalcode = mysql_real_escape_string($postalcode);
	$location = $json['location'];
	$country = $json['country'];
	 
	 
	$sql = "INSERT INTO `member_aafa_2`(`member_id`, `pendingModerationApproval`, `gender`, `title`, `avatar_url`, `avatar_width`, `avatar_height`, `avatar_object`, `emailAddess`, `pendingParentalApproval`, `pendingPlanUpgrade`, `banned`, `pendingEmailVerification`, `canCurrentUserSendDialog`, `id`, `displayName`, `rank`, `joinDateTime`, `joindate`, `points`, `CustProfileName`, `CustProfileOption`, `CustProfileName2`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `birthdayDatetime`, `postCode`, `lastLoginDatetime`, `countrty`, `loacation`) VALUES(NULL,'$moderation','$gender','$title','$avatar_url','$avatar_width','$avatar_height','$avatar_object','$emailAddress','$parental','$planupgrade','$banned','$emailverification','$sendfdialog','$id[$i]','$displayName','$rank[$i]','$joinDatetime[$i]','$joinDate','$points[$i]','$custprofilename','$custprofileoption','$custprofilename2','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$birthday','$postalcode','$lastlogin','$country','$location')";
	$result = mysql_query($sql) or die (mysql_error());

	echo 'inserted';
	echo "<br/>";
}
	

?>
