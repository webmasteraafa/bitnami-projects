<?php
<?php
    require('inc/lib.php');
    db_connect_api();
    
    $sql = "SELECT `mcount` FROM `aafaMemberCount`";
    $result = mysql_query($sql)or die (mysql_error());
    
    while ($row = mysql_fetch_array($result))
    {
		$mcount = $row['mcount'];
	}
    
	for ($i = 1; $i < 5; $i++)
	{ 
      $sql1 ="SELECT `id` FROM `AAFAMemberMaster` WHERE `Idno` = $i";
      $result = mysql_query($sql1)or die (mysql_error());
    
    	while ($row = mysql_fetch_array($result))
    	{
		  $id = $row['id'];
          $username = get_aafa_user();
          $password = '';
		  $urlh = 'https://community.aafa.org/api/v1/members/' . $id. '/?m_id=457293735035228056';
          
		  $data = curl_hoopla($username, $password, $urlh);
		 
		  var_dump($data);
        }
		
		
	}
?>
?>