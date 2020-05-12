<?php
session_start();
$title = "Batch Upload Images";
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
                    <h1 class="page-header">Batch Upload</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           
    		<div class="col-lg-6 col-md-6 col-sm-6">
               <p><a href="/AppStudio/docs/setup_file.csv"> Download Set Up File (.csv)</a><br>
               <a href="/AppStudio/docs/upload_file.csv"> Download Upload File (.csv)</a>
             </p>
    
               <div style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
    
<form action="/AppStudio/imageapp/inc/batch_file_upload.php" method="post" enctype="multipart/form-data">

<div class="form-group" style="padding:6px;">
	<label for= "AlbumSelect" class="control-label">Album Name</label>
	<?php include('/inc/album_dropdown.php'); ?>
	</div>
    	<div class="form-group" style="padding:6px;">
    	<label for= "CategorySelect" class="control-label">Category Name</label>
    	<?php include('/inc/category_dropdown.php'); ?>
    	</div>
<div class="form-group" style="padding:6px;">
<label>Choose a zip file to upload: <input type="file" name="zip_file" /></label>
<br /></div>
<div class="form-group" style="padding:6px">
  <input type="text" name="user" id="user" value="<?php echo $user; ?> "
 </div>
<input type="submit" name="submit" value="Batch" />
</form>
</div></div></div></div></div>
<?php
     include ('/../main_files/template/footer.php');      
           ?>
