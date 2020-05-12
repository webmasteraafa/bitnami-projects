<form>
How would like the information shown?&nbsp;&nbsp;<select name="layout" onchange="showLayoutSHR(this.value)" style="font-size:12px;">
<option value="">Select:</option>
Adds states to dropdown
<?php

$result = grab_state_content();
$row_count = mysql_num_rows( $result );
echo $row_count;
while ($row = mysql_fetch_array($result))
{

	echo "    <option value=\"" .$row['title']. "\">" . $row['title'] .
	"</option>\n";
}

?>
</select>
</form>
<br>
	


