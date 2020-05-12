<?php
$title = "AdGlare Creatives";
include ('/../main_files/template/header.php');
require ('/inc/adglare_lib.php');
$id = $_GET['id'];
$arr_POST = array();
$arr_POST['cID'] = $id;
$method_name = 'campaigns_creatives_list';
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
                    <h1 class="page-header">AdGlare Campaigns Creatives</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">

<?php
require ('adglare_data.php');
$arr_length = count($json[response][data]);?>

<h3>Creative List</h3>
<div class="table-responsive">
  <table class="table table-bordered">
<tr><td>Creative ID</td><td>Creative Name</td><td>Ad Type</td><td>Ad Format</td><td>image</td><td>Target</td></tr>
<?php
for ($x=0; $x<=$arr_length; $x++)
{
echo '<tr><td>';
echo $json[response][data][$x][crID];
echo '</td><td>';
echo $json[response][data][$x][creativename];
echo '</td><td>';
echo $json[response][data][$x][adtype];
echo '</td><td>';
echo $json[response][data][$x][adformat];
echo '</td><td>';
echo '<img src="';
echo $json[response][data][$x][location];
echo '"/>';
echo '</td><td>';
echo $json[response][data][$x][targetURL];
echo '</td></tr>';
}
?>
</table></div> </div>
    			</div></div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           
