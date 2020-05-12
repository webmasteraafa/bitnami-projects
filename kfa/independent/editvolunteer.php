<?php

	include("htmlheader.php");	
	include("config.php");
	include("common.php");
	$username = $_REQUEST['username'];


?>



<?php


		//View Volunteer

		

		$sql = "select * from independent where username='$username'";

		$result = mysql_query( $sql ) or die( mysql_error() );

		if( mysql_num_rows( $result ) > 1 ) die( "Query unexpectedly returned more than one result: " . $sql );

		$row = mysql_fetch_array( $result ) or die( mysql_error() );
		$weekdayschecked = '';
		$weeknightschecked = '';
		$weekendschecked = '';
		$anytimechecked = '';
		$variablechecked = '';
		$nochecked = "";
		$yeschecked = "";
		$enjoined_nochecked = "";
		$enjoined_yeschecked = "";

		if (($row['weekdays'] == "Yes") || ($row['weekdays'] == 'yes')) $weekdayschecked = 'checked';
		if (($row['weeknights'] == "Yes") || ($row['weeknights'] == 'yes')) $weeknightschecked = 'checked';
		if (($row['weekends'] == "Yes") || ($row['weekends'] == 'yes')) $weekendschecked = 'checked';
		if (($row['anytime'] == "Yes") || ($row['anytime'] == 'yes')) $anytimechecked = 'checked';
		if (($row['variable'] == "Yes") || ($row['variable'] == 'yes')) $variablechecked = 'checked';
		$id = $row['id'];
        	echo "<form name='updatevolunteer' action=updatevolunteer.php?id=$id method=post>";

			echo "<TABLE class=content>";

				echo "<TR class=title>";

					echo "<TD align=center colspan=2>&nbsp;Edit ". $row['first_name'] ." ".$row['last_name']."'s Profile</TD>";

				echo "</TR>";

				echo "<tr>";

					echo "<td>";

						echo "<table class=simple>";


			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>First Name:</b></td>";
				echo "<td>";
				echo "<input type=text name=first_name size=30 maxlength=60 value='".$row['first_name']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Last Name:</b></td>";
				echo "<td>";
				echo "<input type=text name=last_name size=30 maxlength=60 value='".$row['last_name']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>KWFA/POFAK Username:</b></td>";
				echo "<td>";
				echo $row['username'];
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Email Address:</b></td>";
				echo "<td>";
				echo "<input type=text name=email size=50 maxlength=150 value='".$row['email']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right' valign='top'>";
				echo "<p align='right'><b>Address:</b></td>";
				echo "<td>";
				echo "<input type=text name=address1 size=50 maxlength=150 value='".$row['address1']."'/><br>";
				echo "<input type=text name=address2 size=50 maxlength=150 value='".$row['address2']."'/><br>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>City:</b></td>";
				echo "<td>";
				echo "<input type=text name=city size=30 maxlength=100 value='".$row['city']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>State/Province:</b></td>";
				echo "<td>";
				echo "<input type=text name=state size=30 maxlength=100 value='".$row['state']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Zip/Postal Code:</b></td>";
				echo "<td>";
				echo "<input type=text name=zip size=20 maxlength=50 value='".$row['zip']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Telephone:</b></td>";
				echo "<td>";
				echo "<input type=text name=phone size=40 maxlength=40 value='".$row['phone']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right' valign='top'>";
				echo "<p align='right'><b>Available:</b></td>";
				echo "<td>";
				echo "<input type=checkbox name=weekdays value='yes'".$weekdayschecked."/>Weekdays<br>";
				echo "<input type=checkbox name=weeknights value='yes'".$weeknightschecked."/>Weeknights<br>";
				echo "<input type=checkbox name=weekends value='yes'".$weekendschecked."/>Weekends<br>";
				echo "<input type=checkbox name=anytime value='yes'".$anytimechecked."/>Anytime<br>";
				echo "<input type=checkbox name=variable value='yes'".$variablechecked."/>Variable<br>";

				echo "</td>";
			echo "</tr>";


								echo "<td align='center' colspan=2>";

									echo "<input type='submit' class=submit name='save' value='Save' />";

							echo "</tr>";

						echo "</table>";

					echo "</td>";

				echo "</tr>";

			echo "</table>";

		echo "</form>";

	

?>





<?php

	include("htmlfooter.php");	

?>





  
