
<?php
require ('/../main_files/inc/lib.php');
require ('inc/web-content-lib.php');
$title = '';
$content = '';
db_connect();
$x = $_GET['q'];
// Checks for which filter to use

switch ($x)
{
	case $x:
		// Filter by Pennsylvania
		$result= show_old_site_content($x);
		while ($row = mysql_fetch_array($result)){

			$title = $row[title];
			$content = $row[content];
			echo "<h1>".$title."</h1>";
			echo "<br/>";
			$content = str_replace( 'class="MsoNormal"', 'style="font:Arial; font-size:14px;"',$content );
			$content = str_replace( 'font size="2"', 'font',$content );
			echo $content;
			//echo "<br/>";
		}

		break;

}
?>
