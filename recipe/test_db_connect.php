<?php
$server = "VMEB70816";

$options = array(  "UID" => "admin_kfa",  "PWD" => "Br_d9j54",  "Database" => "admin-kfa");
$conn = sqlsrv_connect($server, $options);



$sql = "SELECT * FROM dbo.GoogleInfo WHERE RecipeId = '118'";
$query = sqlsrv_query($conn, $sql);
if ($query === false){  exit("<pre>".print_r(sqlsrv_errors(), true));}
while ($row = sqlsrv_fetch_array($query))
{  
   echo $row['RecipeName'];
   echo'<br/>';
   $img = $row['DisplayImageFileName'];
   echo'<br/>';
   $media = 'http://www.kidswithfoodallergies.org/media/RecipeImages/';
   echo '<img src="';
   echo $media.$img;
   echo '"/>';
   echo $row['Directions'];
}


sqlsrv_free_stmt($query);

?>