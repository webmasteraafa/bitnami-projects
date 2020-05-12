<?php
$title = "Update Support Group";
include ('/../main_files/template/header.php');
$state = $_GET['state'];
require('/inc/lib-support.php');
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
                    <h1 class="page-header">Support Group for <?php echo $state ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
      			<div class="col-lg-9 col-md-9 col-sm-9">
      			<ul>
                <?php 
                $result = update_support_group($state);
                while ($row = mysql_fetch_array($result))
				{
                   if ($row['supportgroup'] == 'NO')
                	{
				
				     echo "<br/>";
				     echo "<li>They have no support groups. Would you like to add one?";
				     echo "<br/>";
				     echo '<a href="update.php?name=';
				     echo $state;
				     echo '"/>Update ';
				     echo $state;
				     echo '</a></li>';
				    }
				    else
				    {
					
				   	 echo '<br/><li><a href="update.php?group=';	
				   	 $groupname = $row['groupname'];
				   	 echo $groupname;
				   	 echo '"/>Update ';
				   	 echo $groupname;
				   	 echo '</a></li>';
					}
				}
				
				
				?>
				</ul>
               </div>   
    			<div class="col-lg-3 col-md-3 col-sm-3">	</div>
    			</div>	
    		</div></div><?php

include ('/../main_files/template/footer.php');
?>			
?>