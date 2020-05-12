<?php

$title = "Hoopla API";
include ('/../main_files/template/header.php');
require ('/inc/api_lib.php');


?>

<body>

    <div id="wrapper">

        <?php  
             $data = '/../main_files/template/nav.php';
             include ($data);
             ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hoopla API</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
           <h3><a href="member_api.php">Member API</a></h3>
          
           <h3>Blog API</h3>
           <h3>Survey API</h3>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
           
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           
