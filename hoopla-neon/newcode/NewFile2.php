<?php
$gender = '';
$displayName = '';
$first = '';
$last = '';
$iam = '';
$manage1 = '';
$manage2 = '';
$race = '';
$research = '';
$income ='';
$location = '';
$zip = '';
$pfac = '';
$location = '';
$education = '';
$awareness = '';
$birthday -'';
$country = '';
$session = '';
$gendercode = '';
$gender = $data["user"]["gender"];
echo $gender;
if ($gender = "male") || ($gender = "Male")
{
	$gendercode = "M";
}
else
{
	$gendercode = "F";
	
}
$id = $data["user"]["id"];
$displayName = $data["user"]["displayName"];
$email = $data["user"]["emailAddress"];
$first = $data["customProfileFields"][0]["value"];
$last = $data["customProfileFields"][1]["value"];
$iam = $data["customProfileFields"][2]["selectedOptions"][0]["ti$


$research = $data["customProfileFields"][5]["selectedOptions"][0]["title"];
$pfac = $data["customProfileFields"][6]["selectedOptions"][0]["title"];
$awareness = $data["customProfileFields"][7]["selectedOptions"][0]["title"];
$race=$data["customProfileFields"][8]["selectedOptions"][0]["title"];
$education= $data["customProfileFields"][9]["selectedOptions"][0]["title"];
$location = $data["customProfileFields"][10]["selectedOptions"][0]["title"];
$income = $data["customProfileFields"][11]["selectedOptions"][0]["title"];
$zip = $data["postalCode"];
$birthday = $data["birthdayDatetime"];
$country =$data["country"];

$cdata = GetCountryId($country);
echo $cdata[0];
echo $cdata[1];


$neon = neon_login();
$session = loginResponse["userSessionId"];
$url = "https://api.neoncrm.com/neonws/services/api/account/createIndividualAccount?userSessionId=$session";
$url .= "&individualAccount.primaryContact.firstname=";
$url .= $first;
$url .= "&indivualAccount.primaryContact.lastName=";
$url .= $last;
$url .= "individualAccount.primaryContact.email1=";
$url .= $email;
$url .= "individualAccount.primaryContact.gender.code=";
$url .= $gendercode;
$url .= "individualAccount.primaryContact.gender.name=";
$url .= $gender;
$url .= "individualAccount.primaryContact.addresses.address.isPrimaryAddress=true";
$url .= "individualAccount.primaryContact.addresses.address.addressType.id =1";
$url .= "individualAccount.primaryContact.addresses.address.addressType.Name = Home";
$url .= "individualAccount.primaryContact.addresses.address.country.id=";
$url .= $cdata[0];
$url .= "individualAccount.primaryContact.addresses.address.country.name=";
$url .= $cdata[1];
$url .= "individualAccount.primaryContact.addresses.address.zipCode=";
$url .= $zip;
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldId=110";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldOptionId=";
$url .= "&individualAccount.customFieldDataList.customFieldData.fieldValue=";
$url .= $id;
echo $url;

?>

?>