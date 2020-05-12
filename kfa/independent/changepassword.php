<?php
	include( "htmlheader.php" );
	include("securepage.php");
	include("common.php");
?>


<?php

	
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
    		<form name=changepass action=changepassword.php method="post">
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


