<?php
$title = "State Honor Roll 2016 States";
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
                    <h1 class="page-header">State Honor Roll 2016 Data Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <?php
 
  require('/inc/statehonorroll_lib.php');

  $counter = 0;
  $result = pull_state_images();
  
            while ($row = mysql_fetch_array($result))
            {
            $name = $row['statename'];
          	echo '<div class="col-md-4">';
            echo '<a href ="form.php?state=';
            echo $name;
            echo '"><img src="';
            echo $row['state_image_url'];
            echo '"/></a><br/>';
            echo '<a href ="form.php?state=';
            echo $name;
            echo '" target="_blank">';
            echo $name;
            echo '</a>&nbsp;|&nbsp;<a href="shr_2017_data.php?state=';
            echo $name;
            echo '" target="_blank">2017</a>&nbsp;|&nbsp;<a href="shr_update_data.php?state=';
            echo $name;
            echo '" target="_blank">update</a>';
            echo '</div>';  
            $counter = $counter +1;
            if ($counter == 3) 
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
           
    
  
