<?php
require ('/../main_files/inc/lib.php');
require ('inc/web-content-lib.php');
db_connect();
$title = '';
$content = '';

$x = $_GET['q'];
// Checks for which filter to use

switch ($x)
{
	case $x:
	 
		
		$result = show_spanish_site_content($x);
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

