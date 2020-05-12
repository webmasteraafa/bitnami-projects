<?php
   function db_connect_web(){
   	  define('SQL_HOST','localhost:3307');
	define('SQL_USER','root');
	define('SQL_PASS','baby2013');
	define('SQL_DB','website-slider');
	
	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	  or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	  or die ('Could not select database; ' . mysql_error());
   	
   	
   } 
   function get_slider_locations_kfa ()
   {
   	 $sql = "SELECT DISTINCT(`slider-location`) FROM `kfa_sliders`";
   	 $result = mysql_query($sql)or die (mysql_error());
   	 return $result;
   	
   } 
   function get_kfa_sliders($slider_group){
   	
   	 if ($slider_group == 'All')
   	 {
	 	$sql = "SELECT * FROM `kfa_sliders`";
   	    $result = mysql_query($sql)or die (mysql_error());
   	    return $result;
	 }
	 else 
	 {
	 	 $sql = "SELECT * FROM `kfa_sliders` WHERE `slider-location` = '$slider_group'";
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
	 	 $sql = "SELECT * FROM `aafa_sliders` WHERE `slider-location` = '$slider_group'";
   	     $result = mysql_query($sql)or die (mysql_error());
   	     return $result;
	 }
   	
   }
?>