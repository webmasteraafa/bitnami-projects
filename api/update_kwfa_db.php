<?php
     require ('config.php');
     db_connect();
     include_once('functions.php');
     //$kwfa = Check_kwfa_db();
	 $kwfa_hoopla =	Check_kwfa_hoopla();
	 echo $kwfa_hoopla;
	 //$n = $kwfa_hoopla - $kwfa;
	 //echo "New Entries: $n";
    // include('update.php');
    
?>