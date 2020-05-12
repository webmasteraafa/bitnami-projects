<?php
$title = "Create Users";
include ('/../main_files/template/header.php');
include ('/inc/user_lib.php');
$user = $_GET['user'];
$SA = $_GET['SA'];
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
                    <h1 class="page-header">View Profiles</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6">
          <div class="table-responsive">
               <table class="table-bordered">
           <?php 
           $result =  view_profiles ($SA, $user); 
           
           while ($row = mysql_fetch_array($result))
           {
           	  echo "<tr><td>Username:</td><td>";
           	  echo $row['username'];
           	  echo '</td></tr><tr><td>Full name:</td><td>';
           	  echo $row['name'];
           	  echo '</td></tr><tr><td>Email:</td><td>';
           	  echo $row['emailaddress'];
           	  echo '</td></tr>';
           }
           ?>
           </table></div>
           
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
