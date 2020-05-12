<?php
$state = $_GET['name'];
$groupname = $_GET['group'];
$title = "Update Support Group Form";
include ('template/header.php');
require('conn_support.php');


?>

<body>

    <div id="wrapper">

        <?php include ('template/nav.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update 
                    
                    
                    <?php  
                    if (!isset($state))
                                                         {
                                                         	echo $groupname;
                                                         	
                                                         }
                                                         else 
														{
															echo $state;
														}
                                                         ?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
      			<div class="col-lg-9 col-md-9 col-sm-9">
      			<div class="col-lg-9 col-md-9 col-sm-9" style="border:3px solid #000; margin:0 auto; border-radius: 10px;">
    				<?php
    			
    				if (isset($groupname))
                        {
						  $sql = "SELECT * FROM `supportgroup_info` WHERE`groupname` = '$groupname'";
  						  $result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
                          while ($row = mysql_fetch_array($result))
                          {
                          	  $state1 = $row['statename'];
                          	  $esg = $row['supportgroup'];
                          	  $group1 = $row['groupname'];
                          	  $area = $row['areaserved'];
                          	  $audience = $row['audience'];
                          	  $focus = $row['focus'];
                          	  
                          	  include('inc/support.php');
                          }
							
							
						}
                        else
                        {
                          $sql2 = "SELECT * FROM `supportgroup_info` WHERE`statename` = '$state'";
  						  $result2 = mysql_query($sql2) or die ('Could not your information;' . mysql_error());
                          $row_count = mysql_num_rows($result2);
                         
                          while ($row = mysql_fetch_array($result2))
                          {
                          	  $state1 = $row['statename'];
                          	  $esg = $row['supportgroup'];
                          	  $group1 = $row['groupname'];
                          	  $area = $row['areaserved'];
                          	  $audience = $row['audience'];
                          	  $focus = $row['focus'];
                          	  include('inc/support.php');
                          }
                         }
                         ?>
    					
    					
    					
    					
    					</div></div>
    			<div class="col-lg-3 col-md-3 col-sm-3">	</div>
    			</div>	
    		</div></div><?php

include ('template/footer.php');
?>			
    			