


				<form class="form-horizontal" action="/AppStudio/imageapp/inc/upload.php" method="post" enctype="multipart/form-data">
					<div class="form-group" style="padding:6px;">
					<label for= "AlbumSelect" class="control-label">Album Name</label>
					<?php include('/inc/album_dropdown.php'); ?>
					</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "CategorySelect" class="control-label">Category Name</label>
    				
    					<?php include('/inc/category_dropdown.php'); ?>
    				
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "image-name" class="control-label">Image Name (File name)</label>
    				<p>For ex: Slider_flu_shot.png is the Image name</p>
    					<input type="text" name="image-name" id="image-name" value=""/>
    					</div>
    					<div class="form-group" style="padding:6px;">
    				<label for= "keywords" class="control-label">Keywords</label>
    				<p>For ex: Keywords might include, flu shot image, Fall allegy capitals, etc</p>
    					<input type="text" name="keywords" id="keywords" value=""/>
    					</div>
    					<div class="form-group" style="padding:6px;">
    				<label for= "liscense" class="control-label">Liscense</label>
    				<p>For ex: the image was bought from a webiste, or adobc</p>
    					<input type="text" name="liscense" id="liscense" value=""/>
    					</div>
    					<div class="form-group" style="padding:6px;">
    				<label for= "source" class="control-label">Source</label>
    				<p>For ex: website, ad, or email</p>
    					<input type="text" name="source" id="source" value=""/>
    					</div>	
    					<div class="form-group" style="padding:6px;">
    				<label for= "placement" class="control-label">Placement</label>
    				<p>For: Url of image if applicable (KFA or AAFA website)</p>
    					<input type="text" name="placement" id="placement" value=""/>
    					</div>		
    					<div class="form-group" style="padding:6px;">	
    				<label for= "version" class="control-label">Version</label>
    				<input type="radio" name="version" value="new">New<br>
    				<input type="radio" name="version" value="updated">Updated<br>
    				<input type="radio" name="version" value="client">Client<br>
    					</div>	
    					<div class="form-group" style="padding:6px;">
    				<label for= "notes" class="control-label">Notes</label>
    				<textarea cols="20" rows="5" name="notes" id="notes"></textarea>
    					</div>		
    					
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputFile" class="control-label">File Upload</label>
    					<strong>Upload your jpg, png</strong><br /><input type="file" name="file" id="file" value="Upload File" size="40"/>
    				</div>
    				<div class="form-group" style="padding:6px">
    					<input type="text" name="user" id="user" value="<?php echo $user; ?> "
    					
    				</div>
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" class="btn btn-default">upload</button>
    					</div>
  </div>
    			</form>
    			
