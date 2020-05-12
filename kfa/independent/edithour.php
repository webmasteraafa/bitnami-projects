<?php

	include("htmlheader.php");	
	include("config.php");
	include("common.php");
	$id = $_REQUEST['id'];
	$month = $_REQUEST['month'];
	$volid = $_REQUEST['volid'];


	if( $id == "" or intval( $id  ) == 0 )

        {

		//Create a new Hours Entry


		$username = $session->getVar('login' );

			$sql = "select * from volunteers where username='$username'";
			$result = mysql_query( $sql ) or die( "Error querying volunteers list: " . mysql_error() . " Query: $sql " );
			$row = mysql_fetch_array( $result );
					// If the person's update date is more than 365 days - we want to see their name.
					$date1 = $row['statement_date'];
					list($year, $month1, $day) = split('[-]', $date1);
					//echo "Month: $month1; Day: $day; Year: $year<br />\n";

					//find interval of time that has passed.
					$time_passed = intval((time()-mktime(0,0,0,$month1,$day,$year))/86400);
					//echo "Days that have passed: ".$time_passed."<br>";
						if ($time_passed > 365) {

										$position = '';
	
						}else {
										$sql = "select * from statements where volunteerid='$volid'";
										$result = mysql_query( $sql ) or die( mysql_error() );
										$row = mysql_fetch_array( $result ) or die( mysql_error() );
										$position = $row['position'];
						}



		

        	echo "<form name='createhours' action=createhours.php method=post>";
		echo "<input type='hidden' name='month' value = '".$month."'>";
		echo "<input type='hidden' name='volid' value = '".$volid."'>";

			echo "<TABLE class=hours>";

				echo "<TR class=title>";

					echo "<TD align=center colspan=4>&nbsp;Post Hours for ". $month ."</TD>";

				echo "</TR>";

				echo "<tr>";

					echo "<td>";

						echo "<table class=simple>";


			echo "<tr>";
				echo "<td colspan='4' align='center'>";
				echo "<b>If you only have one position please only fill out Position 1.<b>";
				echo "</td>";
			echo "</tr>";				
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 1:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos1", $position, "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours1 size=5 maxlength=10/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 2:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos2", "", "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours2 size=5 maxlength=10/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 3:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos3", "", "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours3 size=5 maxlength=10/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 4:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos4", "", "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours4 size=5 maxlength=10/>";
				echo "</td>";
			echo "</tr>";			
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 5:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos5", "", "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours5 size=5 maxlength=10/>";
				echo "</td>";
			echo "</tr>";

								echo "<td align='center' colspan=4>";

									echo "<input type='submit' class=submit name='save' value='Post Hours' />";

							echo "</tr>";

						echo "</table>";

					echo "</td>";

				echo "</tr>";

			echo "</table>";

		echo "</form>";


	}

	else

	{


		//View Hours

		$sql = "select * from hours where id='$id'";

		$result = mysql_query( $sql ) or die( mysql_error() );

		if( mysql_num_rows( $result ) > 1 ) die( "Query unexpectedly returned more than one result: " . $sql );

		$row = mysql_fetch_array( $result ) or die( mysql_error() );


        	echo "<form name='updatehours' action=updatehours.php?id=$id method=post>";
		echo "<input type='hidden' name='month' value = '".$row['month']."'>";
		echo "<input type='hidden' name='volid' value = '".$row['volunteerid']."'>";

			echo "<TABLE class=hours>";

				echo "<TR class=title>";

					echo "<TD align=center colspan=4>&nbsp;Edit Hours for ". $row['month'] ."</TD>";

				echo "</TR>";

				echo "<tr>";

					echo "<td>";

						echo "<table class=simple>";


			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 1:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos1", $row['pos1'], "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours1 size=5 maxlength=10 value='".$row['hours1']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 2:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos2", $row['pos2'], "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours2 size=5 maxlength=10 value='".$row['hours2']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 3:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos3", $row['pos3'], "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours3 size=5 maxlength=10 value='".$row['hours3']."'/>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 4:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos4", $row['pos4'], "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours4 size=5 maxlength=10 value='".$row['hours4']."'/>";
				echo "</td>";
			echo "</tr>";			
			echo "<tr>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Position 5:</b></td>";
				echo "<td>";
				echo drawPositionDropDown("pos5", $row['pos5'], "");
				echo "</td>";
				echo "<td align='right'>";
				echo "<p align='right'><b>Hours :</b></td>";
				echo "<td>";
				echo "<input type=text name=hours5 size=5 maxlength=10 value='".$row['hours5']."'/>";
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

	}	



	include("htmlfooter.php");	

?>





  
