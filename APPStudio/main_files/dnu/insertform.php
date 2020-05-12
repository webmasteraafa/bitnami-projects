<div class="col-lg-4 col-md-4 col-sm-4" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
    			<form class="form-horizontal" action="insert_user.php" method="post">
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputUsername" class="control-label">Username</label>
    					<input type="text" class="form-control" id="inputUsername" name="username" placeholder="Enter Username">
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputPass" class="control-label">Password</label>
    					<input type="text" class="form-control" id="inputPass" name="password" placeholder="Enter Password">
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputEmail" class="control-label">Email</label>
    					<input type="text" class="form-control" id="inputEmail" name="emailaddress" placeholder="Enter Email">
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputfullname" class="control-label">Name</label>
    					<input type="text" class="form-control" id="inputfullname" name="fullname" placeholder="Enter Name">
    				</div>
    				<div class="form-group" style="padding:6px;">
    				<label for= "inputPermissiom" class="control-label">Permission</label>
    					<select name="permission" id="inputPermission">
    						
    						<option value="admin">Admin</option>
    						<option value="designer">Data</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action"  value="add" class="btn btn-default">Add User</button>
    					</div>
  </div>
    			</form>
    			
    		</div>