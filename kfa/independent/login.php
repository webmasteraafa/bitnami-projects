<?php
	include("htmlheader.php");
	include("common.php");
	$session->killSession();
	$user = $_REQUEST['user'];

	echo "<TABLE class=content><form action=validate.php method=post>";
		echo "<TR class=title>";
			echo "<TD align=center colspan=2>Please Login</TD>";
		echo "</TR>";
		echo "<tr>";
			echo "<td>";
				echo "<table class=simple>";
					echo "<tr>";
						echo "<td align='right' valign=top " . getWidth() . ">Username:</td>";
						echo "<td align='left'>";
							echo "<input class=normal type='text' name='username' size='25' maxlength='30' value='". $user . "' />";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='right' valign=top>Password:</td>";
						echo "<td align='left'>";
							echo "<input class=normal type='password' name='password' size='25' maxlength='16' />";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='center' colspan=2>";
							echo "<input type='submit' class='submit' name='login' value='Login' />";
						echo "</td>";
					echo "</tr>";
				echo "</table>";
			echo "</td>";
		echo "</tr>";
	echo "</form></table>";
	
	include("htmlfooter.php");
?>
