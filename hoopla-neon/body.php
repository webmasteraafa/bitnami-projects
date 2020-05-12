<?php
$first = '';
$last = '';
$gender = '';
$id = '';
$displayname = '';
$research= '';
$pfac = '';
$awareness = '';
$income = '';
$race = '';
$location = '';
$country = '';
$zip = '';
$birthday = '';
$iam = '';
$imanage = '';
$mymanage= '';
$education = '';

$gender = $data["user"]["gender"];
$id = $data["user"]["id"];
$displayname = $data["user"]["displayName"];
$first = $data["customProfileFields"][0]["value"];
$last = $data["customProfileFields"][1]["value"];
$iam = $data["customProfileFields"][2]["selectedOptions"][0]["title"];
//Loop through the selections if more than one
$x = 0;
$y - 0;
$imanage = array();
while ($x < 32)
{
	
	if (!empty($data["customProfileFields"][3]["selectedOptions"][$x]["title"]))
	{
		array_push($imanage,$data["customProfileFields"][3]["selectedOptions"][$x]["title"]);	
		$x++;
	}
	else 
	{
	    $x = 32;
	
	}
	
}
$mymanage - array();

while ($y < 32)
{
	
	if (!empty($data["customProfileFields"][4]["selectedOptions"][$y]["title"]))
	{
		array_push($mymanage,$data["customProfileFields"][4]["selectedOptions"][$y]["title"]);
		$y++;
	}
	else
	{
		$y = 32;
		
	}
	
}

$research =$data["customProfileFields"][5]["selectedOptions"][0]["title"];
$pfac = $data["customProfileFields"][6]["selectedOptions"][0]["title"];
$awareness =$data["customProfileFields"][7]["selectedOptions"][0]["title"];
$race = $data["customProfileFields"][8]["selectedOptions"][0]["title"];
$education =$data["customProfileFields"][9]["selectedOptions"][0]["title"];
$location =$data["customProfileFields"][10]["selectedOptions"][0]["title"];
$income =$data["customProfileFields"][11]["selectedOptions"][0]["title"];
$zip = $data["postalCode"];
$birthday= $data["birthdayDatetime"];
$country = $data["country"];


