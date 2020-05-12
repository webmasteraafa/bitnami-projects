<?php
$title = "Create Users";
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
                    <h1 class="page-header">Create Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6">
           <form action="user_form.php" method="post">
                    
                    <div class="form-group" style="padding:6px;">
    				<label for= "username" class="control-label">Username</label>
    					<input type="text" name="username" id="username" value=""/>
    					</div>
    	            <div class="form-group" style="padding:6px;">
    				<label for= "password" class="control-label">Password</label>
    					<input type="text" name="password" id="word" value=""/>
    					</div>	
    				<div class="form-group" style="padding:6px;">
    				<label for= "username" class="control-label">Full Name</label>
    					<input type="text" name="fullname" id="fullname" value=""/>
    					</div>	
    					<div class="form-group" style="padding:6px;">
    				<label for= "email" class="control-label">Email</label>
    					<input type="text" name="email" id="email" value=""/>
    					</div>
    			   <?php include ('/inc/permissions.php')?>		
           <div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="add_user" class="btn btn-default">Add User</button>
    					</div>
           </div>
           </form>
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>