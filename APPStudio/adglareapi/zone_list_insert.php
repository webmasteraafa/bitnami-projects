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
                    <h1 class="page-header">AdGlare Zone List</h1>
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
$method_name = 'zones_list';
$arr_POST['zID'] = '';

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
insert_zones($json);

?>	
	
	 </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           