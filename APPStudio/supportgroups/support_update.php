<?php
require ('/../main_files/inc/lib.php');
db_connect();
$redirect ='/AppStudio/supportgroups/index.php';
$state = $_POST['state'];
$sg = $_POST['supportgroup'];
$sgname = $_POST['sgname'];
$area =  $_POST['area'];
$audience = $_POST['audience'];
$focus = $_POST['focus'];
$location = $_POST['location'];
$meetings = $_POST['meetings'];
$coordiator = $_POST['coordinator'];
$advisor = $_POST['advisor'];
$phone = $_POST['phone'];
$fax =  $_POST['fax'];
$email  = $_POST['email'];
$website = $_POST['website'];
if (!isset ($sgname))
{
    $sg = 'NO';
	$sql="UPDATE `supportgroup_info` SET 
	`statename` = '$state',
	`supportgroup` = '$sg',
	`groupname` =  '$sgname',
	`areaserved` = '$area',
	`audience` = '$audience', 
	`focus` = '$focus', 
	`location` = '$location', 
	`meetings` = '$meetings', 
	`coordinator` = '$coordiator', 
	`medical_advisor` = '$advisor', 
	`phone` = '$phone', 
	`fax` = '$fax', 
	`email` = '$email', 
	`website` = '$website'
	WHERE `statename` = '$stste'";
	$result = mysql_query($sql) or die (mysql_error());
  
}
else 
{
	$sg= 'YES';
	$sql="UPDATE `supportgroup_info` SET 
	`statename` = '$state',
	`supportgroup` = '$sg',
	`groupname` =  '$sgname',
	`areaserved` = '$area',
	`audience` = '$audience', 
	`focus` = '$focus', 
	`location` = '$location', 
	`meetings` = '$meetings', 
	`coordinator` = '$coordiator', 
	`medical_advisor` = '$advisor', 
	`phone` = '$phone', 
	`fax` = '$fax', 
	`email` = '$email', 
	`website` = '$website'
	WHERE `groupname` = '$sgname'";
	$result = mysql_query($sql) or die (mysql_error());
 
}

header ("Refresh: 5; URL=" . $redirect  . "");             
          	echo "(If your browser doesn't support this, " .         
          	"<a href='/supportgroups/index.php'>click here</a>)"; 
            exit;

?>


