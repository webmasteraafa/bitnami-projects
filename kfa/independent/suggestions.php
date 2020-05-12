<?php

	include("htmlheader.php");	
	include("config.php");
	include("common.php");

?>



<?php

		//Create a new Suggestion

		echo "<form name='createsuggestion' action=createsuggestion.php method=post>";

			echo "<TABLE class=content>";

				echo "<TR class=title>";

					echo "<TD align=center colspan=2>&nbsp;Submit a Suggestion or Feedback&nbsp;</TD>";

				echo "</TR>";

				echo "<tr>";

					echo "<td>";

						echo "<table class=simple>";

			echo "<tr>";
				echo "<td  align='right' colspan='2'>";
				echo "<p align='right'><b>All Suggestions or Feedback that are submitted are completely anonymous. Please let us know what your feedback and suggestions are.</b></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td  align='right'>";
				echo "<p align='right'><b>Suggestion / Feedback:</b></td>";
				echo "<td >";
				echo "<textarea type='text' cols=50 rows=17 name='suggestion'></textarea>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td  align='right'>";
				echo "<p align='right'><b>Date:</b></td>";
				echo "<td >";
				echo "<input type=text name=date size=20 maxlength=20 />";
				echo "</td>";
			echo "</tr>";

							echo "<tr>";

								echo "<td align='center' colspan=2>";

									echo "<input type='submit' class=submit name='tCreate' value='Submit'/>";

								echo "</td>";

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





  
