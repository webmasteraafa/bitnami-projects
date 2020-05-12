<?php
$title = "Create Album";
include ('/../main_files/template/header.php');
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
                    <h1 class="page-header">Create Album</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           
    		
    		<div class="col-lg-6 col-md-6 col-sm-6" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
    			<form class="form-horizontal" action="add_image.php" method="post">
    				<div class="form-group" style="padding:6px">
    				<label for= "inputAlbumName" class="control-label">Album</label>
    					<input type="text" class="form-control" id="inputAlbumName" name="albumname" placeholder="album name">
    				</div>
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="add_album" class="btn btn-default">Create Album</button>
    					</div>
  </div>
    			</form>
    			
    		</div>
    		
    		<div class="col-lg-6 col-md-6 col-sm-6">
    		<h3>Albums Available</h3>
    	<ul style="list-style-type: none">
    		<?php include ('/inc/image_app_lib.php');
    		$result = grab_albums();
    		while ($row = mysql_fetch_array($result))
    		{
    			echo '<li>';
    			echo $row['albumname'];
    			echo '</li>';
    		}
    		?>
    		</ul>
           </div></div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>