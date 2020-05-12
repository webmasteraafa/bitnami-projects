<?php
$title = "Support Group States";
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
                    <h1 class="page-header">Support Group</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6">
           	
           <table width="100%" cellpadding="5" border="1">
           <tr align="center" style="font-weight:bold"><td>View State</td><td>Count</td><td>Support Group</td><td>Update State</td></tr>
           <?php      
  require('/inc/lib-support.php');
  
  $result = pull_support_group_data();
 
            while ($row = mysql_fetch_array($result))
            {
          	echo'<tr><td>';
          	echo'<a href="supportgroupdata.php?state=';
          	$state =$row['statename'];
          	echo $state;
          	echo '">';
          	echo $state;
          	echo '</a>';
          	echo '</td><td align="center">';
            if ($row['supportgroup'] == 'YES'){
				echo $row['COUNT(statename)'];
            echo '</td><td align="center">';
			}
			else if ($row['supportgroup'] == 'NO')
			{
				echo '0';
				 echo '</td><td align="center">';
			}
            echo $row['supportgroup'];
            echo '</td><td align="center">';
          	echo'<a href="updatesupportgroup.php?state=';
          	$state =$row['statename'];
          	echo $state;
          	echo '">';
          	echo $state;
          	echo '</a>';
          	echo '</td></tr>';
            }
            
           ?>
           </table>
           </div>	
    			</div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           
    
  
