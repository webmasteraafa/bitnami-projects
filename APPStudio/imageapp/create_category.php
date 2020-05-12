<?php
$title = "Create Category";
include ('/../main_files/template/header.php');
include ('/inc/image_app_lib.php');
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
                    <h1 class="page-header">Create Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
    			<form class="form-horizontal" action="add_image.php" method="post">
    				<div class="form-group" style="padding:6px">
    				<label for= "inputCategoryName" class="control-label">Category</label>
    					<input type="text" class="form-control" id="inputCategoryName" name="categoryname" placeholder="category name">
    				</div>
    				<?php include ('/inc/album_dropdown.php');
    				?>
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="add_category" class="btn btn-default">Create Category</button>
    					</div>
  </div>
    			</form>
    			
    		</div>
    		<div class="col-lg-6 col-md-6 col-sm-6">
    		<h3>Categoeies Available</h3>
    	<ul style="list-style-type: none">
    		<?php 
    		$result = grab_category();
    		while ($row = mysql_fetch_array($result))
    		{
    			echo '<li>';
    			echo $row['category'];
    			echo '</li>';
    		}
    		?>
    		</ul>
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
