<?php
$title = "Profile";
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
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
           
           <?php 
          
           switch ($SA)
           {
           	case 'yes':?>
           	    <h3><a href="view_profiles.php?SA=<?php echo $SA?>&user=<?php echo $user?>">View Profile</a></h3>
           		<h3><a href="create_user.php">Create Users</a></h3>
           		<h3>Update Profile</h3>
           		<h3>Set Permissions</h3>
           		<h3>Change Passwords</h3>
           	<?php  break;
			case 'no': ?>
           	   <h3><a href="view_profiles.php?SA=<?php echo $SA?>&user=<?php echo $user?>">View Profile</a></h3>
           	
           	<?php }
           	
           	?>
           	
          
           
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
           
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>