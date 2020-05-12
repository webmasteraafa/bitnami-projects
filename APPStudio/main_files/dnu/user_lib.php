<?php
   function update_user ($username, $email, $fullname, $userid)
   {
   	$sql2 = "UPDATE `users` SET `username` = '$username', `emailaddress` = '$email', `name` = '$fullname' WHERE`userid` = '$userid'";
      $result = mysql_query($sql2) or die
            ('Could not your information;' . mysql_error());
            echo 'updated';
   }
   function insert_user ($username, $password, $emailaddress, $permission, $name){
   	
   	$password_hash = md5($password);
   	
   	$sql = "INSERT INTO `users` (`id`, `username`, `password`,`password-nohash`, `name`, `email`,  `permission`) VALUES (NULL, '$username', '$password', '$password_hash', '$emailaddress', '$name', '$permission')";
   	$result = mysql_query($sql) or die
            ('Could not your information;' . mysql_error());
   	echo 'Inserted new user';
   	
   }
   
   function update_password ($email, $password, $user){
   	
   	$password_hash = md5($password);
   	$sql3 = "UPDATE `users` SET `passwordnohash` = '$password' WHERE `username` = '$user'";
   	 $result = mysql_query($sql3) or die
            ('Could not your information;' . mysql_error());
   	echo 'updated password no hash';
   	$sql4 = "UPDATE `users` SET `password` = '$password_hash' WHERE `username` = '$user'";
   	 $result = mysql_query($sql4) or die
            ('Could not your information;' . mysql_error());
   	echo 'updated password';
   	
   }


	function update_permission ($email, $permission){
   	
   	$password_hash = md5($password);
   	$sql3 = "UPDATE `users` SET `permission` = '$permission' WHERE `emailaddress` = '$email'";
   	 $result = mysql_query($sql3) or die
            ('Could not your information;' . mysql_error());
   	echo 'updated';
   }
    
?>