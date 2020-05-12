<?php
    $title = "Update slider to Database";
    include ('/../main_files/template/header.php');
    include ('/inc/web-content-lib.php');
    db_connect();
	$slider_name = $_GET['name'];
	$website = $_GET['website'];
	$location = $_GET['location'];
	$result = grab_slider_info($slider_name, $website, $location);
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
                    <h1 class="page-header">Update Slider</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
              	
    	<div class="row">
    	<?php  
    	while ($row = mysql_fetch_array($result))
    	{	
    		$file = $row['file-location'];
    		$live = $row['live'];
    		$notes = $row['notes'];
    	}	
    	?>
		<div class="col-lg-4 col-md-4 col-sm-4" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
			
    			<form class="form-horizontal" action="add_slider.php" method="post" enctype="multipart/form-data">
                 	<div class="form-group" style="padding:6px;">
    				<label for= "Slidername" class="control-label">Slider Namer</label>
    				<input type="text" name="slider-name" id="slider-name" value="<?php echo $slider_name; ?>"/>
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "FileLocation" class="control-label">File Location</label>
    				<input type="text" name="file-location" id="file-location" value="<?php echo $file; ?>"/>
    				</div>
					<div class="form-group" style="padding:6px">
    				<label for= "website" class="control-label">Website</label>
    					<input type="text" name="website" id="website" value="<?php echo $website; ?>"/>
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "sliderLocation" class="control-label">Slider Location</label>
    				<input type="text" name="slider-location" id="slider-location" value="<?php echo  $location; ?> "/>
				    </div>
				    
					<div class="form-group" style="padding:6px;">
    				<label for= "Live" class="control-label">Live</label>
					<input type="text" name="live" id="live" value="<?php echo $live; ?> "/>
					</div>
					<div class="form-group" style="padding:6px;">
    				<label for= "Notes" class="control-label">Notes</label>
    				<textarea cols="20" rows="10" name="notes"><?php echo $notes;?>
					</textarea>
    				</div>
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="update" class="btn btn-default">Update Slider</button>
							
    					</div>
  </div>
    			</form>
    			
    			</div>
    		<div class="col-lg-4 col-md-4 col-sm-4">&nbsp;</div>
    	   <div class="col-lg-4 col-md-4 col-sm-4">
    			
    					</div>
    					</div>
  </div>
    			</form>
    			</div>
    		</div>
    	</div>
            </div>
            <!-- /.row -->
       
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php
     include ('/../main_files/template/footer.php');      
           ?>
