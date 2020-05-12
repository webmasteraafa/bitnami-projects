<?php
$title = "Support Group States";
include ('template/header.php');
?>

<body>

    <div id="wrapper">

        <?php include ('template/nav.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Support Group</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6">
           	
           <table>
           <tr><td>State</td><td>Count</td><td>Support Group</td></tr>
           <?php
  require('conn_support.php');
 
  $sql = "SELECT DISTINCT `statename` , COUNT(`statename`),`supportgroup` FROM `supportgroup_info` GROUP BY `statename` ";
  $result = mysql_query($sql) or die
            ('Could not your information;' . mysql_error());
            while ($row = mysql_fetch_array($result))
            {
          	echo'<tr><td>';
          	echo $row['statename'];
            echo '</td></tr><tr><td>';
            echo $row['COUNT(statename)'];
            echo '</td></tr><tr><td>';
            echo $row['supportgroup'];
            echo '</td></tr>';
            
            }
            
           ?>
           </table>
           </div>	
    			</div>
    			</div>
    			</div>
           <?php
     include ('template/footer.php');      
           ?>
           
    
  
