<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
.photoheader {font-size:1.2em; color:#0073B5; text-decoration:none; font-family:'cabinbold'; text-align:center}
.flex-container {
  padding: 0;
  margin: 0;
  list-style: none;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-flow: row wrap;
  justify-content: space-around;
  align-items: center;
}

.flex-item {
 
  padding: 5px;
  width: 25%;
  height: fit-content;
  margin-top: 10px;
  color: #454545;;
 font-size: 0.8em;
  font-family: 'cabinregular'; 
  text-align: center;
  border: 2px solid #27bac2;
  border-radius: 10px;
}
@media screen and (max-width:800px) {
	.flex-item {
		width:40%;
		
	}
}

@media screen and (max-width:600px) {
	.flex-item {
		width:75%;
		
	}
}


	
</style>
</head>
<body>
<?php
// Iniatialization //
$urlc = "";
$urli = "";
$tot = 0;
$i = 0;
$json2 = "";
 $durl = "";   
 $durl2 = "";
 $dispurl = "";
$title = "";
   $description = "";
   $filename ="";
   
// Curl attributes //
$username = "e7513e717b081e346302c2642c35faeb";
$password = "";

// Curl Function //
function curl ($username, $password, $url)
{
	$ch = curl_init();
	if($ch === false) echo "cURL is not supported?";
	// Set some options - we are passing in a useragent too here
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Send the request & save response to $resp
	$resp = curl_exec($ch);
	// Close request to clear up some resources
	curl_close($ch);
	$json = json_decode($resp, true);
	return $json;
}

// Find the number of photos //
$urlc = 'https://community.kidswithfoodallergies.org/api/v1/clips/?m_id=33108525135571974&clip_set_id=517683967249205115';
$json = curl($username, $password, $urlc );
$tot = $json["totalClips"];

// Grab the photos//
$urli = 'https://community.kidswithfoodallergies.org/api/v1/clips/?m_id=33108525135571974&clip_set_id=517683967249205115&count='.$tot;
$json2 = curl($username, $password, $urli );

// Show the photos//
?>
<div class="flex-container">
<?php
do {
   
   $durl =  $json2["clips"][$i]["titleImage"]["url"];
   $durl2 = $json2["clips"][$i]["url"];
   $dispurl = $json2["clips"][$i]["displayUrl"];
   $title = $json2["clips"][$i]["title"];
   $description = $json2["clips"][$i]["description"];
   $filename = $json2["clips"][$i]["filename"];
   $file = array();
   $file = explode(".", "$filename");
  
   if (($file[1] == "MOV") || ($file[1] == "mov"))
   {?>
   	<div class="flex-item">
   		<div><a href="<?php echo $dispurl; ?>" target="_blank" class="photoheader" style="text-align:center"><?php echo $title ?></a>
   		</div>
   		<div style="display:block; text-align:center;">
   		<img src="<?php echo $durl; ?>" alt="<?php echo $title; ?>" width="110px" style="padding:5px;"/><br style="clear: both;"/><?php echo $description; ?>	
   		</div>
   		</div>
   	
   	<?php }
	else {
   	
  
   ?>

   	<div class="flex-item">
   		<div><a href="<?php echo $dispurl; ?>" target="_blank" class="photoheader" style="text-align:center"><?php echo $title ?></a>
   		</div>
   		<div style="display:block; text-align:center;">
   		<img src="<?php echo $durl2; ?>" alt="<?php echo $title; ?>" width="110px" style="padding:5px;"/><br style="clear: both;"/><?php echo $description; ?>	
   		</div>
   		</div>
   	
   	<?php }
   	
   
	$i++;
}while ($i < $tot)
?>
</div>
</body>