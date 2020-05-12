<?php
include ("common.php");
	$formname = $_REQUEST['formname'];
	$conflict_interest = $_REQUEST['conflict_interest'];
	$conflict_interest = str_replace('\'', '&#039;', $conflict_interest);
	$date = $_REQUEST['date'];
	$position = $_REQUEST['position'];
	$postion = str_replace('\'', '&#039;', $position);
	$inid = $_REQUEST['inid'];
	$last_name = $_REQUEST['last_name'];
	$first_name = $_REQUEST['first_name'];


	include ("config.php");

	$sql = "insert into instatements set inid='$inid', position= '$position', date='$date', conflict_interest='$conflict_interest'";
	mysql_query( $sql ) or die( "Error creating new volenteer statement: " . mysql_error() . " Query: $sql " );

	$sql = "update independent set statement_date='$date' where id='$inid'";
	mysql_query( $sql ) or die( "Error updating volunteers table: " . mysql_error() . " Query: $sql " );




$salesemail = "lmitchell@kidswithfoodallergies.org";

	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $salesemail\n");
	fputs($fp, "From: Kids with Food Allergies <$salesemail>\n");
	fputs($fp, "Subject: Confidenciality Statement\n\n");
	fputs($fp, "$first_name $last_name, has submitted a Confidenciality Statement.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "Kids with Food Allergies Website\n______________________________________\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);

	


$page = "index.php";
gotoPage($page);

	include("htmlfooter.php");

?>


