<?php
$title = "AdGlare Campaigns";
include ('/../main_files/template/header.php');
require ('/inc/adglare_lib.php');	

$arr_POST = array();
$arr_POST['zID'] = $_POST['zone'];

$arr_POST['date_from'] = $_POST['from'];;

$arr_POST['date_until'] = $_POST['until'];

$method_name = $_POST['action'];



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
                    <h1 class="page-header">AdGlare Zones Reporting</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">
           <?php
				require ('adglare_data.php');
				
$arr_length = count($json[response][data][0][datasets]);
//parse response into JSON object
echo '<h3>Report for ';
echo $json[response][data][0][zone_name];
echo '</h3>';

?><div class="table-responsive">
  <table class="table table-bordered">
<tr><td>Creative ID</td><td>Impressions</td><td>Clicks</td></tr>
<?php
for ($x = 0; $x <=$arr_length; $x++ )
{
echo '<tr><td>';
echo $json[response][data][0][datasets][$x][crID];
echo '</td><td>';
echo $json[response][data][0][datasets][$x][impressions];
echo '</td><td>';
echo $json[response][data][0][datasets][$x][clicks];
echo '</td></tr>';
}
?>
</table></div>


 </div>
    			</div>
    			</div></div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>