<?php
require ('config.php');
$site = $_GET['site'];
$id = $_GET['id'];
require ('matching_tables.php');


if ($site == "AAFA")
{
	$urlh = 'http://community.aafa.org/api/v1/members/' . $id. '?m_id=457293735035228056';
	$username = "9cfdf02a35f6e477b7a06603fe1ab30b";
    $community = "AAFA"; 
}
elseif ($site == "KFA")
{
	$urlh = 'http://community.kidswithfoodallergies.org/api/v1/members/' . $id. '?m_id=1571083423419120';
    $username = "e7513e717b081e346302c2642c35faeb";	
    $community = "KFA";
}

$data = curl ($username, $urlh);


$community_code = get_community($community);
$gender = $data["user"]["gender"];
$gendercode = get_gender($gender);

$id = $data["user"]["id"];
$displayName = $data["user"]["displayName"];
$username = $data["user"]["username"];
$email = $data["user"]["emailAddress"];

$first = $data["customProfileFields"][0]["value"];
$last = $data["customProfileFields"][1]["value"];
$iam = '';
for ($t = 0; $t <= 15; $t++)
{
	if (!empty($data["customProfileFields"][2]["selectedOptions"][$t]["title"]))
	{	
	    $iam = $data["customProfileFields"][2]["selectedOptions"][$t]["title"];
	    $code = get_iam_code($iam);
		array_push($iam_code, $code);		
	}
	else 
	{		
		 $t= 15;
	}		
} 
$klength = 0;
$klength = count($iam_code);

$manage1 = '';
$myself_code = array();
for ($x = 0; $x < 32; $x++)
{
	if (!empty($data["customProfileFields"][3]["selectedOptions"][$x]["title"]))
	{	
	    $manage1 = $data["customProfileFields"][3]["selectedOptions"][$x]["title"];
	    echo $manage1;
	    
	    $code2 = get_manage_myself($manage1);
		echo $code2;
		array_push($myself_code,$code2);
		
	}
	else 
	{
		
		 $x= 32;
	}
}
$mlength = 0;
$mlength = count($myself_code);

echo $mlength;
$mlength = 0;
$mlength = count($myself_code);

$manage2 = '';
$caregiver_code = array();

for ($y = 0; $y < 32; $y++)
{
	if (!empty($data["customProfileFields"][4]["selectedOptions"][$y]["title"]))
	{
		$manage2 = $data["customProfileFields"][4]["selectedOptions"][$y]["title"];
		echo $manage2;
		
		$code3 = get_manage_caregiver($manage2);
		echo $code3;
		array_push($caregiver_code,$code3);	
	}
	else 
	{
		
		 $y= 32;
	}
}
$nlength= 0;
$nlength = count($caregiver_code);
echo $nlength;
$research = $data["customProfileFields"][5]["selectedOptions"][0]["title"];
$research_code = get_research($research);

$pfac = $data["customProfileFields"][6]["selectedOptions"][0]["title"];
$pfac_code = get_pfac($pfac);
$awareness = '';
$awareness_code = array();

for ($n = 0; $n < 4; $n++)
{
	if (!empty($data["customProfileFields"][6]["selectedOptions"][$n]["title"]))
	{
		$awareness = $data["customProfileFields"][6]["selectedOptions"][$n]["title"];
		echo $awareness;
		$code3 = get_awareness($awareness);
		echo $code3;
		array_push($awareness_code,$code3);		
	}
	else 
	{
		
		 $n= 4;
	}
	
}
$alength = 0;
$alength = count($awareness_code);
$race = $data["customProfileFields"][8]["selectedOptions"][0]["title"];
$race_code = get_race ($race);

$education= $data["customProfileFields"][9]["selectedOptions"][0]["title"];
$education_code = get_education($education);

$location = $data["customProfileFields"][10]["selectedOptions"][0]["title"];
$local_code = get_locale($location);

$income = $data["customProfileFields"][11]["selectedOptions"][0]["title"];
$income_code = get_income($income);
$zip = $data["postalCode"];
$birthday = $data["birthdayDatetime"];
$activity = $data["activityPoints"];
$posts = $data["postCount"];
$country =$data["country"];

$data3 = GetCountryId($country);
$cdata = array();
$cdata = explode(",",$data3);

$neon = neon_login();
$session = $neon[loginResponse][userSessionId];

$url = "https://api.neoncrm.com/neonws/services/api/account/createIndividualAccount?userSessionId="; 
$url .= $session;
$url .= "&individualAccount.primaryContact.firstname=";
$url .= $first;
$url .= "&indivualAccount.primaryContact.lastName=";
$url .= $last;
$url .= "&individualAccount.primaryContact.email1=";
$url .= $email;
$url .= "&individualAccount.primaryContact.gender.code=";
$url .= $gendercode;
$url .= "&individualAccount.primaryContact.gender.name=";
$url .= $gender;
$url .= "&individualAccount.primaryContact.addresses.address.isPrimaryAddress=true";
$url .= "&individualAccount.primaryContact.addresses.address.addressType.id =1";
$url .= "&individualAccount.primaryContact.addresses.address.addressType.Name = Home";
$url .= "&individualAccount.primaryContact.addresses.address.country.id=";
$url .= $cdata[0];
$url .= "&individualAccount.primaryContact.addresses.address.country.name=";
$url .= $cdata[1];
$url .= "&individualAccount.primaryContact.addresses.address.zipCode=";
$url .= $zip;

$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";

$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=260";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= $local_code;
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";

$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=261";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= $income_code;
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";

$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=262";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= $education_code;
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";

$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=263";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
$url .= $displayName;

$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=264";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
$url .= $birthday;


$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=265";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= $research_code;
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";

$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=266";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= $pfac_code;
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";


$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=267";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= $race_code;
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
for ($d = 0; $d <= $alength; $d++)
{
	$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=123";
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
    $url .= $iam_code[$d];
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
}

for ($a = 0; $a <= $alength; $a++)
{
	$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=268";
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
    $url .= $awareness_code[$a];
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
}

for ($b = 0; $b <= $mlength; $b++)
{
	$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=269";
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
    $url .= $myself_code[$b];
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
}
for ($c = 0; $c<=$nlength; $c++)
{
	$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=269";
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
    $url .= $caregiver_code[$c];
    $url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
	
	
}
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=271";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
$url .= $posts;

$url .="&individualAccount.customFieldDataList.customFieldData.fieldId=272";
$url .="&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= $community_code;


$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=110";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
$url .= $id;
echo $url;


?>


