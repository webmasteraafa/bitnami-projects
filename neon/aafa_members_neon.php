<?php
require('/inc/api_lib.php');
db_connect_api();
require ('/inc/asthma.php');
$username = get_aafa_user();
$password = '';

$url = 'http://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
$data = curl_json($username, $password, $url);
$json = $data;

$id = array();
$joinDatetime = array();


while ($x <= 10)
{
	array_push($id ,$json['members'][$x]['user']['id']);
	array_push($joinDatetime ,$json['members'][$x]['joinDatetime']);
	$x = $x + 1;

}
print_r($id);
$arr_length = count($id);
echo $arr_length;
echo '<br>';
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
	include ('/inc/asthmamanagement.php');
	$custprofileoption = $neondatafield ;
	$option1 = $json['customProfileFields']['1']['selectedOptions']['0']['title'];
	$data = $option1;
	$option1 = get_asthmamanage($data);
	$option2 = $json['customProfileFields']['1']['selectedOptions']['1']['title'];
	$data = $option2;
	$option2 = get_asthmamanage($data);
	$option3 = $json['customProfileFields']['1']['selectedOptions']['2']['title'];
	$data = $option3;
	$option3 = get_asthmamanage($data);
	$option4 = $json['customProfileFields']['1']['selectedOptions']['3']['title'];
	$data = $option4;
	$option4 = get_asthmamanage($data);
	$option5 = $json['customProfileFields']['1']['selectedOptions']['4']['title'];
	$data = $option5;
	$option5 = get_asthmamanage($data);
	$option6 = $json['customProfileFields']['1']['selectedOptions']['5']['title'];
	$data = $option6;
	$option6 = get_asthmamanage($data);
	$option7 = $json['customProfileFields']['1']['selectedOptions']['6']['title'];
	$data = $option7;
	$option7 = get_asthmamanage($data);
	$option8 = $json['customProfileFields']['1']['selectedOptions']['7']['title'];
	$data = $option8;
	$option8 = get_asthmamanage($data);
	$option9 = $json['customProfileFields']['1']['selectedOptions']['8']['title'];
	$data = $option9;
	$option9 = get_asthmamanage($data);
	$option10 = $json['customProfileFields']['1']['selectedOptions']['9']['title'];
	$data = $option10;
	$option10 = get_asthmamanage($data);
	$postalcode = $json['postalCode'];
	$postalcode = mysql_real_escape_string($postalcode);
	$location = $json['location'];
	$country = $json['country'];
	 
	 $sql="INSERT INTO `neon`(`member_id`, `title`, `emailAddess`, `id`, `displayName`, `joinDateTime`, `joindate`, `AAFAmemberrelationship`, `opt1`, `opt2`, `opt3`, `opt4`, `opt5`, `opt6`, `opt7`, `opt8`, `opt9`, `opt10` ,`postCode`, `countrty`, `location`) VALUES (NULL,'$title','$emailAddress','$id[$i]','$displayName','$joinDatetime[$i]','$joinDate','$custprofileoption','$option1','$option2','$option3','$option4','$option5','$option6','$option7','$option8','$option9','$option10','$postalcode','$country','$location')";
	 
	 
	$result = mysql_query($sql) or die (mysql_error());

	echo 'inserted';
	echo "<br/>";
}
	

?>
