
<select name="albums" id="album">
 <?php
 
 		$data = grab_albums();
 		while ($row = mysql_fetch_array($data))
            {
            	 
            echo  "    <option value=\"" .$row['albumname']. "\">" . $row['albumname'] .
       "</option>\n";
              
            }
           ?>
           
     </select>

