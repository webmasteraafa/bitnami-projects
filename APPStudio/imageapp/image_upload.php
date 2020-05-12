<?php
session_start();
$title = "Upload Images";
include ('/../main_files/template/header.php');
include('/inc/image_app_lib.php'); 
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
                    <h1 class="page-header">Image Upload</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           
    		<div class="col-lg-6 col-md-6 col-sm-6">
    		
    		<p><a href="server_images_aafa.php">Add From Server - AAFA</a></p>
    			<p><a href="server_images_kfa.php">Add From Server - KFA</a></p>
    			<p><a href="server_images_strides.php">Add From Server - Stride for Safe Kids</a></p>
    			<p><a href="batch_file_form.php">Batch File Upload</a></p>
    			
    			<br>
    	   </div>
    		<div class="col-lg-6 col-md-6 col-sm-6"
    		 style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
    		<?php  
    		include('upload_form.php');?></div>
    		
          </div>
          
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>