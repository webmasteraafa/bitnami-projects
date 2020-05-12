<?php
$title = "AdGlare API";
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
                    <h1 class="page-header">AdGlare API</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
           
           <p><a href="campaign_list.php">Campaign List</a></p>
           <p><a href="zone_list.php">Zone List</a></p>
           <p><a href="zonegroups_list.php">Zone Groups List</a></p>
           
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
           
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           

