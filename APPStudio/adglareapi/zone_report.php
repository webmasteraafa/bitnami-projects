<?php
$title = "AdGlare API";
include ('/../main_files/template/header.php');
require ('/inc/adglare_lib.php');
db_connect();
$id = $_GET['id'];
$gid = $_GET['gid'];
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
                    <h1 class="page-header">AdGlare Zone Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6" style="border:3px solid #0000cc; margin:0 auto; border-radius: 10px;">
            <form class="form-horizontal" action="reports_z.php" method="post">
    		
			<div class="form-group" style="padding:6px">
    				
    				<div class="custom">
    				<input type="radio" name="date-range" id ="custom" style="margin: 10px" value="custom"/>Custom<br>
    				<div class="date-fields">
    				<div class="form-group" style="padding:6px">
    				<P style="color:red; font-weight:bold">Format YYYY-MM-DD</P>
    				<label for= "inputfrom" class="control-label">Date From - Start</label>
    					<input type="text" class="form-control" id="from" name="from" placeholder="Date From">
    				</div>
    				<div class="form-group" style="padding:6px">
    				<P style="color:red; font-weight:bold">Format YYYY-MM-DD</P>
    				<label for= "inputuntil" class="control-label">Date Until - End</label>
    					<input type="text" class="form-control" id="until" name="until" placeholder="Date Until">
    				</div>
    				</div>
    				</div>
    				<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-4">
      						<button type="submit" name="action" value="reports_zones" class="btn btn-default">Create Report</button>
    					</div>
  </div>
	
	 </div>
    			</div>
    			</div>
    			</div>
    			
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
           