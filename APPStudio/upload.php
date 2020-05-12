<?php
require ('inc/conn.php');
require ('inc/image_lib.php');
$extension = array('jpeg','gif','png','tif','psd');
$file_directory = "images/";
$userid = $_POST['userid'];

switch ($userid){
	case "3":
	$folder = "MattB";
	$cat_folder = "uploads";
	break;
	case "default":
	break;
}
$file_directory = "images/" . $folder . "/" .$cat_folder. "/";


if (isset($_FILES['files'])){
    $errors = array();
	    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ) {
		$file_name = $_FILES['files']['name'][$key];
		$file_size = $_FILES['files']['size'][$key];
		$file_tmp = $_FILES['files']['tmp_name'][$key];
		$file_type = $_FILES['files']['type'][$key];
		
		$file_ext=strtolower(end(explode('.',$_FILES['files']['name'][$key])));  
		echo $file_ext;
        if(in_array($file_ext, $extension) === false){
	     $errors[]="extension not allowed";
		 }  // if loop 2          
		if (file_exists($file_directory . $file_name))
		{
      		echo $file_name . " already exists. ";
        }
    	else
        {
        move_uploaded_file($file_tmp,$file_directory . $file_name);
     	echo "Stored in: " . $file_directory . $file_name;
     	$location = "../" . $file_directory . $file_name;
		}
     	$sql = "SELECT `albumid` FROM `albums` WHERE `albumname` = '$folder'";
     	$result = mysql_query($sql) or die (mysql_error());
     	 while ($row = mysql_fetch_array($result))
   	 	{
	 	$albumid = $row['albumid'];
			 echo $albumid;
	 	}
	 	$sql = "SELECT `categoryid` FROM `category` WHERE `category` = '$cat_folder'";
     	$result = mysql_query($sql) or die (mysql_error());
     	 while ($row = mysql_fetch_array($result))
   	 	{
	 	$categoryid = $row['categoryid'];
			 echo $categoryid;
	 	}
     	
     	Insert_Image ($location, $file_name, $file_ext, $albumid, $categoryid,  $userid);
     	$sql = "SELECT `ImageId` FROM `images` WHERE `imagename` = '$file_name'";
     	$result = mysql_query($sql) or die (mysql_error());
     	 while ($row = mysql_fetch_array($result))
   	 	{
	 	$imageid = $row['ImageId'];
	 	echo $imageid;
	 	}
     	Update_Upload ($user, $imageid );
     	$thumbmod = (explode('../', $location));
     	Update_Counter ($albumid, $categoryid );
     	?><form method="post" action="update.php" >
     	     	<table border="1" cellpadding="5" width="100%">
     	     	<tr><td>
     	     		<img src="<?php echo $thumbmod[1] ?>" width="150">
     	     	</td><td valign="top">
     	     	<input name="imageid[<?php echo $key ?>]" value="<?php echo $imageid ?>"/><br>
     	     	<input name="albumid[<?php echo $key ?>]" value="<?php echo $albumid ?>"/><br>
                <input name="categoryid[<?php echo $key ?>]" value="<?php echo $categoryid ?>"/><br>
				<input name="userid[<?php echo $key ?>]" value="<?php echo $userid ?>"/><br>
                <input name="file_name[<?php echo $key ?>]" value="<?php echo $file_name ?>"/><br>
                Source: <input type="text" name="source[<?php echo $key ?>]" id="source" value="" /><br>            		
                Keywords: <input type="text" name="keywords[<?php echo $key ?>]" id="keywords" value="" maxlength="120" /><br>             		
                Liscense: <input type="text" name="liscense[<?php echo $key ?>]" id="liscense" value="" /><br>        		
                Placement: <input type="text" name="placement[<?php echo $key ?>]" id="placement" value="" /><br>            		
                Version: <input type="radio" value="none" id="version" name="version[<?php echo $key ?>]"/>None<br>
                 		 <input type="radio" value="new"   id="version" name="version[<?php echo $key ?>]"/>New
                 		 <input type="radio"  value="updated" id="version" name="version[<?php echo $key ?>]"/>Updated
                 Notes:	     <textarea id="notes" name="notes[<?php echo $key ?>]" cols="25" rows="2"></textarea>    <br>             		
                 	
                
                
                <br/></td></tr></table><?php
	    }
		
		
		} //For each loop
	         ?>  <input type="submit" value="update" name="update"></form><?php
     	
	
} // main loop
?>