<form class="form-horizontal" action="add_image.php" method="post" enctype="multipart/form-data">
<div class="form-group" style="padding:6px;">
<label for= "Slidername" class="control-label">Image Name</label>
<input type="text" name="image-name" id="image-name" value=""/>
</div>
<div class="form-group" style="padding:6px;">
<label for= "FileLocation" class="control-label">File Location</label>
<input type="text" name="file-location" id="file-location" value=""/>
</div>
<div class="form-group" style="padding:6px">
<label for= "website" class="control-label">Website</label>
<input type="text" name="website" id="website" value="KFA"/>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-4">
<button type="submit" name="action" value="add" class="btn btn-default">Add Image</button>
</div>
</div>
</form>
