<?php
session_start();
    require ('/../../main_files/inc/lib.php');
    db_connect();
	require('image_app_lib.php');
	$redirect='/AppStudio/imageapp/index.php';
	$redirect2='/AppStudio/imageapp/image_upload.php';
	$user = $_POST['user'];
	$album = $_POST['albums'];
	$category = $_POST['category'];
	
	
     echo $_FILES["zip_file"]["name"];   
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	echo $filename;
	echo $source;
	echo $type;
	
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "The file you are trying to upload is not a .zip file. Please try again.";
	}
     $doc_root = $_SERVER["DOCUMENT_ROOT"];

	$target_path = $doc_root.'/media/' .$album .'/'. $category.'/'.$filename;
	$target = $doc_root.'/media/' .$album .'/'. $category.'/'; 
    if(move_uploaded_file($source, $target_path)) {
		$zip = new ZipArchive();
		$x = $zip->open($target_path);
		if ($x === true) {
			$zip->extractTo($target); // change this to the correct site path
			$zip->close();
	
			unlink($target_path);
		}
		$message = "Your .zip file was uploaded and unpacked.";
	} else {	
		$message = "There was a problem with the upload. Please try again.";
	}
	$file1 = 'setup_file.csv';
	$file2 = 'upload_file.csv';
	upload_csv_data ($file1, $file2, $target);
	
	
?>
