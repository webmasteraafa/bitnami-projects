<form class="form-horizontal" action="add_slider.php" method="post" enctype="multipart/form-data">
<div class="form-group" style="padding:6px;">
<label for= "Slidername" class="control-label">Slider Name</label>
<input type="text" name="slider-name" id="slider-name" value=""/>
</div>
<div class="form-group" style="padding:6px;">
<label for= "FileLocation" class="control-label">File Location</label>
<input type="text" name="file-location" id="file-location" value=""/>
</div>
<div class="form-group" style="padding:6px">
<label for= "website" class="control-label">Website</label>
<input type="text" name="website" id="website" value="AAFA"/>
</div>
<div class="form-group" style="padding:6px;">
<label for= "sliderLocation" class="control-label">Slider Location</label>
<select name="slider-location" id="aafa">
<?php
$slider_group = "All";
$website ='AAFA';
$sliders = grab_slider_location($slider_group, $website);
while ($row = mysql_fetch_array($sliders))
{
	echo  "    <option value=\"" .$row['slider-location']. "\">" . $row['slider-location'] .
	"</option>\n";
}
?>
						</select>
				    </div>
					<div class="form-group" style="padding:6px;">
    				<label for= "Live" class="control-label">Live</label>
					<input type="radio" name="live" value="yes"/>
					<input type="radio" name="live" value="no"/>
					</div>
					<div class="form-group" style="padding:6px;">
    				<label for= "Notes" class="control-label">Notes</label>
    				<textarea cols="20" rows="10" name="notes">
						
					</textarea>
    				</div>
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="add" class="btn btn-default">Add Slider</button>
							
    					</div>
  </div>
    			</form>
