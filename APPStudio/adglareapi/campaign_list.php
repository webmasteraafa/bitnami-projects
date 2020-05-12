<?php
$title = "AdGlare API";
include ('/../main_files/template/header.php');
require ('/inc/adglare_lib.php');
db_connect();
?>

<body>

    <div id="wrapper">

        <?php $data = check_nav($SA, $CG, $DG); 
             $data = '/../main_files/'.$data;
             include ($data);
   ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">AdGlare Campaign List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">

<?php
//prepare variables
$public_key = 'XB4ryRkVZJ7SNCtExVxzgY2w6dcJRwUn4hrEYuZK';
$private_key = 'YwpEfD2uCfYPJuvUTWPeRGJGZE7WvWmQ5kEzvKKD';

//initialize POST array
$arr_POST = array();

//before hashing, add POST variables for the method we're calling
$method_name = 'campaigns_list';
$arr_POST['cID'] = '';

//add your authentication pairs
$arr_POST['public_key'] = $public_key;
$arr_POST['nonce'] = sprintf('%.0f', round(100 * microtime(true)));
$arr_POST['hash_method'] = 'sha1';

//generate authentication hash variable
$to_be_hashed = $private_key . '_' . http_build_query($arr_POST);
$hash = sha1($to_be_hashed);
$arr_POST['hash'] = $hash;

//send via cURL
$endpoint = 'https://kidswithfoodallergies.adglare.net/api/v1/';
$url = $endpoint . $method_name;
$content = adglare_curl($url, $arr_POST);

//parse response into JSON object
$json = json_decode($content,true);

$arr_length = count($json[response][data]);

echo '<h3>Campaign List</h3>';
echo 'Number of Campaigns:';
echo $arr_length;
?>
<div class="table-responsive">
  <table class="table table-bordered">
<tr><td>Campaign ID</td><td>Campaign Name</td><td>Status</td><td>Impressions</td><td>Clicks</td><td>View Creative</td><td>View Report</td></tr>
<?php 

for ($x=0; $x<=$arr_length; $x++)
{	
echo '<tr><td>';
echo $json[response][data][$x][cID];
echo '</td><td>';
echo $json[response][data][$x][name];
echo '</td><td>';
echo $json[response][data][$x][status];
echo '</td><td>';
echo $json[response][data][$x][impressions];
echo '</td><td>';
echo $json[response][data][$x][clicks];
echo '</td><td>';
echo '<a href="campaign_creative_list.php?id=';
echo $json[response][data][$x][cID];
echo'">';
echo $json[response][data][$x][cID];
echo'</a></td><td>';
echo '<a href="campaign_report.php?id=';
echo $json[response][data][$x][cID];
echo'">';
echo $json[response][data][$x][cID];
echo'</a></td></tr>';

} 
?>
		</table></div>
	
	
	 </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           