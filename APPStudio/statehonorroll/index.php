<?php

$title = "State Dashboard";
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
                    <h1 class="page-header">State Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6">
           <h3>Reports</h3>
           <p><a href="/AppStudio/statehonorroll/core_credit_form.php">Core Credit Indicator Report</a></p>
           <p><a href="/AppStudio/statehonorroll/extra_credit_form.php">Extra Credit Indicator Report</a></p>
           </div>
           </div>
           <div class="row">
           <?php
  require('/inc/statehonorroll_lib.php');
 
  $counter = 0;
  $result = pull_state_images();
  
            while ($row = mysql_fetch_array($result))
            {
            $name = $row['statename'];
          	echo '<div class="col-md-2">';
            echo '<h3>';
            echo $name;
            echo '</h3>';
            echo '<a href ="form.php?state=';
            echo $name;
            echo '"><img class="img-thumbnail" src="';
            echo $row['state_image_url'];
            echo '"/></a></div><div class="col-md-2" style="margin-top:60px; text-align:center"> ';
            echo '<a href ="form.php?state=';
            echo $name;
            echo '" target="_blank">';
            echo '2016</a><br/><a href="/AppStudio/statehonorroll/shr_2017_data.php?state=';
            echo $name;
            echo '" target="_blank">2017</a><br/><a href="/AppStudio/statehonorroll/shr_update_data.php?state=';
            echo $name;
            echo '" target="_blank">SHR update</a>';
            echo '</div>';  
            $counter = $counter +1;
            if ($counter == 2) 
            {
				echo '</div><div class="row">';
				$counter = 0;			}
            }
            
           ?>
           </div>	
           
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           
    
  
