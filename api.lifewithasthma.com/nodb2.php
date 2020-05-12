<?php 
session_start();
require ('inc/config.php');
$user = 'aafa';
$url = newmemberurla;
$json = curl ($url,$user);


$memberaafa = new aafamember();

$memberaafa -> id =  $json['members'][0]['user']['id'];
$url = 'http://community.aafa.org/api/v1/members/' . $memberaafa -> id. '?m_id=457293735035228056';
$json = curl ($url,$user);
$memberaafa -> gender = $json['user']['gender'];
if ($memberaafa -> gender = 'female')
{
	$code = 'F';
	$memberaafa -> gender = 'Female';
}
else if ($memberaafa -> gender = 'male')
{
	$code = 'M';
	$memberaafa -> gender = 'Male';
}

$memberaafa -> title = $json['user']['title'];
$memberaafa->emailaddress =  $json['user']['emailAddress'];
$memberaafa->displayname = $json['user']['displayName'];
	$i = 0;
	do
	{
		$fields = $json['customProfileFields'][$i]['name'];
		
		
		switch ($fields)
		{
			case 'First Name (Private)':
				$memberaafa ->firstname = $json['customProfileFields'][$i]['value'];
				break;
			case 'Last Name (Private)':
				$memberaafa ->lastname = $json['customProfileFields'][$i]['value'];
				break;
			case 'I am a':
				$memberaafa ->manage = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
			case 'I manage':
				$memberaafa ->asthmaopt1 = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				$memberaafa ->asthmaopt2 = $json['customProfileFields'][$i]['selectedOptions']['1']['title'];
				$memberaafa ->asthmaopt3 = $json['customProfileFields'][$i]['selectedOptions']['2']['title'];
				$memberaafa ->asthmaopt4 = $json['customProfileFields'][$i]['selectedOptions']['3']['title'];
				$memberaafa ->asthmaopt5 = $json['customProfileFields'][$i]['selectedOptions']['4']['title'];
				$memberaafa ->asthmaopt6 = $json['customProfileFields'][$i]['selectedOptions']['5']['title'];
				$memberaafa ->asthmaopt7 = $json['customProfileFields'][$i]['selectedOptions']['6']['title'];
				$memberaafa ->asthmaopt8 = $json['customProfileFields'][$i]['selectedOptions']['7']['title'];
				$memberaafa ->asthmaopt9 = $json['customProfileFields'][$i]['selectedOptions']['8']['title'];
				$memberaafa ->asthmaopt10 = $json['customProfileFields'][$i]['selectedOptions']['9']['title'];
					
				break;
			case 'Would you like to find out more about research opportunities or clinical trials that will help shape the future for those living with asthma and allergies, including food allergies?':
				$memberaafa ->research = $json['customProfileFields'][$i]['selectedOptions']['0']['title'];
				break;
		}
		$i = $i + 1;
			
		
	}while ($i < 11);	
	if (!empty($memberaafa ->firstname))
	{	
		include ('neonlogin.php');
		
		//Send data
		
		
		$url = 'https://api.neoncrm.com/neonws/services/api/account/createIndividualAccount?userSessionId='.$session_id. '&individualAccount.primaryContact.firstName='.$memberaafa->firstname.'&individualAccount.primaryContact.lastName='.$memberaafa->lastname.'&individualAccount.primaryContact.email1='.$memberaafa->emailaddress;
		$url .= '&individualAccount.primaryContact.gender.code='.$code.'&individualAccount.primaryContact.gender.name='.$memberaafa->gender;
		$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=110&individualAccount.customFieldDataList.customFieldData.fieldOptionId&individualAccount.customFieldDataList.customFieldData.fieldValue=' . $memberaafa->id;
		if (!empty ($memberaafa->manage) )
		{	
		
		$neondatafield = get_asthma_manage($memberaafa->manage);
		$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=123&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$neondatafield .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt1))
		{
			
			$op1 = get_asthmamanage($memberaafa ->asthmaopt1);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op1 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt2 ))
		{
			
			$op2 = get_asthmamanage($memberaafa ->asthmaopt2);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op2 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt3))
		{
			$op3 = get_asthmamanage($memberaafa ->asthmaopt3);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op3 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt4))
		{
			$op4 = get_asthmamanage($memberaafa ->asthmaopt4);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op4 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt5 ))
		{
			$op5 = get_asthmamanage($memberaafa ->asthmaopt5);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op5 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt6 ))
		{
			$op3 = get_asthmamanage($memberaafa ->asthmaopt6);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op6 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt7))
		{
			$op1 = get_asthmamanage($memberaafa ->asthmaopt7);
			$ur7 .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op7 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt8 ))
		{
			$op8 = get_asthmamanage($memberaafa ->asthmaopt8);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op8 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt9))
		{
			$op9 = get_asthmamanage($memberaafa ->asthmaopt9);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op9 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		if (!empty($memberaafa ->asthmaopt10))
		{
			$op10 = get_asthmamanage($memberaafa ->asthmaopt10);
			$url .= '&individualAccount.customFieldDataList.customFieldData.fieldId=142&individualAccount.customFieldDataList.customFieldData.fieldOptionId='.$op10 .'&individualAccount.customFieldDataList.customFieldData.fieldValue=';
		}
		
		
		echo $url;
		
	}
	
	//$json_final = neon_curl($url);
	//print_r ($json_final);

