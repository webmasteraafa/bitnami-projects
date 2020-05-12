
<form class="form-horizontal" action="support_update.php" method="post" enctype="multipart/form-data">
    					<div class="form-group" style="padding:6px">
    				<label for= "inputStateName" class="control-label">State Name</label>
    					<input type="text" class="form-control" id="inputStateName" name="state" value ="<?php echo $state1;?>" maxlength="40" placeholder="state name">
    				</div>
    					<div class="form-group" style="padding:6px">
    					<?php 
    					
    					if ($esg == 'YES')
    					{
							echo '<div ng-app="" ng-init="ShowGroupInfo=true">';
						}
    					elseif ($esg == 'NO')
    					{
							echo '<div ng-app="" ng-init="ShowGroupInfo=false">';
						}
    					?>
    					<label for="chkESG" class="control-label"> Is there a Support Group </label>
    					
							<input type="checkbox" name="supportgroup" ng-model="ShowGroupInfo">
						
             	
        <hr />
        <div ng-show="ShowGroupInfo"> 
        <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputSupportName" class="control-label">Support Group Name</label>
    					<input type="text" class="form-control" id="inputSupportName" name="sgname" value ="<?php echo $group1;?>" maxlength="80" placeholder="Support Group Name">
    				</div>
            <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputAreaServed" class="control-label">Area Served</label>
    					<input type="text" class="form-control" id="inputAreaServed" name="area" value ="<?php echo $area;?>" maxlength="80" placeholder="Area served">
    				</div> 
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputAudience" class="control-label">Audience</label>
    					<input type="text" class="form-control" id="inputAudience" name="audience" value ="<?php echo $audience;?>" maxlength="80" placeholder="Audience">
    				</div>
          
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputFocus" class="control-label">Focus</label>
    					<input type="text" class="form-control" id="inputFocus" name="focus" value ="<?php echo $focus;?>" maxlength="80" placeholder="Focus">
    				</div>
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputLocation" class="control-label">Meeting Location</label>
    					<input type="text" class="form-control" id="inputLocation" name="location" value ="<?php echo $row['location'];?>" maxlength="120"  placeholder="Meeting Location">
    				</div>
    		<div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputMeetings" class="control-label">Meetings</label>
    					<input type="text" class="form-control" id="inputMeetings" name="meetings" value ="<?php echo $row['meetings'];?>" maxlength="90" placeholder="Meetings">
    				</div>
            <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputCoordinator" class="control-label">Coordinator</label>
    					<input type="text" class="form-control" id="inputCoordinator" name="coordinator" value ="<?php echo $row['coordinator'];?>" maxlength="80" placeholder="Coordinator">
    				</div> 
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputMedicalAdviser" class="control-label">Medical Advisor</label>
    					<input type="text" class="form-control" id="inputMedicalAdvisor" name="advisor" value ="<?php echo $row['medical_advisor'];?>" maxlength="80" placeholder="Medical Advisor">
    				</div>
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputPhone" class="control-label">Phone Number</label>
    					<input type="text" class="form-control" id="inputPhone" name="phone" value ="<?php echo $row['phone'];?>" maxlength="40" placeholder="Phone Number">
    				</div>
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputFax" class="control-label">Fax Number</label>
    					<input type="text" class="form-control" id="inputFax" name="fax" value ="<?php echo $row['fax'];?>" maxlength="40" placeholder="Fax Number">
    				</div>
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputEmail" class="control-label">Email</label>
    					<input type="text" class="form-control" id="inputEmail" name="email" value ="<?php echo $row['email'];?>" maxlength="40"  placeholder="Email">
    				</div>
    			<div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputWebsite" class="control-label">Website</label>
    				<textarea class="form-control" id="inputWebsite" name="website" cols="60" rows="3"><?php echo $row['website'];?></textarea>
		 				<script>
                			CKEDITOR.replace( 'website' );
            			</script>
    				</div>
             
             
             </div>
         </div>
    				</div>		
    				
    					
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="Update Information" class="btn btn-default">Send State Data</button>
    					</div>	
    					</div>
    					</form>
