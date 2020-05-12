<?php

$title = "Content Dashboard";
include ('/../main_files/template/header.php');
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
                    <h1 class="page-header">Content Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           
          <div class="col-lg-6 col-md-6 col-sm-6">
              <h3>Website Sliders</h3>
              <p><a href="sliders_kfa.php?Group=All"><img src="http://www.kidswithfoodallergies.org/themes/kfa-new-theme/img/kfa-new.png"></a><br>
              <span style="text-align:center"><a href="sliders_kfa.php?Group=All">KFA SLIDERS</a>
              <br><a href="add_slider_form_KFA.php">Add a new slider</a></span><p><br>
              <p><a href="slider_aafa.php?Group=All"><img src="http://www.aafa.org/themes/kfa-new-theme/img/aafa-new.png"></a>
              <span style="text-align:center"><br><a href="sliders_aafa.php?Group=All">AAFA Sliders</a>
              <br><a href="add_slider_form_AAFA.php">Add a new slider</a></span><p>
           </div>
          <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top:60px; text-align:center">
           <h3>Content Viewer</h3>
           <p><a href="AAFA_old_site_data.php">AAFA Old Site Content</a></p>
           <p><a href="AAFA_spanish_data.php">AAFA Spanish Site</a></p>
           <p><a href="AAFA_statehonorroll_data.php">State Honor Roll 2015</a></p>
           
           </div>	
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           
    
  
