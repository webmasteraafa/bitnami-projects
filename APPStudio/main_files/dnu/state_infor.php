<?php
  require('conn.php');
  
 ?>
 <form action="form.php" method="post">
 	<select name="state">
 		<option>Select state</otion>
 		<?php
 		$sql = "SELECT `idno`,`albumname` FROM `state_info`";
        $result = mysql_query($sql) or die
            ('Could not your information;' . mysql_error());
            while ($row = mysql_fetch_array($result))
            {
            	 
            echo  "    <option value=\"" .$row['statename']. "\">" . $row['statename'] .
       "</option>\n";
              
            }
           ?>
           
     </select>
 		
 		

 	<input type="submit" name="state" value="Get Info">
 	
 </form>
  
?>