<?php
$title = "Hoopla API";
include ('/../main_files/template/header.php');
require ('/inc/api_lib.php');

?>

<body>

    <div id="wrapper">

        <?php $data = '/../main_files/template/nav.php';
             include ($data);
   ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Clips</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
           <?php
           
           $username = 'e7513e717b081e346302c2642c35faeb';
                   
           $url = 'https://community.kidswithfoodallergies.org/api/v1/clips/?m_id=1571083423419120';
           
           $json = curl_json ($username, $password, $url);
           
          
           echo 'Number of Clips:' .$json[totalClips];
           echo '<br>';
           print_r($json);
           ?>
          </div>
</div>
           </div>
    			</div>
    			</div>
           
           
            <?php
     include ('/../main_files/template/footer.php');      
           ?>