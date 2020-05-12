<div class="col-lg-4 col-md-4 col-sm-4" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
    			<form class="form-horizontal" action="change_password.php" method="post">
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputEmail" class="control-label">Email</label>
    					<input type="text" class="form-control" id="inputEmail" name="emailaddress" placeholder="<?php echo $email; ?>">
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputEmail" class="control-label">Username</label>
    					<input type="text" class="form-control" id="inputuser" name="username" placeholder="<?php echo $user; ?>">
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputPassword" class="control-label">Password</label>
    					<input type="text" class="form-control" id="inputPassword" name="password" placeholder="New Password">
    				</div>
    				
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="password" class="btn btn-default">Change Password</button>
    					</div>
  </div>
    			</form>
    			
    		</div>