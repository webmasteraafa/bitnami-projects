<?php
$title = "AdGlare Creatives";
include ('/../main_files/template/header.php');
require ('/inc/adglare_lib.php');
db_connect();
$data = grab_campaigns();
	
	while ($row = mysql_fetch_array($data))
	{
		$arr_POST = array();
		$arr_POST['cID'] = $row['cID'];
		$method_name = 'campaigns_creatives_list';
		require ('adglare_data.php');
        insert_creatives ($json);
        
	}
	
	

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
                    <h1 class="page-header">AdGlare Campaigns Creatives</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">




</div>
    			</div></div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           
