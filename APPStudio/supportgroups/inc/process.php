<?php
             echo '<strong>';
             echo $row['groupname'];
             echo '</strong>';
             echo '<br/> <b>Area Served:&nbsp;</b>';
             echo $row['areaserved'];
             echo '<br/><b>Audience:&nbsp;</b>';
             echo $row['audience'];
             echo '<br/><b>Focus:&nbsp;</b>';
             echo $row['focus'];
             echo '<br/><b>Meeting Location:&nbsp;</b>';
             echo $row['location'];
             echo '<br/><b>Meetings:&nbsp;</b>';
             echo $row['meetings'];
             echo '<br/><b>Coordinator:&nbsp;</b>'; 
             echo $row['coordinator'];
             echo '<br/><b>Medical Advisor:&nbsp;</b>'; 
             echo $row['medical_advisor'];
             echo '<br/><b>Phone Number:&nbsp;</b>'; 
             echo $row['phone'];
             echo '<br/><b>Fax Number:&nbsp;</b>'; 
             echo $row['fax'];
             echo '<br/><b>Email:&nbsp;</b>'; 
             $email = $row['email'];
             if ($email == 'N/A')
             {
			 	echo $email;
			 }
             else
             {
			   echo '<a href="mailto:';
               echo $email;
               echo '">';
               echo $email;
               echo '</a>';
			 }
             
             echo '<br/><b>Website:&nbsp;</b>'; 
             $web = $row['website'];
             echo $web;
			
             echo '<br/>';
             echo '<br/><br/>';
?>