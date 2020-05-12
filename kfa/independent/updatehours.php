<?php
	include("htmlheader.php");
	include("common.php");
	include ("config.php");

	
	$id = $_REQUEST['id'];
	$formname = $_REQUEST['formname'];
	$month = $_REQUEST['month'];
	$volunteerid = $_REQUEST['volid'];
	$pos1 = $_REQUEST['pos1'];
	$pos1 = str_replace('\'', '&#039;', $pos1);
	$pos1 = str_replace('\"', '&quot;', $pos1);
	$hours1 = $_REQUEST['hours1'];
	$pos2 = $_REQUEST['pos2'];
	$pos2 = str_replace('\'', '&#039;', $pos2);
	$pos2 = str_replace('\"', '&quot;', $pos2);
	$hours2 = $_REQUEST['hours2'];
	$pos3 = $_REQUEST['pos3'];
	$pos3 = str_replace('\'', '&#039;', $pos3);
	$pos3 = str_replace('\"', '&quot;', $pos3);
	$hours3 = $_REQUEST['hours3'];
	$pos4 = $_REQUEST['pos4'];
	$pos4 = str_replace('\'', '&#039;', $pos4);
	$pos4 = str_replace('\"', '&quot;', $pos4);
	$hours4 = $_REQUEST['hours4'];
	$pos5 = $_REQUEST['pos5'];
	$pos5 = str_replace('\'', '&#039;', $pos5);
	$pos5 = str_replace('\"', '&quot;', $pos5);
	$hours5 = $_REQUEST['hours5'];


		$sql = "update hours set volunteerid='$volunteerid', month='$month', pos1= '$pos1', date='$date', hours1='$hours1', pos2='$pos2', hours2='$hours2', pos3='$pos3', hours3='$hours3', pos4='$pos4', hours4='$hours4', pos5='$pos5', hours5='$hours5' where id='$id'";
		mysql_query( $sql ) or die( "Error updating Hours: " . mysql_error() . " Query: $sql " );

$page = "index.php";
gotoPage($page);

	include("htmlfooter.php");


?>




