<?php
$title = "Support Group Form";
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
                    <h1 class="page-header">Support Group Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
      			<div class="col-lg-9 col-md-9 col-sm-9">
      			<div class="col-lg-9 col-md-9 col-sm-9" style="border:3px solid #000; margin:0 auto; border-radius: 10px;">
    					<form class="form-horizontal" action="support_group_insert.php" method="post" enctype="multipart/form-data">
    					<div class="form-group" style="padding:6px">
    				<label for= "inputStateName" class="control-label">State Name</label>
    					<input type="text" class="form-control" id="inputStateName" name="state" value ="" maxlength="40" placeholder="state name">
    				</div>
    					<div class="form-group" style="padding:6px">
    					<div ng-app="ESGApp" ng-controller="ESGController">
        <label for="chkESG">Is there a Support Group </label>
            <input type="checkbox" id="chkESG" ng-model="ShowGroupInfo" ng-change="ShowHide()" name="checkESG" value="checked"/>
            
         
       
        <hr />
        <div ng-show="IsVisible">
        <div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="reset" name="reset" value="clear form data" class="btn btn-default">Reset data for new entry</button>
    					</div>	
    					</div>
        <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputSupportName" class="control-label">Support Group Name</label>
    					<input type="text" class="form-control" id="inputSupportName" name="sgname" value ="" maxlength="80" placeholder="Support Group Name">
    				</div>
            <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputAreaServed" class="control-label">Area Served</label>
    					<input type="text" class="form-control" id="inputAreaServed" name="area" value ="" maxlength="80" placeholder="Area served">
    				</div> 
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputAudience" class="control-label">Audience</label>
    					<input type="text" class="form-control" id="inputAudience" name="audience" value ="" maxlength="80" placeholder="Audience">
    				</div>
          
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputFocus" class="control-label">Focus</label>
    					<input type="text" class="form-control" id="inputFocus" name="focus" value ="" maxlength="80" placeholder="Focus">
    				</div>
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputLocation" class="control-label">Meeting Location</label>
    					<input type="text" class="form-control" id="inputLocation" name="location" value ="" maxlength="120"  placeholder="Meeting Location">
    				</div>
    		<div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputMeetings" class="control-label">Meetings</label>
    					<input type="text" class="form-control" id="inputMeetings" name="meetings" value ="" maxlength="90" placeholder="Meetings">
    				</div>
            <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputCoordinator" class="control-label">Coordinator</label>
    					<input type="text" class="form-control" id="inputCoordinator" name="coordinator" value ="" maxlength="80" placeholder="Coordinator">
    				</div> 
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputMedicalAdviser" class="control-label">Medical Advisor</label>
    					<input type="text" class="form-control" id="inputMedicalAdvisor" name="advisor" value ="" maxlength="80" placeholder="Medical Advisor">
    				</div>
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputPhone" class="control-label">Phone Number</label>
    					<input type="text" class="form-control" id="inputPhone" name="phone" value ="" maxlength="40" placeholder="Phone Number">
    				</div>
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputFax" class="control-label">Fax Number</label>
    					<input type="text" class="form-control" id="inputFax" name="fax" value ="" maxlength="40" placeholder="Fax Number">
    				</div>
             
             <div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputEmail" class="control-label">Email</label>
    					<input type="text" class="form-control" id="inputEmail" name="email" value ="" maxlength="40"  placeholder="Email">
    				</div>
    			<div class="form-group" style="padding:6px;width:95%;margin-left:2px">
    				<label for= "inputWebsite" class="control-label">Website</label>
    				<textarea class="form-control" id="inputWebsite" name="website" cols="60" rows="3"></textarea>
		 				<script>
                			CKEDITOR.replace( 'website' );
            			</script>
    				</div>
             
             
             </div>
         </div>
    				</div>		
    				
    					
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="send info" class="btn btn-default">Send State Data</button>
    					</div>	
    					</div>
    					</form>
    					
    					
    					
    					
    					</div></div>
    			<div class="col-lg-3 col-md-3 col-sm-3">	</div>
    			</div>	
    		</div></div><?php

include ('/../main_files/template/footer.php');
?>			
    			