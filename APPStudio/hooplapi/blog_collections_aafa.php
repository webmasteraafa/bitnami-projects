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
                    <h1 class="page-header">Hoopla Blog API</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
           
           <?php
             
           
           $username = get_aafa_user();
           $url = 'https://community.aafa.org/api/v1/blog/collections/?m_id=457293735035228056';
           
           $json = curl_json ($username, $password, $url);
           $arr = count($json);
           ?>
           <div class="table-responsive">
  				<table class="table table-bordered"><tr><th>Collection Id</th><th>Collection Name</th><th>Collection ID</th></tr>
           <?php
           for ($i = 0; $i <= $arr; $i++)
           {
		   	 echo '<tr><td>';
		   	 echo $json[$i][collectionId];
		   	 echo '</td><td>';
		   	 echo $json[$i][name];
		   	 echo '</td><td>';
		   	 echo $json[$i][id];
		   	 echo '</td></tr>';
		   }
           
           
?></table></div>
</div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>