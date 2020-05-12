<?php
function add_image_db ($imagename, $filelocation, $website)
{
	switch ($website){
		case('AAFA'):
			$album = "aafa";
			$category = "a_server";
			$sql = "INSERT INTO `server_images_aafa` (`id`, `imagename`, `file-location`, `album`, `category` ) VALUES ('NULL', '$imagename', '$filelocation', '$album', '$category')";
			$result = mysql_query($sql)or die (mysql_error());
			$count1 = get_current_count ($album);
			$count2 = get_current_count_c ($category);
			update_counter($album, $category, $count1, $count2 );
			header ("Refresh: 5; URL='/AppStudio/imageapp/index.php'");
			echo "(If your browser doesn't support this, " .
					"<a href='/AppStudio/imageapp/index.php'>click here</a>)";
			exit;
			break;
		case ('KFA'):	
			$album = "kfa";
			$category = "k_server";
			$sql = "INSERT INTO `server_images_kfa`(`id`, `imagename`, `file-location`, `album` , `category`) VALUES ('NULL','$imagename','$filelocation','$album', '$category')";
			$result = mysql_query($sql)or die (mysql_error());
			$count1 = get_current_count ($album);
			$count2 = get_current_count_c ($category);
			update_counter($album, $category, $count1, $count2 );
			header ("Refresh: 5; URL='/AppStudio/imageapp/index.php'");
			echo "(If your browser doesn't support this, " .
					"<a href='/AppStudio/imageapp/index.php'>click here</a>)";
			exit;
			break;
			
			case ('sfsk'):	
			$album = "strides";
			$category = "s_server";
			$sql = "INSERT INTO `server_images_sfsk`(`id`, `imagename`, `file-location`, `album` , `category`) VALUES ('NULL','$imagename','$filelocation','$album', '$category')";
			$result = mysql_query($sql)or die (mysql_error());
			$count1 = get_current_count ($album);
			$count2 = get_current_count_c ($category);
			update_counter($album, $category, $count1, $count2 );
			header ("Refresh: 5; URL='/AppStudio/imageapp/index.php'");
			echo "(If your browser doesn't support this, " .
					"<a href='/AppStudio/imageapp/index.php'>click here</a>)";
			exit;
			break;
			
	}

}
function get_server_images($album) {
	
	switch ($album){
		case('aafa'):
			
			$sql = "SELECT * FROM `server_images_aafa`"; 
			$result = mysql_query($sql)or die (mysql_error());
			return $result;
			break;
		case ('kfa'):
			$sql = "SELECT * FROM `server_images_kfa`";
			$result = mysql_query($sql)or die (mysql_error());
			return $result;
			break;
		case ('strides'):
		    $sql = "SELECT * FROM `server_images_sfsk`";
		    $result = mysql_query($sql)or die (mysql_error());
		    return $result;
		    break;
		    
	}
}
function get_images ($album)
{
	$sqla = "SELECT * FROM `images` WHERE `album` = '$album'";
	$result = mysql_query($sqla)or die (mysql_error());
	return $result;
	
	
}
function get_current_count ($album)
{
	$sql2 = "SELECT `imagecount` FROM `albums` WHERE `albumname` = '$album'";
	$result = mysql_query($sql2)or die (mysql_error());
	while ($row = mysql_fetch_array($result))
	{
		return $row['imagecount'];
	}
			
	
}
function get_current_count_c ($category)
{
	$sql3 = "SELECT `imagecount_c` FROM `category` WHERE `category` = '$category'";
	$result2 = mysql_query($sql3)or die (mysql_error());
	while ($row = mysql_fetch_array($result2))
	{
		return $row['imagecount_c'];
	}

}
function update_counter ($album, $category, $count1, $count2 )
{
	$count1 = ++$count1;
	$count2 = ++$count2;
	$sqlu = "UPDATE `albums` SET  `imagecount` = '$count1' WHERE `albumname` = '$album'";
	$result = mysql_query($sqlu)or die (mysql_error());
	$sqlu2 = "UPDATE `category` SET  `imagecount_c` = '$count2' WHERE `category` = '$category'";
	$result = mysql_query($sqlu2)or die (mysql_error());
}
function add_album ($album_name){
	$counter = 0;
	$sqla = "INSERT INTO `albums` (`id`, `albumname`, `imagecount`) VALUES ('NULL', '$album_name', '$counter')";
	$result = mysql_query($sqla)or die (mysql_error());
	mkdir($_SERVER['DOCUMENT_ROOT']. '/media/'. $album_name . '/');
	header ("Refresh: 5; URL='/AppStudio/imageapp/create_album.php'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/imageapp/create_album.php'>click here</a>)";
	exit;
}

function add_category ($category_name, $albums)
{
	$counter = 0;
	$sqlc = "INSERT INTO `category` (`id`, `category`, `category_parent`, `imagecount_c`) VALUES ('NULL', '$category_name', '$albums', '$counter')";
	$result = mysql_query($sqlc)or die (mysql_error());
	mkdir($_SERVER['DOCUMENT_ROOT']. '/media/'. $albums .'/'. $category_name. '/');
	header ("Refresh: 5; URL='/AppStudio/imageapp/create_category.php'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/imageapp/create_category.php'>click here</a>)";
	exit;
}
function grab_albums ()
{
   $sqla = "SELECT * FROM `albums`";
   $result = mysql_query($sqla)or die (mysql_error());
   $row_count = mysql_num_rows($result);
   if ($row_count = 0)
   {
      return 'no albums';
   }
   else 
   {
   return $result;
   }
}
function grab_category ()
{
	$sqla = "SELECT * FROM `category`";
	$result = mysql_query($sqla)or die (mysql_error());
	$row_count = mysql_num_rows($result);
	if ($row_count = 0)
	{
		return 'no categories';
	}
	else
	{
		return $result;
	}
}


function Insert_Image ($file_location, $imagename, $extension, $album, $category,  $user, $keywords, $source, $placement, $liscense, $notes, $version)
{
	
	//Image DB
	$sqli = "INSERT INTO `images`(`id`, `filelocation`, `imagename`, `extension`, `uploaddate`, `album`, `category`, `user`, `keywords`, `liscense`, `tracking`, `source`, `notes`, `version`) VALUES ('NULL','$file_location','$imagename','$extension',NOW(),'$album','$category','$user','$keywords','$liscense','$tracking','$sourec', '$notes','$version')";
	$result = mysql_query($sqli)or die (mysql_error());
	
	// Upload DB
	$sqlu = "INSERT INTO `uploads`(`uploadid`, `imagename`, `user`, `upload`) VALUES ('NULL','$imagename','$user',NOW())";
	$result = mysql_query($sqlu)or die (mysql_error());
	
	//Update Counters
	$count1 = get_current_count ($album);
	$count2 = get_current_count_c ($category);
	update_counter($album, $category, $count1, $count2 );
	
	header ("Refresh: 5; URL='/AppStudio/imageapp/index.php'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/imageapp/index.php'>click here</a>)";
	exit;
	
} 
function upload_csv_data($file1, $file2, $target)
{
	echo $target;
	echo $file1;
	echo $file2;
	
	$path = $target . $file2;
    echo $path;
	$handle = fopen($path,'r');
do {
        if ($data[0]) {
            mysql_query("INSERT INTO `uploads` (`uploadId`, `imagename`, `user`, `upload`) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."'
                )
            ");
            echo $data[1];
        }
    } while ($data = fgetcsv($handle,1000,",","'"));
    
     $path1 = $target . $file1;
	 $handle = fopen($path1,'r');  
    do {
        if ($data[0]) {
            mysql_query("INSERT INTO `images` (`id`, `filelocation`, `imagename`, `extension`, `uploaddate`, `album`, `category`, `user`, `keywords`, `liscense`, `tracking`, `source`, `notes`, `version`) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                     '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                     '".addslashes($data[6])."',
                    '".addslashes($data[7])."',
                    '".addslashes($data[8])."',
                    '".addslashes($data[9])."',
                     '".addslashes($data[10])."',
                    '".addslashes($data[11])."',
                    '".addslashes($data[12])."',
                     '".addslashes($data[13])."'
                )
            ");
            echo $data[1];
        }
    } while ($data = fgetcsv($handle,1000,",","'"));
    
}



?>