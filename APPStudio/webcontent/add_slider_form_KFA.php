<?php
    $title = "Add slider to Database";
    include ('/../main_files/template/header.php');
    include ('/inc/web-content-lib.php');
    db_connect();
	$slider_group="";
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
                    <h1 class="page-header">Add New Slider KFA</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
              	
    	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
			<h3>KFA</h3>
    			<?php include('/inc/kfa.php');?>
    			</div>
    		<div class="col-lg-6 col-md-6 col-sm-6">&nbsp;</div>
    	 
    		</div>
    	</div></div>

    
    <!-- /#wrapper -->

   <?php
     include ('/../main_files/template/footer.php');      
           ?>
