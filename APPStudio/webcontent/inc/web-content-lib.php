<?php

function get_slider_locations_kfa ()
{
	$sql = "SELECT DISTINCT(`slider-location`) FROM `kfa_sliders`";
	$result = mysql_query($sql)or die (mysql_error());
	return $result;

}
function grab_slider_location ($slider_group, $website)
{
	switch ($website){
		case 'AAFA':
			$sql4 = "SELECT DISTINCT(`slider-location`) FROM  `aafa_sliders`";
			$result = mysql_query($sql4)or die (mysql_error());
			return $result;
			break;
		case 'KFA':
			$sql4 = "SELECT DISTINCT(`slider-location`) FROM  `kfa_sliders`";
			$result = mysql_query($sql4)or die (mysql_error());
			return $result;
			break;
	}
}
function get_kfa_sliders($slider_group){

	if ($slider_group == 'All')
	{
		$sql = "SELECT * FROM `kfa_sliders` ";
		$result = mysql_query($sql)or die (mysql_error());
		return $result;
	}
	else
	{
		$sql = "SELECT * FROM `kfa_sliders` WHERE `slider-location` = '$slider_group' ORDER BY `live`";
		$result = mysql_query($sql)or die (mysql_error());
		return $result;
	}


}
function get_slider_locations_aafa ()
{
	$sql = "SELECT DISTINCT(`slider-location`) FROM `aafa_sliders`";
	$result = mysql_query($sql)or die (mysql_error());
	return $result;

}
function get_aafa_sliders($slider_group){
	 
	if ($slider_group == 'All')
	{
		$sql = "SELECT * FROM `aafa_sliders`";
		$result = mysql_query($sql)or die (mysql_error());
		return $result;
	}
	else
	{
		$sql = "SELECT * FROM `aafa_sliders` WHERE `slider-location` = '$slider_group' ORDER BY `live`";
		$result = mysql_query($sql)or die (mysql_error());
		return $result;
	}

}

function add_slider_db ($slidername, $sliderlocation, $filelocation, $website, $live, $notes)
{
	echo $website;
	switch ($website)
	{
		case 'AAFA' :
		$sql = "INSERT INTO `aafa_sliders`(`id`, `slidername`, `slider-location`, `file-location`, `live`, `notes`) VALUES ('NULL','$slidername','$sliderlocation','$filelocation','$live','$notes')";
	$result = mysql_query($sql)or die (mysql_error());
	header ("Refresh: 5; URL='/AppStudio/webcontent/slider_aafa.php?Group=All'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/webcontent/slider_aafa.php?Group=All'>click here</a>)";
	exit;
	break;
	case 'KFA' :
	$sql = "INSERT INTO `kfa_sliders`(`id`, `slidername`, `slider-location`, `file-location`, `live`, `notes`) VALUES ('NULL','$slidername','$sliderlocation','$filelocation','$live','$notes')";
	$result = mysql_query($sql)or die (mysql_error());
	header ("Refresh: 5; URL='/AppStudio/webcontent/slider_aafa.php?Group=All'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/webcontent/sliders_kfa.php?Group=All'>click here</a>)";
	exit;
	break;
	
	}

}
	
function grab_slider_info ($slider_name, $website, $location)
{
	switch ($website){
		case 'AAFA':
			$sql3 = "SELECT * FROM  `aafa_sliders` WHERE `slidername` = '$slider_name' AND `slider-location` = '$location'";
			$result = mysql_query($sql3)or die (mysql_error());
			return $result;
			break;
		case 'KFA':
			$sql3 = "SELECT * FROM  `kfa_sliders` WHERE `slidername` = '$slider_name' AND `slider-location` = '$location'";
			$result = mysql_query($sql3)or die (mysql_error());
			return $result;
			break;
	}
	
	
	
}
function update_slider ($slidername, $sliderlocation, $filelocation, $website, $live, $notes)
{
	
	switch ($website){
		case 'AAFA':
	$sql2 = "UPDATE `aafa_sliders`SET `live` = '$live', `notes` = '$notes' WHERE `slidername` = '$slidername' AND `slider-location` = '$sliderlocation'";
	$result = mysql_query($sql2)or die (mysql_error());
	echo 'updated';
	header ("Refresh: 5; URL='/AppStudio/webcontent/slider_aafa.php?Group=All'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/webcontent/slider_aafa.php?Group=All'>click here</a>)";
	exit;
	break;
	case 'KFA':
	$sql2 = "UPDATE `kfa_sliders` SET `live` = '$live', `notes` = '$notes' WHERE `slidername` = '$slidername' AND `slider-location` = '$sliderlocation'";
	$result = mysql_query($sql2)or die (mysql_error());
	header ("Refresh: 5; URL='/AppStudio/webcontent/sliders_kfa.php?Group=All'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/webcontent/sliders_kfa.php?Group=All'>click here</a>)";
	exit;
	break;
    } 
}
	
// Viewer SQL	
function grab_old_site_content ()
{
	$sql3="SELECT `title` FROM `AAFA-old-site`";
	$result = mysql_query($sql3) or die (mysql_error());
	return $result;
	
}

function grab_spanish_content ()
{
	$sql3="SELECT `title` FROM `aafa-spanish`";
	$result = mysql_query($sql3) or die (mysql_error());
	return $result;
}	
	
function grab_state_content ()
{
	$sql3="SELECT `title` FROM `AAFA-old-site` WHERE  (`id` BETWEEN 754 AND 807)
AND NOT `id` IN (799,800,801)";
	$result = mysql_query($sql3) or die (mysql_error());
	return $result;
	
}
function show_old_site_content ($x)
{
	
	$sql3="SELECT `title`, `content` FROM `AAFA-old-site`  WHERE `title` = '$x'";
	$result = mysql_query($sql3) or die (mysql_error());
	return $result;
	
}
function show_spanish_site_content ($x)
{
	$sql3="SELECT `title`, `content` FROM `aafa-spanish`  WHERE `title` = '$x'";
	$result = mysql_query($sql3) or die (mysql_error());
	return $result;
}

?>