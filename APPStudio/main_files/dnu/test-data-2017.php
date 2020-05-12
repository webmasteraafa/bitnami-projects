<?php
require('conn.php');
$state = 'Alabama';
$sql = "SELECT * FROM `state_info` WHERE `statename` = '$state'";
    					$result = mysql_query($sql) or die (mysql_error());
    					while ($row = mysql_fetch_array($result))
    					{
    						echo $row['statename'];
    						echo '<br/>';
    				        echo $row['state_image_url'];
    				        echo "1.&nbsp;State requires physician&rsquo;s written instructions to be on file to dispense prescription medication to students.";
    				        if ($row['Q1'] == 'YES')
 							{   
 		
 							?>
							<input type="radio" name="1" value="yes" checked>Yes 
							<input type="radio" name="1" value="no"/>No
							<?php
							}
							elseif ($row['Q1'] == 'NO')
							{?>
							<input type="radio" name="1" value="yes"/>Yes
 							<input type="radio" name="1" value="no" checked>No
 							<?php
 							} 
    					}		?>