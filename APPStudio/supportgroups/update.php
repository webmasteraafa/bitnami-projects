<?php
$title = "Update Support Group Form";
include ('/../main_files/template/header.php');
require('/inc/lib-support.php');
db_connect();
$name='';
$group='';
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
                    <h1 class="page-header">Update 
                    
                    
                    <?php  
                    if (isset ($_GET['name']))
                    {
						
							$name = $_GET['name'];
							echo $name;
							
					}                             	
                  elseif (isset ($_GET['group'])) 
					{
							echo $_GET['group'];
					} 							
                 ?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
      			<div class="col-lg-9 col-md-9 col-sm-9">
      			<div class="col-lg-9 col-md-9 col-sm-9" style="border:3px solid #000; margin:0 auto; border-radius: 10px;">
      			
    				<?php
    			
    			    if (isset ($_GET['group']))
                        {
						  $group = $_GET['group'];
						  $result = update_group($group);
						   while ($row = mysql_fetch_array($result))
                          {
                          	   echo $row['groupname'];
                          	  $state1 = $row['statename'];
                          	  $esg = $row['supportgroup'];
                          	  $group1 = $row['groupname'];
                          	  $area = $row['areaserved'];
                          	  $audience = $row['audience'];
                          	  $focus = $row['focus'];
                          	  
                          	  include('/inc/support.php');
                          }
							
							
						}
                        elseif (isset ($name))
                        {
                          
                       
                           $result2 = update_state($name);
                           $row_count = mysql_num_rows($result2);
                         
                          while ($row = mysql_fetch_array($result2))
                          {
                          	  $state1 = $row['statename'];
                          	  $esg = $row['supportgroup'];
                          	  $group1 = $row['groupname'];
                          	  $area = $row['areaserved'];
                          	  $audience = $row['audience'];
                          	  $focus = $row['focus'];
                          	  include('/inc/support.php');
                          }
                         }
                         ?>
    					
    					
    					
    					
    					</div></div>
    			<div class="col-lg-3 col-md-3 col-sm-3">	</div>
    			</div>	
    		</div></div><?php

include ('/../main_files/template/footer.php');
?>			
    			