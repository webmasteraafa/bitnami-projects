<?php
define('SQL_HOST','localhost:3306');
	define('SQL_USER','admin-image-app');
	define('SQL_PASS','nFae@830');
	define('SQL_DB','admin_image-app');

	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	or die ('Could not select database; ' . mysql_error());
	
	echo 'connected';
	
	?>