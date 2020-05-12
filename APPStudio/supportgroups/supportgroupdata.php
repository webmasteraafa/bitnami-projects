<?php
include ('/../main_files/template/header.php');
require('/inc/lib-support.php');
db_connect();
$state=$_GET['state'];
$title = $state;

$count_support = 0;
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
                    <h1 class="page-header"><?php echo $state; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6">
           	
           
           <?php
  
  $result = pull_state_specific($state);
            $row_count = mysql_num_rows($result);
            while ($row = mysql_fetch_array($result))
            {
          	if ($row['supportgroup'] == 'YES')
          	{
              if (($row_count > 1) AND ($row_count > 1))
               {
			 	include('/inc/process.php');
			 	echo '</div>';
                echo '<div class="col-lg-6 col-md-6">';
			   }
			    elseif ($row_count == 1)
			   {
			 	include('/inc/process.php');
			   }
			}   
			else if ($row['supportgroup'] == 'NO')
			{
				echo "We're sorry, there are not any Educational Support Groups in your area at this time. If you would like to start an AAFA Educational Support Group in your community, please contact AAFA at 800-7-ASTHMA.";
				
			}
            
            
            }
            
           ?>
         
           </div>	
    			</div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>