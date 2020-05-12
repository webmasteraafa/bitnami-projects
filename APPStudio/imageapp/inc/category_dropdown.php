
<select name="category" id="category>
 <?php
 
 		$data = grab_category();
 		while ($row = mysql_fetch_array($data))
            {
            	 
            	echo  "    <option value=\"" .$row['category']. "\">" . $row['category'] .
            	"</option>\n";
            	
            	}
            	?>
     </select>

