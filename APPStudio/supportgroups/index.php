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
           <?php
  
   require('/inc/lib-support.php');

  $counter = 0;
  $result = pull_state_images();
  
            while ($row = mysql_fetch_array($result))
            {
            $name = $row['statename'];
          	echo '<div class="col-md-2">';
            echo '<h3>';
            echo $name;
            echo '</h3>';
            echo '<a href ="/AppStudio/supportgroups/supportgroupdata.php?state=';
            echo $name;
            echo '"><img class="img-thumbnail" src="';
            echo $row['state_image_url'];
            echo '"/></a></div><div class="col-md-2" style="margin-top:60px; text-align:center"> ';
            echo'<a href="/AppStudio/supportgroups/supportgroupdata.php?state=';
          	$state =$row['statename'];
          	echo $state;
          	echo '">Support Groups</a>';
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
           
    
  
