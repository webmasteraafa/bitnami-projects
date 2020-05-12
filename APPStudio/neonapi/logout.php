<?php
 session_start();
 $id = $_SESSION['session_id'];
 require('/inc/neon_lib.php');
 $url = 'https://api.neoncrm.com/neonws/services/api/common/logout?userSessionId='.$id];
 curl($url);
 session_destroy();
 ?>
 <p>Click to go back to <a href="/AppStudio/main_files/inde.php">dashboard</a></p>