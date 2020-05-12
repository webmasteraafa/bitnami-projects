<?php
$title = "AAFA OLD SITE";
include ('/../main_files/template/header_viewer.php');
include ('/inc/web-content-lib.php');
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
                    <h1 class="page-header">AAFA Old Site</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
              	
    	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
			<h3>AAFA</h3>
    			<?php include('/inc/viewer.php');?>
    			</div>
    	</div>		
    		<div class="row">
    		<div class="col-lg-10 col-md-10 col-sm-10">
    		
    		     <div id="txtHint"></div></div>
    		<div class="col-lg-2 col-md-2 col-sm-2"></div>
    		</div>
    	          
    		</div>
    	</div>

    
    <!-- /#wrapper -->

   <?php
     include ('/../main_files/template/footer.php');      
           ?>

