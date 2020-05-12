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
                    <h1 class="page-header">Hoopla Member API</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
           <?php 
           $username = get_aafa_user();
           $password = '';
           $url = 'https://community.aafa.org/api/v1/members/?m_id=457293735035228056&page=1';
           $member_count = curl($username, $password, $url);
           $username = get_kfa_user();
           $url = 'https://community.kidswithfoodallergies.org/api/v1/members/?m_id=1571083423419120&page=1';
           $member_count_k = curl($username, $password, $url);
           $db_count = pull_member_count_aafa();
           $db_count_k = pull_member_count_db()
           ?>
           <ul>           
           <li>AAFA Community Members: <?php echo $member_count; ?></li>
           <li>AAFA Database Member Count: <?php echo $db_count; ?></li>
           <li>KFA Community Members: <?php echo $member_count_k; ?></li> 
           <li>KFA Database Member Count: <?php echo $db_count_k; ?></li>
           </ul>
          
           
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
           <h3>Update Databases</h3>
           <a href="update_aafa_db.php">Update AAFA</a><br>
           <a href="update_kfa_db.php">Update KFA</a>
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           
