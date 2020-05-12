<?php

function db_connect_hoopla() {
	
	define('SQL_HOST','localhost:3307');
	define('SQL_USER','root');
	define('SQL_PASS','baby2013');
	define('SQL_DB','neon');

	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	or die ('Could not select database; ' . mysql_error());
	echo 'connect';
}

function update_neon_db ($id)
{   
	$sql  = "UPDATE `member_aafa_neon` SET `neon_db`= 'no' WHERE `id` = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	
	
}
function update_neon_dbk ($id)
{   
	$sql  = "UPDATE `kfa_members_neon` SET `neon_db`= 'no' WHERE `id` = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	
	
}
function update_profile($neondatafield, $id)
{   
	$sql  = "UPDATE `member_aafa_neon` SET `custfieldIda`= '$neondatafield' WHERE `id` = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	
	
}