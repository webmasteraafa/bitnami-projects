<?php

function insert_user ($username, $password, $fullname, $email, $SA, $CG, $DG, $AG)
{
	$password_nohash = '';
	$password_nohash = $password;
	$password = md5('$password_nohash');
	
	$sqlu ="INSERT INTO `users`(`userid`, `username`, `passwordnohash`, `password`, `emailaddress`, `name`, `SA`, `CG`, `DG`, `AG`) VALUES ('NULL','$username', '$password_nohash', '$password', '$email', '$fullname',  '$SA', '$CG', '$DG', '$AG')";
	$result = mysql_query($sqlu) or die (mysql_error());
	echo 'insert';
	header ("Refresh: 5; URL='/AppStudio/profile/index.php'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/profile/index.php'>click here</a>)";
	exit;
	
}

function update_permissions($SA, $CG, $DG, $AG, $username)
{
	
	$sqlp = "UPDATE `users` SET `SA` = '$SA', `CG` = '$CG', `DG` = '$DG', `AG` = '$AG' WHERE `username` = '$username'";
	$result = mysql_query($sqlp) or die (mysql_error());
	echo 'Updated Permissions';
	header ("Refresh: 5; URL='/AppStudio/profile/index.php'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/profile/index.php'>click here</a>)";
	exit;
	
}

function update_password($username, $password, $email)
{ 
	
	$password_nohash = $password;
	$password = md5('$password_nohash');
	$sqlp = "UPDATE `users` SET `passwordnohash` = '$password_nohash', `password` = '$password' WHERE `username` = '$username'";
	$result = mysql_query($sqlp) or die (mysql_error());
	echo 'Updated Password';
	header ("Refresh: 5; URL='/AppStudio/profile/index.php'");
	echo "(If your browser doesn't support this, " .
			"<a href='/AppStudio/profile/index.php'>click here</a>)";
	exit;
	
}

function view_profiles ($SA, $user)
{
	
	switch ($SA){
		case 'yes':
			$sqlp = "SELECT * FROM `users`";
			$result = mysql_query($sqlp) or die (mysql_error());
		    return $result;
		    break;
		    case 'no':
		    	$sqlp = "SELECT * FROM `users` WHERE `username` = '$user'";
		    	$result = mysql_query($sqlp) or die (mysql_error());
		    	return $result;
		    	break;
		    
	}
	
	
	
}
