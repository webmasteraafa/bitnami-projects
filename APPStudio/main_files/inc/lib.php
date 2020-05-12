<?php
function db_connect(){
	define('SQL_HOST','localhost:3306');
	define('SQL_USER','admin-image-app');
	define('SQL_PASS','nFae@830');
	define('SQL_DB','application_data');

	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	or die ('Could not select database; ' . mysql_error());
	
	
}

function grab_permissions ($username){
	
	$sqlp = "SELECT `SA`, `CG`, `DG`, `AG` FROM `users` WHERE `username` = '$username'";
	$result = mysql_query($sqlp) or die
	('Could not your information;' . mysql_error());
	while ($row = mysql_fetch_array($result))
	{
	
		$_SESSION['SA'] = $row['SA'];
		$_SESSION['CG'] = $row['CG'];
		$_SESSION['DG'] = $row['DG'];
		$_SESSION['AG'] = $row['AG'];
		 
	}
	
	
}
function check_nav($SA, $CG, $DG)
{
	if ($SA == 'yes')
	{
		$sql = "SELECT `permission`, `path` FROM `navigation` WHERE `permission` = 'SA'";
		$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			return $row['path'];
		}
		
	}
	elseif (($CG == 'yes') AND ($DG == 'yes'))
	{
		$sql = "SELECT `permission`, `path` FROM `navigation` WHERE `permission` = 'CGDG'";
		$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			return $row['path'];
		}
	}
	elseif (($DG == 'no') AND ($CG == 'yes'))
	{
		$sql = "SELECT `permission`, `path` FROM `navigation` WHERE `permission` = 'CG'";
		$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			return $row['path'];
		}
	}
	elseif (($CG == 'no') AND ($DG == 'yes'))
	{
		$sql = "SELECT `permission`, `path` FROM `navigation` WHERE `permission` = 'DG'";
		$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			return $row['path'];
		}
	}
	else
	{
		$sql = "SELECT `permission`, `path` FROM `navigation` WHERE `permission` = ''";
		$result = mysql_query($sql) or die ('Could not your information;' . mysql_error());
		while ($row = mysql_fetch_array($result))
		{
			return $row['path'];
		}
	}
}
	
	 
	
