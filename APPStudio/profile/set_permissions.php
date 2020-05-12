<?php
$title = "Set Permissions";
include ('/../main_files/template/header.php');
$username = $_GET['username'];

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
                    <h1 class="page-header">Permnissions </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
       
           <div class="row">
           <div class="col-lg-3 col-md-6">
           <form action="/inc/user_form.php" method="POST">
           <input type="text" id="user" name="user" value="<?php echo $username; ?>">
           
           
           </form>
           </div>
           </div>
    			</div>
    			</div>
           <?php
     include ('/../main_files/template/footer.php');      
           ?>
