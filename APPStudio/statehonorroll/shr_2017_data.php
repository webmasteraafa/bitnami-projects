<?php
$state = $_GET['state'];
$title = "State Honor Roll 2017 Data Form";
include ('/../main_files/template/header.php');
require ('/inc/statehonorroll_lib.php');
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
                    <h1 class="page-header">State Honor Roll 2017 Data Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
      			<div class="col-lg-9 col-md-9 col-sm-9">
    		
    					<div class="col-lg-9 col-md-9 col-sm-9" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
    					
							
						
    					<form class="form-horizontal" action="statehonorroll_insert.php" method="post" enctype="multipart/form-data">
    					<input type="hidden" name="year" value="2017"/>
    					<?php 
    					$result = pull_state_date($state);
    					while ($row = mysql_fetch_array($result))
    					{
    						include('state_form.php');
    					 }	
    					 ?>
    					
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="add" class="btn btn-default">Send State Data</button>
    					</div>
    				</div>
    				
    					</form>
    				
    					
    					
    					
    					</div></div>
    			<div class="col-lg-3 col-md-3 col-sm-3">	</div>
    			</div>	
    			</div>
    			</div>
    	<?php

include ('/../main_files/template/footer.php');
?>		