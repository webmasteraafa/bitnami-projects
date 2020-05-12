<?php
	include ("common.php");
	$formname = $_REQUEST['formname'];
	$suggestion = $_REQUEST['suggestion'];
	$date = $_REQUEST['date'];

include ("htmlheader.php");

	include ("config.php");

	$sql = "insert into suggestions set suggestion='$suggestion', date='$date'";
	mysql_query( $sql ) or die( "Error creating new volenteer statement: " . mysql_error() . " Query: $sql " );


echo "Thank you for your Feedback!";
	include("htmlfooter.php");

?>


