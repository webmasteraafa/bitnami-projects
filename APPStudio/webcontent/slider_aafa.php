<?php
$title = "AAFA Sliders";
include ('/../main_files/template/header.php');
include ('inc/web-content-lib.php');
db_connect();
$slider_group = '';
$slider_group = $_GET['Group'];
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
                    <h1 class="page-header">Website Slider</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
             
        
            <div class="row">
             
            <div class="col-lg-12">
             	<h3>AAFA Sliders</h3>
             <button style="background-color: #1E86BC; padding:5px; text-align:center">
             <a href="slider_aafa.php?Group=All" style="color:#fff">All</a></button>
             	<?php $aafa  = get_slider_locations_aafa(); 
             	  while ($row = mysql_fetch_array($aafa))
             	  {
				  	  echo '<button style="background-color: #1E86BC; padding:5px; text-align:center"><a style="color:#fff" href="slider_aafa.php?Group=';
				  	  echo $row['slider-location'];
				  	  echo '">' .$row['slider-location']. '</a></button>';
				  }
				?></div></div>
				<div class="row">
				<?php  
				  include ('inc/view_aafa.php');           	?>
             	
             	
             	
            </div>   
           </div>
           </div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
