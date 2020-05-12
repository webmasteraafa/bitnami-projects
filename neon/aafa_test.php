<?php 
require ('/inc/api_lib.php');
require ('/inc/asthma.php');
db_connect_api();

$sql = "SELECT * FROM `member_aafa_2` WHERE `id` = '502335744642684215'";
$result = mysql_query($sql) or die (mysql_error());

while ($row = mysql_fetch_array($result))
{
   echo $row['option1'];
   $row['option1'] = $data;
   $option1 = get_asthmamanage($data);
   echo $option1;
   echo '<br>';
   echo $row['option2'];
   $row['option2'] = $data;
   $option2 = get_asthmamanage($data);
   echo $option2;
   echo '<br>';
   echo $row['option3'];
    $row['option3'] = $data;
	$option3 = get_asthmamanage($data);
   echo $option3;
   echo '<br>';
   echo $row['option4'];
   $row['option4'] = $data;
   $option4 = get_asthmamanage($data);
   echo $option4;
   echo '<br>';
   echo $row['option5'];
    $row['option5'] = $data;
	$option5 = get_asthmamanage($data);
   echo $option5;
   echo '<br>';
   echo $row['option6'];
   $row['option6'] = $data;
   $option6 = get_asthmamanage($data);
   echo $option6;
   echo '<br>';
   echo $row['option7'];
    $row['option7'] = $data;
	$option7 = get_asthmamanage($data);
   echo $option7;
   echo '<br>';
   echo $row['option8'];
   $row['option8'] = $data;
   $option8 = get_asthmamanage($data);
   echo $option8;
   echo '<br>';
   echo $row['option9'];
   $row['option9'] = $data;
   $option9 = get_asthmamanage($data);
   echo $option9;
   echo '<br>';
   echo $row['option10'];
   $row['option10'] = $data;
   $option10 = get_asthmamanage($data);
   echo $option10;

}
?>

