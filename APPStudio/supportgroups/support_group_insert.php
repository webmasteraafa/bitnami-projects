<?php
require('/inc/lib-support.php');
$redirect ='/AppStudio/supportgroups/index.php';
require ('/../main_files/inc/lib.php');
db_connect();
$state = $_POST['state'];
$checkESG = $_POST['checkESG'];
echo $state;
echo $checkESG;
if ($checkESG == 'checked')
{
	$supportgroup = 'yes';
	$sql="INSERT INTO `supportgroup_info`(`id`, `statename`, `supportgroup`, `groupname`, `areaserved`, `audience`, `focus`, `location`, `meetings`, `coordinator`, `medical_advisor`, `phone`, `fax`, `email`, `website`) VALUES (NULL,'$state','$supportgroup','".$_POST['sgname']."','".$_POST['area']."','".$_POST['audience']."','".$_POST['focus']."','".$_POST['location']."','".$_POST['meetings']."','".$_POST['coordinator']."','".$_POST['advisor']."','".$_POST['phone']."','".$_POST['fax']."','".$_POST['email']."','".$_POST['website']."')";
 $result = mysql_query($sql) or die (mysql_error());
 echo 'insert';
}
else
{
	$supportgroup = 'no';
	$sql="INSERT INTO `supportgroup_info`(`id`, `statename`, `supportgroup`, `groupname`, `areaserved`, `audience`, `focus`, `location`, `meetings`, `coordinator`, `medical_advisor`, `phone`, `fax`, `email`, `website`) VALUES (NULL,'$state','$supportgroup','','','','','','','','','','','','')";
 $result = mysql_query($sql) or die (mysql_error());
	echo 'insert';
}

header ("Refresh: 5; URL=" . $redirect  . "");             
          	echo "(If your browser doesn't support this, " .         
          	"<a href='/AppStudio/supportgroups/index.php'>click here</a>)"; 
            exit;

?>