<?php

function db_connect_api()
{
	//databse connections
define('SQL_HOST','localhost:3307');
define('SQL_USER','root');
define('SQL_PASS','baby2013');
define('SQL_DB','chatbot');

	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	or die ('Could not select database; ' . mysql_error());
	
}

?>