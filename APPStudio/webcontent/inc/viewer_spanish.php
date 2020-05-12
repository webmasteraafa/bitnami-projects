<form>
How would like the information shown?&nbsp;&nbsp;<select name="layout" onchange="showLayoutSP(this.value)" style="font-size:10px;">
<option value="">Select:</option>
Add content to dropdown
<?php

$result= grab_spanish_content();
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


