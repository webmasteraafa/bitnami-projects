<?php
$title = "Image Application";
include ('/../main_files/template/header.php');
include ('/inc/image_app_lib.php');
$album = $_GET['album'];

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
                    <h1 class="page-header">Image Gallery</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-12 col-md-12">
           <ul class="gallery_nav">
                    <?php 
                     $data = grab_albums();
                     while ($row = mysql_fetch_array($data))
                     {
                     	echo '<li><a href="gallery.php?album=';
                     	echo $row['albumname'];
                     	echo '">';
                     	echo $row['albumname'];
                     	echo '</a></li>';
                     	
                     }
                    
                    ?></ul>
                    <br clear="both"/><br/>
                    <?php 
                        
                        switch ($album)
                        {
                        	case ('kfa'):
                            include ('/inc/view_kfa.php');
                            break;
                            case ('aafa'):
                            include ('/inc/view_aafa.php');
                            break;
                            case ('matt'):
                            include ('/inc/view_misc.php');
                            break;
                            case ('strides'):
                            include ('/inc/view_strides.php');
                            break;
                        }
                    ?>
                </div>
                
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>