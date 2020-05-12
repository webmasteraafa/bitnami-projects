<?php
session_start();
$id = $_SESSION['session_id'];
require('/inc/neon_lib.php');
$url='https://api.neoncrm.com/neonws/services/api/account/listSystemUsers?userSessionId='.$id;
$json = curl($url);

$message = $json[listSystemUsersResponse][responseMessage];
echo $message;
$message2 = array();
$message2 = explode(" ",$message);

$counter = $message2[0];
?>
<p>System Users : <?php echo $counter ?></p>
<?php
$x = 0;
do 
{
echo 'Sys User ID:';
echo  $json[listSystemUsersResponse][systemUsers][systemUser][$x][systemUserId];
echo '<br/>Name:';
echo  $json[listSystemUsersResponse][systemUsers][systemUser][$x][firstName];	
echo '&nbsp;';
echo  $json[listSystemUsersResponse][systemUsers][systemUser][$x][lastName];
echo '<br/>';
$x = $x + 1;
} while ($x <= $counter);
?>
