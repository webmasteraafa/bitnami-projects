<?php
$title = "KFA Sliders";
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
             	<h3>KFA Sliders</h3>
             <button style="background-color: #1E86BC; padding:5px; text-align:center"><a style="color:#fff" href="sliders_kfa.php?Group=All">All</a></button>
             	<?php $kfa  = get_slider_locations_kfa(); 
             	  while ($row = mysql_fetch_array($kfa))
             	  {
				  	  echo '<button style="background-color: #1E86BC; padding:5px; text-align:center"><a style="color:#fff" href="sliders_kfa.php?Group=';
				  	  echo $row['slider-location'];
				  	  echo '">' .$row['slider-location']. '</a></button>';
				  }
				?></div></div>
				<div class="row">
				<?php  
				  include ('inc/view_kfa.php');           	?>
             	
             	
             	
            </div> 
           
           </div>
           </div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>