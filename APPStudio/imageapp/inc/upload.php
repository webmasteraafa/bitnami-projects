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
	$imagename = $_POST['image-name'];
	$keywords = $_POST['keywords'];
	$source = $_POST['source'];
	$placement = $_POST['placement'];
	$liscense = $_POST['liscense'];
	$notes = $_POST['notes'];
	$version = $_POST['version'];
	
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 5000) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
   $ext = array();
   $ext =  explode('.',$_FILES["file"]["name"]);
   echo $ext[1];
   
    if (($ext[1] == 'jpg') || ($ext[1]=='png') || ($ext[1]=='gif') || ($ext[1]=='bmp') || ($ext[1]=='psd'))
    {
	  echo 'Right file type';
	  $extension = $ext[1];
	}
    else 
    {
		echo 'Wrong File Type';
		header ("Refresh: 5; URL=" . $redirect2  . "");        
          	echo 'Go Back to Upload area';     
          	echo "(If your browser doesn't support this, " .         
          	"<a href=" .$redirect2 . "\">click here</a>)"; 
	}
	$doc_root = $_SERVER["DOCUMENT_ROOT"];

	$file_location = $doc_root.'/media/' .$album .'/'. $category.'/';
	if (file_exists($file_location . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {

      move_uploaded_file($_FILES["file"]["tmp_name"],
      $file_location . $_FILES["file"]["name"]);
      echo "Stored in: " . $file_location . $_FILES["file"]["name"];
      $file = $_FILES["file"]["name"];
     
	  Insert_Image ($file_location, $imagename, $extension, $album, $category,  $user, $keywords, $source, $placement, $liscense, $notes, $version);
      header ("Refresh: 5; URL=" . $redirect  . "");        
          	echo "Upload Complete!<br> Please fill out the rest of the Image properties";        
          	echo "(If your browser doesn't support this, " .         
          	"<a href=" .$redirect .">click here</a>)";	
	  }

	  
  
  
  
?> 