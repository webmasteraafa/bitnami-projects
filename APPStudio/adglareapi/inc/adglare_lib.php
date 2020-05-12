<?php
function adglare_curl ($url, $arr_POST){
$ch = curl_init();
if($ch === false) echo "cURL is not supported?";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($arr_POST));
$content = curl_exec($ch);
curl_close($ch);

return $content;
}

function insert_campaigns ($json){
	$cid = '';
	$name = '';
	$status = '';
	$type = '';
	$impressions = '';
	$clicks = '';
	$created = '';
	$start = '';
	$runsuntil = '';
	$weight = '';
	$tier = '';
	$displaynetwork = '';
	
	$arr_length = count($json[response][data]);
	for ($x=0; $x<=$arr_length; $x++)
    {
	   $cid = $json[response][data][$x][cID];
	   $name = $json[response][data][$x][name];
	   $type = $json[response][data][$x][type];
	   $status = $json[response][data][$x][status];
	   $impressions = $json[response][data][$x][impressions];
	   $clicks = $json[response][data][$x][clicks];
	   $created = $json[response][data][$x][created];
	   $start = $json[repsonse][data][$x][start];
	   $runsuntil = $json[response][data][$x][runsuntil];
	   $weight = $json[response][data][$x][weight];
	   $tier = $json[repsonse][data][$x][tier];
	   $displaynetwork = $json[response][data][$x][displaynetwork];
	   
	   	   $SQL = "INSERT INTO `campaigns`(`cID`, `name`, `type`, `status`, `impressions`, `clicks`, `created`, `start`, `runsuntil`, `weight`, `tier`, `displaynetwork`) VALUES ('$cid', '$name', '$type', '$status', '$impressions', '$clicks', '$created', '$start', '$runsuntil', '$weight', '$tier','$displaynetwork')";
	$result = mysql_query($SQL)or die (mysql_error());
	echo 'inserted';
	
	
	}
}
function insert_zones ($json){
	$zid = '';
	$zgid = '';
	$name = '';
	$status = '';
	$impressions = '';
	$clicks = '';
	$created = '';
	
	
	$arr_length = count($json[response][data]);
	for ($x=0; $x<=$arr_length; $x++)
    {
	   $zid = $json[response][data][$x][zID];
	   $zgid = $json[response][data][$x][zgID];
	   $name = $json[response][data][$x][name];
	   $status = $json[response][data][$x][status];
	   $impressions = $json[response][data][$x][impressions];
	   $clicks = $json[response][data][$x][clicks];
	   $created = $json[response][data][$x][created];
	  
	   
	   	   $SQL = "INSERT INTO `zones`(`zID`, `zgID`, `name`, `status`, `created`, `impressions`, `clicks`) VALUES ('$zid','$zgid','$name','$status','$created','$impressions','$clicks')";
	$result = mysql_query($SQL)or die (mysql_error());
	echo 'inserted';
	
	
	}
}
function insert_zone_groups ($json){
	
	$zgid = '';
	$name = '';
	$status = '';
	$impressions = '';
	$clicks = '';
	$created = '';
	
	
	$arr_length = count($json[response][data]);
	for ($x=0; $x<=$arr_length; $x++)
    {
	   
	   $zgid = $json[response][data][$x][zgID];
	   $name = $json[response][data][$x][name];
	   $status = $json[response][data][$x][status];
	   $impressions = $json[response][data][$x][impressions];
	   $clicks = $json[response][data][$x][clicks];
	   $created = $json[response][data][$x][created];
	  
	   
	   	   $SQL = "INSERT INTO `zonegroups`(`zgID`, `name`, `status`, `created`, `impressions`, `clicks`) VALUES ('$zgid','$name','$status','$created','$impressions','$clicks')";
	$result = mysql_query($SQL)or die (mysql_error());
	echo 'inserted';
	
	
	}
}
function insert_creatives ($json){
	
	$crid = '';
	$cname = '';
	$adtype = '';
	$adformat = '';
	$location = '';
	$targeturl = '';
	$status = '';
	
	$arr_length = count($json[response][data]);
	for ($x=0; $x<=$arr_length; $x++)
    {
	   
	   $crid = $json[response][data][$x][crID];
	   $cname = $json[response][data][$x][creativename];
	   $adtype = $json[response][data][$x][adtype];
	   $adformat = $json[response][data][$x][adformat];
	   $location = $json[response][data][$x][location];
	   $targeturl = $json[response][data][$x][targetURL];
	   $status = $json[response][data][$x][status];
	   
	   	   $SQL = "INSERT INTO `creatives`(`crID`, `creativename`, `adtype`, `adformat`, `location`, `targeturl`, `status`) VALUES ('$crid','$cname','$adtype','$adformat','$location','$targeturl','$status')";
	$result = mysql_query($SQL)or die (mysql_error());
	echo 'inserted';
	
	
	}
}
function grab_campaigns ()
{
	$sql = "SELECT `cID` FROM `campaigns";
	$result = mysql_query($sql)or die (mysql_error());  
	return $result;
}

