<?php

function update_support_group ($state){
	
	$sql = "SELECT `supportgroup`, `groupname` FROM `supportgroup_info` WHERE `statename` = '$state'"; 
    $result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
	return $result;
}
function pull_support_group_data (){
	
	$sql = "SELECT DISTINCT `statename` , COUNT(statename),`supportgroup` FROM `supportgroup_info` GROUP BY `statename` ";
    $result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
    return $result;
}

function pull_state_specific ($state){
	
	$sql = "SELECT * FROM `supportgroup_info` WHERE `statename` = '$state'";
   $result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
   return $result;
}
function update_state($name){
	echo 'state';
	$sql2 = "SELECT * FROM `supportgroup_info` WHERE`statename` = '$name'";
  	$result2 = mysql_query($sql2) or die ('Could not your information;' . mysql_error());
  	return $result2;
}
function update_group ($group){
	echo 'group';
	$sql = "SELECT * FROM `supportgroup_info` WHERE`groupname` = '$group'";
  	$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
	 return $result;
}
function pull_state_images (){

	$sql = "SELECT `statename`, `state_image_url` FROM `state_info` ORDER BY `statename` ASC";
	$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
	return $result;
}
                         
                         
 
?>