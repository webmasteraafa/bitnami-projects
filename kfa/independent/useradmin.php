<?php
	include( "htmlheader.php" );
	include("securepage.php");
	include("common.php");
?>


<?php

	if ( isset( $_REQUEST[ "adduser" ] ) )
	{
		$login = $_REQUEST[ "login" ];
		$sql = "insert into user set login='$login', salt='aaa', password=PASSWORD('letmeinaaa')";
		mysql_query( $sql ) or die( "Error adding user: $login " . mysql_error() );
		echo "User added successfully.<br>";
		echo "The default password is 'letmein'.  New users should change their passwords immediately.";
	}
	
	$messageText = "";
	if ( isset( $_REQUEST[ 'password' ] ) )
	{
		//Change the user's password
		$pwd1 = $_REQUEST[ 'pwd1' ];
		$pwd2 = $_REQUEST[ 'pwd2' ];
		if ( $pwd1 == "" || $pwd2 == "" )
			$messageText .= "Password was not updated: Password is too short.";
		else if ( $pwd1 == $pwd2 )
		{
			if ( changePassword( $pwd1, $session->getVar( 'userid' ) ) )
			{
				$messageText .= "Password updated successfully.";
			}
			else
			{
				$messageText .="An unknown error occurred while changing the password.";
			}
		}
		else
			$messageText .= "Passwords didn't match. Try again.";
	}
	echo $messageText;


?>
	<TABLE class=content>
    		<form action=useradmin.php method="post">
		<TR class=title>
			<TD align=center colspan=2>&nbsp;Create a New User&nbsp;</TD>
		</tr>
		<tr>
			<td>
				<table class=simple>
					<tr>
						<td align=right width=50%>Login Name:</td>
						<td align=left><input class=normal name='login' size=25/></td>
					</tr>
					<tr>
						<td colspan=2 align=center><input type="submit" class=submit value="Create User" name="adduser">
						</td>
					</tr>
				</table>
			</td>
		</tr>
		</form>
	</table>
	<br/>
	<TABLE class=content>
    		<form name=changepass action=useradmin.php method="post">
		<TR class=title>
			<TD align=center colspan=2>&nbsp;Change Password (<?php echo $session->getVar('login' ) ?>)&nbsp;</TD>
		</tr>
		<tr>
			<td>
				<table class=simple>
					<tr>
						<td align="right" width=50%>New Password:</td>
						<td>
							<input class=normal type="password" name="pwd1" size="25" maxlength="40" />
						</td>
					</tr>
					<tr>
						<td align="right">Confirm Password:</td>
						<td>
							<input class=normal type="password" name="pwd2" size="25" maxlength="25" />
						</td>
					</tr>
					<tr>
						<td align="center" colspan=2>
							<input type="submit" class=submit name="password" value="Change Password" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		</form>
	</table>

<?php

	include( "htmlfooter.php" );
?>	


