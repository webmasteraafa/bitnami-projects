<?php
     require('functions.php');
     $kwfa = Check_kwfa_db();
	 $kwfa_hoopla =	Check_kwfa_hoopla();
	 $n = $kwfa_hoopla - $kwfa;
	 echo "New Entries: $n";
?>