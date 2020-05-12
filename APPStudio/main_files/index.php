<?php
 require ('/template/header.php');
 db_connect();
 ?>
 <body>

    <div id="wrapper">
   <?php $data = check_nav($SA, $CG, $DG); 
   include ($data);
   ?>
 <div id="page-wrapper">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
             
           </div>
    </div>
    </div>
   <?php 
 require ('/template/footer.php');?> 
 