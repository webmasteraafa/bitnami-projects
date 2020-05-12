<?php

include( "config.php" );

class CSession
{
	var $s_vars = array();
	var $dbcon;

	function CSession()
	{
		global $db_name, $db_passwd, $db_user, $db_server;
		session_start();
		$this->dbcon = mysql_connect( $db_server, $db_user, $db_passwd ) or die( mysql_error() );
		mysql_select_db( $db_name, $this->dbcon );
	}

	function setVar( $key, $val )
	{
		$_SESSION[ $key ] = $val;		
	}

	function getVar( $key )
	{
		return $_SESSION[ $key ];
	}

	function initSession( $login, $passwd )
	{
		if ( $login && $passwd )
		{	
		//echo $login;
		//echo $passwd;
			// Get the password salt from the database
			$sql = "select salt from inusers where login='$login'";
			$result = mysql_query( $sql, $this->dbcon ) or die( mysql_error() );
			$row = mysql_fetch_array( $result );
			$salt = $row['salt'];
			//echo $salt;
			//echo "working?";
			
			//Now try to log in using the salted password
			$passwd .= $salt;
			$sql = "select id from inusers where login='$login' and password=PASSWORD('$passwd')";
			$result = mysql_query( $sql, $this->dbcon ) or die( mysql_error() );
			$row = mysql_fetch_array( $result );
			$userid = $row['id'];
			
			//We were able to log in, set auth and userid in the session
			if ( $userid )
			{
				$this->setVar( "auth", 1 );
				$this->setVar( "userid", $userid );
				$this->setVar( "login", $login );				
			}
			
			$sql = "update inusers set lastLogin=NOW() where id='$userid'";
			mysql_query( $sql ) or die( mysql_error() );
		}
	}

	function killSession()
	{
		session_destroy();
		$this->s_vars = array();
	}

	function printSession()
	{
		echo "<h1>Session Dump</h1>";
		foreach( $_SESSION as $key => $value )
		{
			echo "Session Variable: " . $key . " = " . $value . "<br>";
		}
		echo "<h3>Finished Dumping Session</h3>";
	}
	
	function removeVar( $key )
	{
		unset( $this->s_vars[ $key ] );
		unset( $_SESSION[ $key ] );
	}

}

$session = new CSession();

?>
