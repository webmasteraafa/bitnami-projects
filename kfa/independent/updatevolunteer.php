<?php
	include("htmlheader.php");
	include("common.php");
	include ("config.php");

	
	$id = $_REQUEST['id'];
	$first_name = $_REQUEST['first_name'];
	$first_name = str_replace('\'', '&#039;', $first_name);
	$last_name = $_REQUEST['last_name'];
	$last_name = str_replace('\'', '&#039;', $last_name);
	$email = $_REQUEST['email'];
	$email = str_replace('\'', '&#039;', $email);
	$address1 = $_REQUEST['address1'];
	$address1 = str_replace('\'', '&#039;', $address1);
	$address2 = $_REQUEST['address2'];
	$address2 = str_replace('\'', '&#039;', $address2);
	$city = $_REQUEST['city'];
	$city = str_replace('\'', '&#039;', $city);
	$state = $_REQUEST['state'];
	$state = str_replace('\'', '&#039;', $state);
	$country = $_REQUEST['country'];
	$country = str_replace('\'', '&#039;', $country);
	$zip = $_REQUEST['zip'];
	$zip = str_replace('\'', '&#039;', $zip);
	$phone = $_REQUEST['phone'];
	$phone = str_replace('\'', '&#039;', $phone);
	$weekdays = $_REQUEST['weekdays'];
	$weeknights = $_REQUEST['weeknights'];
	$weekends = $_REQUEST['weekends'];
	$anytime = $_REQUEST['anytime'];
	$variable = $_REQUEST['variable'];



		$sql = "update volunteers set first_name='$first_name', last_name='$last_name', email='$email', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip', phone='$phone', weekdays='$weekdays', weeknights='$weeknights', weekends='$weekends', anytime='$anytime', variable='$variable', status='$status' where id='$id'";
		mysql_query( $sql ) or die( "Error updating Wood Type: " . mysql_error() . " Query: $sql " );

$page = "index.php";
//gotoPage($page);

	include("htmlfooter.php");


?>




