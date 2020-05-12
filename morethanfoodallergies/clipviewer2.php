<style type="text/css">
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
}

.flex-item {
 
  padding: 5px;
  width: 250px;
  height: 200px;
  margin-top: 10px;
  line-height: 150px;
  color: white;
  font-weight: bold;
  font-size: 3em;
  text-align: center;
}
	
	
	
</style>
<?php
// Iniatialization //
$urlc = "";
$urli = "";
$tot = 0;
$i = 0;
$json2 = "";
 $durl = "";   
 $dispurl = "";
$title = "";
   $description = "";
   
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
$urlc = 'https://community.kidswithfoodallergies.org/api/v1/clips/?m_id=33108525135571974&clip_set_id=512473169122057146';
$json = curl($username, $password, $urlc );
$tot = $json["totalClips"];

// Grab the photos//
$urli = 'https://community.kidswithfoodallergies.org/api/v1/clips/?m_id=33108525135571974&clip_set_id=512473169122057146&count='.$tot;
$json2 = curl($username, $password, $urli );

// Show the photos//
?>
<div class="flex-container">
<?php
do {
   
   $durl =  $json2[clips][$i][url];
   $dispurl = $json2[clips][$i][displayUrl];
   $title = $json2[clips][$i][title];
   $description = $json2[clips][$i][description];
   ?>

   	<div class="flex-item">
   		<a href="<?php echo $dispurl; ?>" target="_blank"><?php echo $title ?></a>
   		
   		<p><img src="<?php echo $durl; ?>" alt="<?php echo $title; ?>" width="100px" style="float:left; padding:5px;"/><?php echo $description; ?>
   		</p>
   	</div>
   	
   	<?php 
   	
   
	$i++;
}while ($i < $tot)
?>
</div>
