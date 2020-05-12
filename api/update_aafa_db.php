<?php
     require ('config.php');
     db_connect();
    include_once('functions.php');
     $aafa = Check_aafa_db();
	 $aafa_hoopla =	Check_aafa_hoopla();
	 $n = $aafa_hoopla - $aafa;
	 echo "New Entries: $n";
	  
    
		 
    
?>