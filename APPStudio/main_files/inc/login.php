<?php
session_start();
 require('lib.php');
 $username = $_POST['username'];
 $password = $_POST['password'];
 $redirect = '/AppStudio/main_files/index.php';
db_connect();
 
        $sql2 = "SELECT `username` FROM `users` WHERE `username` = '$username'";
		$result = mysql_query($sql2) or die ('Could not find your username' . mysql_error());
        $numrows = mysql_numrows($result);
        if ($numrows = 1)
		{
			$sql3 = "SELECT *  FROM `users` WHERE `passwordnohash` = '$password'";
            $result2 = mysql_query($sql3);
            
			$numrows2 = mysql_numrows($result2);
			if ($numrows2	= 1)
			{
				while ($row = mysql_fetch_array($result))
            	{
                	$_SESSION['user'] = $row['username'];
           		}
            grab_permissions($username);
			header ("Refresh: 5; URL=" . $redirect  . "");             
          	echo "(If your browser doesn't support this, " .         
          	"<a href='/AppStudio/main_files/index.php'>click here</a>)"; 
            exit;	
				
			}
			else
        	{
            	echo "No User found";
            	header('Location: /AppStudio/login.html');
            
        	}
			
		}
        else
        {
            echo "No User found";
            header('Location: /AppStudio/login.html');
            
        }
 
?>