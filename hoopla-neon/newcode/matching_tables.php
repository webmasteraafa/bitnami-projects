<?php
function get_gender ($gender)
{
	

	if ($gender == "male")
	{
		$gendercode = "M";
		return $gendercode;
	}
	else
	{
		$gendercode = "F";
	    return $gendercode;
	}
}
function get_iam_code ($iam) 
{
   	   if (($iam == 'Person with asthma') || ($iam =='Person with allergies') || ($iam =='Peron with food allergies'))
   	   {
	   	$iam_code = '';
	   	$iam_code = '559';
	   	return $iam_code;
	   }
	   elseif (($iam == 'Parent or caregiver of a child with asthma') || ($iam == 'Parent or caregiver of a child with allergies') || ($iam == 'Parent or caregiver of a child with food allergies'))
	   {
	   	$iam_code = '';
	   	$iam_code = '560';
	   	return $iam_code;
	   }
	   elseif (($iam == 'Spouse or caregiver of a child with asthma') || ($iam == 'Spouse or caregiver of a child with allergies') || ($iam == 'Spouse or caregiver of a child with food allergies'))
	   {
	   	$iam_code = '';
	   	$iam_code = '560';
	   	return $iam_code;
	   }
	   elseif ($iam == 'Health professional (MD, RN, RT or other)')
	   {
	   	$iam_code = '';
	   	$iam_code = '561';
	   	return $iam_code;
	   }
	   elseif ($iam == 'School nurse')
	   {
	   	$iam_code = '';
	   	$iam_code = '562';
	   	return $iam_code;
	   }
       elseif ($iam == 'Educator / school staff')
	   {
	   	$iam_code = '';
	   	$iam_code = '563';
	   	return $iam_code;
	   }
	   elseif ($iam == 'Support group leader')
	   {
	   	$iam_code = '';
	   	$iam_code = '564';
	   	return $iam_code;
	   }
	   elseif ($iam == 'Asthma coalition leader')
	   {
	   	$iam_code = '';
	   	$iam_code = '955';
	   	return $iam_code;
	   }
       elseif ($iam == 'Asthma educator')
	   {
	   	$iam_code = '';
	   	$iam_code = '956';
	   	return $iam_code;
	   }
	   elseif ($iam = 'Health fair, expo or event director')
	   {
	   	$iam_code == '';
	   	$iam_code = '957';
	   	return $iam_code;
	   }
	   elseif ($iam == 'Other')
	   {
	   	$iam_code = '';
	   	$iam_code = '565';
	   	return $iam_code;
	   }  
   	
}
function get_education ($education){
	
	if ($education == 'Some high school. no diploma')
	{
		$education_code = '';
		$edcuation_code = '1013';	
		return $education_code;
	}
	elseif ($education == 'High school graduate or GED')
	{
		$education_code = '';
		$edcuation_code = '1014';
		return $education_code;
	}
     elseif ($education == 'Some college, no diploma')
	{
		$education_code = '';
		$edcuation_code = '1015';
		return $education_code;
	}
	elseif ($education == 'Assoiciate\'s degree')
	{
		$education_code = '';
		$edcuation_code = '1016';
		return $education_code;
	}
    elseif ($education == 'Bachelor\'s degree')
	{
		$education_code = '';
		$edcuation_code = '1017';
		return $education_code;
	}
    elseif ($education == 'Graduate degree')
	{
		$education_code = '';
		$edcuation_code = '1018';
		return $education_code;
	}
     elseif ($education == 'Post doctoral studies')
	{
		$education_code = '';
		$edcuation_code = '1019';
		return $education_code;
	}


}   
function get_race ($race)
{
    if ($race == 'White')
    {
		$race_code = '';
		 $race_code ='1024';
		 return $race_code;
	}
    elseif ($race == 'Black or African American')
    {
		$race_code = '';
		 $race_code ='1025';
		 return $race_code;
	}
	elseif ($race == 'Hispanic, Latino or Spanish')
    {
		$race_code = '';
		 $race_code ='1026';
		 return $race_code;
	}
	elseif ($race == 'American Indian or Alaska Native')
    {
		$race_code = '';
		 $race_code ='1027';
		 return $race_code;
	}
	elseif ($race == 'Asian or Asian American')
    {
		$race_code = '';
		 $race_code ='1028';
		 return $race_code;
	}
	elseif ($race == 'Native Hawaiian or Pacific Islander')
    {
		$race_code = '';
		 $race_code ='1029';
		 return $race_code;
	}
	elseif ($race == 'Other')
    {
		$race_code = '';
		 $race_code ='1030';
		 return $race_code;
	}
	  
   
}

 function get_locale ($location)
 {
 	if ($location == 'Rural')
 	{
		$local_code = '';
		$local_code = '1004';
		return $local_code;	
	}
 	elseif ($location == 'Suburban')
 	{
		$local_code = '';
		$local_code = '1005';
		return $local_code;		
	}
	elseif ($location == 'Urban')
 	{
		$local_code = '';
		$local_code = '1006';
		return $local_code;		
	}
 	
 }  
 function get_research ($research)
 {
 	if ($research == 'Yes, I would like to know more about opportunities available')
 	{
		$research_code = '';
		$research_code = '1020';
		return $research_code;
	}
 	else {
		$research_code = '';
		$research_code = '1021';
		return $research_code;
	}
 		
 }
 function get_pfac ($pfac)
 {
 	if ($research == 'Yes, I would like to know more about opportunities available')
 	{
		$pfac_code = '';
		$pfac_code = '1022';
		return $pfac_code;
	}
 	else {
		$pfac_code = '';
		$pfac_code = '1023';
		return $pfac_code;
	}
 		
 }
 
 function get_awareness ($awareness)
 {
 	
 	if ($awareness == 'Participate in phone interviews (for AAFA or media)')
 	{
		$local_code = '';
		$local_code = '1031';
		return $local_code;	
	}
 	elseif ($location == 'Become a patient spokesperson')
 	{
		$local_code = '';
		$local_code = '1032';
		return $local_code;		
	}
	elseif ($location == 'Host an event, walk or fundraiser for AAFA')
 	{
		$local_code = '';
		$local_code = '1033';
		return $local_code;		
	}
 	elseif ($location == 'I\'m not ready right now')
 	{
		$local_code = '';
		$local_code = '1034';
		return $local_code;		
	}
	
 	
 }
 function get_community ($community)
 {
 	if ($community == 'AAFA')
 	{
		$community_code = '';
		$community_code = '1099';
		return $community_code;
	}
 	else 
 	{
		$community_code = '';
		$community_code = '1100';
		return $community_code;
	}
 	
 	
 }
 function get_manage_myself ($manage1)
 {
 	$myself_code = '';
 	switch ($manage1)
 	{
		case 'I prefer not to answer':
		$myself_code = '1035';
		return $myself_code;
		case 'Asthma':
		$myself_code = '1036';
		return $myself_code;
		case '"Asthma - eosinophilic asthma':
		$myself_code = '1037';
		return $myself_code;
		case 'Asthma - exercise induced asthma':
		$myself_code = '1038';
		return $myself_code;
		case 'Asthma - allergic asthma':
		$myself_code = '1039';
		return $myself_code;
		case 'Atopic dermatitis (eczema)':
		$myself_code = '1040';
		return $myself_code;
		case 'Celiac or gluten intolerance':
		$myself_code = '1041';
		return $myself_code;
		case 'Cockroach allergy':
		$myself_code = '1042';
		return $myself_code;
		case 'Drug allergy':
		$myself_code = '1043';
		return $myself_code;
		case 'Dust mite allergy':
		$myself_code = '1044';
		return $myself_code;
		case 'Egg allergy':
		$myself_code = '1045';
		return $myself_code;
		case 'Eosinophilic gastrointestinal disorder':
		$myself_code = '1046';
		return $myself_code;
		case '1047':
		$myself_code = 'Fish allergy';
		return $myself_code;
		case 'Food Protein Induced Enterocolitis (FPIES)':
		$myself_code = '1048';
		return $myself_code;
		case 'Grass pollen allergy':
		$myself_code = '1049';
		return $myself_code;
		case 'Latex allergy':
		$myself_code = '1050';
		return $myself_code;
		case 'Milk allergy':
		$myself_code = '1051';
		return $myself_code;
		case 'Mold allergy':
		$myself_code = '1052';
		return $myself_code;
		case 'Nasal allergy':
		$myself_code = '1053';
		return $myself_code;
		case 'Peanut allergy':
		$myself_code = '1054';
		return $myself_code;
		case 'Pet / animal / dander allergy':
		$myself_code = '1055';
		return $myself_code;
		case 'Sesame seed allergy':
		$myself_code = '1056';
		return $myself_code;
		case 'Shellfish allergy':
		$myself_code ='1057';
		return $myself_code;
		case 'Soy allergy':
		$myself_code = '1058';
		return $myself_code;
		case 'Stinging insect allergy':
		$myself_code = '1059';
		return $myself_code;
		case 'Tree nut allergy':
		$myself_code = '1060';
		return $myself_code;
		case 'Tree pollen allergy':
		$myself_code = '1061';
		return $myself_code;
		case 'Urticaria (hives)':
		$myself_code = '1062';
		return $myself_code;
		case 'Weed pollen allergy':
		$myself_code = '1063';
		return $myself_code;
		case 'Wheat allergy':
		$myself_code = '1064';
		return $myself_code;
		
		case 'None of the above':
		$myself_code = '1065';
		return $myself_code;
		
		case 'Other':
		$myself_code = '1066';
		return $myself_code;
				
	}	
 	
 }

 function get_manage_caregiver ($manage2)
 {
 	$caregiver_code = '';
 	switch ($manage2)
 	{
		case 'I prefer not to answer':
		$caregiver_code = '1067';
		return $caregiver_code;
		case 'Asthma':
		$caregiver_code = '1068';
		return $caregiver_code;
		case '"Asthma - eosinophilic asthma':
		$caregiver_code = '1069';
		return $caregiver_code;
		case 'Asthma - exercise induced asthma':
		$caregiver_code = '1070';
		return $caregiver_code;
		case 'Asthma - allergic asthma':
		$caregiver_code = '1071';
		return $caregiver_code;
		case 'Atopic dermatitis (eczema)':
		$caregiver_code = '1072';
		return $caregiver_code;
		case 'Celiac or gluten intolerance':
		$caregiver_code = '1073';
		return $caregiver_code;
		case 'Cockroach allergy':
		$caregiver_code = '1074';
		return $caregiver_code;
		case 'Drug allergy':
		$caregiver_code = '1075';
		return $caregiver_code;
		case 'Dust mite allergy':
		$caregiver_code = '1076';
		return $caregiver_code;
		case 'Egg allergy':
		$caregiver_code = '1077';
		return $caregiver_code;
		case 'Eosinophilic gastrointestinal disorder':
		$caregiver_code = '1079';
		return $caregiver_code;
		case 'Fish allergy':
		$caregiver_code = '1078';
		return $caregiver_code;
		case 'Food Protein Induced Enterocolitis (FPIES)':
		$caregiver_code = '1080';
		return $caregiver_code;
		case 'Grass pollen allergy':
		$caregiver_code = '1081';
		return $caregiver_code;
		case 'Latex allergy':
		$caregiver_code = '1082';
		return $caregiver_code;
		case 'Milk allergy':
		$caregiver_code = '1083';
		return $caregiver_code;
		case 'Mold allergy':
		$caregiver_code = '1084';
		return $caregiver_code;
		case 'Nasal allergy':
		$caregiver_code = '1085';
		return $caregiver_code;
		case 'Peanut allergy':
		$caregiver_code = '1086';
		return $caregiver_code;
		case 'Pet / animal / dander allergy':
		$caregiver_code = '1087';
		return $caregiver_code;
		case 'Sesame seed allergy':
		$caregiver_code = '1088';
		return $caregiver_code;
		case 'Shellfish allergy':
		$caregiver_code ='10589';
		return $caregiver_code;
		case 'Soy allergy':
		$caregiver_code = '1090';
		return $caregiver_code;
		case 'Stinging insect allergy':
		$caregiver_code = '1091';
		return $caregiver_code;
		case 'Tree nut allergy':
		$caregiver_code = '1092';
		return $caregiver_code;
		case 'Tree pollen allergy':
		$caregiver_code = '1093';
		return $caregiver_code;
		case 'Urticaria (hives)':
		$caregiver_code = '1094';
		return $caregiver_code;
		case 'Weed pollen allergy':
		$caregiver_code = '1095';
		return $caregiver_code;
		case 'Wheat allergy':
		$caregiver_code = '1096';
		return $caregiver_code;
		
		case 'None of the above':
		$caregiver_code = '1097';
		return $caregiver_code;
		
		case 'Other':
		$caregiver_code = '1098';
		return $caregiver_code;
				
	}	
 	
 }
function get_income ($income)
{
	if ($income == 'Under $49,999')
	{
		$income_code = '';
		$income_code - '1006';
		return $income_code;
	}
	elseif ($income == '$50,000 - $74,999')
	{
		$income_code = '';
		$income_code - '1007';
		return $income_code;
	}
	elseif ($income == '$75,000 - $99,999')
	{
		$income_code = '';
		$income_code - '1008';
		return $income_code;
	}
	elseif ($income == '$100,000 - $149,999')
	{
		$income_code = '';
		$income_code - '1009';
		return $income_code;
	}
	elseif ($income == '$150,000 - $199,999')
	{
		$income_code = '';
		$income_code - '1010';
		return $income_code;
	}
	elseif ($income == '$200,000 +')
	{
		$income_code = '';
		$income_code - '1011';
		return $income_code;
	}
	elseif ($income == 'Prefer not answer')
	{
		$income_code = '';
		$income_code - '1012';
		return $income_code;
	}
	
}


















?>