<?php
   include ('/../main_files/inc/lib.php');
   include ('inc/web-content-lib.php');
    db_connect();
	
	$slidername = $_POST['slider-name'];
	$sliderlocation=$_POST['slider-location'];
	$filelocation =$_POST['file-location'];
	$website=$_POST['website'];
	$live = $_POST['live'];
	$notes = $_POST['notes'];
	
	echo $website;
	echo $sliderlocation;
	
	switch ($_POST['action']){
		
		case 'add':
		  add_slider_db ($slidername, $sliderlocation, $filelocation, $website, $live, $notes);
		break;
	
      case 'update':
			update_slider ($slidername, $sliderlocation, $filelocation, $website, $live, $notes);
		break;	
		
		
		
	}
?>