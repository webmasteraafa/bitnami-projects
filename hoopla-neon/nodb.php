<?php
session_start();
$id = $_GET['id'];
require ('inc/globalvariables.php');
require ('inc/config.php');
$user = 'kfa';
$url = newmemberurlk;
$json = curl ($url,$user);


$memberkfa = new kfamember();
//$memberkfa -> id =  $json['members'][1]['user']['id'];
$memberkfa->id = $id;
$url = 'http://community.kidswithfoodallergies.org/api/v1/members/' . $memberkfa -> id. '?m_id=1571083423419120';
$json = curl ($url,$user);
$memberkfa -> gender = $json['user']['gender'];

if ($memberkfa -> gender = 'female')
{
	$code = 'F';
	$memberkfa -> gender = 'Female';
}
else if ($memberkfa -> gender = 'male')
{
	$code = 'M';
	$memberkfa -> gender = 'Male';
}

$memberkfa -> title = $json['user']['title'];
$memberkfa->emailaddress =  $json['user']['emailAddress'];
$memberkfa->displayname = $json['user']['displayName'];
	$i = 0;
	do
	{
		$fields = $json['customProfileFields'][$i]['name'];
		
		
		switch ($fields)
		{
			case 'First Name (Private)':
				$memberkfa ->firstname = $json['customProfileFields'][$i]['value'];
				break;
			case 'Last Name (Private)':
				$memberkfa ->lastname = $json['customProfileFields'][$i]['value'];
				break;
			case 'Postal/Zip code (Archive)':
				$memberkfa -> oldpost 	= $json['customProfileFields'][$i]['value'];
				break;
			case 'Country (Archive)':
				$memberkfa->oldcountry = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
			case 'I am a:':
				$memberkfa ->manage = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
			case 'Referred from:':
				$memberkfa ->reference = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
			case 'I manage:':
				$memberkfa ->foodopt1 = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				$memberkfa ->foodopt2 = $json['customProfileFields'][$i]['selectedOptions']['1']['title'];
				$memberkfa ->foodopt3 = $json['customProfileFields'][$i]['selectedOptions']['2']['title'];
				$memberkfa ->foodopt4 = $json['customProfileFields'][$i]['selectedOptions']['3']['title'];
				$memberkfa ->foodopt5 = $json['customProfileFields'][$i]['selectedOptions']['4']['title'];
				$memberkfa ->foodopt6 = $json['customProfileFields'][$i]['selectedOptions']['5']['title'];
				$memberkfa ->foodopt7 = $json['customProfileFields'][$i]['selectedOptions']['6']['title'];
				$memberkfa ->foodopt8 = $json['customProfileFields'][$i]['selectedOptions']['7']['title'];
				$memberkfa ->foodopt9 = $json['customProfileFields'][$i]['selectedOptions']['8']['title'];
				$memberkfa ->foodopt10 = $json['customProfileFields'][$i]['selectedOptions']['9']['title'];
				$memberkfa ->foodopt11 = $json['customProfileFields'][$i]['selectedOptions']['10']['title'];
				$memberkfa ->foodopt12 = $json['customProfileFields'][$i]['selectedOptions']['11']['title'];
				$memberkfa ->foodopt13 = $json['customProfileFields'][$i]['selectedOptions']['12']['title'];
				$memberkfa ->foodopt14 = $json['customProfileFields'][$i]['selectedOptions']['13']['title'];
				$memberkfa ->foodopt15 = $json['customProfileFields'][$i]['selectedOptions']['14']['title'];
				$memberkfa ->foodopt16 = $json['customProfileFields'][$i]['selectedOptions']['15']['title'];
				
				break;
			case 'Newly diagnosed?':
				$memberkfa ->newlydiagnosed = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
			case 'Would you like to find out more about research opportunities or clinical trials that will help shape the future for those living with asthma and allergies, including food allergies?':
				$memberkfa ->research = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
			case 'Playgroups':
				$memberkfa ->playgroups = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
			case 'Subscribe to enews (Archive)':
				$memberkfa ->subscribe = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
		}
		$i = $i + 1;
			
		
	}while ($i < 11);	
	if (!empty($memberkfa ->firstname))
	{	
		include ('neonlogin.php');
		
		//Send data
		$url = 'https://api.neoncrm.com/neonws/services/api/account/createIndividualAccount?userSessionId='.$session_id. '&individualAccount.primaryContact.firstName='.$memberkfa->firstname.'&individualAccount.primaryContact.lastName='.$memberkfa->lastname.'&individualAccount.primaryContact.email1='.$memberkfa->emailaddress;
		$url .= '&individualAccount.primaryContact.gender.code='.$code.'&individualAccount.primaryContact.gender.name='.$memberkfa->gender;
		$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=110&individualAccount.customFieldDataList.customFieldData.fieldOptionId&individualAccount.customFieldDataList.customFieldData.fieldValue=' . $memberkfa->id;
		if (!empty ($memberkfa->manage))
		{
			$neondatafield = get_food_allergy_manage($memberkfa->manage);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=104&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$neondatafield .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty ($memberkfa ->newlydiagnosed))
		{
			$neondatafield2 = get_newlydiagnosed ($memberkfa ->newlydiagnosed);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=106&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$neondatafield2 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
			
		}
		if (!empty ($memberkfa->playgroups))
		{
			$neondatafield3 = get_playgroup_data($memberkfa->playgroups);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=112&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$neondatafield3 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty ($memberkfa->subscribe))
		{
			$neondatafield4 = get_subscribe_data($memberkfa->subscribe);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=102&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$neondatafield4 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty ($memberkfa->reference))
		{
			$neondatafield5 = get_references($memberkfa->reference);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=103&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$neondatafield5 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt1))
		{
			$op1 = get_foodallergy($memberkfa ->foodopt1);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op1 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt2 ))
		{
			$op2 = get_foodallergy($memberkfa ->foodopt2);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op2 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt3))
		{
			$op3 = get_foodallergy($memberkfa ->foodopt3);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op3 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt4))
		{
			$op4 = get_foodallergy($memberkfa ->foodopt4);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op4 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt5 ))
		{
			$op5 = get_foodallergy($memberkfa ->foodopt5);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op5 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt6 ))
		{
			$op3 = get_foodallergy($memberkfa ->foodopt6);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op6 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt7))
		{
			$op1 = get_foodallergy($memberkfa ->foodopt7);
			$ur7 .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op7 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt8 ))
		{
			$op8 = get_foodallergy($memberkfa ->foodopt8);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op8 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt9))
		{
			$op9 = get_foodallergy($memberkfa ->foodopt9);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op9 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt10))
		{
			$op10 = get_foodallergy($memberkfa ->foodopt10);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op10 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt11 ))
		{
			$op11 = get_foodallergy($memberkfa ->foodopt11);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op11 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt12 ))
		{
			$op12 = get_foodallergy($memberkfa ->foodopt12);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op12 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt13))
		{
			$op13 = get_foodallergy($memberkfa ->foodopt13);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op13 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt14))
		{
			$op14 = get_foodallergy($memberkfa ->foodopt14);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op14 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt15 ))
		{
			$op15 = get_foodallergy($memberkfa ->foodopt15);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op15 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberkfa ->foodopt16 ))
		{
			$op16 = get_foodallergy($memberkfa ->foodopt16);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=105&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op16 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		
		echo $url;
	}
	
	
